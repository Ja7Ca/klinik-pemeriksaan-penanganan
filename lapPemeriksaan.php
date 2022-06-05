<h1>Tabel Pemeriksaan</h1>
<?php
if(isset($_GET['page'])){
    $page =($_GET['page']-1)*10;
} else {
    $page = "0";
}
$data = query("select pemeriksaan.*, pasien.nama_pasien, dokter.nama_dok from pemeriksaan join pasien on pasien.no_rm=pemeriksaan.no_rm join dokter on dokter.kode_dok=pemeriksaan.kode_dok limit 10 offset $page");
?>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Tanggal Periksa</th>
            <th scope="col">No Register</th>
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
                <td> <?= $dt['tgl_periksa'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= "{$dt['no_rm']} -- {$dt['nama_pasien']}" ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td> <?= $dt['anamnesa'] ?></td>
                <td> <?= $dt['tb'] ?></td>
                <td> <?= $dt['bb'] ?></td>
                <td> <?= $dt['sh'] ?></td>
                <td> <?= $dt['nd'] ?></td>
                <td> <?= $dt['diagnosa'] ?></td>
                <td> <?= $dt['tindakan'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from pemeriksaan"));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapPemeriksaan&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>