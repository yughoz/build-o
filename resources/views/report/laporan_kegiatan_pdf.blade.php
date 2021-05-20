<html>

<head>
    <title>Laporan Pegawai Yang Mengupload File</title>
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
        <h5>Laporan Pegawai Yang Mengupload File</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tanggal Pengumpulan File</th>
                <th>Jumlah Hari Pengumpulan File Selanjutnya</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->pegawai->nip }}</td>
                    <td>{{ $data->pegawai->nama }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->maximum_hari_pengumpulan ? $data->maximum_hari_pengumpulan . " Hari" : "-" }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
