<h1>Tambah UGD</h1>
<form action="" method="post" class="my-4">
<div class="form-group">
        <label for="pasien">Pasien</label>
        <select name="pasien" id="pasien" class="form-control" onchange="onChange()">
            <option value="baru">Pasien Baru</option>
            <option value="lama">Pasien Lama</option>
        </select>
    </div>
    <div id="form-pasien-baru">
    <div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_pasien" maxlength='36' required id="nama">
    </div>
    <div class="form-group">
        <label for="nama_pasien">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" id="jk">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" required id="tgl_lahir">
    </div>
    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" class="form-control" id="agama">
            <option value="Islam">Islam</option>
            <option value="Hindu">Hindu</option>
            <option value="Katolik">Katolik</option>
            <option value="Kristen">Kristen</option>
            <option value="Budha">Budha</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status Perkawinan</label>
        <select name="status" class="form-control" id="status">
            <option value="Belum Menikah">Belum Menikah</option>
            <option value="Menikah">Menikah</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" maxlength='55' required id="alamat">
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <div class="row">
            <div class="col-1">
                <input type="text" class="form-control" value="62" readonly>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="telepon" placeholder="8123456789" maxlength='13' required id="telepon">
            </div>
        </div>
    </div>
    </div>
    <div class="form-group">
        <label for="noreg">No Register</label>
        <input type="number" class="form-control" name="noreg" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="tglreg">Tanggal</label>
        <input type="date" class="form-control" name="tglreg" required>
    </div>
    <div class="form-group">
        <label for="jenis_pasien">Jenis Pasien</label>
        <select name="jenis_pasien" class="form-control">
            <option value="Pasien Baru">Pasien Baru</option>
            <option value="Pasien Lama">Pasien Lama</option>
        </select>
    </div>
    <div class="form-group">
        <label for="no_ugd">No UGD</label>
        <input type="number" class="form-control" name="no_ugd" value="" maxlength="6" required>
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
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<script>
    function onChange(){
        let norm = $("#pasien").val()
        console.log(norm)
        let formPasien = `
    <div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_pasien" maxlength='36' required id="nama">
    </div>
    <div class="form-group">
        <label for="nama_pasien">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" id="jk">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" required id="tgl_lahir">
    </div>
    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" class="form-control" id="agama">
            <option value="Islam">Islam</option>
            <option value="Hindu">Hindu</option>
            <option value="Katolik">Katolik</option>
            <option value="Kristen">Kristen</option>
            <option value="Budha">Budha</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status Perkawinan</label>
        <select name="status" class="form-control" id="status">
            <option value="Belum Menikah">Belum Menikah</option>
            <option value="Menikah">Menikah</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" maxlength='55' required id="alamat">
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <div class="row">
            <div class="col-1">
                <input type="text" class="form-control" value="62" readonly>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="telepon" placeholder="8123456789" maxlength='13' required id="telepon">
            </div>
        </div>
    </div>`;
        if(norm == 'baru'){
            $("#form-pasien-baru").html(formPasien);
        } else {
            $("#form-pasien-baru").html(`<div class="form-group">
        <?php
            $data_norm = query("SELECT * FROM pasien");
        ?>
        <label for="no_rm">NO Rekam Medis</label>
        <select name="no_rm" class="form-control" id="select_norm">
            <?php foreach($data_norm as $norm) {?>
            <option value="<?= $norm['no_rm'] ?>"><?= "{$norm['no_rm']} -- {$norm['nama_pasien']}" ?></option>
                <?php } ?>
        </select>
    </div>`);
        }
        console.log($("#form-pasien-baru").html())
    }
</script>

<?php
    if(isset($_POST['submit'])){
        if(testUgd()){
            echo "<script>alert('Tambah Pendaftaran Berhasil')
                    location.href = 'dashboard.php?tab=pendaftaran'
            </script>";
        } else {
            echo "<script>alert('Tambah Pendaftaran Gagal')</script>";
        }
    }
?>