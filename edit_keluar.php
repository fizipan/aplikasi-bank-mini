<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id = $_GET["id"];

$edit = query("SELECT * FROM kas WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (editkeluar($_POST) > 0) {
?>
        <script type="text/javascript">
            alert('Data Berhasil Diedit');
            window.location.href = '?halaman=keluar';
        </script>
<?php
    }
}


?>

<h1>Edit Data</h1>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?= $edit["id"]; ?>">
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $edit["keterangan"]; ?>"></input>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $edit["tanggal"]; ?>">
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= $edit["keluar"]; ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-warning">Ubah</button>
    <a href="keluar.php" class="btn btn-danger">Keluar</a>
</form>