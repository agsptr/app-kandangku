<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\Angkatan;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendapatans = Pendapatan::with('angkatan')->paginate(10);
        return view('pendapatan.index', compact('pendapatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('pendapatan.create', compact('angkatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'jumlah_terjual' => 'required|integer',
            'berat_total' => 'required|numeric',
            'harga_per_kg' => 'required|numeric',
            'total_pendapatan' => 'required|numeric',
            'pembeli' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Pendapatan::create($request->all());

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendapatan $pendapatan)
    {
        return view('pendapatan.show', compact('pendapatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendapatan $pendapatan)
    {
        $angkatans = Angkatan::all();
        return view('pendapatan.edit', compact('pendapatan', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendapatan $pendapatan)
    {
        $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'jumlah_terjual' => 'required|integer',
            'berat_total' => 'required|integer',
            'harga_per_kg' => 'required|integer',
            'total_pendapatan' => 'required|integer',
            'pembeli' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $pendapatan->update($request->all());

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendapatan $pendapatan)
    {
        $pendapatan->delete();

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil dihapus');
    }
}
