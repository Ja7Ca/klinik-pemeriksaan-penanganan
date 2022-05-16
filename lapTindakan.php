<h1>Tabel Tindakan</h1>
<?php
if(isset($_GET['page'])){
    $page = ($_GET['page']-1)*10;
} else {
    $page = "0";
}
$data = query("select * from tindakan limit 10 offset $page");
?>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Kode Tindakan</th>
            <th scope="col">Nama Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_tindakan'] ?></td>
                <td> <?= $dt['nama_tindakan'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = count(query("select * from tindakan "));
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapTindakan&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>