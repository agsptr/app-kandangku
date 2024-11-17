@extends('layouts.app')

@section('title', 'Edit Data Obat')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Data Obat</h1>

        <form action="{{ route('obat.update', $obat) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="angkatan_id" class="form-label">Angkatan</label>
                <select class="form-select @error('angkatan_id') is-invalid @enderror" id="angkatan_id" name="angkatan_id"
                    required>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{ $angkatan->id }}"
                            {{ old('angkatan_id', $obat->angkatan_id) == $angkatan->id ? 'selected' : '' }}>
                            {{ $angkatan->nama_angkatan }}
                        </option>
                    @endforeach
                </select>
                @error('angkatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal', $obat->tanggal->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_obat_vitamin" class="form-label">Nama Obat/Vit</label>
                <input type="text" class="form-control @error('nama_obat_vitamin') is-invalid @enderror"
                    id="nama_obat_vitamin" name="nama_obat_vitamin"
                    value="{{ old('nama_obat_vitamin', $obat->nama_obat_vitamin) }}" required>
                @error('nama_obat_vitamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" class="form-control @error('dosis') is-invalid @enderror" id="dosis"
                    name="dosis" value="{{ old('dosis', $obat->dosis) }}" required>
                @error('dosis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tujuan" class="form-label">tujuan</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan"
                    name="tujuan" value="{{ old('tujuan', $obat->tujuan) }}" required>
                @error('tujuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    name="keterangan" value="{{ old('keterangan', $obat->keterangan) }}" required>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
