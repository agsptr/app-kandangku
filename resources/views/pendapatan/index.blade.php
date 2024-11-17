@extends('layouts.app')

@section('title', 'Data Pendapatan')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pendapatan</h1>

        <div class="mb-3">
            <a href="{{ route('pendapatan.create') }}" class="btn btn-primary">Tambah Data Pendapatan</a>
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
                        <th>Jumlah Terjual</th>
                        <th>Berat Total</th>
                        <th>Harga per Kg</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pendapatans as $pendapatan)
                        <tr>
                            <td>{{ $pendapatan->angkatan->nama_angkatan }}</td>
                            <td>{{ $pendapatan->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $pendapatan->jumlah_terjual }} ekor</td>
                            <td>{{ $pendapatan->berat_total }} kg</td>
                            <td>Rp {{ number_format($pendapatan->harga_per_kg, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('pendapatan.show', $pendapatan) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('pendapatan.edit', $pendapatan) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pendapatan.destroy', $pendapatan) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data pendapatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $pendapatans->links() }}
        </div>
    </div>
@endsection
