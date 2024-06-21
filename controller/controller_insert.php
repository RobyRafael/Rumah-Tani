<?php
    include "connection.php";
    $nama = $_POST['nama'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $komentar = $_POST['komentar'];
    $sql = "INSERT INTO bukutamu (nama,email,komentar) VALUES ('".$nama."','".$email."','".$komentar."') ";
    $a = $koneksi -> query($sql);
    if($a === true) {
        header('location : hasilbukutamu.php');
    }
    else {
        echo "error";
    }
?>