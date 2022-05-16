<h1>Laporan Pendaftaran</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*10;
} else {
    $page = 0;
}
$data = query("select pendaftaran.*, pasien.nama_pasien from pendaftaran join pasien on pendaftaran.no_rm=pasien.no_rm limit 10 offset $page");
?>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">No Register</th>
            <th scope="col">Tanggal</th>
            <th scope="col">No Rekam Medis</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Pasien</th>
            <th scope="col">Status Pasien</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= $dt['tglreg'] ?></td>
                <td> <?= $dt['no_rm'] ?></td>
                <td> <?= $dt['nama_pasien'] ?></td>
                <td> <?= $dt['jenis_pasien'] ?></td>
                <td> <?= $dt['status_pasien'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from pendaftaran"));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapPendaftaran&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>