<?php
include_once("koneksi.php");

// Ambil data buku
$query = "SELECT * FROM buku";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Data Buku</h1>
    <a href="tambah.php">Tambah Buku</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['KodeBuku']; ?></td>
                    <td><?php echo $row['JudulBuku']; ?></td>
                    <td><?php echo $row['Pengarang']; ?></td>
                    <td><?php echo $row['Penerbit']; ?></td>
                    <td><?php echo $row['TahunTerbit']; ?></td>
                    <td>
                        <a href="edit.php?KodeBuku=<?php echo $row['KodeBuku']; ?>">Edit</a> |
                        <a href="hapus.php?KodeBuku=<?php echo $row['KodeBuku']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>