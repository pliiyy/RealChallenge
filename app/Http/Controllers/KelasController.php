<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kelas::query();

    // Searching berdasarkan nama
    if ($request->filled('search')) {
        $query->where('nama', 'like', '%'.$request->search.'%');
    }

    // Filter berdasarkan status (AKTIF / NONAKTIF)
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Pagination, misal 10 data per halaman
    $kelas = $query->orderBy('id', 'desc')->paginate(10);

    // Biar query string tetap terbawa saat paginate link
    $kelas->appends($request->all());

    return view('kelas', compact('kelas'));
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
        'nama' => 'required|string|max:255|unique:kelas,nama',
        'tahun_ajaran' => 'nullable|string',
        'kapasitas' => 'nullable|string',
        // Kita tidak memvalidasi izin_akses langsung karena akan diproses
        // Kita berasumsi inputnya aman
    ]);
    $validated["status"] = "AKTIF";
    Kelas::create($validated);
    return redirect('/kelas')->with('success', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:kelas,nama,' . $id, // Ignor ID saat validasi unique
            'tahun_ajaran' => 'nullable|string',
        'kapasitas' => 'nullable|string',
        ]);

        
        // Simpan sebagai string JSON double-encoded
        $validated['status'] = $kelas->status;
        // ===============================================================================

        $kelas->update($validated);

        return redirect('/kelas')->with('success', 'Kelas ' . $kelas->nama . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelasName = $kelas->nama;
        $kelas->update(["STATUS" => "NONAKTIF"]);
        // $kelas->delete();

        return redirect('/kelas')->with('success', 'Kelas ' . $kelasName . ' berhasil dihapus!');
    }
}
