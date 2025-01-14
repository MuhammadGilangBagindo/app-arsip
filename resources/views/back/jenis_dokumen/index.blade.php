@extends('layouts.app')

@section('title', 'Jenis Dokumen')

@section('content')

    <div class="row">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Jenis Dokumen</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('back.jenis_dokumen.create') }}" class="btn btn-secondary btn-round">Tambah Jenis
                    Dokumen</a>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    @if ($jenisDokumen->isEmpty())
                        <div class="text-center py-5">
                            <h4 class="text-muted">Belum ada jenis dokumen yang tersedia.</h4>
                            <p class="text-muted">Klik tombol <strong>Tambah Jenis Dokumen</strong> untuk menambahkan jenis
                                dokumen baru.</p>
                        </div>
                    @else
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenisDokumen as $jenis)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jenis->jenis_dokumen }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('back.jenis_dokumen.edit', $jenis->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('back.jenis_dokumen.destroy', $jenis->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
