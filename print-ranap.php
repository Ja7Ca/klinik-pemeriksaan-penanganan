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
<h1 class="text-center">Laporan Kunjungan Pasien Rawat Inap</h1>
    <h3 class="text-center">Klinik Dokter Ida Jatisrono</h3>
    <?php
        require "functions.php";
        $i = 1;
        $data = query("select rawat_inap.*, pendaftaran.*, pasien.*, dokter.nama_dok, kamar.nama_kamar from rawat_inap join (pendaftaran join pasien on pendaftaran.no_rm=pasien.no_rm) on pendaftaran.noreg=rawat_inap.noreg join dokter on rawat_inap.kode_dok=dokter.kode_dok join kamar on rawat_inap.kode_kamar=kamar.kode_kamar");
    ?>
<table class="table table-striped mt-5 w-100">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Tanggal Registrasi</th>
            <th scope="col">NO Rekam Medis</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Cara Masuk</th>
            <th scope="col">Dokter</th>
            <th scope="col">Kamar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $dt["noreg"] ?></td>
            <td><?= $dt["tglreg"] ?></td>
            <td><?= $dt["no_rm"] ?></td>
            <td><?= $dt["nama_pasien"] ?></td>
            <td><?php 
                    if($dt["jkel"] == "L"){
                        echo "Laki-laki";
                    } else {
                        echo "Perempuan";
                    }
                ?></td>
            <td><?= $dt["alamat"] ?></td>
            <td><?= $dt["cara_masuk"] ?></td>
            <td><?= $dt["nama_dok"] ?></td>
            <td><?= $dt["nama_kamar"] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    window.print();
</script>
</body>
</html>