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
    <h3 class="text-center">Orderan</h3><hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>tanggal orderan</th>
                    <th>Treatment</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <?php 
            $no = 1;
            $select = $conn->query("SELECT * FROM orderan ");
            while($order = $select->fetch_assoc()) {?>
            <tbody>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $order['pelanggan'];?></td>
                    <td><?= $order['tanggal_order'];?></td>
                    <td><?= $order['treatment'];?></td>
                    <td colspan="2">
                    <a href="detail.php?id=<?= $order['id_orderan'];?>" class="btn btn-info btn-sm">Detail</a>
                    <?php 
                    if ($order["status"]!=="pending"):?>
                    <a href="pembayaran.php?id=<?= $order['id_orderan'];?>" class="btn btn-primary btn-sm">Proses</a>
                    <?php endif ?>
                    </td>
                </tr>
            </tbody>
            <?php $no++;?>
            <?php }?>
        </table>
    </div>

