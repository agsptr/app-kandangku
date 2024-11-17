@extends('layouts.app')

@section('title', 'Edit Data Pengeluaran')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Data Pengeluaran</h1>

        <form action="{{ route('pengeluaran.update', $pengeluaran) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="angkatan_id">Angkatan</label>
                <select class="form-control @error('angkatan_id') is-invalid @enderror" id="angkatan_id" name="angkatan_id"
                    required>
                    <option value="">Pilih Angkatan</option>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{ $angkatan->id }}"
                            {{ old('angkatan_id', $pengeluaran->angkatan_id) == $angkatan->id ? 'selected' : '' }}>
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
                    name="tanggal" value="{{ old('tanggal', $pengeluaran->tanggal->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jenis_pengeluaran">Jenis Pengeluaran</label>
                <input type="text" class="form-control @error('jenis_pengeluaran') is-invalid @enderror"
                    id="jenis_pengeluaran" name="jenis_pengeluaran"
                    value="{{ old('jenis_pengeluaran', $pengeluaran->jenis_pengeluaran) }}" required>
                @error('jenis_pengeluaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                <input type="number" step="0.01" class="form-control @error('jumlah_pengeluaran') is-invalid @enderror"
                    id="jumlah_pengeluaran" name="jumlah_pengeluaran"
                    value="{{ old('jumlah_pengeluaran', $pengeluaran->jumlah_pengeluaran) }}" required>
                @error('jumlah_pengeluaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan', $pengeluaran->keterangan) }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
