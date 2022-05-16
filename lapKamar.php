<h1>Tabel Kamar</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*10;
} else {
    $page = 0;
}
$data = query("select kamar.*, pasien.nama_pasien from kamar left join pasien on kamar.no_rm=pasien.no_rm limit 10 offset $page");
?>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Kode Kamar</th>
            <th scope="col">Nama Kamar</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Tarif</th>
            <th scope="col">Pasien</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_kamar'] ?></td>
                <td> <?= $dt['nama_kamar'] ?></td>
                <td> <?= $dt['fasilitas_kamar'] ?></td>
                <td> <?= $dt['tarif_kamar'] ?></td>
                <td> <?= "{$dt['no_rm']} -- {$dt['nama_pasien']}" ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from kamar"));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapKamar&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>