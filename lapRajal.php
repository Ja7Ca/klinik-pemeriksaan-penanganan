<h1>Laporan Rawat Jalan</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*30;
} else {
    $page = "0";
}
$data = query("select rawat_jalan.*, dokter.nama_dok, poliklinik.nama_poli from rawat_jalan join dokter on rawat_jalan.kode_dok=dokter.kode_dok join poliklinik on rawat_jalan.kode_poli=poliklinik.kode_poli limit 30 offset $page");
?>
<div class="text-right">
    <?php
    if(isset($_GET['page'])){
        $tab = $_GET['page'];
    } else {
        $tab = 1;
    }        
    ?>
<a href="print-rajal.php?page=<?= $tab ?>" target="_blank" class="btn btn-warning text-white">
    <i class="fa-solid fa-print fw-bold mr-3"></i>Cetak</a>
</div>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">No Rawat Jalan</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Dokter</th>
            <th scope="col">Poliklinik</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_rajal'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td> <?= "{$dt['kode_poli']} -- {$dt['nama_poli']}" ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from rawat_jalan"));
        $total = floor($total/30)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapRajal&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>