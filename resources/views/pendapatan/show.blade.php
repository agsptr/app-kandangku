@extends('layouts.app')

@section('title', 'Detail Data Pendapatan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Pendapatan</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $pendapatan->angkatan->nama_angkatan }}</strong></h5>
                <hr>
                <p class="card-text"><strong>Tanggal:</strong>
                    {{ $pendapatan->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Jumlah Terjual:</strong> {{ $pendapatan->jumlah_terjual }} ekor</p>
                <p class="card-text"><strong>Berat Total:</strong> {{ $pendapatan->berat_total }} kg</p>
                <p class="card-text"><strong>Harga per Kg:</strong> Rp
                    {{ number_format($pendapatan->harga_per_kg, 0, ',', '.') }}</p>
                <p class="card-text"><strong>Total Pendapatan:</strong> Rp
                    {{ number_format($pendapatan->total_pendapatan, 0, ',', '.') }}</p>
                <p class="card-text"><strong>Pembeli:</strong> {{ $pendapatan->pembeli }}</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $pendapatan->keterangan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('pendapatan.edit', $pendapatan) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('pendapatan.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('pendapatan.destroy', $pendapatan) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
