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
                    <a href="/pegawai" class="nav-link active" aria-current="page">Home</a>
                    <a href="/datagaji" class="nav-link">Laporan Gaji</a>
                    <p></p>
                    <form class="d-flex">
                        <a href="/logout" class="btn btn-outline-danger fs-6">Logout</a>
                    </form>
                </div>
            </div>

        </div>
    </nav>


    <h1 class="text-center" mb-4>Data Pegawai</h1>

    <!--Ini buat tampilan table -->
    <div class="container">
        <a href="/tambahpegawai" type="button" class="btn btn-success">Tambah Data</a>
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
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Gaji Pokok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{$index + $data->firstItem()}}</th>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->alamat}}</td>
                            <td>{{$row->tgl_lahir}}</td>
                            <td>{{$row->golongan}}</td>
                            <td>{{$row->tgl_masuk}}</td>
                            <td>{{number_format($row->gaji_pokok, 0, ',', '.')}}</td>
                            <td>
                                <a href="/tampilkandata/{{$row->id}}" class="btn btn-info">Ubah</a>
                                <a href="/hapusdata/{{$row->id}}" type="button" class="btn btn-danger">Hapus</a>
                                <a href="/slipgaji/{{$row->id}}" class="btn btn-warning">Gaji</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $data->links() }}
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