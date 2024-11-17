<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Pakan;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakans = Pakan::with('angkatan')->paginate(10);
        return view('pakan.index', compact('pakans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatans = Angkatan::all();
        return view('pakan.create', compact('angkatans'));
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
            'jenis_pakan' => 'required|string',
            'jumlah' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        Pakan::create($request->all());

        return redirect()->route('pakan.index')->with('success', 'Pakan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function show(Pakan $pakan)
    {
        return view('pakan.show', compact('pakan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pakan $pakan)
    {
        $angkatans = Angkatan::all();
        return view('pakan.edit', compact('pakan', 'angkatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pakan $pakan)
    {
        $request->validate([
            'angkatan_id' => 'required|exists:angkatans,id',
            'tanggal' => 'required|date',
            'jenis_pakan' => 'required|string',
            'jumlah' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $pakan->update($request->all());

        return redirect()->route('pakan.index')->with('success', 'Pakan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pakan $pakan)
    {
        $pakan->delete();

        return redirect()->route('pakan.index')->with('success', 'Data pakan berhasil dihapus');
    }
}
