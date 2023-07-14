<?php
$host = "localhost";
$database = "uaspwl2067";
$user = "root";
$password = "";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8");
?>
