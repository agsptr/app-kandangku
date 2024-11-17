@extends('layouts.app')

@section('title', 'Data Panen')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Panen</h1>

        <div class="mb-3">
            <a href="{{ route('panen.create') }}" class="btn btn-primary">Tambah Data Panen</a>
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
                        <th>Tanggal Panen</th>
                        <th>Jumlah Panen</th>
                        <th>Berat Panen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($panens as $panen)
                        <tr>
                            <td>{{ $panen->angkatan->nama_angkatan }}</td>
                            <td>{{ $panen->tanggal_panen->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $panen->jumlah_panen }} ekor</td>
                            <td>{{ $panen->berat_panen }} kg</td>
                            <td>
                                <a href="{{ route('panen.show', $panen) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('panen.edit', $panen) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('panen.destroy', $panen) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data panen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $panens->links() }}
        </div>
    </div>
@endsection
