<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Shift;
use App\Models\SuratTugasMengajar;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Jadwal::query();
        $query->with('suratTugasMengajar.kelas','ruangan',"shift");

        // Searching berdasarkan nama
        if ($request->filled('search')) {
            if ($request->filled('search')) {
            // 1. Cari melalui relasi 'suratTugasMengajar'
            $query->whereHas('suratTugasMengajar', function ($q) use ($request) {
                // 2. Di dalam Surat Tugas, cari melalui relasi 'dosen'
                $q->whereHas('dosen.user.biodata', function ($qDosen) use ($request) {
                    // Asumsi: kolom 'nama' ada di tabel biodata
                    $qDosen->where('nama', 'like', '%' . $request->search . '%'); 
                })
                // 3. ATAU cari berdasarkan Mata Kuliah
                ->orWhereHas('matakuliah', function ($qMatkul) use ($request) {
                    // Asumsi: kolom 'nama' ada di tabel matakuliah
                    $qMatkul->where('nama', 'like', '%' . $request->search . '%');
                });
            });
        }
        }

        // Filter berdasarkan status (AKTIF / NONAKTIF)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }else{
            $query->where("status","AKTIF");
        }

        // Pagination, misal 10 data per halaman
        $jadwal = $query->orderBy('hari', 'desc')->paginate(10);

        // Biar query string tetap terbawa saat paginate link
        $jadwal->appends($request->all());
        $surat = SuratTugasMengajar::where("status","=","APPROVED")->get();
        $ruangan = Ruangan::where("status","=","AKTIF")->get();
        $shift = Shift::where("status","=","AKTIF")->get();

        return view('jadwal', compact('jadwal','surat','ruangan','shift'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'surat_tugas_mengajar_id' => 'required',
        'ruangan_id' => 'required',
        'shift_id' => 'required',
        'hari' => 'required',
        ]);
        $find = Jadwal::where("hari",$validated["hari"])->where("shift_id",$validated["shift_id"])->where("status","AKTIF")->get();
        if($find->isNotEmpty()){
            return redirect('/jadwal')->with('error', 'Jadwal bentrok! mohon pilih waktu yg lain atau ajukan barter!');
        }
        $validated["status"] = "AKTIF";
        Jadwal::create($validated);
        return redirect('/jadwal')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        // $jadwal->status = "NONAKTIF";
        // $jadwal->update();
        $jadwal->delete();

        return redirect('/jadwal')->with('success', 'Jadwal berhasil dihapus!');
    }
}
