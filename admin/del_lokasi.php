<?php
session_start();
require_once 'conn.php';

$ambil = $conn->query("SELECT * FROM lokasi WHERE id_lokasi = '$_GET[id]'");
$dl = $ambil->fetch_assoc();
$foto = $dl['foto'];
if (file_exists("../assets/imglok/$foto"))
{
    unlink("../assets/imglok/$foto");
}

$delp = $conn->query("DELETE FROM lokasi WHERE id_lokasi = '$_GET[id]'");
    if($delp)
    {
        $_SESSION['message'] = "Data Lokasi Telah Dihapus";
        $_SESSION['msg_type'] = "danger";
        echo"<script>location='lokasi.php';</script>";
    }
?>