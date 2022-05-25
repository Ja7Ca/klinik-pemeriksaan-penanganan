<h1>Tambah Rawat Inap</h1>
<form action="" method="post" class="my-4">
    <div class="form-group">
        <label for="noreg">No Register</label>
        <input type="number" class="form-control" name="noreg" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="tglreg">Tanggal</label>
        <input type="date" class="form-control" name="tglreg" required>
    </div>
    <div class="form-group">
        <?php
            $data_norm = query("SELECT * FROM pasien");
        ?>
        <label for="no_rm">NO Rekam Medis</label>
        <select name="no_rm" class="form-control">
            <?php foreach($data_norm as $norm) {?>
            <option value="<?= $norm['no_rm'] ?>"><?= "{$norm['no_rm']} -- {$norm['nama_pasien']}" ?></option>
                <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jenis_pasien">Jenis Pasien</label>
        <select name="jenis_pasien" class="form-control">
            <option value="Pasien Baru">Pasien Baru</option>
            <option value="Pasien Lama">Pasien Lama</option>
        </select>
    </div>
    <div class="form-group">
        <label for="no_ranap">No Rawat Inap</label>
        <input type="number" class="form-control" name="no_ranap" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="cara_masuk">Cara Masuk</label>
        <select name="cara_masuk" class="form-control">
            <option value="Datang Sendiri">Datang Sendiri</option>
            <option value="Dirujuk">Dirujuk</option>
        </select>
    </div>
    <div class="form-group">
        <?php
            $data_dokter = query("select * from dokter");
        ?>
        <label for="kode_dok">Dokter</label>
        <select name="kode_dok" class="form-control">
            <?php foreach($data_dokter as $dokter) {?>
            <option value="<?= $dokter['kode_dok'] ?>"><?= "{$dokter['kode_dok']} -- {$dokter['nama_dok']}" ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <?php
            $data_kamar = query("select * from kamar");
        ?>
        <label for="kode_kamar">Kamar</label>
        <select name="kode_kamar" class="form-control">
            <?php foreach($data_kamar as $kamar) {?>
                <?php if($kamar['no_rm']==NULL) {?>
            <option value="<?= $kamar['kode_kamar'] ?>"><?= "{$kamar['kode_kamar']} -- {$kamar['nama_kamar']}" ?></option>
            <?php }} ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(testRanap()){
            echo "<script>alert('Tambah Pendaftaran Berhasil')
                    location.href = 'dashboard.php?tab=pendaftaran'
            </script>";
        } else {
            echo "<script>alert('Tambah Pendaftaran Gagal')</script>";
        }
    }
?>