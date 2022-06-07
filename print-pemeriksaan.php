<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Rawat Jalan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="p-3 d-flex flex-column align-items-center">
    <h1 class="text-center">Laporan Pemeriksaan Pasien</h1>
    <h3 class="text-center">Klinik Dokter Ida Jatisrono</h3>
    <p class="text-center">Utara Masjid Nurul Huda Jatisrono RT 02 / RW 03, Jatisrono, Wonogiri</p>
    <?php
        require "functions.php";
        if(isset($_GET['page'])){
            $page = ($_GET['page']-1)*30;
        } else {
            $page = 0;
        }
        $i=1;
        $data = query('select pemeriksaan.*, diagnosa.nama_diagnosa, pasien.nama_pasien, dokter.nama_dok from pemeriksaan join pasien on pasien.no_rm=pemeriksaan.no_rm join dokter on dokter.kode_dok=pemeriksaan.kode_dok join diagnosa on diagnosa.kode_diagnosa=pemeriksaan.diagnosa');
    ?>
<table class="table table-striped mt-5 w-100">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Periksa</th>
            <!-- <th scope="col">No Register</th> -->
            <th scope="col">Pasien</th>
            <th scope="col">Dokter</th>
            <th scope="col">Anamnesa</th>
            <th scope="col">TB</th>
            <th scope="col">BB</th>
            <th scope="col">SH</th>
            <th scope="col">ND</th>
            <th scope="col">Diagnosa</th>
            <th scope="col">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td> <?= $dt['tgl_periksa'] ?></td>
                <!-- <td> <?= $dt['noreg'] ?></td> -->
                <td> <?= "{$dt['no_rm']} -- {$dt['nama_pasien']}" ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td> <?= $dt['anamnesa'] ?></td>
                <td> <?= $dt['tb'] ?></td>
                <td> <?= $dt['bb'] ?></td>
                <td> <?= $dt['sh'] ?></td>
                <td> <?= $dt['nd'] ?></td>
                <td> <?= $dt['nama_diagnosa'] ?></td>
                <td> <?= $dt['tindakan'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    window.print();
</script>
</body>
</html>