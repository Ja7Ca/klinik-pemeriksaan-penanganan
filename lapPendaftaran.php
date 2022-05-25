<h1>Laporan Pendaftaran</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*30;
} else {
    $page = 0;
}
$data = query("select pendaftaran.*, pasien.nama_pasien, pasien.jkel, pasien.alamat from pendaftaran join pasien on pendaftaran.no_rm=pasien.no_rm limit 30 offset $page");
?>
<div class="text-right">
    <?php
    if(isset($_GET['page'])){
        $tab = $_GET['page'];
    } else {
        $tab = 1;
    }        
    ?>
<a href="print-pendaftaran.php?page=<?= $tab ?>" target="_blank" class="btn btn-warning text-white">
    <i class="fa-solid fa-print fw-bold mr-3"></i>Cetak</a>
</div>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">No Rekam Medis</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jenis Pasien</th>
            <th scope="col">Status Pasien</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['tglreg'] ?></td>
                <td> <?= $dt['no_rm'] ?></td>
                <td> <?= $dt['nama_pasien'] ?></td>
                <td> <?= $dt['jkel'] ?></td>
                <td> <?= $dt['alamat'] ?></td>
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