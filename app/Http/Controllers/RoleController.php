<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Role::query();

    // Searching berdasarkan nama
    if ($request->filled('search')) {
        $query->where('nama', 'like', '%'.$request->search.'%');
    }

    // Filter berdasarkan status (AKTIF / NONAKTIF)
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Pagination, misal 10 data per halaman
    $roles = $query->orderBy('id', 'desc')->paginate(10);

    // Biar query string tetap terbawa saat paginate link
    $roles->appends($request->all());

    return view('role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama' => 'required|string|max:255|unique:role,nama',
        'keterangan' => 'nullable|string',
        // Kita tidak memvalidasi izin_akses langsung karena akan diproses
        // Kita berasumsi inputnya aman
    ]);

    // Ambil data izin akses yang terkelompok dan info metadata
    $izinAksesTerkelompok = $request->input('izin_akses', []); // ['dashboard' => ['read', 'create'], 'mahasiswa' => ['read']]
    $izinInfo = $request->input('izin_info', []); // Metadata nama dan path

    $finalIzinAkses = [];

    // Loop melalui setiap modul yang memiliki akses yang dipilih
    foreach ($izinAksesTerkelompok as $moduleKey => $aksesArray) {
        
        // Pastikan ada akses yang dipilih dan info metadata tersedia
        if (!empty($aksesArray) && isset($izinInfo[$moduleKey])) {
            
            // 1. Gabungkan array akses menjadi string dipisahkan koma
            $aksesString = implode(',', $aksesArray);

            // 2. Susun objek JSON yang diinginkan
            $izinObject = [
                'nama' => $izinInfo[$moduleKey]['nama'], // Contoh: Dashboard
                'path' => $izinInfo[$moduleKey]['path'], // Contoh: /dashboard
                'akses' => $aksesString, // Contoh: read,create,update
            ];
            
            // 3. Encode objek menjadi string JSON (satu kali)
            $finalIzinAkses[] = json_encode($izinObject);
        }
    }

    // 4. Encode array finalIzinAkses menjadi string JSON (double-encoded sesuai permintaan)
    $validated['izin_akses'] = json_encode($finalIzinAkses);
    
    // Hasil $validated['izin_akses'] sekarang akan seperti:
    // "["{\"nama\":\"Dashboard\",\"path\":\"\\\/dashboard\",\"akses\":\"read,create\"}","{\"nama\":\"Data Mahasiswa\",\"path\":\"\\\/mahasiswa\",\"akses\":\"read\"}"]"

    Role::create($validated);

    return redirect('/role')->with('success', 'Role berhasil ditambahkan!');
        // $role = Role::create([
        //     'nama' => $request->nama,
        //     'keterangan' => $request->keterangan,
        //     'izin_akses' => json_encode($request->izin_akses),
        //     'status' => "AKTIF"
        // ]);

        // return redirect()->back()->with('success', 'Role dan izin akses berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:role,nama,' . $id, // Ignor ID saat validasi unique
            'keterangan' => 'nullable|string',
            // izin_akses dan izin_info akan diproses di bawah
        ]);

        // ============ Logic Pemrosesan Izin Akses (Sama seperti metode store) ============
        $izinAksesTerkelompok = $request->input('izin_akses', []);
        $izinInfo = $request->input('izin_info', []);

        $finalIzinAkses = [];

        foreach ($izinAksesTerkelompok as $moduleKey => $aksesArray) {
            if (!empty($aksesArray) && isset($izinInfo[$moduleKey])) {
                $aksesString = implode(',', $aksesArray);
                $izinObject = [
                    'nama' => $izinInfo[$moduleKey]['nama'],
                    'path' => $izinInfo[$moduleKey]['path'],
                    'akses' => $aksesString,
                ];
                $finalIzinAkses[] = json_encode($izinObject);
            }
        }
        
        // Simpan sebagai string JSON double-encoded
        $validated['izin_akses'] = json_encode($finalIzinAkses);
        // ===============================================================================

        $role->update($validated);

        return redirect('/role')->with('success', 'Role ' . $role->nama . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $roleName = $role->nama;
        $role->delete();

        return redirect('/role')->with('success', 'Role ' . $roleName . ' berhasil dihapus!');
    }
}
