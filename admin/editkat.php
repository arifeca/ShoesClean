<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';

$select = $conn->query("SELECT * FROM katalog WHERE id_katalog = '$_GET[id]'");
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
<form method="post">
    <div class="form-group">
        <label for="t">Treatment</label>
        <input type="text" class="form-control form-control-sm" id="t" name="katalog" value="<?= $kat['katalog']; ?>">
    </div>
    <div class="form-group">
        <label for="d">deskripsi</label>
        <input type="text" class="form-control form-control-sm" id="d" name="deskripsi" value="<?= $kat['deskripsi']; ?>">
    </div>
    <div class="form-group">
        <label for="n">Harga</label>
        <input type="number" class="form-control form-control-sm" id="n" name="harga" value="<?= $kat['harga']; ?>">
    </div>
    <button tpe="submit" class="btn btn-primary btn-sm" name="updatekat">update</button>
    <a class="btn btn-primary btn-sm" href="katalog.php">cancel</a>
</form>

<?php
if (isset($_POST['updatekat'])) {
    $conn->query("UPDATE katalog SET
                    katalog = '$_POST[katalog]',
                    deskripsi = '$_POST[deskripsi]',
                    harga = '$_POST[harga]'
                    WHERE id_katalog = '$_GET[id]'");

    $_SESSION['message'] = "Data Katalog Berhasil Diupdate";
    $_SESSION['msg_type'] = "success";
    echo "<script>location='katalog.php';</script>";
}
