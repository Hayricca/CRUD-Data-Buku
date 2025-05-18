<?php
include_once("koneksi.php");

$KodeBuku = $_GET['KodeBuku'];
$query = "SELECT * FROM buku WHERE KodeBuku = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $KodeBuku);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $JudulBuku = $_POST['JudulBuku'];
    $Pengarang = $_POST['Pengarang'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];

    $query = "UPDATE buku SET JudulBuku = ?, Pengarang = ?, Penerbit = ?, TahunTerbit = ? WHERE KodeBuku = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $JudulBuku, $Pengarang, $Penerbit, $TahunTerbit, $KodeBuku);

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
    <title>Edit Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit Buku</h1>
    <form action="" method="POST">
        <label>Judul Buku:</label><br>
        <input type="text" name="JudulBuku" value="<?php echo $data['JudulBuku']; ?>" required><br>
        <label>Pengarang:</label><br>
        <input type="text" name="Pengarang" value="<?php echo $data['Pengarang']; ?>" required><br>
        <label>Penerbit:</label><br>
        <input type="text" name="Penerbit" value="<?php echo $data['Penerbit']; ?>" required><br>
        <label>Tahun Terbit:</label><br>
        <input type="number" name="TahunTerbit" value="<?php echo $data['TahunTerbit']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>