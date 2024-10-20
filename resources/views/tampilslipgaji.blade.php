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
                    <a href="/pegawai" class="nav-link">Home</a>
                    <a href="/datagaji" class="nav-link active">Laporan Gaji</a>
                    <form class="d-flex">
                        <a href="/logout" class="btn btn-outline-danger fs-6">Logout</a>
                    </form>
                </div>
            </div>

        </div>
    </nav>
    <h1 class="text-center" mb-4>Slip Gaji Pegawai</h1>

    <!--Ini buat tampilan table -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data">
                            @csrf
                            <table class="table table-success table-striped">
                                <tr>
                                    <th><label for="nama" class="form-label">Nama Pegawai</label></th>
                                    <td><input type="text" name="name" class="form-control" id="nama" readonly
                                            value="{{ $gaji->name }}"></td>
                                </tr>

                                <tr>
                                    <th><label for="gaji_pokok" class="form-label">Gaji Pokok</label></th>
                                    <td>Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.')}}</td>
                                </tr>

                                <tr>
                                    <th><label for="bonus" class="form-label">Bonus</label></th>
                                    <td>Rp {{ number_format($gaji->bonus, 0, ',', '.')}}</td>
                                </tr>

                                <tr>
                                    <th><label for="gaji_kotor" class="form-label">Gaji Kotor</label></th>
                                    <td>Rp {{ number_format($gaji->gaji_kotor, 0, ',', '.')}}</td>
                                </tr>

                                <tr>
                                    <th><label for="potongan" class="form-label">Potongan (5%)</label></th>
                                    <td>Rp {{ number_format($gaji->potongan, 0, ',', '.')}}</td>
                                </tr>

                                <tr>
                                    <th><label for="gaji_total" class="form-label">Gaji Total</label></th>
                                    <td>Rp {{ number_format($gaji->gaji_total, 0, ',', '.')}}</td>
                                </tr>

                                <tr>
                                    <th><label for="tgl_gajian" class="form-label">Tanggal Gajian</label></th>
                                    <td>{{$gaji->tgl_gajian->format('j F Y')}}</td>
                                </tr>
                            </table>
                            <a href="/cetakslipgaji/{{$gaji->id}}" type="button" class="btn btn-primary">Cetak Slip Gaji</a>
                        </form>
                    </div>
                </div>


            </div>

        </div>
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