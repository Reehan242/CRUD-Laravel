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
                    <a href="/pegawai" class="nav-link active">Home</a>
                    <a href="/datagaji" class="nav-link" >Laporan Gaji</a>
                    <form class="d-flex">
                        <a href="/logout" class="btn btn-outline-danger fs-6">Logout</a>
                    </form>
                </div>
            </div>

        </div>
    </nav>
    <h1 class="text-center" mb-4>Ubah Data Pegawai</h1>

    <!--Ini buat tampilan table -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/ubahdata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    aria-describedby="emailHelp" value="{{$data->nama}}">

                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    aria-describedby="emailHelp" value="{{$data->alamat}}">

                            </div>

                            <div class="mb-3">
                                <label for="golongan" class="form-label">Golongan</label>
                                <select class="form-select" name="golongan" id="golonganSelect"
                                    aria-label="Default select example" onchange="updateGaji()">
                                    <option selected>{{$data->golongan}}</option>
                                    <option value="1">satu</option>
                                    <option value="2">dua</option>
                                    <option value="3">tiga</option>
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"
                                    aria-describedby="emailHelp" value="{{$data->tgl_lahir}}">

                            </div>
                            <div class="mb-3">
                                <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk"
                                    aria-describedby="emailHelp" value="{{$data->tgl_masuk}}">

                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gaji Pokok</label>
                                <input type="text" name="gaji_pokok" class="form-control" id="gaji_pokok" readonly
                                    value="{{$data->gaji_pokok}}">

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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

<script>
    function updateGaji() {
        const golonganSelect = document.getElementById('golonganSelect');
        const gajiPokokInput = document.getElementById('gaji_pokok');
        const selectedGolongan = golonganSelect.value;
        let gaji;

        switch (selectedGolongan) {
            case '1':
                gaji = 15000000;
                break;
            case '2':
                gaji = 1000000;
                break;
            case '3':
                gaji = 500000;
                break;
            default:
                gaji = '';
                break;
        }

        gajiPokokInput.value = gaji;
    }
</script>

</html>