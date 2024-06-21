<?php
// Periksa apakah sesi sudah dimulai sebelum memulai sesi baru
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['name'])) {
    header("Location: login.html");
    exit;
}

include "connection.php";

// Mengambil data dari form
$id_user = $_POST['id_user'];
$name = $_POST['name'];
$username = $_POST['username'];
$description = $_POST['description'];
$namaToko = $_POST['nama_toko'];
$address = $_POST['address'];

// Prepare the UPDATE statement
$stmt = $koneksi->prepare("UPDATE user SET name = ?, username = ?, description = ?, address = ?, nama_toko = ? WHERE id_user = ?");

if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($koneksi->error));
}

// Bind parameters. Assuming types for each parameter:
// s: string, i: integer
$stmt->bind_param("sssssi", $name, $username, $description, $address, $namaToko, $id_user);

if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil di Update'); history.go(-1);</script>";
} else {
    echo "<script>alert('Data Gagal Masuk Database: " . htmlspecialchars($stmt->error) . "'); history.go(-1);</script>";
}

// Close the statement
$stmt->close();
?>