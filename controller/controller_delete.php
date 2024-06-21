<?php
include "connection.php";

$id_product = $_GET['id_product'];

$sql = "DELETE FROM product WHERE id_product = '$id_product'";
$a = $koneksi->query($sql);

?>