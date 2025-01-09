<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
    data-background-color="purple2">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <!-- User Profile Dropdown -->
            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <!-- Tampilkan foto profil dari user yang sedang login -->
                        <img src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                    <span class="profile-username">
                        <span class="op-7">Hi,</span> <span class="fw-bold">{{ Auth::user()->name }}</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <!-- Tampilkan foto profil dari user yang sedang login -->
                                    <img src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="image profile"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('back.profil_user.index') }}">Profil Saya</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('back.profil_user.edit') }}">Edit Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/') }}">Kembali ke Landing Page</a>
                            <div class="dropdown-divider"></div>
                            <!-- Logout -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
