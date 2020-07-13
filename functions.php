<?php
$conn = mysqli_connect("localhost", "root", "", "bank");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;

    $keterangan = $data['keterangan'];
    $tanggal = $data['tanggal'];
    $jumlah = $data['jumlah'];

    $query = "INSERT INTO kas (id, tanggal, keterangan, jumlah, jenis, keluar)
                            VALUES
                        ('', '$tanggal', '$keterangan', '$jumlah', 'masuk', '0')
                
                        ";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM kas WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function edit($data)
{
    global $conn;

    $id = $data['id'];
    $keterangan = $data['keterangan'];
    $tanggal = $data['tanggal'];
    $jumlah = $data['jumlah'];

    $query = "UPDATE kas SET
                keterangan = '$keterangan',
                tanggal = '$tanggal',
                jumlah = '$jumlah',
                jenis = 'masuk',
                keluar = 0
                WHERE id = $id
            ";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahkeluar($data)
{
    global $conn;

    $keterangan = $data['keterangan'];
    $tanggal = $data['tanggal'];
    $jumlah = $data['jumlah'];

    $query = "INSERT INTO kas (id, tanggal, keterangan, jumlah, jenis, keluar)
                            VALUES
                        ('', '$tanggal', '$keterangan', '0', 'keluar', '$jumlah')
                
                        ";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapuskeluar($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM kas WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function editkeluar($data)
{
    global $conn;

    $id = $data['id'];
    $keterangan = $data['keterangan'];
    $tanggal = $data['tanggal'];
    $jumlah = $data['jumlah'];

    $query = "UPDATE kas SET
                keterangan = '$keterangan',
                tanggal = '$tanggal',
                jumlah = '0',
                jenis = 'keluar',
                keluar = '$jumlah'
                WHERE id = $id
            ";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('User Sudah terdatar, cari Username lain');
              </script>
            ";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
              </script>
            ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users
                VALUES
                ('', '$username', '$password')
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
