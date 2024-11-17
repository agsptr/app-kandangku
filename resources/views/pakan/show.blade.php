@extends('layouts.app')

@section('title', 'Detail Data Pakan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Pakan</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $pakan->angkatan->nama_angkatan }}</strong></h5>
                <hr>
                <p class="card-text"><strong>Tanggal:</strong>
                    {{ $pakan->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Jenis Pakan:</strong> {{ $pakan->jenis_pakan }}</p>
                <p class="card-text"><strong>Jumlah:</strong> {{ $pakan->jumlah }}</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $pakan->keterangan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('pakan.edit', $pakan) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('pakan.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('pakan.destroy', $pakan) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
