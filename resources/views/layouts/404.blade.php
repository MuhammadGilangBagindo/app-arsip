@extends('layouts.apps')

@section('title', 'Akses Ditolak')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="fw-bold">Akses Ditolak</h3>
                </div>
                <div class="card-body text-center">
                    <p>Anda tidak memiliki hak akses untuk fitur ini.</p>
                    <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
