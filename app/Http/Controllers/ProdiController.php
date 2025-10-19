<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Prodi::query();
        $query->with('fakultas');

        // Searching berdasarkan nama
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%');
        }

        // Filter berdasarkan status (AKTIF / NONAKTIF)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pagination, misal 10 data per halaman
        $prodi = $query->orderBy('id', 'desc')->paginate(10);

        // Biar query string tetap terbawa saat paginate link
        $prodi->appends($request->all());
        $fakultas = Fakultas::all();
        return view('prodi', compact('prodi','fakultas'));
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
        'nama' => 'required|string|max:255|unique:prodi,nama',
        'kode' => 'required|string',
        'fakultas_id' => 'required|string',
    ]);
    $validated["status"] = "AKTIF";
    Prodi::create($validated);
    return redirect('/prodi')->with('success', 'Prodi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prodi = Prodi::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:prodi,nama,' . $id, // Ignor ID saat validasi unique
            'kode' => 'required|string',
            'fakultas_id' => 'required|string',
        ]);

        
        // Simpan sebagai string JSON double-encoded
        $validated['status'] = $prodi->status;
        // ===============================================================================

        $prodi->update($validated);

        return redirect('/prodi')->with('success', 'Prodi ' . $prodi->nama . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodiName = $prodi->nama;
        $prodi->update(["STATUS" => "NONAKTIF"]);
        // $prodi->delete();

        return redirect('/prodi')->with('success', 'Pakultas ' . $prodiName . ' berhasil dihapus!');
    }
}
