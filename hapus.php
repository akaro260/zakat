<?php
include "menu/koneksi.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM tbl_zakat WHERE id_zakat='$id'");

    header("Location: admin.php?hapus=success");
    exit;
}

header("Location: admin.php");
exit;
?>



