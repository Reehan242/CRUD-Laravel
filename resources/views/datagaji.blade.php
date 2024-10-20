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
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fs-1">PT Baroqah tbk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="/pegawai" class="nav-link" >Home</a>
                    <a href="/datagaji" class="nav-link active" aria-current="page">Laporan Gaji</a>
                    <form class="d-flex">
                        <a href="/logout" class="btn btn-outline-danger fs-6">Logout</a>
                    </form>
                </div>
            </div>

        </div>
    </nav>


    <h1 class="text-center" mb-4>Laporan Penggajian Pegawai PT Baroqah</h1>
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
        <form action="/cetaklaporangaji" method="GET" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Masukkan Rentang tanggal</label>
                <input type="date" name="date1" id="date1" class="form-control" >
                <input type="date" name="date2" id="date2" class="form-control" >
                <div class="input-group-append">
                    <p></p>
                    <button class="btn btn-success" type="submit">Cetak Laporan</button>
                </div>
            </div>
        </form>
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
            @endif
            <table class="table table-dark table-striped">
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
                        <th scope="col">Aksi</th>
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
                            <td>
                                <a href="/hapusdatagaji/{{$row->id}}" type="button" class="btn btn-danger">Hapus</a>
                                <a href="/tampilslipgaji/{{$row->id}}" type="button" class="btn btn-success">Lihat Slip Gaji</a>
                                <a href="/cetakslipgaji/{{$row->id}}" type="button" class="btn btn-primary">Cetak Slip Gaji</a>


                            </td>
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
<script>
    const rentangTgl1 = document.getElementById('date1');
    const rentangTgl2 = document.getElementById('date2');

    
    rentangTgl1.addEventListener('change', function () {
        const tanggal = new Date(rentangTgl1.value);
        tanggal.setDate(1);
        rentangTgl1.value = tanggal.toISOString().substring(0, 10);
    });
    rentangTgl2.addEventListener('change', function () {
        const tanggal = new Date(rentangTgl2.value);
        tanggal.setDate(1);
        rentangTgl2.value = tanggal.toISOString().substring(0, 10);
    });
</script>
</html>

