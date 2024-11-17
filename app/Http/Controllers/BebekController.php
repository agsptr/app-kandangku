<?php

namespace App\Http\Controllers;

use App\Models\Bebek;
use App\Models\Angkatan;
use Illuminate\Http\Request;

class BebekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bebeks = Bebek::with('angkatan')->paginate(10);
        return view('bebek.index', compact('bebeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('bebek.create', compact('angkatans'));
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
            'tanggal_masuk' => 'required|date',
            'jumlah_awal' => 'required|integer',
            'asal_bibit' => 'required|string',
            'jenis_bebek' => 'required|string',
            'usia_masuk' => 'required|integer',
            'kandang' => 'required|string',
        ]);

        Bebek::create($request->all());

        return redirect()->route('bebek.index')->with('success', 'Bebek berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bebek  $bebek
     * @return \Illuminate\Http\Response
     */
    public function show(Bebek $bebek)
    {
        return view('bebek.show', compact('bebek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bebek  $bebek
     * @return \Illuminate\Http\Response
     */
    public function edit(Bebek $bebek)
    {
        $angkatans = Angkatan::all();
        return view('bebek.edit', compact('bebek', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bebek  $bebek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bebek $bebek)
    {
        $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal_masuk' => 'required|date',
            'jumlah_awal' => 'required|integer',
            'asal_bibit' => 'required|string',
            'jenis_bebek' => 'required|string',
            'usia_masuk' => 'required|integer',
            'kandang' => 'required|string',
        ]);

        $bebek->update($request->all());

        return redirect()->route('bebek.index')->with('success', 'Data Bebek berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bebek  $bebek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bebek $bebek)
    {
        $bebek->delete();

        return redirect()->route('bebek.index')->with('success', 'Data Bebek berhasil dihapus');
    }
}
