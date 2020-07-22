<?php
session_start();
// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }
require 'functions.php';

$kas = query("SELECT * FROM kas WHERE jenis = 'masuk'");


?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Kas Masuk
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($kas as $row) : ?>
                        <tr class="odd gradeX">
                            <td><?= $i; ?></td>
                            <td><?= date("d F Y", strtotime($row["tanggal"])); ?></td>
                            <td><?= $row["keterangan"]; ?></td>
                            <td align="right"><?= number_format($row["jumlah"]) . ",-"; ?></td>
                            <td>
                                <a href="?halaman=edit&id=<?= $row["id"]; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
                                <a href="?halaman=hapus&id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Ingin Menghapus Data ini?');" class="btn btn-danger"><i class="far fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                        <?php
                        $total += $row["jumlah"];
                        ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <th colspan="3" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
                    <td style="font-size: 17px; text-align: right"><?= "Rp." . number_format($total) . ",-"; ?></td>
                </tr>
            </table>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
            Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST["submit"])) {

            if (tambah($_POST) > 0) {
        ?>
                <script type="text/javascript">
                    alert('Data Berhasil Ditambahkan');
                    window.location.href = '?halaman=masuk';
                </script>
        <?php
            }
        }


        ?>

    </div>
</div>