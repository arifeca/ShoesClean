<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';

$select = $conn->query("SELECT * FROM kontak WHERE id_kontak = '$_GET[id]'");
$kontak = $select->fetch_assoc();

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
        <label for="i">Instagram</label>
        <input type="text" class="form-control form-control-sm" id="i" name="instagram" value="<?= $kontak['instagram']; ?>">
    </div>
    <div class="form-group">
        <label for="l">Line</label>
        <input type="text" class="form-control form-control-sm" id="l" name="line" value="<?= $kontak['line']; ?>">
    </div>
    <div class="form-group">
        <label for="e">Email</label>
        <input type="email" class="form-control form-control-sm" id="e" name="email" value="<?= $kontak['email']; ?>">
    </div>
    <div class="form-group">
        <label for="s">Call/SMS</label>
        <input type="number" class="form-control form-control-sm" id="s" name="number" value="<?= $kontak['number']; ?>">
    </div>
    <div class="form-group">
        <label for="w">Whatsapp</label>
        <input type="number" class="form-control form-control-sm" id="w" name="whatsapp" value="<?= $kontak['whatsapp']; ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-sm" name="updatekon">update</button>
    <a class="btn btn-primary btn-sm" href="katalog.php">cancel</a>
</form>

<?php
if (isset($_POST['updatekon'])) {
    $conn->query("UPDATE kontak SET
                    instagram = '$_POST[instagram]',
                    line = '$_POST[line]',
                    email = '$_POST[email]',
                    number = '$_POST[number]',
                    whatsapp = '$_POST[whatsapp]'
                    WHERE id_kontak = '$_GET[id]'");
    $_SESSION['message'] = "Data Berhasil Diupdate";
    $_SESSION['msg_type'] = "success";

    echo "<script>location='kontak.php';</script>";
}
?>