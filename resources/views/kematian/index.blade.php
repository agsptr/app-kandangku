@extends('layouts.app')

@section('title', 'Data Kematian Kematian')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Kematian Bebek</h1>

        <div class="mb-3">
            <a href="{{ route('kematian.create') }}" class="btn btn-primary">Tambah Data Kematian</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Angkatan</th>
                        <th>Tanggal Kematian</th>
                        <th>Jumlah (ekor)</th>
                        <th>Usia (hari)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kematians as $kematian)
                        <tr>
                            <td>{{ $kematian->angkatan->nama_angkatan }}</td>
                            <td>{{ $kematian->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $kematian->jumlah }} ekor</td>
                            <td>{{ $kematian->usia }} hari</td>
                            <td>
                                <a href="{{ route('kematian.show', $kematian) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('kematian.edit', $kematian) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('kematian.destroy', $kematian) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data kematian.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $kematians->links() }}
        </div>
    </div>
@endsection
