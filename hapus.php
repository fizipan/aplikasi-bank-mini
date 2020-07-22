<?php
// session_start();
// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }
require 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
?>
    <script type="text/javascript">
        alert('Data Berhasil Dihapus');
        window.location.href = '?halaman=masuk';
    </script>
<?php
}


?>