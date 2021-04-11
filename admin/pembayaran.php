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
<h3 class="text-center">Proses Pembayaran</h3>
<hr>

<?php
// $id_order = $_GET['id'];
$select = $conn->query("SELECT * FROM pembayaran WHERE id_orderan = '$_GET[id]'");
$detail_pembayaran = $select->fetch_assoc();
?>
<div class="media">
    <img src="../assets/bukti_pembayaran/<?= $detail_pembayaran['foto']; ?>" style="max-width:120px;" class="mr-3" alt="...">
    <div class="media-body">
        <div class="table-responsive-md">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td><?= $detail_pembayaran['metode']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah yang di bayarkan</th>
                        <td>Rp.<?= number_format($detail_pembayaran['jumlah']); ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $detail_pembayaran['tanggal']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>Proses Pembayaran</label>
        <select class="form-control" name="status">
            <option value="">-SELECT-</option>
            <option value="Barang Sedang Dijemput">Barang Sedang Dijemput</option>
            <option value="Barang di Proses">Barang di Proses</option>
            <option value="Barang Di Kirim">Barang Di Kirim</option>
            <option value="Deal">Pesanan Selesai</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="ok">Proses</button>
    <a class="btn btn-danger" href="orderan.php">Back</a>
</form>


<?php
if (isset($_POST['ok'])) {
    $status = $_POST['status'];
    $conn->query("UPDATE orderan SET status='$status' WHERE id_orderan = '$_GET[id]' ");

    echo "<script> alert('data orderan terupdate');</script>";
    echo "<script> location = 'orderan.php';</script>";
}
?>