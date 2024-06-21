<?php
include "connection.php";

// Mengambil data dari form
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$discount = $_POST['discount'];
$minQuantity = $_POST['minQuantity'];
$status = $_POST['status'];
$id_product = $_POST['id_product'];
// $nama_file = $_FILES['gambar']['name'];
// $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
// $tmp_file = $_FILES['gambar']['tmp_name'];
// $file_type = $_FILES['gambar']['type'];
// $path = "dokumen/" . $nama_file;
// $allowed_mime_types = array("image/jpeg", "image/png", "image/jpg");

// if (in_array($file_type, $allowed_mime_types)) {
//     if (move_uploaded_file($tmp_file, $path)) {
//         echo $query = "UPDATE product SET name = name, price = price, `desc` = description, id_category = category, id_discount = discount, quantities = minQuantity, status = status WHERE id_product = ?";
//         $a = $koneksi->query($query);
//         if ($a === true) {
//             echo "<script>alert('File Berhasil di Update'); history.go(-1);</script>";
//         } else {
//             echo "<script>alert('File Gagal Masuk Database'); history.go(-1);</script>";
//         }
//     } else {
//         echo "<script>alert('File Gagal terupdate'); history.go(-1);</script>";
//     }
// }


// Prepare the statement
$stmt = $koneksi->prepare("UPDATE product SET name = ?, price = ?, `desc` = ?, id_category = ?, id_discount = ?, quantities = ?, status = ? WHERE id_product = ?");

if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($koneksi->error));
}

// Bind parameters. Assuming types for each parameter:
// s: string, i: integer
$stmt->bind_param("sssisisi", $name, $price, $description, $category, $discount, $minQuantity, $status, $id_product);

if ($stmt->execute()) {
    echo "<script>alert('File Berhasil di Update'); history.go(-1);</script>";
} else {
    echo "<script>alert('File Gagal Masuk Database: " . htmlspecialchars($stmt->error) . "'); history.go(-1);</script>";
}

// Close the statement
$stmt->close();
?>