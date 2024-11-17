<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Peternakan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .belum-diangkat {
            background-color: red;
            color: white;
            padding: 2px 5px;
            border-radius: 25px;
            font-size: 14px;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #ffffff;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, .1);
        }

        main {
            padding-top: 48px;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation -->
            <nav class="navbar navbar-dark bg-dark col-md-2 d-none d-md-block sidebar vh-100">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <!-- Active link uses aria-current for better accessibility -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="{{ route('angkatan.index') }}"
                                aria-current="page">
                                <i class="bi bi-mortarboard-fill me-2"></i> Data Angkatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('bebek.index') }}">
                                <i class="bi bi-egg-fried me-2"></i> Data Bebek
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pakan.index') }}">
                                <i class="bi bi-basket2-fill me-2"></i> Data Pakan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('obat.index') }}">
                                <i class="bi bi-bag-plus-fill me-2"></i> Data Obat/Vitamin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('kematian.index') }}">
                                <i class="bi bi-emoji-dizzy me-2"></i> Data Kematian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pendapatan.index') }}">
                                <i class="bi bi-cash-coin me-2"></i> Data Pendapatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pengeluaran.index') }}">
                                <i class="bi bi-cart-fill me-2"></i> Data Pengeluaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('panen.index') }}">
                                <i class="bi bi-flower1 me-2"></i> Data Panen
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('catatan_harian.index') }}">
                                <i class="bi bi-journal-text me-2"></i> Data Catatan Harian
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
