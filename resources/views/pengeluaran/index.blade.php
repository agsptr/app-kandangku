@extends('layouts.app')

@section('title', 'Data Pengeluaran')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pengeluaran</h1>

        <div class="mb-3">
            <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary">Tambah Data Pengeluaran</a>
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
                        <th>Jenis Pengeluaran</th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengeluarans as $pengeluaran)
                        <tr>
                            <td>{{ $pengeluaran->angkatan->nama_angkatan }}</td>
                            <td>{{ $pengeluaran->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td>{{ $pengeluaran->jenis_pengeluaran }}</td>
                            <td>Rp {{ number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('pengeluaran.show', $pengeluaran) }}"
                                    class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('pengeluaran.edit', $pengeluaran) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pengeluaran.destroy', $pengeluaran) }}" method="POST"
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
                            <td colspan="5" class="text-center">Tidak ada data pengeluaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $pengeluarans->links() }}
        </div>
    </div>
@endsection
