@extends('layouts.app')

@section('title', 'Edit Data Angkatan Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Data Angkatan Bebek</h1>

        <form action="{{ route('angkatan.update', $angkatan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama_angkatan">Nama Angkatan</label>
                <input type="text" class="form-control @error('nama_angkatan') is-invalid @enderror" id="nama_angkatan"
                    name="nama_angkatan" value="{{ old('nama_angkatan', $angkatan->nama_angkatan ?? '') }}" required>
                @error('nama_angkatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai"
                    name="tanggal_mulai"
                    value="{{ old('tanggal_mulai', isset($angkatan) ? $angkatan->tanggal_mulai->format('Y-m-d') : '') }}"
                    required>
                @error('tanggal_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                    id="tanggal_selesai" name="tanggal_selesai"
                    value="{{ old('tanggal_selesai', $angkatan->tanggal_selesai ? $angkatan->tanggal_selesai->format('Y-m-d') : '') }}">
                @error('tanggal_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan', $angkatan->keterangan ?? '') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('angkatan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
