<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="purple2">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets') }}/img/logo_payakumbuh.png" alt="navbar brand" class="navbar-brand me-2"
                    height="40">
                <h1 class="fw-bold text-white mb-0">SIPAR</h1>
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Dashboard Menu -->
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Arsip Dokumen Menu -->
                <li class="nav-item {{ Request::is('back/arsip_dokumen*') ? 'active' : '' }}">
                    <a href="{{ route('back.arsip_dokumen.index') }}">
                        <i class="fas fa-folder-open"></i>
                        <p>Arsip Dokumen</p>
                    </a>
                </li>


                <!-- Jenis Dokumen Menu -->
                <li class="nav-item {{ Request::is('back/jenis_dokumen*') ? 'active' : '' }}">
                    <a href="{{ route('back.jenis_dokumen.index') }}">
                        <i class="fas fa-file"></i>
                        <p>Jenis Dokumen</p>
                    </a>
                </li>


                <!-- Laporan Menu -->
                <li class="nav-item {{ Request::is('back/laporan*') ? 'active' : '' }}">
                    <a href="{{ route('back.laporan.index') }}">
                        <i class="fas fa-chart-line"></i>
                        <p>Laporan</p>
                    </a>
                </li>

                <!-- Profil Instansi Menu -->
                <li class="nav-item {{ Request::is('back/instansi*') ? 'active' : '' }}">
                    <a href="{{ route('back.instansi.index') }}">
                        <i class="fas fa-building"></i>
                        <p>Profil Instansi</p>
                    </a>
                </li>

                <!-- Profil User Menu -->
                <li class="nav-item {{ Request::is('back/profil_user*') ? 'active' : '' }}">
                    <a href="{{ route('back.profil_user.index') }}">
                        <i class="fas fa-users-cog"></i>
                        <p>Profil Saya</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
