<h1>Laporan Pasien</h1>
<?php
if(isset($_GET['page'])){
    $page =($_GET['page']-1)*10;
} else {
    $page = "0";
}
if(isset($_POST['submit'])&& $_POST['key'] !== ""){
    $data = query("select * from pasien where no_rm like '%{$_POST['key']}%' or nama_pasien like '%{$_POST['key']}%' or alamat like '%{$_POST['key']}%'");
    $total = count($data);
} else {
    $total = count(query("select * from pasien"));
    $data = query("select * from pasien limit 10 offset $page");
}
?>
<form method="post" class="text-right">
    <input type="text" name="key" placeholder="'NO RM', 'Nama', 'Alamat'">
    <input type="submit" name="submit" value="Cari" class="btn btn-primary">
</form>
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">No Rekam Medis</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Agama</th>
            <th scope="col">Status Perkawinan</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_rm'] ?></td>
                <td> <?= $dt['nama_pasien'] ?></td>
                <td> <?= $dt['jkel'] ?></td>
                <td> <?= $dt['tgl_lahir'] ?></td>
                <td> <?= $dt['agama'] ?></td>
                <td> <?= $dt['status_perkawinan'] ?></td>
                <td> <?= $dt['alamat'] ?></td>
                <td> <?= $dt['telepon'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = floor($total/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapPasien&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>