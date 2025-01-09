@extends('layouts.apps')

@section('title', 'Arsip Dokumen')

@section('content')
    <div class="row">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Arsip Dokumen</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('back.arsip_dokumen.create') }}" class="btn btn-secondary btn-round">Tambah Arsip
                    Dokumen</a>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    @if ($arsipDokumen->isEmpty())
                        <div class="text-center py-5">
                            <h4 class="text-muted">Belum ada arsip dokumen yang tersedia.</h4>
                            <p class="text-muted">Klik tombol <strong>Tambah Arsip Dokumen</strong> untuk menambahkan arsip
                                baru.</p>
                        </div>
                    @else
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokumen</th>
                                    <th>Nomor Dokumen</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Jenis Dokumen</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arsipDokumen as $arsip)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $arsip->nama_dokumen }}</td>
                                        <td>{{ $arsip->nomor_dokumen }}</td>
                                        <td>{{ $arsip->tanggal_pembuatan }}</td>
                                        <td>{{ $arsip->jenisDokumen->jenis_dokumen ?? 'N/A' }}</td>
                                        <td>
                                            @if ($arsip->file)
                                                <a href="{{ asset('storage/' . $arsip->file) }}" target="_blank"
                                                    class="btn btn-secondary btn-border">Download</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Show Button -->
                                            <a href="{{ route('back.arsip_dokumen.show', $arsip->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Show
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('back.arsip_dokumen.edit', $arsip->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('back.arsip_dokumen.destroy', $arsip->id) }}"
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
