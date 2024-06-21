<?php
    include "connection.php";
    $id = $_POST['id_user'];
    $name = $_POST['name'];
    $user = $_POST['username'];
    $psw = $_POST['password'];
    $level = 'User';
    $sql = "INSERT INTO user (id_user, name, username, password, level) VALUES
     ('".$id."','".$name."','".$user."', '".$psw."', '".$level."')";
     $query = $koneksi -> query($sql);
     if ($query === true) {
        header('location:../login.php');
     }
     else {
        echo "error";
     } 
?>