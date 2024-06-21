<?php
    include "connection.php";
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "INSERT INTO product_category (name, description) VALUES
     ('".$name."','".$description."')";
     $query = $koneksi -> query($sql);
     if ($query === true) {
      header("location:../admin_add_category.php");
     }
     else {
        echo "error";
     } 
?>