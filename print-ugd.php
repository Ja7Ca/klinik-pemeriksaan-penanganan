<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print UGD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="p-3 d-flex flex-column align-items-center">
    <h1 class="text-center">Keterangan UGD</h1>
    <?php
        require "functions.php";
        $data = query("select ugd.*, pendaftaran.*, pasien.no_rm, pasien.nama_pasien, dokter.nama_dok from ugd  join dokter on ugd.kode_dok=dokter.kode_dok join (pendaftaran join pasien on pendaftaran.no_rm=pasien.no_rm) on pendaftaran.noreg=ugd.noreg where no_ugd='{$_GET['id']}'")[0];
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
    </tbody>
</table>
</body>
</html>