@extends('layouts.app')

@section('title', 'Detail Data Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Bebek</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $bebek->angkatan->nama_angkatan }}</strong></h5>
                <hr>
                <p class="card-text"><strong>Tanggal Masuk:</strong>
                    {{ $bebek->tanggal_masuk->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Jumlah Awal:</strong> {{ $bebek->jumlah_awal }}</p>
                <p class="card-text"><strong>Asal Bibit:</strong> {{ $bebek->asal_bibit }}</p>
                <p class="card-text"><strong>Jenis Bebek:</strong> {{ $bebek->jenis_bebek }}</p>
                <p class="card-text"><strong>Usia Masuk:</strong> {{ $bebek->usia_masuk }} hari</p>
                <p class="card-text"><strong>Usia Bebek:</strong>
                    {{ $bebek->tanggal_masuk->diffInDays(now()) + $bebek->usia_masuk }} hari</p>
                <p class="card-text"><strong>Kandang:</strong> {{ $bebek->kandang }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('bebek.edit', $bebek) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('bebek.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('bebek.destroy', $bebek) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
