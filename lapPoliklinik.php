<h1>Laporan Poliklinik</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*10;
} else {
    $page = "0";
}
$data = query("select * from poliklinik limit 10 offset $page");
?>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Kode Poli</th>
            <th scope="col">Nama Poli</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_poli'] ?></td>
                <td> <?= $dt['nama_poli'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from poliklinik "));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapPoliklinik&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>