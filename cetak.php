<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$kas = query("SELECT * FROM kas");



$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekapitulasi</title>
    <link rel="stylesheet" href="assets/css/print.css">
</head>
<body>

    <h1>Rekapitulasi</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>jumlah</th>
            <th>Jenis</th>
            <th>Keluar</th>>
        </tr>';

$i = 1;
$total = 0;
$total_keluar = 0;
$saldo = 0;
foreach ($kas as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . date("d F Y", strtotime($row["tanggal"])) . '</td>
                <td>' . $row["keterangan"] . '</td>
                <td align="right">' . number_format($row["jumlah"]) . ",-" . '</td>
                <td>' . $row["jenis"] . '</td>
                <td align="right">' . number_format($row["keluar"]) . ",-" . '</td>
            </tr>';
    $total += $row["jumlah"];
    $total_keluar += $row["keluar"];

    $saldo = $total - $total_keluar;
}


$html .= '<tr>
            <th colspan="3" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
            <td colspan="3" style="font-size: 17px; text-align: right">' . "Rp." . number_format($total) . ",-" . '</td>
        </tr>';

$html .=  '<tr>
            <th colspan="3" style="text-align: center; font-size: 20px;">Total Kas Keluar</th>
            <td colspan="3" style="font-size: 17px; text-align: right">' . "Rp." . number_format($total_keluar) . ",-" . '</td>
        </tr>';

$html .= '<tr>
            <th colspan="3" style="text-align: center; font-size: 20px;">Saldo Akhir</th>
            <td colspan="3" style="font-size: 17px; text-align: right">' . "Rp." . number_format($saldo) . ",-" . '</td>
        </tr>';

$html .= '</table>

        </body>
        
        </html>';



$mpdf->WriteHTML($html);
$mpdf->Output('rekapitulasi.pdf', 'I');
