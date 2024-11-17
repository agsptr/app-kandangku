@extends('layouts.app')

@section('title', 'Detail Data Pengeluaran')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Pengeluaran</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $pengeluaran->angkatan->nama_angkatan }}</h5>
                <p class="card-text"><strong>Tanggal:</strong>
                    {{ $pengeluaran->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Jenis Pengeluaran:</strong> {{ $pengeluaran->jenis_pengeluaran }}</p>
                <p class="card-text"><strong>Jumlah Pengeluaran:</strong> Rp
                    {{ number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.') }}</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $pengeluaran->keterangan ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('pengeluaran.edit', $pengeluaran) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('pengeluaran.destroy', $pengeluaran) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
