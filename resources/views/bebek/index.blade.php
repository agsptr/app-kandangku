@extends('layouts.app')

@section('title', 'Data Bebek')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Bebek</h1>

        <div class="mb-3">
            <a href="{{ route('bebek.create') }}" class="btn btn-primary">Tambah Data Bebek</a>
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
                        <th>Tanggal Masuk</th>
                        <th>Jumlah Awal</th>
                        {{-- <th>Asal Bibit</th> --}}
                        <th>Jenis Bebek</th>
                        {{-- <th>Usia Masuk</th> --}}
                        <th>Usia Saat Ini</th>
                        {{-- <th>Kandang</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bebeks as $bebek)
                        <tr>
                            <td>{{ $bebek->angkatan->nama_angkatan }}</td>
                            <td>{{ $bebek->tanggal_masuk->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $bebek->jumlah_awal }} ekor</td>
                            {{-- <td>{{ $bebek->asal_bibit }}</td> --}}
                            <td>{{ $bebek->jenis_bebek }}</td>
                            {{-- <td>{{ $bebek->usia_masuk }} hari</td> --}}
                            <td>{{ $bebek->tanggal_masuk->diffInDays(now()) + $bebek->usia_masuk }} hari</td>
                            {{-- <td>{{ $bebek->kandang }}</td> --}}
                            <td>
                                <a href="{{ route('bebek.show', $bebek) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('bebek.edit', $bebek) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('bebek.destroy', $bebek) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data bebek.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $bebeks->links() }}
        </div>
    </div>
@endsection
