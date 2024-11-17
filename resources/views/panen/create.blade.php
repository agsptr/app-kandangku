@extends('layouts.app')

@section('title', 'Tambah Data Panen')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Data Panen</h1>

        <form action="{{ route('panen.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="angkatan_id">Angkatan</label>
                <select class="form-control @error('angkatan_id') is-invalid @enderror" id="angkatan_id" name="angkatan_id"
                    required>
                    <option value="">Pilih Angkatan</option>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{ $angkatan->id }}" {{ old('angkatan_id') == $angkatan->id ? 'selected' : '' }}>
                            {{ $angkatan->nama_angkatan }}
                        </option>
                    @endforeach
                </select>
                @error('angkatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_panen">Tanggal Panen</label>
                <input type="date" class="form-control @error('tanggal_panen') is-invalid @enderror" id="tanggal_panen"
                    name="tanggal_panen" value="{{ old('tanggal_panen') }}" required>
                @error('tanggal_panen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_panen">Jumlah Panen (ekor)</label>
                <input type="number" class="form-control @error('jumlah_panen') is-invalid @enderror" id="jumlah_panen"
                    name="jumlah_panen" value="{{ old('jumlah_panen') }}" required>
                @error('jumlah_panen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="berat_panen">Berat Panen (kg)</label>
                <input type="number" class="form-control @error('berat_panen') is-invalid @enderror" id="berat_panen"
                    name="berat_panen" value="{{ old('berat_panen') }}" required>
                @error('berat_panen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('panen.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
