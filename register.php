<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require 'functions.php';

if (isset($_POST["register"])) {

    if (register($_POST) > 0) {
        echo "<script>
                alert('User Baru Berhasil Ditambahkan');
                document.location.href = 'login.php';
              </script>
            ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman registrasi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container">
        <h2 id="judul">Registrasi</h2>
        <hr>

        <form action="" method="POST">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" size="40" placeholder="Masukkan Username">

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" size="40" placeholder="Masukkan password">

            <label for="password2">Konfirmasi Password: </label>
            <input type="password" name="password2" id="password2" size="40" placeholder="Konfirmasi Password">

            <button type="submit" name="register">Register</button>
        </form>

        <a href="login.php">Sudah Punya Akun?</a>
    </div>

</body>

</html>