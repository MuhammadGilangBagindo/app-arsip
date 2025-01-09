@extends('layouts.apps')

@section('title', 'Laporan Arsip Dokumen')

@section('content')
    <div class="row">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Laporan Arsip Dokumen</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Form Filter -->
                <form action="{{ route('back.laporan.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="jenis_dokumen">Jenis Dokumen</label>
                            <select class="form-select" id="jenis_dokumen" name="jenis_dokumen">
                                <option value="semua">Semua</option>
                                @foreach ($jenisDokumen as $jenis)
                                    <option value="{{ $jenis->jenis_dokumen }}"
                                        {{ request('jenis_dokumen') == $jenis->jenis_dokumen ? 'selected' : '' }}>
                                        {{ $jenis->jenis_dokumen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                                value="{{ request('tanggal_awal') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                                value="{{ request('tanggal_akhir') }}" required>
                        </div>
                        <div class="col-md-3 mt-4">
                            <button type="submit" class="btn btn-secondary">Tampilkan</button>
                        </div>
                    </div>
                </form>

                <!-- Tabel Laporan -->
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Dokumen</th>
                                <th>Nomor Dokumen</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Jenis Dokumen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($arsipDokumen as $arsip)
                                <tr>
                                    <td>{{ $arsip->nama_dokumen }}</td>
                                    <td>{{ $arsip->nomor_dokumen }}</td>
                                    <td>{{ $arsip->tanggal_pembuatan }}</td>
                                    <td>{{ $arsip->jenisDokumen->jenis_dokumen ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Print yang mengarah ke view cetak -->
                @if (count($arsipDokumen) > 0)
                    <a href="{{ route('back.laporan.cetak', [
                        'jenis_dokumen' => request('jenis_dokumen'),
                        'tanggal_awal' => request('tanggal_awal'),
                        'tanggal_akhir' => request('tanggal_akhir'),
                    ]) }}"
                        class="btn btn-success mt-3" target="_blank">Print Laporan</a>
                @endif


            </div>
        </div>
    </div>
@endsection
