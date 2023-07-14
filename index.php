<?php
require_once 'koneksi.php';

$query = "SELECT * FROM table_ag";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

$query_pinjaman = "SELECT * FROM table_pi";
$result_pinjaman = mysqli_query($koneksi, $query_pinjaman);

if (!$result_pinjaman) {
    die("Query error: " . mysqli_error($koneksi));
}

// Fungsi untuk menghapus data Anggota
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $delete_query = "DELETE FROM tabel_ag WHERE no_anggota = '$delete_id'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if (!$delete_result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Anggota</h1>

    <table>
        <tr>
            <th>No. Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Tgl Bergabung</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $row['no_anggota']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['no_hp']; ?></td>
            <td><?php echo $row['tgl_bergabung']; ?></td>
            <td>
                <a href="edit_anggota.php?edit_id=<?php echo $row['no_anggota']; ?>">Edit</a> |
                <a href="index.php?delete_id=<?php echo $row['no_anggota']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <table>
    <h1>Data Pinjaman</h1>
        <tr>
            <th>No. Pinjaman</th>
            <th>No. Anggota</th>
            <th>Tanggal Pinjaman</th>
            <th>Nominal</th>
            <th>Tenor</th>
        </tr>
        <?php while ($row_pinjaman = mysqli_fetch_assoc($result_pinjaman)) : ?>
        <tr>
            <td><?php echo $row_pinjaman['no_pinjaman']; ?></td>
            <td><?php echo $row_pinjaman['no_anggota']; ?></td>
            <td><?php echo $row_pinjaman['tgl_pinjaman']; ?></td>
            <td><?php echo $row_pinjaman['nominal']; ?></td>
            <td><?php echo $row_pinjaman['tenor']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="actions">
        <a href="tambah_anggota.php" class="btn">Tambah Anggota</a>
        <a href="tambah_pinjaman.php" class="btn">Tambah Pinjaman</a>
    </div>

</body>
</html>
