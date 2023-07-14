<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_anggota = $_POST['no_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $tgl_bergabung = $_POST['tgl_bergabung'];

    $query = "UPDATE table_ag SET nama='$nama', alamat='$alamat', no_hp='$no_hp', tgl_bergabung='$tgl_bergabung' WHERE no_anggota='$no_anggota'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    header("Location: index.php");
    exit();
}

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    $select_query = "SELECT * FROM table_ag WHERE no_anggota='$edit_id'";
    $select_result = mysqli_query($koneksi, $select_query);

    if (!$select_result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($select_result);

    $no_anggota = $data['no_anggota'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $tgl_bergabung = $data['tgl_bergabung'];
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Anggota</h1>
    <div class="tengah">
    <form method="POST" action="">
        <input type="hidden" name="no_anggota" value="<?php echo $no_anggota; ?>">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" required><?php echo $alamat; ?></textarea><br>

        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" id="no_hp" value="<?php echo $no_hp; ?>" required><br>

        <label for="tgl_bergabung">Tgl Bergabung:</label>
        <input type="date" name="tgl_bergabung" id="tgl_bergabung" value="<?php echo $tgl_bergabung; ?>" required><br>

    <a href="index.php"><input type="submit" value="Simpan"></a>
    </form>
    </div>
   

</body>
</html>
