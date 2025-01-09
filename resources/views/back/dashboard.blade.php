@extends('layouts.apps')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Selamat Datang {{ Auth::user()->name }} di Sistem Informasi Pengelolaan Arsip
                        Digital Dinas Kependudukan dan Pencatatan Sipil Kota Payakumbuh</h4>
                </div>
                <div class="card-body">
                    <p>Sistem Informasi Pengelolaan Arsip Digital adalah Aplikasi berbasis web yang digunakan untuk
                        mengelola penyimpanan arsip dokumen administrasi kependudukan dalam bentuk dokumen elektronik.
                        Aplikasi arsip memberikan efisiensi dan keamanan penyimpanan arsip, serta mempermudah dalam
                        mencari
                        informasi arsip.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-folder-open"></i> <!-- Ikon untuk jumlah arsip -->
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Arsip</p>
                                <h4 class="card-title">{{ number_format($jumlahArsip) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-file"></i> <!-- Ikon untuk jenis dokumen -->
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jenis Dokumen</p>
                                <h4 class="card-title">{{ number_format($jumlahJenisDokumen) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-users"></i> <!-- Ikon untuk jumlah user -->
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah User</p>
                                <h4 class="card-title">{{ number_format($jumlahUser) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
