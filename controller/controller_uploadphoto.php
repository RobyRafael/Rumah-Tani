<?php
include "connection.php";
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$discount = $_POST['discount'];
$minQuantity = $_POST['minQuantity'];
$status = $_POST['status'];
$nama_file = $_FILES['image']['name'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
$tmp_file = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$path = "dokumen/".$nama_file;
$allowed_mime_types = array("image/jpeg", "image/png", "image/jpg");

if (in_array($file_type, $allowed_mime_types)) {
    if(move_uploaded_file($tmp_file, $path)) {
        echo $query = "INSERT INTO product (name, price, `desc`, id_category, id_discount, quantities, status, file) VALUES
     ('" . $name . "','" . $price . "','" . $description . "', '" . $category . "', '" . $discount . "', '" . $minQuantity . "', '" . $status . "', '" . $nama_file . "')";
     $a = $koneksi->query($query);
        if ($a === true) {
        echo "<script>alert('File Berhasil di Upload'); history.go(-1);</script>";
     }
        else {
        echo "<script>alert('File Gagal Masuk Database'); history.go(-1);</script>";
        }
        } else {
        echo "<script>alert('File Gagal terupload'); history.go(-1);</script>";
        }
}
