@extends('layouts.app')

@section('title', 'Detail Data Obat')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Obat</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $obat->angkatan->nama_angkatan }}</strong></h5>
                <hr>
                <p class="card-text"><strong>Tanggal:</strong>
                    {{ $obat->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Nama Obat/Vit:</strong> {{ $obat->nama_obat_vitamin }}</p>
                <p class="card-text"><strong>Dosis:</strong> {{ $obat->dosis }}</p>
                <p class="card-text"><strong>Tujuan:</strong> {{ $obat->tujuan }}</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $obat->keterangan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('obat.edit', $obat) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('obat.destroy', $obat) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
