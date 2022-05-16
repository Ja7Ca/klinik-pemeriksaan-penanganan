<h1>Laporan Dokter</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*10;
} else {
    $page = "0";
}
$data = query("select * from dokter limit 10 offset $page");
?>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Kode Dokter</th>
            <th scope="col">Nama Dokter</th>
            <th scope="col">NIP</th>
            <th scope="col">Telepon</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_dok'] ?></td>
                <td> <?= $dt['nama_dok'] ?></td>
                <td> <?= $dt['nip'] ?></td>
                <td> <?= $dt['telepon'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from dokter"));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapDokter&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>