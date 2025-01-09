<!-- Cetak laporan -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Arsip Dokumen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 class="text-center">Laporan Arsip Dokumen</h2>
    <h4>Jenis Dokumen: {{ $jenis_dokumen !== 'semua' ? $jenis_dokumen : 'Semua' }}</h4>
    <h4>Periode: {{ $tanggal_awal }} - {{ $tanggal_akhir }}</h4>

    <table>
        <thead>
            <tr>
                <th>Nama Dokumen</th>
                <th>Nomor Dokumen</th>
                <th>Tanggal Pembuatan</th>
                <th>Jenis Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arsipDokumen as $arsip)
                <tr>
                    <td>{{ $arsip->nama_dokumen }}</td>
                    <td>{{ $arsip->nomor_dokumen }}</td>
                    <td>{{ $arsip->tanggal_pembuatan }}</td>
                    <td>{{ $arsip->jenisDokumen->jenis_dokumen ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
