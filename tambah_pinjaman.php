<?php
require_once 'koneksi.php';

// Mendapatkan nomor pinjaman terakhir
$query = "SELECT MAX(no_pinjaman) AS max_pinjaman FROM table_pi";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$last_pinjaman = $row['max_pinjaman'];

// Mendapatkan angka dari nomor pinjaman terakhir
$last_number = intval(substr($last_pinjaman, 2));

// Membuat nomor pinjaman baru
$new_number = $last_number + 1;
$new_pinjaman = 'PJ' . str_pad($new_number, 5, '0', STR_PAD_LEFT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_pinjaman = $_POST['no_pinjaman'];
    $no_anggota = $_POST['no_anggota'];
    $tgl_pinjaman = $_POST['tgl_pinjaman'];
    $nominal = $_POST['nominal'];
    $tenor = $_POST['tenor'];

    // Pengecekan tenor dan nominal
    $max_nominal = 0;
    switch ($tenor) {
        case '3':
            $max_nominal = 1500000;
            break;
        case '9':
            $max_nominal = 4500000;
            break;
        case '15':
            $max_nominal = 9000000;
            break;
    }

    if ($nominal > $max_nominal) {
        die("Peminjaman melebihi kapasitas maksimal untuk tenor $tenor bulan.");
    }

    $query = "INSERT INTO(no_pinjaman, no_anggota, tgl_pinjaman, nominal, tenor) VALUES ('$no_pinjaman', '$no_anggota', '$tgl_pinjaman', '$nominal', '$tenor')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    echo "Data pinjaman berhasil disimpan.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pinjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Pinjaman</h1>
<div class="tengah">
    <form method="POST" action="">
        <label for="no_pinjaman">No. Pinjaman:</label>
        <input type="text" name="no_pinjaman" id="no_pinjaman" value="<?php echo $new_pinjaman; ?>" readonly><br>

        <label for="no_anggota">No. Anggota:</label>
        <input type="text" name="no_anggota" id="no_anggota" required><br>

        <label for="tgl_pinjaman">Tanggal:</label>
        <input type="date" name="tgl_pinjaman" id="tgl_pinjaman" required><br>

        <label for="nominal">Nominal:</label>
        <input type="number" name="nominal" id="nominal" required><br>

        <label for="tenor">Tenor:</label>
        <select name="tenor" id="tenor" required>
            <option value="3">3 bulan</option>
            <option value="9">9 bulan</option>
            <option value="15">15 bulan</option>
        </select><br>

        <input type="submit" value="Simpan">
      
    </form>
    </div>
   <div class="kembali"> <a href="index.php">Kembali</a></div>
</body>
</html>
