<?php
    include "connection.php";
    $discount = $_POST['discount'];
    $status = $_POST['status'];
    $sql = "INSERT INTO discount (discount, status) VALUES
     ('".$discount."', '".$status."')";
     $query = $koneksi -> query($sql);
     if ($query === true) {
        header('location:../seller_add_discount.php');
     }
     else {
        echo "error";
     } 
?>