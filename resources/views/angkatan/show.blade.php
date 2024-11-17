@extends('layouts.app')

@section('title', 'Detail Data Angkatan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Data Angkatan</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $angkatan->nama_angkatan }}</strong></h5>
                <hr>
                <p class="card-text"><strong>Tanggal Mulai:</strong>
                    {{ $angkatan->tanggal_mulai->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}
                </p>
                <p class="card-text"><strong>Tanggal Selesai:</strong> {!! $angkatan->tanggal_selesai_formatted !!}</p>
                <p class="card-text"><strong>Usia Panen:</strong> {{ $angkatan->usia_panen }} Hari</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $angkatan->keterangan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('angkatan.detail-report', $angkatan) }}" class="btn btn btn-primary">Laporan Detail</a>
            <a href="{{ route('angkatan.edit', $angkatan) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('angkatan.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('angkatan.destroy', $angkatan) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
