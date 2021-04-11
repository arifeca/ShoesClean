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
<h3> Tambah Data Katalog</h3>
<form method="post">
    <div class="form-group">
        <label for="k">Katalog</label>
        <input type="text" class="form-control" id="k" name="katalog">
    </div>
    <div class="form-group">
        <label for="d">Deskripsi </label>
        <input type="text" class="form-control" id="d" name="deskripsi">
    </div>
    <div class="form-group">
        <label for="k">Harga</label>
        <input type="number" class="form-control" id="k" name="harga">
    </div>
    <button class="btn btn-primary" type="submit" name="save">Save</button>
</form>

<?php
if (isset($_POST['save'])) {
    $katalog = $_POST['katalog'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $conn->query("INSERT INTO katalog VALUES('', '$katalog', '$deskripsi', '$harga')  ");
    $_SESSION['message'] = "Katalog Telah Ditambahkan";
    $_SESSION['msg_type'] = "success";
    echo "<script>location='katalog.php';</script>";
}
