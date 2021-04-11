<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';

$select = $conn->query("SELECT * FROM kontak");
$lokasi = $select->fetch_assoc();

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
<h3>Kontak/Hubungi Kami</h3>
<a href="addkontak.php" class="btn btn-primary btn-sm">Tambah Kontak</a>
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
                <th scope="col">Instagram</th>
                <th scope="col">Line</th>
                <th scope="col">Email</th>
                <th scope="col">Call/SMS</th>
                <th scope="col">Whatsapp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        $select = $conn->query("SELECT * FROM kontak");
        while ($kat = $select->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $kat['instagram']; ?></td>
                    <td><?= $kat['line']; ?></td>
                    <td><?= $kat['email']; ?></td>
                    <td><?= $kat['number']; ?></td>
                    <td><?= $kat['whatsapp']; ?></td>
                    <td colspan="2">
                        <a href="edit_kontak.php?id=<?= $kat['id_kontak']; ?>" class="btn btn-primary btn-sm">edit</a>
                        <a href="del_kontak.php?id=<?= $kat['id_kontak']; ?>" class="btn btn-danger btn-sm">delete</a>
                    </td>
                </tr>
            </tbody>
            <?php $no++ ?>
        <?php } ?>
    </table>
</div>