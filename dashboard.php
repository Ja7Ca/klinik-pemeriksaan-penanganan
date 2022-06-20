<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    
    if (!$_SESSION['status_login']) {
        echo "
            <script>
                window.location='logout.php'
            </script>
        ";
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="">
        <nav class="navbar navbar-dark bg-dark d-flex justify-content-between m-0">
            <div>

            </div>
            <a class="navbar-brand text-center" style="color:white; font-weight: bold;">SISTEM INFORMASI PENDAFTARAN PASIEN KLINIK DOKTER IDA</a>
            <div class="dropdown">
                <button class="btn btn-light my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-shield-halved pr-3"></i>Admin</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
            </div>
        </nav>
    <div class="d-flex">
    <section id="navbar" class="bg-light bg-opacity-25 p-3">
        <a href="dashboard.php" class="text-decoration-none">
            <div class="nav-menu d-flex align-items-center justify-content-center pb-3">
                <div class="logo-image d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                    <!-- <i class="fa-solid fa-hospital" style="font-size:30px; color: black"></i> -->
                    <img src="asset/logo.png" alt="" width="60">
                </div>
                <div class="text-center">
                    <p class="text-dark fw-bold m-0 pl-3" style="font-size:20px;">Klinik Dokter Ida</p>
                    <h6 class="text-dark fw-bold m-0 pl-3" style="font-size:12px; font-style: italic">"Tulus Ikhlas Melayani"</h6>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=pendaftaran" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <!-- <i class="fa-solid fa-address-card" style="font-size:15px; color: black"></i> -->
                        <p class="text-dark fw-bold m-0 pl-3">Pendaftaran
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=pemeriksaan" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <!-- <i class="fa-solid fa-kit-medical" style="font-size:15px; color: black"></i> -->
                        <p class="text-dark fw-bold m-0 pl-3">Pemeriksaan
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <div class="nav-list py-2">
            <div class="nav-item position-relative d-flex align-items-center pl-1">
                <!-- <i class="fa-solid fa-book" style="font-size:15px; color: black"></i> -->
                <p class="text-black fw-bold m-0 pl-3">Master</p>
                <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: black"></i>
            </div>
            <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide border border-1">
                <a href="dashboard.php?tab=Pasien" class="menu-dropdown d-block">Pasien</a>
                <a href="dashboard.php?tab=Dokter" class="menu-dropdown d-block">Dokter</a>
                <a href="dashboard.php?tab=Poliklinik" class="menu-dropdown d-block">Poliklinik</a>
                <a href="dashboard.php?tab=Diagnosa" class="menu-dropdown d-block">Diagnosa</a>
                <a href="dashboard.php?tab=Tindakan" class="menu-dropdown d-block">Tindakan</a>
                <a href="dashboard.php?tab=Kamar" class="menu-dropdown d-block">Kamar</a>
                <a href="dashboard.php?tab=Rajal" class="menu-dropdown d-block">Rawat Jalan</a>
                <a href="dashboard.php?tab=Ranap" class="menu-dropdown d-block">Rawat Inap</a>
                <a href="dashboard.php?tab=Ugd" class="menu-dropdown d-block">UGD</a>
            </div>
        </div>
        <div class="nav-list py-2">
            <div class="nav-item position-relative d-flex align-items-center pl-1">
                <!-- <i class="fa-solid fa-book" style="font-size:15px; color: black"></i> -->
                <p class="text-black fw-bold m-0 pl-3">Laporan</p>
                <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: black"></i>
            </div>
            <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide border border-1">
                <a href="dashboard.php?tab=lapPasien" class="menu-dropdown d-block">Laporan Pasien</a>
                <a href="dashboard.php?tab=lapDokter" class="menu-dropdown d-block">Laporan Dokter</a>
                <a href="dashboard.php?tab=lapPoliklinik" class="menu-dropdown d-block">Laporan Poliklinik</a>
                <a href="dashboard.php?tab=lapDiagnosa" class="menu-dropdown d-block">Laporan Diagnosa</a>
                <a href="dashboard.php?tab=lapTindakan" class="menu-dropdown d-block">Laporan Tindakan</a>
                <a href="dashboard.php?tab=lapPendaftaran" class="menu-dropdown d-block">Laporan Pendaftaran</a>
                <a href="dashboard.php?tab=lapKamar" class="menu-dropdown d-block">Laporan Kamar</a>
                <a href="dashboard.php?tab=lapPemeriksaan" class="menu-dropdown d-block">Laporan Pemeriksaan</a>
                <a href="dashboard.php?tab=lapRajal" class="menu-dropdown d-block">Laporan Rawat Jalan</a>
                <a href="dashboard.php?tab=lapRanap" class="menu-dropdown d-block">Laporan Rawat Inap</a>
                <a href="dashboard.php?tab=lapUgd" class="menu-dropdown d-block">Laporan UGD</a>
            </div>
        </div>
    </section>
    <section id="content" class="position-relative">
        <div class="postion-relative px-3">
            <?php
            require 'functions.php';
            if (isset($_GET["tab"])) {
                $file = $_GET["tab"];
                require "$file.php";
            } else {
                require "banner.html";
            }
            ?>
        </div>
    </section>
    </div>
    <script src="https://kit.fontawesome.com/1f83e5d847.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".nav-list").on("click", function() {
            $(this).find(".nav-item-dropdown").toggleClass("hide");
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>