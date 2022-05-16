<h1>Laporan Rawat Inap</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*10;
} else {
    $page = "0";
}
$data = query("select rawat_inap.*, dokter.nama_dok, kamar.nama_kamar from rawat_inap join dokter on rawat_inap.kode_dok=dokter.kode_dok join kamar on rawat_inap.kode_kamar=kamar.kode_kamar limit 10 offset $page");
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Rawat Inap</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Cara Masuk</th>
            <th scope="col">Dokter</th>
            <th scope="col">Kamar</th>
            <th scope="col">Cetak</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_ranap'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= $dt['cara_masuk'] ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td> <?= "{$dt['kode_kamar']} -- {$dt['nama_kamar']}" ?></td>
                <td><a href="print-ranap.php?id=<?= $dt['no_ranap']?>" target="_blank" class="btn btn-warning text-white">
                    <i class="fa-solid fa-print fw-bold mr-3"></i>Cetak</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from rawat_inap"));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapRanap&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>