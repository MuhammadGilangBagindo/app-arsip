@extends('layouts.apps')

@section('title', 'Profil Saya')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Profil Saya</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <!-- Foto Profil -->
                            <div class="avatar avatar-xxl">
                                <img src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="Profile Picture"
                                    class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Role:</strong>
                                @foreach (Auth::user()->getRoleNames() as $role)
                                    {{ $role }}
                                @endforeach
                            </p>


                            <!-- Tombol Edit Profil -->
                            <a href="{{ route('back.profil_user.edit') }}" class="btn btn-secondary">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
