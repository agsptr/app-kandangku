<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\BebekController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\CatatanHarianController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ROUTE DASHBOARD

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ROUTE ANGKATAN

Route::get('/angkatan', [AngkatanController::class, 'index'])->name('angkatan.index');
Route::get('/angkatan/create', [AngkatanController::class, 'create'])->name('angkatan.create');
Route::post('/angkatan', [AngkatanController::class, 'store'])->name('angkatan.store');
Route::get('/angkatan/{angkatan}', [AngkatanController::class, 'show'])->name('angkatan.show');
Route::get('/angkatan/{angkatan}/edit', [AngkatanController::class, 'edit'])->name('angkatan.edit');
Route::put('/angkatan/{angkatan}', [AngkatanController::class, 'update'])->name('angkatan.update');
Route::delete('/angkatan/{angkatan}', [AngkatanController::class, 'destroy'])->name('angkatan.destroy');

// REPORT

Route::get('/angkatan/{angkatan}/detail-report', [AngkatanController::class, 'detailReport'])->name('angkatan.detail-report');


// RUTE BEBEK

Route::get('/bebek', [BebekController::class, 'index'])->name('bebek.index');
Route::get('/bebek/create', [BebekController::class, 'create'])->name('bebek.create');
Route::post('/bebek', [BebekController::class, 'store'])->name('bebek.store');
Route::get('/bebek/{bebek}', [BebekController::class, 'show'])->name('bebek.show');
Route::get('/bebek/{bebek}/edit', [BebekController::class, 'edit'])->name('bebek.edit');
Route::put('/bebek/{bebek}', [BebekController::class, 'update'])->name('bebek.update');
Route::delete('/bebek/{bebek}', [BebekController::class, 'destroy'])->name('bebek.destroy');

// ROUTE PAKAN

Route::get('/pakan', [PakanController::class, 'index'])->name('pakan.index');
Route::get('/pakan/create', [PakanController::class, 'create'])->name('pakan.create');
Route::post('/pakan', [PakanController::class, 'store'])->name('pakan.store');
Route::get('/pakan/{pakan}', [PakanController::class, 'show'])->name('pakan.show');
Route::get('/pakan/{pakan}/edit', [PakanController::class, 'edit'])->name('pakan.edit');
Route::put('/pakan/{pakan}', [PakanController::class, 'update'])->name('pakan.update');
Route::delete('/pakan/{pakan}', [PakanController::class, 'destroy'])->name('pakan.destroy');

// ROUTE OBAT

Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
Route::get('/obat/{obat}', [ObatController::class, 'show'])->name('obat.show');
Route::get('/obat/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{obat}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{obat}', [ObatController::class, 'destroy'])->name('obat.destroy');

// ROUTE KEMATIAN

Route::get('/kematian', [KematianController::class, 'index'])->name('kematian.index');
Route::get('/kematian/create', [KematianController::class, 'create'])->name('kematian.create');
Route::post('/kematian', [KematianController::class, 'store'])->name('kematian.store');
Route::get('/kematian/{kematian}', [KematianController::class, 'show'])->name('kematian.show');
Route::get('/kematian/{kematian}/edit', [KematianController::class, 'edit'])->name('kematian.edit');
Route::put('/kematian/{kematian}', [KematianController::class, 'update'])->name('kematian.update');
Route::delete('/kematian/{kematian}', [KematianController::class, 'destroy'])->name('kematian.destroy');

// ROUTE PENDAPATAN

Route::get('/pendapatan', [PendapatanController::class, 'index'])->name('pendapatan.index');
Route::get('/pendapatan/create', [PendapatanController::class, 'create'])->name('pendapatan.create');
Route::post('/pendapatan', [PendapatanController::class, 'store'])->name('pendapatan.store');
Route::get('/pendapatan/{pendapatan}', [PendapatanController::class, 'show'])->name('pendapatan.show');
Route::get('/pendapatan/{pendapatan}/edit', [PendapatanController::class, 'edit'])->name('pendapatan.edit');
Route::put('/pendapatan/{pendapatan}', [PendapatanController::class, 'update'])->name('pendapatan.update');
Route::delete('/pendapatan/{pendapatan}', [PendapatanController::class, 'destroy'])->name('pendapatan.destroy');

// ROUTE PENGELUARAN

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::get('/pengeluaran/create', [pengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::post('/pengeluaran', [pengeluaranController::class, 'store'])->name('pengeluaran.store');
Route::get('/pengeluaran/{pengeluaran}', [pengeluaranController::class, 'show'])->name('pengeluaran.show');
Route::get('/pengeluaran/{pengeluaran}/edit', [pengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::put('/pengeluaran/{pengeluaran}', [pengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::delete('/pengeluaran/{pengeluaran}', [pengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

// ROUTE PANEN

Route::get('/panen', [PanenController::class, 'index'])->name('panen.index');
Route::get('/panen/create', [PanenController::class, 'create'])->name('panen.create');
Route::post('/panen', [PanenController::class, 'store'])->name('panen.store');
Route::get('/panen/{panen}', [PanenController::class, 'show'])->name('panen.show');
Route::get('/panen/{panen}/edit', [PanenController::class, 'edit'])->name('panen.edit');
Route::put('/panen/{panen}', [PanenController::class, 'update'])->name('panen.update');
Route::delete('/panen/{panen}', [PanenController::class, 'destroy'])->name('panen.destroy');

// ROUTE CATATAN_HARIAN

Route::get('/catatan_harian', [CatatanHarianController::class, 'index'])->name('catatan_harian.index');
Route::get('/catatan_harian/create', [CatatanHarianController::class, 'create'])->name('catatan_harian.create');
Route::post('/catatan_harian', [CatatanHarianController::class, 'store'])->name('catatan_harian.store');
Route::get('/catatan_harian/{catatan_harian}', [CatatanHarianController::class, 'show'])->name('catatan_harian.show');
Route::get('/catatan_harian/{catatan_harian}/edit', [CatatanHarianController::class, 'edit'])->name('catatan_harian.edit');
Route::put('/catatan_harian/{catatan_harian}', [CatatanHarianController::class, 'update'])->name('catatan_harian.update');
Route::delete('/catatan_harian/{catatan_harian}', [CatatanHarianController::class, 'destroy'])->name('catatan_harian.destroy');
