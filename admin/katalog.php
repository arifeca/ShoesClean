<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';

$select = $conn->query("SELECT * FROM katalog");
$kat = $select->fetch_assoc();

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

<h3>Katalog</h3>
<a href="addkat.php" class="btn btn-primary btn-sm">Tambah Katalog</a>
<?php
require_once('conn.php');
?>
<?php
if (isset($_SESSION['message'])) : ?>

    <div data-dismiss="alert" aria-label="Close" class="alert alert-<?= $_SESSION['msg_type']; ?>">


        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif; ?>
<div class="table-responsive mt-3">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Treatment</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        $select = $conn->query("SELECT * FROM katalog");
        while ($kat = $select->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $kat['katalog']; ?></td>
                    <td><?= $kat['deskripsi']; ?></td>
                    <td>Rp. <?= number_format($kat['harga']); ?></td>
                    <td colspan="2">
                        <a href="editkat.php?id=<?= $kat['id_katalog']; ?>" class="btn btn-primary btn-sm">edit</a>
                        <a href="del_katalog.php?id=<?= $kat['id_katalog']; ?>" class="btn btn-danger btn-sm">delete</a>
                </tr>
            </tbody>
            <?php $no++ ?>
        <?php } ?>
    </table>
</div>