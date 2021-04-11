<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
    </div>
</nav>
<h3 class="text-center">Detail Orderan</h3>
<hr>

<?php
$select = $conn->query("SELECT * FROM orderan WHERE id_orderan = '$_GET[id]'");
$detail = $select->fetch_assoc();

?>


<div class="row container">
    <div class="col-md-4">
        <h3>Orderan</h3>
        <strong>
            <h5><?= $detail['pelanggan']; ?></h5>
        </strong>
        No : <?= $detail['id_orderan']; ?><br>
        Tanggal : <?= $detail['tanggal_order']; ?><br>

        Harga : Rp.<?= number_format($detail['harga']); ?>
    </div>
    <div class="col-md-3">
        <h3> Barang</h3>
        Treatment : <?= $detail['treatment']; ?><br>
        Sepatu : <?= $detail['merk_sepatu']; ?><br>
        Ukuran : <?= $detail['ukuran_sepatu']; ?>
    </div>
    <div class="col-md-5">
        <h3>Pengiriman / Penjemputan</h3>
        Alamat : <?= $detail['alamat']; ?><br>
        Note: <?= $detail['note']; ?>
    </div>
</div>
<a class="btn btn-primary mt-4" href="orderan.php">Back</a>