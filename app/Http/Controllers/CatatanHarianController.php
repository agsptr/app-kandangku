<?php

namespace App\Http\Controllers;

use App\Models\CatatanHarian;
use Illuminate\Http\Request;
use App\Models\Angkatan;

class CatatanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatanHarians = CatatanHarian::with('angkatan')->latest()->paginate(10);
        return view('catatan_harian.index', compact('catatanHarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('catatan_harian.create', compact('angkatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
            'kondisi_bebek' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        CatatanHarian::create($validatedData);

        return redirect()->route('catatan_harian.index')->with('success', 'Catatan harian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CatatanHarian  $catatanHarian
     * @return \Illuminate\Http\Response
     */
    public function show(CatatanHarian $catatanHarian)
    {
        return view('catatan_harian.show', compact('catatanHarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CatatanHarian  $catatanHarian
     * @return \Illuminate\Http\Response
     */
    public function edit(CatatanHarian $catatanHarian)
    {
        $angkatans = Angkatan::all();
        return view('catatan_harian.edit', compact('catatanHarian', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CatatanHarian  $catatanHarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CatatanHarian $catatanHarian)
    {
        $validatedData = $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
            'kondisi_bebek' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $catatanHarian->update($validatedData);

        return redirect()->route('catatan_harian.index')->with('success', 'Catatan harian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CatatanHarian  $catatanHarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(CatatanHarian $catatanHarian)
    {
        $catatanHarian->delete();

        return redirect()->route('catatan_harian.index')->with('success', 'Catatan harian berhasil dihapus.');
    }
}
