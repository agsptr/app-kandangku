@extends('layouts.app')

@section('title', 'Edit Data Pendapatan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Data Pendapatan</h1>

        <form action="{{ route('pendapatan.update', $pendapatan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="angkatan_id" class="form-label">Angkatan</label>
                <select class="form-select @error('angkatan_id') is-invalid @enderror" id="angkatan_id" name="angkatan_id"
                    required>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{ $angkatan->id }}"
                            {{ old('angkatan_id', $pendapatan->angkatan_id) == $angkatan->id ? 'selected' : '' }}>
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
                    name="tanggal" value="{{ old('tanggal', $pendapatan->tanggal->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label>
                <input type="number" class="form-control @error('jumlah_terjual') is-invalid @enderror" id="jumlah_terjual"
                    name="jumlah_terjual" value="{{ old('jumlah_terjual', $pendapatan->jumlah_terjual) }}" required>
                @error('jumlah_terjual')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="berat_total" class="form-label">Berat Total (kg)</label>
                <input type="number" step="0.01" class="form-control @error('berat_total') is-invalid @enderror"
                    id="berat_total" name="berat_total" value="{{ old('berat_total', $pendapatan->berat_total) }}" required>
                @error('berat_total')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga_per_kg" class="form-label">Harga per Kg</label>
                <input type="number" step="0.01" class="form-control @error('harga_per_kg') is-invalid @enderror"
                    id="harga_per_kg" name="harga_per_kg" value="{{ old('harga_per_kg', $pendapatan->harga_per_kg) }}"
                    required>
                @error('harga_per_kg')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="total_pendapatan" class="form-label">Total Pendapatan</label>
                <input type="number" step="0.01" class="form-control @error('total_pendapatan') is-invalid @enderror"
                    id="total_pendapatan" name="total_pendapatan"
                    value="{{ old('total_pendapatan', $pendapatan->total_pendapatan) }}" required>
                @error('total_pendapatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pembeli" class="form-label">pembeli</label>
                <input type="text" step="0.01" class="form-control @error('pembeli') is-invalid @enderror"
                    id="pembeli" name="pembeli" value="{{ old('pembeli', $pendapatan->pembeli) }}" required>
                @error('pembeli')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" step="0.01" class="form-control @error('keterangan') is-invalid @enderror"
                    id="keterangan" name="keterangan" value="{{ old('keterangan', $pendapatan->keterangan) }}" required>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('pendapatan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
