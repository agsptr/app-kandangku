@extends('layouts.app')

@section('title', 'Edit Catatan Harian')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Catatan Harian</h1>

        <form action="{{ route('catatan_harian.update', $catatanHarian) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="angkatan_id">Angkatan</label>
                <select class="form-control @error('angkatan_id') is-invalid @enderror" id="angkatan_id" name="angkatan_id"
                    required>
                    <option value="">Pilih Angkatan</option>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{ $angkatan->id }}"
                            {{ old('angkatan_id', $catatanHarian->angkatan_id) == $angkatan->id ? 'selected' : '' }}>
                            {{ $angkatan->nama_angkatan }}
                        </option>
                    @endforeach
                </select>
                @error('angkatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal', $catatanHarian->tanggal->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="kegiatan">Kegiatan</label>
                <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan"
                    name="kegiatan" value="{{ old('kegiatan', $catatanHarian->kegiatan) }}" required>
                @error('kegiatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="kondisi_bebek">Kondisi Bebek</label>
                <input type="text" class="form-control @error('kondisi_bebek') is-invalid @enderror" id="kondisi_bebek"
                    name="kondisi_bebek" value="{{ old('kondisi_bebek', $catatanHarian->kondisi_bebek) }}" required>
                @error('kondisi_bebek')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan', $catatanHarian->keterangan) }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('catatan_harian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
