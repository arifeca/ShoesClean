<?php
session_start();
require_once 'conn.php';


$delkat = $conn->query("DELETE FROM kontak WHERE id_kontak = '$_GET[id]'");
    if($delkat)
    {
        $_SESSION['message'] = "Data kontak Telah Dihapus";
        $_SESSION['msg_type'] = "danger";
        echo"<script>location='kontak.php';</script>";
    }
?>