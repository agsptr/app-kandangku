<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use App\Models\Angkatan;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::with('angkatan')->paginate(10);
        return view('obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('obat.create', compact('angkatans'));
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
            'nama_obat_vitamin' => 'required|string',
            'dosis' => 'required|string',
            'tujuan' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        return view('obat.show', compact('obat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        $angkatans = Angkatan::all();
        return view('obat.edit', compact('obat', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'nama_obat_vitamin' => 'required|string',
            'dosis' => 'required|string',
            'tujuan' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus');
    }
}
