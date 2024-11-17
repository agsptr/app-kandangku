<?php

namespace App\Http\Controllers;

use App\Models\Bebek;
use App\Models\Pakan;
use App\Models\Kematian;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBebek = Bebek::sum('jumlah_awal') - Kematian::sum('jumlah');
        $stokPakan = Pakan::sum('jumlah');
        $tingkatKematian = Kematian::count() / $totalBebek * 100;

        $pertumbuhanBebek = Angkatan::select('id', 'nama_angkatan')
            ->withSum('bebeks', 'jumlah_awal')
            ->withSum('kematians', 'jumlah')
            ->orderBy('nama_angkatan')
            ->get()
            ->map(function ($angkatan) {
                $angkatan->jumlah_bebek = $angkatan->bebeks_sum_jumlah_awal - ($angkatan->kematians_sum_jumlah ?? 0);
                return $angkatan;
            });

        $konsumsiPakanPerAngkatan = Angkatan::with('pakans')
            ->select('id', 'nama_angkatan')
            ->withSum('pakans as total_konsumsi', 'jumlah')
            ->orderBy('nama_angkatan')
            ->get();

        $trendKematian = Angkatan::select('angkatans.id', 'angkatans.nama_angkatan')
            ->leftJoin('bebeks', 'bebeks.angkatan_id', '=', 'angkatans.id')
            ->leftJoin('kematians', 'kematians.angkatan_id', '=', 'angkatans.id')
            ->groupBy('angkatans.id', 'angkatans.nama_angkatan')
            ->selectRaw('SUM(kematians.jumlah) as total_kematian')
            ->orderBy('angkatans.nama_angkatan')
            ->get();


        return view('dashboard/index', compact('totalBebek', 'konsumsiPakanPerAngkatan', 'stokPakan', 'tingkatKematian', 'pertumbuhanBebek', 'trendKematian'));
    }
}
