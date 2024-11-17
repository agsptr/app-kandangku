@extends('layouts.app')

@section('title', 'Detail Data Panen')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Panen</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $panen->angkatan->nama_angkatan }}</h5>
                <p class="card-text"><strong>Tanggal Panen:</strong>
                    {{ $panen->tanggal_panen->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Jumlah Panen:</strong> {{ $panen->jumlah_panen }} ekor</p>
                <p class="card-text"><strong>Berat Panen:</strong> {{ $panen->berat_panen }} kg</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $panen->keterangan ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('panen.edit', $panen) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('panen.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('panen.destroy', $panen) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
