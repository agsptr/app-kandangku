@extends('layouts.app')

@section('title', 'Detail Catatan Harian')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Catatan Harian</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $catatanHarian->angkatan->nama_angkatan }}</h5>
                <p class="card-text"><strong>Tanggal:</strong>
                    {{ $catatanHarian->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Kegiatan:</strong> {{ $catatanHarian->kegiatan }}</p>
                <p class="card-text"><strong>Kondisi Bebek:</strong> {{ $catatanHarian->kondisi_bebek }}</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $catatanHarian->keterangan ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('catatan_harian.edit', $catatanHarian) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('catatan_harian.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('catatan_harian.destroy', $catatanHarian) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
