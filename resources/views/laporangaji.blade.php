<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PT Baroqah</title>
    <style>
        /* Tambahkan CSS khusus untuk PDF */
        table {
            width: 75%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>



    <h1 class="text-center" mb-4>Laporan Gaji Pegawai PT Baroqah</h1>
    @if(!empty($date1) && !empty($date2))
        <p class="text-center">Periode: {{ \Carbon\Carbon::parse($date1)->format('F Y') }} -
            {{ \Carbon\Carbon::parse($date2)->format('F Y') }}</p>
    @endif
    <form>

    </form>
    <!--Ini buat tampilan table -->
    <div class="container">
        <!--<form action="/search" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Cari nama / bulan tahun / tahun">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>-->

        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gaji Pokok</th>
                        <th scope="col">Bonus</th>
                        <th scope="col">Gaji Kotor</th>
                        <th scope="col">Potongan PPH</th>
                        <th scope="col">Gaji Total</th>
                        <th scope="col">Tanggal Gajian</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($gaji as $row)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$row->name}}</td>
                            <td>{{number_format($row->gaji_pokok, 0, ',', '.')}}</td>
                            <td>{{number_format($row->bonus, 0, ',', '.')}}</td>
                            <td>{{number_format($row->gaji_kotor, 0, ',', '.')}}</td>
                            <td>{{number_format($row->potongan, 0, ',', '.')}}</td>
                            <td>{{number_format($row->gaji_total, 0, ',', '.')}}</td>
                            <td>{{$row->tgl_gajian->format('j F Y')}}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>