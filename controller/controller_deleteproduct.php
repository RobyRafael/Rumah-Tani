<?php
include "connection.php";

// Mengambil data dari form
$id_product = $_POST['id_product'];

// Query SQL untuk menghapus produk
$sql = "DELETE FROM product WHERE id_product = ?";

// Persiapkan statement
$stmt = $koneksi->prepare($sql);

// Bind parameter
$stmt->bind_param("i", $id_product);

// Eksekusi statement
if ($stmt->execute()) {
    echo "<script>alert('Produk berhasil dihapus'); history.go(-1);</script>";
} else {
    echo "<script>alert('Gagal menghapus produk: " . htmlspecialchars($stmt->error) . "'); history.go(-1);</script>";
}

// Close the statement
$stmt->close();
?>
