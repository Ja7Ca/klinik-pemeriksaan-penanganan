<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Rawat Inap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="p-3 d-flex flex-column align-items-center">
    <h1 class="text-center">Keterangan Rawat Inap</h1>
    <?php
        require "functions.php";

        $data = query("select rawat_inap.*, pendaftaran.*, dokter.nama_dok, kamar.nama_kamar from rawat_inap join pendaftaran on pendaftaran.noreg=rawat_inap.noreg join dokter on rawat_inap.kode_dok=dokter.kode_dok join kamar on rawat_inap.kode_kamar=kamar.kode_kamar where no_ranap='{$_GET['id']}'")[0];
    ?>
<table class="table table-striped mt-5 w-50">
    <tbody>
        <tr>
            <td >No Registrasi</td>
            <td> <?= $data['noreg'] ?></td>
        </tr>
        <tr>
            <td >Tanggal Registrasi</td>
            <td> <?= $data['tglreg'] ?></td>
        </tr>
        <tr>
            <td >NO Rekam Medis</td>
            <td> <?= $data['no_rm'] ?></td>
        </tr>
        <tr>
            <td >Nama Pasien</td>
            <td> <?= $data['nama_pasien'] ?></td>
        </tr>
        <tr>
        <tr>
            <td >Cara Masuk</td>
            <td> <?= $data['cara_masuk'] ?></td>
        </tr>
        <tr>
            <td >Nama Dokter</td>
            <td> <?= $data['nama_dok'] ?></td>
        </tr>
        <tr>
            <td >Kamar</td>
            <td> <?= $data['nama_kamar'] ?></td>
        </tr>
    </tbody>
</table>
</body>
</html>