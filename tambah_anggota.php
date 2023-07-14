<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_anggota = $_POST['no_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $tgl_bergabung = $_POST['tgl_bergabung'];

    $query = "INSERT INTO table_ag(no_anggota, nama, alamat, no_hp, tgl_bergabung) VALUES ('$no_anggota', '$nama', '$alamat', '$no_hp', '$tgl_bergabung')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Anggota</h1>
    <div class="tengah">
    <form method="POST" action="">
        <label for="no_anggota">No. Anggota:</label>
        <input type="text" name="no_anggota" id="no_anggota" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" required></textarea><br>

        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" id="no_hp" required><br>

        <label for="tgl_bergabung">Tgl Bergabung:</label>
        <input type="date" name="tgl_bergabung" id="tgl_bergabung" required><br>

        <input type="submit" value="Simpan">
    </form>
    </div>
</body>
</html>
