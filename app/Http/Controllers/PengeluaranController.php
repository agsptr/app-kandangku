<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\Angkatan;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::with('angkatan')->latest()->paginate(10);
        return view('pengeluaran.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('pengeluaran.create', compact('angkatans'));
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
            'jenis_pengeluaran' => 'required|string',
            'jumlah_pengeluaran' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Pengeluaran::create($validatedData);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        $angkatans = Angkatan::all();
        return view('pengeluaran.edit', compact('pengeluaran', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validatedData = $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'jumlah_pengeluaran' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update($validatedData);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}
