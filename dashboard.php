<?php
// session_start();
// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

require 'functions.php';

$jumlah = query("SELECT * FROM kas");

$total = 0;
$total_masuk = 0;
$total_keluar = 0;
foreach ($jumlah as $jml) {
    $total_masuk += $jml["jumlah"];
    $total_keluar += $jml["keluar"];

    $total = $total_masuk - $total_keluar;
    if ($total < 0) {
        $total = 0;
    }
}


?>

<marquee>Selamat Datang Di Sistem Informasi Pengelolaan Tabungan SMKN 17</marquee>
<div class="row">
    <div class="col-md-12">
        <h2>Halaman Utama</h2>
        <h5>Pengelolaan Tabungan SMKN 17</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-5 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="glyphicon glyphicon-floppy-save"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?= "Rp." . number_format($total_masuk) . ',-'; ?></p>
                <p class="text-muted">Total Kas Masuk</p>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="glyphicon glyphicon-floppy-open"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?= "Rp." . number_format($total_keluar) . ',-'; ?></p>
                <p class="text-muted">Total Kas Keluar</p>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue set-icon">
                <i class="glyphicon glyphicon-floppy-disk"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?= "Rp." . number_format($total) . ',-'; ?></p>
                <p class="text-muted">Saldo Akhir</p>
            </div>
        </div>
    </div>
</div>