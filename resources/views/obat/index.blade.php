@extends('layouts.app')

@section('title', 'Data Obat')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Obat</h1>

        <div class="mb-3">
            <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Data Obat</a>
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
                        <th>Nama Obat/Vit</th>
                        <th>Dosis</th>
                        <th>Tujuan</th>
                        {{-- <th>Keterangan</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($obats as $obat)
                        <tr>
                            <td>{{ $obat->angkatan->nama_angkatan }}</td>
                            <td>{{ $obat->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $obat->nama_obat_vitamin }}</td>
                            <td>{{ $obat->dosis }} </td>
                            <td>{{ $obat->tujuan }} </td>
                            {{-- <td>{{ $obat->keterangan }}</td> --}}
                            <td>
                                <a href="{{ route('obat.show', $obat) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('obat.edit', $obat) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('obat.destroy', $obat) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data obat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $obats->links() }}
        </div>
    </div>
@endsection
