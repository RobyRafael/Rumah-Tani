<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        // Update status for all products
        foreach ($_POST['status'] as $id => $status) {
            $query = "UPDATE product SET status = '$status' WHERE id_product = $id";
            $koneksi->query($query);
        }
?>
        <script language="javascript">
            alert("Update Data Berhasil");
            window.location.href = '../seller_productstatus.php';
        </script>
    <?php
    } elseif (isset($_POST['delete'])) {
        // Delete selected products
        if (!empty($_POST['delete_ids'])) {
            $delete_ids = implode(",", $_POST['delete_ids']);
            $query = "DELETE FROM product WHERE id_product IN ($delete_ids)";
            $koneksi->query($query);
        }
    ?>
        <script language="javascript">
            alert("Hapus Data Berhasil");
            window.location.href = '../seller_productstatus.php';
        </script>
<?php
    }
}
?>