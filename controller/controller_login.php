<?php
session_start();
include "connection.php";
$name = $_POST['name'];
$psw = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $sql = "SELECT * FROM user where name = '$name' AND password = '$psw'";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['address'] = $data['address'];
        $_SESSION['description'] = $data['description'];
        $_SESSION['nama_toko'] = $data['nama_toko'];
        $_SESSION['level'] = $data['level'];
        if ($data['level'] == "Admin") {
            header("location:../admin_dashboard.php");
        } else if ($data['level'] == "User") {
            header("location:../option.html");
        }
    } else {
        die("password salah <a href=\"javascript:history.back()\">kembali</a>");
    }
} else if ($op == "out") {
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:../login.html");
}
