<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Rawat Jalan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="">
    <div class="p-3 d-flex flex-column align-items-center border border-2" style="width: 10cm">
        <h3 class="text-center">Klinik Dokter Ida Jatisrono</h3>
        <p class="text-center pb-3" style="border-bottom: 1px solid black; font-size:10px;">Utara Masjid Nurul Huda Jatisrono RT 02 / RW 03, Jatisrono, Wonogiri</p>
        <?php
            require "functions.php";
            if(isset($_GET['no_rm'])){
                $norm = $_GET['no_rm'];
            } else {
                echo "<script>location.href='dashboard.php'</script>";
            }
            $data = query("select * from pasien where no_rm='$norm'")[0];

            function age($date){
                $bday = new DateTime($date); // Your date of birth
                $today = new Datetime(date('m/d/y'));
                $diff = $today->diff($bday);
                return $diff->y;
            }

            function printNORM($norm){
                if(strlen($norm) < 6){
                    $j = 6 - strlen($norm);
                    for($i = 1; $i <= $j; $i++){
                        $norm = "0".$norm;
                    }
                }
                return $norm;
            }

        ?>
        <h6>KARTU IDENTITAS BEROBAT (KIB)</h6>
        <div class="w-75 d-flex">
            <div class="w-50" style="font-size:9px;">
                <p class="m-0">No. Rekam Medis</p>
                <p class="m-0">Nama Pasien</p>
                <p class="m-0">Jenis Kelamin</p>
                <p class="m-0">Umur</p>
                <p class="m-0">Alamat</p>
            </div>
            <div class="w-50" style="font-size:9px;">
                <p class="m-0"><?= printNORM($data['no_rm']) ?></p>
                <p class="m-0"><?= $data['nama_pasien'] ?></p>
                <p class="m-0"><?php if($data['jkel'] == 'L'){
                    echo "Laki - Laki";
                } else {
                    echo "Perempuan";
                } ?></p>
                <p class="m-0"><?= age($data['tgl_lahir']) ?></p>
                <p class="m-0"><?= $data['alamat'] ?></p>
            </div>
        </div>
    </div>
<script>
    window.print();
</script>
</body>
</html>