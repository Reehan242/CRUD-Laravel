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
                    <a href="/datagaji" class="nav-link active" aria-current="page">Laporan Gaji</a>
                    <form class="d-flex">
                        <a href="/logout" class="btn btn-outline-danger fs-6">Logout</a>
                    </form>
                </div>
            </div>

        </div>
    </nav>
    <h1 class="text-center" mb-4>Rincian Gaji</h1>

    <!--Ini buat tampilan table -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertgaji" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pegawai</label>
                                <input type="text" name="name" class="form-control" id="nama" readonly
                                    value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="golongan" class="form-label">Golongan</label>
                                <input type="text" class="form-control" id="golongan" readonly
                                    value="{{ $data->golongan }}">
                            </div>
                            <div class="mb-3">
                                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                <input type="text" name="gaji_pokok" class="form-control" id="gaji_pokok" readonly
                                    value="{{ $data->gaji_pokok}}">
                            </div>
                            <div class="mb-3">
                                <label for="bonus" class="form-label">Bonus (%)</label>
                                <input type="text" name="bonus" class="form-control" id="bonus" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="gaji_kotor" class="form-label">Gaji Kotor</label>
                                <input type="text" name="gaji_kotor" class="form-control" id="gaji_kotor" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="potongan" class="form-label">Potongan (5%)</label>
                                <input type="text" name="potongan" class="form-control" id="potongan" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="gaji_total" class="form-label">Gaji Total</label>
                                <input type="text" name="gaji_total" class="form-control" id="gaji_total" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_gajian" class="form-label">Tanggal Gajian</label>
                                <input type="date" name="tgl_gajian" class="form-control" id="tgl_gajian">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Data Penggajian</button>
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

<script>
    const tanggalInput = document.getElementById('tgl_gajian');


    // Fungsi untuk menghitung bonus berdasarkan golongan
    function calculateBonus(golongan, gajiPokok) {
        let bonusPercentage = 0;
        switch (golongan) {
            case '1':
                bonusPercentage = 0.5; // 50%
                break;
            case '2':
                bonusPercentage = 0.4; // 40%
                break;
            case '3':
                bonusPercentage = 0.3; // 30%
                break;
            default:
                bonusPercentage = 0;
                break;
        }
        return gajiPokok * bonusPercentage;
    }

    // Event listener saat halaman dimuat
    window.addEventListener('DOMContentLoaded', function () {
        let gajiPokok = parseFloat("{{ $data->gaji_pokok }}");
        let golongan = "{{ $data->golongan }}";

        // Hitung bonus
        let bonus = calculateBonus(golongan, gajiPokok);
        document.getElementById('bonus').value = bonus;

        // Hitung gaji kotor
        let gajiKotor = gajiPokok + bonus;
        document.getElementById('gaji_kotor').value = gajiKotor;

        // Hitung potongan (misalnya 5% dari gaji kotor)
        let potongan = gajiKotor * 0.05;
        document.getElementById('potongan').value = potongan;

        // Hitung gaji total
        let gajiTotal = gajiKotor - potongan;
        document.getElementById('gaji_total').value = gajiTotal;

        // Format angka untuk tampilan ribuan pada input
        document.querySelectorAll('input[type="text"]').forEach(input => {
            input.value = formatNumber(input.value);
        });
    });
    tanggalInput.addEventListener('change', function () {
        const tanggal = new Date(tanggalInput.value);
        tanggal.setDate(1);
        tanggalInput.value = tanggal.toISOString().substring(0, 10);
    });
    // Fungsi untuk format angka ribuan
    /*function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }*/
</script>

</html>