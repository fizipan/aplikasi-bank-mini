<?php
session_start();
// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }
require 'functions.php';

$kas = query("SELECT * FROM kas");


?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Rekaputasi
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>jumlah</th>
                        <th>Jenis</th>
                        <th>Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php $total_keluar = 0; ?>
                    <?php $saldo = 0; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($kas as $row) : ?>
                        <tr class="odd gradeX">
                            <td><?= $i; ?></td>
                            <td><?= date("d F Y", strtotime($row["tanggal"])); ?></td>
                            <td><?= $row["keterangan"]; ?></td>
                            <td align="right"><?= number_format($row["jumlah"]) . ",-"; ?></td>
                            <td><?= $row["jenis"]; ?></td>
                            <td align="right"><?= number_format($row["keluar"]) . ",-"; ?></td>
                        </tr>
                        <?php
                        $total += $row["jumlah"];
                        $total_keluar += $row["keluar"];

                        $saldo = $total - $total_keluar;
                        if ($saldo < 0) {
                            $saldo = 0;
                        }
                        ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <th colspan="3" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
                    <td style="font-size: 17px; text-align: right"><?= "Rp." . number_format($total) . ",-"; ?></td>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: center; font-size: 20px;">Total Kas Keluar</th>
                    <td style="font-size: 17px; text-align: right"><?= "Rp." . number_format($total_keluar) . ",-"; ?></td>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: center; font-size: 20px;">Saldo Akhir</th>
                    <td style="font-size: 17px; text-align: right"><?= "Rp." . number_format($saldo) . ",-"; ?></td>
                </tr>
            </table>
        </div>
        <a href="cetak.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
    </div>
</div>