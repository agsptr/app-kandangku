@extends('layouts.app')

@section('title', 'Tambah Data Angkatan Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Data Angkatan Bebek</h1>

        <form action="{{ route('angkatan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_angkatan" class="form-label">Nama Angkatan</label>
                <input type="text" class="form-control @error('nama_angkatan') is-invalid @enderror" id="nama_angkatan"
                    name="nama_angkatan" value="{{ old('nama_angkatan') }}" required>
                @error('nama_angkatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai"
                    name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                @error('tanggal_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                    id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                @error('tanggal_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    name="keterangan" value="{{ old('keterangan') }}" required>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('angkatan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
