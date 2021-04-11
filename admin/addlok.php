<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';

$select = $conn->query("SELECT * FROM lokasi");
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
    <h3>Tambah Data Lokasi</h3>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="d">Daerah</label>
            <input type="text" class="form-control" id="d" name="daerah">
        </div>
        <div class="form-group">
            <label for="d">Lokasi</label>
            <input type="text" class="form-control" id="d" name="lokasi">
        </div>
        <div class="form-group">
            <label for="d">Upload Gambar</label>
            <input type="file" class="form-control" id="d" name="foto">
        </div>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
    </form>
</div>

<?php
if(isset($_POST['save']))
{
    $daerah = $_POST['daerah'];
    $lokasi = $_POST['lokasi'];
    $foto = upload();
        if ( !$foto){
            return false;
        }
    $conn->query("INSERT INTO lokasi 
                VALUES('', '$daerah', '$lokasi', '$foto')
                ");
    $_SESSION['message'] = "Lokasi Telah Ditambahkan";
    $_SESSION['msg_type'] = "success";
    echo"<script>location='lokasi.php';</script>";
}
function upload() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if( $error === 4 ){
        echo"<script>
                alert('pilih gambar');
            </script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
                alert('Format gambar tidak di dukung');
            </script>";
        return false;
    }
    if( $ukuranFile > 1000000){
        echo"<script>
                alert('Size Gambar Terlalu Besar');
            </script>";
        return false;
    }
    $filebaru = uniqid();
    $filebaru .= '.';
    $filebaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/imglok/' . $filebaru);

    return $filebaru;
}

?>