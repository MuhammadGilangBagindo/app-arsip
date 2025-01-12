<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIPAR</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets') }}/img/logo_payakumbuh.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets') }}/js/plugin/webfont/webfont.min.js"></script>
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

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">

                        <a href="index.html" class="logo">
                            <img src="{{ asset('assets') }}/img/kaiadmin/logo_light.svg" alt="navbar brand"
                                class="navbar-brand" height="20">
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>

                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                @include('layouts.navbar')
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ms-auto">
                        © 2024 SIPAR. Made by 21343030 | <a href="https://www.instagram.com/langgindo/">Muhammad Gilang
                            Bagindo</a>. All rights reserved.
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets') }}/js/core/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets') }}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets') }}/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets') }}/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets') }}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets') }}/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets') }}/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets') }}/js/kaiadmin.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#arsip-dokumen').DataTable({
                "paging": true, // Mengaktifkan paging
                "searching": true, // Mengaktifkan fitur pencarian
                "ordering": true, // Mengaktifkan pengurutan
                "info": true, // Menampilkan informasi jumlah data
                "columnDefs": [{
                        "targets": [0, 1, 2,
                            3, 4
                        ], // Kolom yang bisa diurutkan: Nomor, Nama Dokumen, Nomor Dokumen, Tanggal Pembuatan, Jenis Dokumen
                        "orderable": true // Mengaktifkan pengurutan pada kolom ini
                    },
                    {
                        "targets": "_all", // Kolom lainnya tidak bisa diurutkan
                        "orderable": false
                    }
                ]
            });
        });
    </script>

    <script>
        var ctx = document.getElementById('dokumenChart').getContext('2d');
        var dataValues = @json($data); // Data untuk jumlah dokumen per jenis
        var maxValue = Math.max(...dataValues); // Menentukan nilai maksimum dari data untuk sumbu Y

        var dokumenChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels), // Data untuk label jenis dokumen
                datasets: [{
                    label: 'Jumlah Dokumen',
                    data: dataValues, // Data untuk jumlah dokumen per jenis
                    backgroundColor: generateRandomColors(dataValues.length), // Memberikan warna acak
                    borderColor: '#177dff', // Warna border bar
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true, // Memastikan sumbu X mulai dari 0
                    },
                    y: {
                        beginAtZero: true, // Memastikan sumbu Y mulai dari 0
                        ticks: {
                            stepSize: Math.ceil(maxValue / 5), // Menentukan step size
                            callback: function(value) {
                                return value % 1 === 0 ? value : Math.floor(value); // Mengubah angka ke bulat
                            }
                        }
                    }
                }
            }
        });

        // Fungsi untuk menghasilkan warna acak
        function generateRandomColors(count) {
            var colors = [];
            for (var i = 0; i < count; i++) {
                var randomColor = 'rgb(' + Math.floor(Math.random() * 256) + ',' +
                    Math.floor(Math.random() * 256) + ',' +
                    Math.floor(Math.random() * 256) + ')';
                colors.push(randomColor);
            }
            return colors;
        }
    </script>

</body>

</html>
