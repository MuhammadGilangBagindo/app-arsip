<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIPAR</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets/img/logo_payakumbuh.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('assets') }}/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/plugins.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/kaiadmin.min.css">

    <style>
        @media print {

            /* Sembunyikan elemen yang tidak ingin dicetak */
            .no-print {
                display: none;
            }
        }
    </style>

    <!-- Optional: Custom styles for animations -->
    <style>
        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        <header class="w-100 shadow-sm bg-white sticky-top">
            <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
                <h1 class="fw-bold op-8">SIPAR</h1>
                <nav>
                    <ul class="nav">
                        @guest
                            <!-- Tombol Login dan Register untuk pengguna yang belum login -->
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="btn btn-secondary">Daftar</a>
                            </li>
                        @else
                            <!-- Tombol Member Area untuk pengguna yang sudah login -->
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Login sebagai
                                    {{ Auth::user()->name }}</a>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section
            class="d-flex align-items-center justify-content-center min-vh-100 bg-secondary text-white position-relative">
            <div class="container text-center">
                <h1 class="display-3 fw-bold">
                    Selamat Datang di <span class="text-light">SIPAR</span>
                </h1>
                <p class="lead mt-4">
                    Sistem Informasi Pengelolaan Arsip Digital Dinas Kependudukan dan Pencatatan Sipil Kota Payakumbuh
                    yang modern, aman, dan efisien.
                </p>
                <div class="mt-5">
                    <a href="{{ route('register') }}" class="btn btn-light me-3">Daftar Sekarang</a>
                    <a href="#features" class="btn btn-outline-light">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-5 bg-white">
            <div class="container text-center">
                <h2 class="display-4">Fitur Unggulan</h2>
                <p class="lead text-muted">
                    SIPAR dirancang untuk mempermudah pengelolaan arsip dengan teknologi modern.
                </p>
                <div class="row mt-5">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body bg-secondary">
                                <h5 class="card-title text-white">Pengarsipan Digital</h5>
                                <p class="card-text text-white">Simpan dan kelola arsip Anda secara digital dengan
                                    mudah.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body bg-secondary">
                                <h5 class="card-title text-white">Keamanan Data</h5>
                                <p class="card-text text-white">Data Anda dilindungi dengan teknologi enkripsi terkini.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body bg-secondary">
                                <h5 class="card-title text-white">Akses Cepat</h5>
                                <p class="card-text text-white">Temukan arsip Anda hanya dengan beberapa klik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-5 bg-light">
            <div class="container text-center">
                <h2 class="display-4">Tentang SIPAR</h2>
                <p class="lead text-muted">
                    SIPAR adalah Aplikasi berbasis web yang digunakan untuk
                    mengelola penyimpanan arsip dokumen administrasi kependudukan dalam bentuk dokumen elektronik.
                    Aplikasi arsip memberikan efisiensi dan keamanan penyimpanan arsip, serta mempermudah dalam
                    mencari
                    informasi arsip.
                </p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-4 bg-secondary text-white text-center">
            <div class="container">
                <h4 class="h5">SIPAR - Dinas Kependudukan dan Pencatatan Sipil Kota Payakumbuh</h4>
                <p class="mt-3 text-white">
                    © 2024 SIPAR. All rights reserved.
                </p>
            </div>
        </footer>
    </div>

    <!-- Tautkan Bootstrap JS jika Anda membutuhkan interaktivitas -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
