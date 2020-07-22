<?php
session_start();

// if (isset($_SESSION["login"])) {
//     header("Location: index.php");
//     exit;
// }

require 'functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;



            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container">
        <h2 id="judul">Login</h2>
        <hr>

        <?php if (isset($error)) : ?>
            <p style="font-style: italic; color: red">Username / Password Salah</p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" size="40" placeholder="Masukkan Username">

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" size="40" placeholder="Masukkan password">

            <button type="submit" name="login">Login</button>
        </form>
        <br><br>

        <a href="register.php">Buat Akun?</a>
    </div>

</body>

</html>