@extends('layouts.app')

@section('title', 'Edit Data Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Data Bebek</h1>

        <form action="{{ route('bebek.update', $bebek) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="angkatan_id" class="form-label">Angkatan</label>
                <select class="form-select @error('angkatan_id') is-invalid @enderror" id="angkatan_id" name="angkatan_id"
                    required>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{ $angkatan->id }}"
                            {{ old('angkatan_id', $bebek->angkatan_id) == $angkatan->id ? 'selected' : '' }}>
                            {{ $angkatan->nama_angkatan }}
                        </option>
                    @endforeach
                </select>
                @error('angkatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk"
                    name="tanggal_masuk" value="{{ old('tanggal_masuk', $bebek->tanggal_masuk->format('Y-m-d')) }}"
                    required>
                @error('tanggal_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_awal" class="form-label">Jumlah Awal</label>
                <input type="number" class="form-control @error('jumlah_awal') is-invalid @enderror" id="jumlah_awal"
                    name="jumlah_awal" value="{{ old('jumlah_awal', $bebek->jumlah_awal) }}" required>
                @error('jumlah_awal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="asal_bibit" class="form-label">Asal Bibit</label>
                <input type="text" class="form-control @error('asal_bibit') is-invalid @enderror" id="asal_bibit"
                    name="asal_bibit" value="{{ old('asal_bibit', $bebek->asal_bibit) }}" required>
                @error('asal_bibit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_bebek" class="form-label">Jenis Bebek</label>
                <input type="text" class="form-control @error('jenis_bebek') is-invalid @enderror" id="jenis_bebek"
                    name="jenis_bebek" value="{{ old('jenis_bebek', $bebek->jenis_bebek) }}" required>
                @error('jenis_bebek')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="usia_masuk" class="form-label">Usia Masuk (hari)</label>
                <input type="number" class="form-control @error('usia_masuk') is-invalid @enderror" id="usia_masuk"
                    name="usia_masuk" value="{{ old('usia_masuk', $bebek->usia_masuk) }}" required>
                @error('usia_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kandang" class="form-label">Kandang</label>
                <input type="text" class="form-control @error('kandang') is-invalid @enderror" id="kandang"
                    name="kandang" value="{{ old('kandang', $bebek->kandang) }}" required>
                @error('kandang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('bebek.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
