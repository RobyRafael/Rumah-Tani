<?php
    include "connection.php";
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO user_address (address, city, postal_code, phone) VALUES
     ('".$address."','".$city."', '".$postal."', '".$phone."')";
     $query = $koneksi -> query($sql);
     if ($query === true) {
        header('location:../user_alamat.php');
     }
     else {
        echo "error";
     } 
?>