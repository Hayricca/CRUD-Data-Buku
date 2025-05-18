<?php
include_once("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $KodeBuku = $_POST['KodeBuku'];
    $JudulBuku = $_POST['JudulBuku'];
    $Pengarang = $_POST['Pengarang'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];

    $query = "INSERT INTO buku (KodeBuku, JudulBuku, Pengarang, Penerbit, TahunTerbit) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $KodeBuku, $JudulBuku, $Pengarang, $Penerbit, $TahunTerbit);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Tambah Buku</h1>
    <form action="" method="POST">
        <label>Kode Buku:</label><br>
        <input type="text" name="KodeBuku" required><br>
        <label>Judul Buku:</label><br>
        <input type="text" name="JudulBuku" required><br>
        <label>Pengarang:</label><br>
        <input type="text" name="Pengarang" required><br>
        <label>Penerbit:</label><br>
        <input type="text" name="Penerbit" required><br>
        <label>Tahun Terbit:</label><br>
        <input type="number" name="TahunTerbit" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>