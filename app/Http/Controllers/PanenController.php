<?php

namespace App\Http\Controllers;

use App\Models\Panen;
use Illuminate\Http\Request;
use App\Models\Angkatan;

class PanenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panens = Panen::with('angkatan')->latest()->paginate(10);
        return view('panen.index', compact('panens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('panen.create', compact('angkatans'));
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
            'tanggal_panen' => 'required|date',
            'jumlah_panen' => 'required|integer',
            'berat_panen' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        Panen::create($validatedData);

        return redirect()->route('panen.index')->with('success', 'Data panen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panen  $panen
     * @return \Illuminate\Http\Response
     */
    public function show(Panen $panen)
    {
        return view('panen.show', compact('panen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panen  $panen
     * @return \Illuminate\Http\Response
     */
    public function edit(Panen $panen)
    {
        $angkatans = Angkatan::all();
        return view('panen.edit', compact('panen', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panen  $panen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panen $panen)
    {
        $validatedData = $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal_panen' => 'required|date',
            'jumlah_panen' => 'required|integer',
            'berat_panen' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $panen->update($validatedData);

        return redirect()->route('panen.index')->with('success', 'Data panen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panen  $panen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panen $panen)
    {
        $panen->delete();

        return redirect()->route('panen.index')->with('success', 'Data panen berhasil dihapus.');
    }
}
