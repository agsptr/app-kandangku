@extends('layouts.app')

@section('title', 'Data Pakan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pakan</h1>

        <div class="mb-3">
            <a href="{{ route('pakan.create') }}" class="btn btn-primary">Tambah Data Pakan</a>
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
                        <th>Jenis Pakan</th>
                        <th>Jumlah (kg)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pakans as $pakan)
                        <tr>
                            <td>{{ $pakan->angkatan->nama_angkatan }}</td>
                            <td>{{ $pakan->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $pakan->jenis_pakan }}</td>
                            <td>{{ $pakan->jumlah }} kg</td>
                            <td>
                                <a href="{{ route('pakan.show', $pakan) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('pakan.edit', $pakan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pakan.destroy', $pakan) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data pakan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $pakans->links() }}
        </div>
    </div>
@endsection
