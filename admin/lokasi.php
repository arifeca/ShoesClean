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
    <h3 class="text-center">Lokasi</h3><hr>
    <?php
    if(isset($_SESSION['message'])): ?>

    <div data-dismiss="alert" aria-label="Close" class="alert alert-<?= $_SESSION['msg_type']; ?>">


    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
    </div>
    <?php endif; ?>
    <a href="addlok.php" class="btn btn-primary btn-sm mb-3">Tambah Lokasi</a>
    <?php
    $select = $conn->query("SELECT * FROM lokasi");
    while($lokasi = $select->fetch_assoc()){?>
    <div class="media">
        <img src="../assets/imglok/<?= $lokasi['foto'];?>" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0 text-capitalize"><?= $lokasi['daerah'];?></h5>
            <?= $lokasi['lokasi'];?><br>
            <a href="editlok.php?id=<?= $lokasi['id_lokasi'];?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="del_lokasi.php?id=<?= $lokasi['id_lokasi'];?>" class="btn btn-danger btn-sm">Delete</a>
        </div>
    </div>
    <?php }?>