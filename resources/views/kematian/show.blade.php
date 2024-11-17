@extends('layouts.app')

@section('title', 'Detail Data Kematian Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Kematian Bebek</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $kematian->angkatan->nama_angkatan }}</strong></h5>
                <hr>
                <p class="card-text"><strong>Tanggal Masuk:</strong>
                    {{ $kematian->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <p class="card-text"><strong>Jumlah (ekor):</strong> {{ $kematian->jumlah }}</p>
                <p class="card-text"><strong>Penyebab Kematian:</strong> {{ $kematian->penyebab }}</p>
                <p class="card-text"><strong>Usia (hari):</strong> {{ $kematian->usia }} hari</p>
                {{-- <p class="card-text"><strong>Usia kematian:</strong>
                    {{ $kematian->tanggal_masuk->diffInDays(now()) + $kematian->usia_masuk }} hari</p> --}}
                <p class="card-text"><strong>Keterangan:</strong> {{ $kematian->keterangan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('kematian.edit', $kematian) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('kematian.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('kematian.destroy', $kematian) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
