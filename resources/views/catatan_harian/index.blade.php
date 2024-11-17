@extends('layouts.app')

@section('title', 'Daftar Catatan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Catatan</h1>

        <div class="mb-3">
            <a href="{{ route('catatan_harian.create') }}" class="btn btn-primary">Tambah Catatan</a>
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
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Kondisi Bebek</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($catatanHarians as $catatan)
                        <tr>
                            <td>{{ $catatan->angkatan->nama_angkatan }}</td>
                            <td>{{ $catatan->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $catatan->kegiatan }}</td>
                            <td>{{ $catatan->kondisi_bebek }}</td>
                            <td>
                                <a href="{{ route('catatan_harian.show', $catatan) }}"
                                    class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('catatan_harian.edit', $catatan) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('catatan_harian.destroy', $catatan) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada catatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $catatanHarians->links() }}
        </div>
    </div>
@endsection
