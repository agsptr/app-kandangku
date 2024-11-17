<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Kematian;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kematians = Kematian::with('angkatan')->paginate(10);
        return view('kematian.index', compact('kematians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('kematian.create', compact('angkatans'));
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
            'jumlah' => 'required|integer',
            'penyebab' => 'required|string',
            'usia' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        Kematian::create($request->all());

        return redirect()->route('kematian.index')->with('success', 'Data Kematian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function show(Kematian $kematian)
    {
        return view('kematian.show', compact('kematian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function edit(Kematian $kematian)
    {
        $angkatans = Angkatan::all();
        return view('kematian.edit', compact('kematian', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kematian $kematian)
    {
        $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
            'penyebab' => 'required|string',
            'usia' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        $kematian->update($request->all());

        return redirect()->route('kematian.index')->with('success', 'Data Kematian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kematian $kematian)
    {
        $kematian->delete();
        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil dihapus');
    }
}
