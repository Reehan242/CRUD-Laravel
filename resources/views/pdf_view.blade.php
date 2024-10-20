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
   
    <h1 class="text-center" mb-4>Slip Gaji</h1>

    <!--Ini buat tampilan table -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-success table-striped">
                            <tr>
                                <th>Nama Pegawai</th>
                                <td><input type="text" class="form-control" id="nama" readonly
                                        value="{{ $data->nama }}"></td>
                            </tr>
                            <tr>
                                <th>Golongan</th>
                                <td><input type="text" class="form-control" id="golongan" readonly
                                        value="{{ $data->golongan }}"></td>
                            </tr>
                            <tr>
                                <th>Gaji Pokok</th>
                                <td><input type="text" class="form-control" id="gaji_pokok" readonly
                                        value="{{ number_format($data->gaji_pokok, 0, ',', '.') }}"></td>
                            </tr>
                            <tr>
                                <th>Bonus (%)</th>
                                <td><input type="text" class="form-control" id="bonus" readonly
                                        value="{{ $data->bonus }}"></td>
                            </tr>
                            <tr>
                                <th>Gaji Kotor</th>
                                <td><input type="text" class="form-control" id="gaji_kotor" readonly
                                        value="{{ $data->gaji_kotor }}"></td>
                            </tr>
                            <tr>
                                <th>Potongan (5%)</th>
                                <td><input type="text" class="form-control" id="potongan" readonly
                                        value="{{ $data->potongan }}"></td>
                            </tr>
                            <tr>
                                <th>Gaji Total</th>
                                <td><input type="text" class="form-control" id="gaji_total" readonly
                                        value="{{ $data->gaji_total }}"></td>
                            </tr>
                            
                        </table>
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

    // Fungsi untuk format angka ribuan
    function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
</script>

</html>