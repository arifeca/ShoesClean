<?php
session_start();
require_once 'conn.php';


$delkat = $conn->query("DELETE FROM katalog WHERE id_katalog = '$_GET[id]'");
    if($delkat)
    {
        $_SESSION['message'] = "Data Katalog Telah Dihapus";
        $_SESSION['msg_type'] = "danger";
        echo"<script>location='katalog.php';</script>";
    }
?>