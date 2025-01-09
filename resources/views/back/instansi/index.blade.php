@extends('layouts.apps')

@section('title', 'Profil Instansi')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Profil Instansi</h3>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Profil Instansi -->
                <div class="row">
                    <!-- Logo Instansi -->
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('assets') }}/img/logo_payakumbuh.png" alt="Logo Instansi" class="img-fluid"
                            width="200">
                    </div>

                    <!-- Informasi Profil -->
                    <div class="col-md-8">
                        <h5>Nama Instansi</h5>
                        <p>Dinas Kependudukan dan Pencatatan Sipil Kota Payakumbuh</p>

                        <h5>Alamat</h5>
                        <p>Jalan Jambu, Kelurahan Kotokociak Kubu Tapakrajo, Kecamatan Payakumbuh Utara, Kota Payakumbuh,
                            Sumatera Barat</p>

                        <h5>Visi</h5>
                        <p>Mewujudkan Pelayanan Prima Melalui Penyelenggaraan Administrasi Kependudukan yang Tertib,
                            Berkualitas, dan Inovatif.</p>
                    </div>
                </div>

                <!-- Deskripsi Lainnya -->
                <div class="mt-4">
                    <h5>Misi</h5>
                    <p>Mewujudkan Pengelolaan Administrasi Kependudukan yang Akurat, Tertib, dan Aman.</p>
                    <ul>
                        <li>Memberikan pelayanan prima dalam bidang pendaftaran penduduk dan pencatatan sipil.</li>
                        <li>Mengembangkan dan mengoptimalkan Sistem Informasi Administrasi Kependudukan menuju kecepatan
                            pelayanan informasi data kependudukan yang akurat.</li>
                        <li>Merumuskan kebijakan kependudukan</li>
                        <li>Menyusun perencanaan kependudukan sebagai dasar perencanaan dan perumusan pembangunan daerah
                            yang berorientasi pada peningkatan kesejahteraan penduduk melalui peningkatan kesadaran
                            masyarakat akan pentingnya administrasi kependudukan</li>
                    </ul>
                    <h5>Sejarah Instansi</h5>
                    <p>Dinas Kependudukan dan Pencatatan Sipil Kota Payakumbuh adalah Organisasi Perangkat Daerah (OPD) yang
                        dibentuk berdasarkan Peraturan Daerah (Kota Payakumbuh Nomor 17 Tahun 2016 Tentang Pembentukan dan
                        Susunan Perangkat Daerah.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
