<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';
$select = $conn->query("SELECT * FROM about WHERE id_about = '$_GET[id]'");
$about = $select->fetch_assoc();

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
            <label for="exampleFormControlTextarea1">Tentang Kami</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="about"><?= $about['about'];?></textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
        <a class="btn btn-primary" href="about.php">Cancel</a>
    </form>



    <?php 
    if(isset($_POST['save']))
    {

        $conn->query("UPDATE about SET about='$_POST[about]' WHERE id_about = '$_GET[id]'");
        $_SESSION['message'] = "Data Berhasil Diupdate";
        $_SESSION['msg_type'] = "success";
        echo"<script>location='about.php';</script>";
    }