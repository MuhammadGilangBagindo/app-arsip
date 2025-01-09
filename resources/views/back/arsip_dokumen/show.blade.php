@extends('layouts.apps')

@section('title', 'Detail Arsip Dokumen')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <h4 class="card-title">Detail Arsip Dokumen</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Dokumen</th>
                            <td>{{ $arsipDokumen->nama_dokumen }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Dokumen</th>
                            <td>{{ $arsipDokumen->nomor_dokumen }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pembuatan</th>
                            <td>{{ $arsipDokumen->tanggal_pembuatan }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Dokumen</th>
                            <td>{{ $arsipDokumen->jenisDokumen->jenis_dokumen ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>File</th>
                            <td>
                                @if ($arsipDokumen->file)
                                    <div class="file-preview">
                                        @if (pathinfo($arsipDokumen->file, PATHINFO_EXTENSION) === 'pdf')
                                            <!-- Embed PDF for preview -->
                                            <embed src="{{ asset('storage/' . $arsipDokumen->file) }}" type="application/pdf"
                                                width="100%" height="600px">
                                        @else
                                            <!-- For non-PDF files, show download link -->
                                            <p>File tidak dapat ditampilkan sebagai pratinjau. Klik tautan di bawah untuk
                                                mengunduh:</p>
                                            <a href="{{ asset('storage/' . $arsipDokumen->file) }}" target="_blank"
                                                class="btn btn-primary">Unduh File</a>
                                        @endif
                                    </div>
                                @else
                                    <p>Tidak ada file yang diunggah.</p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="ms-md-auto py-2 py-md-0">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali Ke Halaman Arsip
                        Dokumen</button>
                </div>
            </div>
        </div>
    </div>
@endsection
