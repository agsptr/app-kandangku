<?php

namespace App\Http\Controllers;

use App\Models\Bebek;
use App\Models\Kematian;
use App\Models\Pakan;
use App\Models\Panen;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;


use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $angkatans = Angkatan::paginate(10);
        return view('angkatan.index', compact('angkatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('angkatan.create');
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
            'nama_angkatan' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
            'keterangan' => 'nullable',
        ]);

        Angkatan::create($request->all());

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function show(Angkatan $angkatan)
    {
        return view('angkatan.show', compact('angkatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Angkatan $angkatan)
    {
        return view('angkatan.edit', compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angkatan $angkatan)
    {
        $validatedDate = $request->validate([
            'nama_angkatan' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
            'tanggal_selesai' => 'nullable|date',
            'keterangan' => 'nullable',
        ]);

        $angkatan->update($validatedDate);

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angkatan $angkatan)
    {
        $angkatan->delete();

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil dihapus.');
    }

    public function detailReport(Angkatan $angkatan)
    {
        $jumlahBebek = Bebek::where('angkatan_id', $angkatan->id)->first();
        $jumlahAwalBebek = Bebek::where('angkatan_id', $angkatan->id)->sum('jumlah_awal');
        $jumlahKematianBebek = Kematian::where('angkatan_id', $angkatan->id)->sum('jumlah');
        $jumlahBebekPanen = Panen::where('angkatan_id', $angkatan->id)->sum('jumlah_panen');
        $totalBeratPanen = Panen::where('angkatan_id', $angkatan->id)->sum('berat_panen');
        $totalPakan = Pakan::where('angkatan_id', $angkatan->id)->sum('jumlah');
        $totalPengeluaran = Pengeluaran::where('angkatan_id', $angkatan->id)->sum('jumlah_pengeluaran');
        $totalPendapatan = Pendapatan::where('angkatan_id', $angkatan->id)->sum('total_pendapatan');

        $profitLoss = $totalPendapatan - $totalPengeluaran;
        $rataRataBeratPerBebek = $jumlahBebekPanen > 0 ? $totalBeratPanen / $jumlahBebekPanen : 0;
        $fcr = $totalBeratPanen > 0 ? $totalPakan / $totalBeratPanen : 0;
        $rataRataKematian = $jumlahAwalBebek > 0 ? ($jumlahKematianBebek / $jumlahAwalBebek) * 100 : 0;

        return view('angkatan.detail-report', compact(
            'angkatan',
            'jumlahBebek',
            'jumlahAwalBebek',
            'jumlahKematianBebek',
            'jumlahBebekPanen',
            'totalBeratPanen',
            'totalPakan',
            'totalPengeluaran',
            'totalPendapatan',
            'profitLoss',
            'rataRataBeratPerBebek',
            'fcr',
            'rataRataKematian'
        ));
    }
}
