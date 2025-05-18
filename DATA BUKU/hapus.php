<?php
include_once("koneksi.php");

$KodeBuku = $_GET['KodeBuku'];
$query = "DELETE FROM buku WHERE KodeBuku = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $KodeBuku);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>