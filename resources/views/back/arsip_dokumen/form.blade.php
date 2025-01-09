@extends('layouts.apps')

@section('title', 'Form Arsip Dokumen')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ isset($arsipDokumen) ? 'Edit' : 'Tambah' }} Arsip Dokumen</h4>
            </div>
            <div class="card-body">
                <form
                    action="{{ isset($arsipDokumen) ? route('back.arsip_dokumen.update', $arsipDokumen->id) : route('back.arsip_dokumen.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($arsipDokumen))
                        @method('PUT')
                    @endif

                    <!-- Nama Dokumen -->
                    <div class="form-group">
                        <label for="nama_dokumen">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen"
                            value="{{ isset($arsipDokumen) ? $arsipDokumen->nama_dokumen : old('nama_dokumen') }}"
                            placeholder="Masukkan Nama Dokumen" required />
                    </div>

                    <!-- Nomor Dokumen -->
                    <div class="form-group">
                        <label for="nomor_dokumen">Nomor Dokumen</label>
                        <input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen"
                            value="{{ isset($arsipDokumen) ? $arsipDokumen->nomor_dokumen : old('nomor_dokumen') }}"
                            placeholder="Masukkan Nomor Dokumen" required />
                    </div>

                    <!-- Tanggal Pembuatan -->
                    <div class="form-group">
                        <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
                        <input type="date" class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan"
                            value="{{ isset($arsipDokumen) ? $arsipDokumen->tanggal_pembuatan : old('tanggal_pembuatan') }}"
                            required />
                    </div>

                    <!-- Jenis Dokumen -->
                    <div class="form-group">
                        <label for="jenis_dokumen">Jenis Dokumen</label>
                        <select class="form-select" id="jenis_dokumen" name="jenis_dokumen" required>
                            @foreach ($jenisDokumen as $jenis)
                                <option value="{{ $jenis->jenis_dokumen }}"
                                    {{ isset($arsipDokumen) && $arsipDokumen->jenis_dokumen == $jenis->jenis_dokumen ? 'selected' : '' }}>
                                    {{ $jenis->jenis_dokumen }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- File -->
                    <div class="form-group">
                        <label for="file">File Dokumen (Maks. 1.5 MB)</label>
                        <input type="file" class="form-control-file" id="file" name="file" />
                        @if (isset($arsipDokumen) && $arsipDokumen->file)
                            <small class="form-text text-muted">File yang sudah diunggah: <a
                                    href="{{ asset('storage/' . $arsipDokumen->file) }}"
                                    target="_blank">Download</a></small>
                        @endif
                    </div>

                    <div class="card-action">
                        <button type="submit"
                            class="btn btn-success">{{ isset($arsipDokumen) ? 'Update' : 'Submit' }}</button>
                        <a href="{{ route('back.arsip_dokumen.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
