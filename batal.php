<?php
session_start();
require_once 'admin/conn.php';
$id_orderan = $_GET['id'];
$conn->query("DELETE FROM orderan WHERE id_orderan = '$id_orderan'");

echo "<script>location = 'riwayat.php'</script>";

?>