<h1>Tabel UGD</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*10;
} else {
    $page = "0";
}
$data = query("select ugd.*, pasien.no_rm, pasien.nama_pasien, dokter.nama_dok from ugd join dokter on ugd.kode_dok=dokter.kode_dok join (pendaftaran join pasien on pendaftaran.no_rm=pasien.no_rm) on pendaftaran.noreg=ugd.noreg limit 10 offset $page");
?>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">No UGD</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Pasien</th>
            <th scope="col">Cara Masuk</th>
            <th scope="col">Dokter</th>
            <th scope="col">Cetak</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_ugd'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= "{$dt['no_rm']} -- {$dt['nama_pasien']}" ?></td>
                <td> <?= $dt['cara_masuk'] ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td><a href="print-ugd.php?id=<?= $dt['no_ugd']?>" target="_blank" class="btn btn-warning text-white">
                    <i class="fa-solid fa-print fw-bold mr-3"></i>Cetak</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from ugd"));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapUgd&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>