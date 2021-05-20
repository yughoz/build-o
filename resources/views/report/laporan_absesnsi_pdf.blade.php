<html>

<head>
    <title>Laporan Kehadiran Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 5pt;
        }

    </style>
    <center>
        <h5>Laporan Kehadiran Pegawai</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Waktu Mulai Kerja</th>
                <th>Waktu Akhir Kerja</th>
                <th>Status Masuk</th>
                <th>Rencana Aktifitas Kerja</th>
                <th>Laporan Kegiatan</th>
                <th>Alasan Tidak Masuk</th>
                <th>Koordinator NIP</th>
                <th>Koordinator Nama</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->pegawai->nip }}</td>
                    <td>{{ $data->pegawai->nama }}</td>
                    <td>{{ $data->waktu_mulai_kerja ?? "-" }}</td>
                    <td>{{ $data->waktu_akhir_kerja ?? "-" }}</td>
                    <td>{{ $data->masuk == 1 ? "Masuk" : "Tidak Masuk" }}</td>
                    <td>{{ trim($data->aktifitas) }}</td>
                    <td>{{ trim($data->kegiatan) }}</td>
                    <td>{{ $data->alasan_tidak_masuk }}</td>
                    <td>{{ $data->koordinator->pegawai->nip ?? "-" }}</td>
                    <td>{{ $data->koordinator->pegawai->nama ?? "-" }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
