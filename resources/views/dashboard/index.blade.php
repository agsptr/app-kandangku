@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Dashboard Peternakan Bebek</h1>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-regular fa-bookmark me-2"></i>Total Populasi Bebek</h5>
                        <p class="card-text display-4">{{ $totalBebek }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-regular fa-face-sad-cry me-2"></i>Tingkat Kematian Bebek</h5>
                        <p class="card-text display-4">{{ number_format($tingkatKematian, 2) }}%</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-regular fa-chart-bar me-2"></i>Total Pakan Dihabiskan</h5>
                        <p class="card-text display-4">{{ $stokPakan }} kg</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Pertumbuhan Populasi Bebek</h5>
                        <canvas id="grafikPertumbuhanBebek"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Kematian Bebek Per Angkatan</h5>
                        <canvas id="grafikTrendKematian"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Konsumsi Pakan Per Angkatan</h5>
                        <canvas id="grafikKonsumsiPakanPerAngkatan"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const grafikPertumbuhanBebek = new Chart(document.getElementById('grafikPertumbuhanBebek'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($pertumbuhanBebek->pluck('nama_angkatan')) !!},
                datasets: [{
                    label: 'Jumlah Bebek per Angkatan',
                    data: {!! json_encode($pertumbuhanBebek->pluck('jumlah_bebek')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Angkatan'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Bebek (ekor)'
                        },
                        ticks: {
                            stepSize: 10,
                            precision: 0
                        }
                    }
                }
            }
        });

        const grafikKonsumsiPakanPerAngkatan = new Chart(document.getElementById('grafikKonsumsiPakanPerAngkatan'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($konsumsiPakanPerAngkatan->pluck('nama_angkatan')) !!},
                datasets: [{
                    label: 'Total Konsumsi Pakan (kg)',
                    data: {!! json_encode($konsumsiPakanPerAngkatan->pluck('total_konsumsi')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Konsumsi (kg)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Angkatan'
                        }
                    }
                }
            }
        });

        const grafikTrendKematian = new Chart(document.getElementById('grafikTrendKematian'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($trendKematian->pluck('nama_angkatan')) !!},
                datasets: [{
                    label: 'Total Kematian Bebek (ekor)',
                    data: {!! json_encode($trendKematian->pluck('total_kematian')) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Kematian (ekor)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Angkatan'
                        }
                    }
                },
                ticks: {
                    stepSize: 5,
                    precision: 0
                }
            }
        });
    </script>
@endsection
