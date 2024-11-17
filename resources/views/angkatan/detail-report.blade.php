@extends('layouts.app')

@section('title', 'Laporan Detail Angkatan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Laporan Angkatan</h1>
        <div class="card shadow-sm mb-2">
            <div class="card-body">
                <h2 class="card-title fw-bold">{{ $angkatan->nama_angkatan }}</h2>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="fw-bold">Informasi Umum</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Tanggal Mulai:</strong> {{ $angkatan->tanggal_mulai->format('d-m-Y') }}</p>
                                <p><strong>Tanggal Selesai:</strong>
                                    {{ $angkatan->tanggal_selesai ? $angkatan->tanggal_selesai->format('d-m-Y') : 'Belum selesai' }}
                                </p>
                                @if ($jumlahBebek)
                                    <p><strong>Usia Bebek:</strong>
                                        {{ $jumlahBebek->tanggal_masuk->diffInDays(now()) + $jumlahBebek->usia_masuk }}
                                        hari
                                    </p>
                                @else
                                    <p><strong>Usia Bebek:</strong> Data tidak tersedia</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="fw-bold">Data Bebek</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Jumlah Awal Bebek:</strong> {{ number_format($jumlahAwalBebek) }}</p>
                                <p><strong>Jumlah Kematian Bebek:</strong> {{ number_format($jumlahKematianBebek) }}</p>
                                <p><strong>Jumlah Bebek Panen:</strong> {{ number_format($jumlahBebekPanen) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="fw-bold">Data Produksi</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Total Berat Panen:</strong> {{ number_format($totalBeratPanen, 2) }} kg</p>
                                <p><strong>Total Pakan:</strong> {{ number_format($totalPakan, 2) }} kg</p>
                                <p><strong>FCR:</strong> {{ number_format($fcr, 2) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="fw-bold">Data Finansial</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Total Pengeluaran:</strong> Rp {{ number_format($totalPengeluaran, 2) }}</p>
                                <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatan, 2) }}</p>
                                <p><strong>Profit/Loss:</strong> Rp {{ number_format($profitLoss, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card mb">
                            <div class="card-header">
                                <h5 class="fw-bold">Statistik</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Rata-rata Berat per Bebek:</strong>
                                    {{ number_format($rataRataBeratPerBebek, 2) }}
                                    kg</p>
                                <p><strong>Rata-rata Kematian:</strong> {{ number_format($rataRataKematian, 2) }}%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('angkatan.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('angkatan.edit', $angkatan) }}" class="btn btn-primary">Edit Angkatan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
