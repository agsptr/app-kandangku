@extends('layouts.app')

@section('title', 'Data Angkatan Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Angkatan Bebek</h1>

        <div class="mb-3">
            <a href="{{ route('angkatan.create') }}" class="btn btn-primary">Tambah Data Angkatan</a>
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
                        <th>Nama Angkatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Usia Bebek Panen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($angkatans as $angkatan)
                        <tr>
                            <td>{{ $angkatan->nama_angkatan }}</td>
                            <td>{{ $angkatan->tanggal_mulai->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{!! $angkatan->tanggal_selesai_formatted !!}</td>
                            <td>{{ $angkatan->usia_panen ? $angkatan->usia_panen . ' hari' : '-' }}</td>
                            <td>
                                {{-- <a href="{{ route('angkatan.show', $angkatan) }}" class="btn btn-sm btn-info">Detail</a> --}}
                                <a href="{{ route('angkatan.detail-report', $angkatan) }}"
                                    class="btn btn-sm btn-primary">Laporan Detail</a>
                                <a href="{{ route('angkatan.edit', $angkatan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('angkatan.destroy', $angkatan) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data angkatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $angkatans->links() }}
        </div>
    </div>
@endsection
