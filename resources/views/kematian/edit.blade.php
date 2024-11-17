@extends('layouts.app')

@section('title', 'Edit Data Kematian Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Data Kematian Bebek</h1>

        <form action="{{ route('kematian.update', $kematian) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="angkatan_id" class="form-label">Angkatan</label>
                <select class="form-select @error('angkatan_id') is-invalid @enderror" id="angkatan_id" name="angkatan_id"
                    required>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{ $angkatan->id }}"
                            {{ old('angkatan_id', $kematian->angkatan_id) == $angkatan->id ? 'selected' : '' }}>
                            {{ $angkatan->nama_angkatan }}
                        </option>
                    @endforeach
                </select>
                @error('angkatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kematian</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal', $kematian->tanggal->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah (ekor)</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                    name="jumlah" value="{{ old('jumlah', $kematian->jumlah) }}" required>
                @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="penyebab" class="form-label">Penyebab Kematian</label>
                <input type="text" class="form-control @error('penyebab') is-invalid @enderror" id="penyebab"
                    name="penyebab" value="{{ old('penyebab', $kematian->penyebab) }}" required>
                @error('penyebab')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="usia" class="form-label">Usia (hari)</label>
                <input type="number" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia"
                    value="{{ old('usia', $kematian->usia) }}" required>
                @error('usia')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    name="keterangan" value="{{ old('keterangan', $kematian->keterangan) }}" required>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('kematian.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
