<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';

$select = $conn->query("SELECT * FROM lokasi WHERE id_lokasi = '$_GET[id]'");
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
    <form method="post" enctype="multipart/form-data">
        <div class="media">
            <img src="../assets/imglok/<?= $lokasi['foto'];?>" class="mr-3" alt="...">
            <div class="media-body mb-4">
                <input class="form-control form-control-sm" type="file" name="foto">
                <h5 class="mt-3">
                    <input class="form-control form-control-sm" type="text" value="<?= $lokasi['daerah'];?>" name="daerah"></h5>
                    <input class="form-control form-control-sm" type="text" value="<?= $lokasi['lokasi'];?>" name="lokasi">
            </div>
        </div>
        <button class="btn btn-primary" name="update" type="submit">Update</button>
        <a class="btn btn-primary" href="lokasi.php">Cancel</a>
    </form>



    <?php 
    if(isset($_POST['update']))
    {
        $foto=$_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];

         if(!empty($lokasifoto))
         {
            move_uploaded_file($lokasifoto, "../assets/imglok/$foto");

            $conn->query("UPDATE lokasi SET 
                        daerah='$_POST[daerah]',
                        lokasi='$_POST[lokasi]',
                        foto = '$foto'
                        WHERE id_lokasi = '$_GET[id]'");
         }else{
            $conn->query("UPDATE lokasi SET 
                        daerah='$_POST[daerah]',
                        lokasi='$_POST[lokasi]'
                        WHERE id_lokasi = '$_GET[id]'");
         }
         $_SESSION['message'] = "Data Lokasi Berhasil Diupdate";
         $_SESSION['msg_type'] = "success";
         echo"<script>location='lokasi.php';</script>";
    }