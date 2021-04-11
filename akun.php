<?php
session_start();
require_once 'admin/conn.php';


$edt = $_SESSION['user']['id_user'];
$select = $conn->query("SELECT * FROM user WHERE id_user = '$edt'");
$profile = $select->fetch_assoc();
// echo "<pre>";
// print_r($_SESSION);
// echo"</pre>";
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/style.css">
  <title> </title>
</head>

<body>

  <div class="navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Sneakers Rescue</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </div>


  <div class="container akun">
    <h4 claas="text-center">Pengaturan Akun</h4>
    <hr>
    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nama Depan</label>
          <input type="text" class="form-control" id="inputnamad" placeholder="Nama Depan" name="nama_depan" value="<?= $profile['nama_depan']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nama Belakang</label>
          <input type="text" class="form-control" id="inputnamab" placeholder="Nama Belakang" name="nama_belakang" value="<?= $profile['nama_belakang']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?= $profile['email']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="pswrd">Password <i class="far fa-eye" onclick="show()"></i></label>
          <input type="password" class="form-control" id="pswrd" placeholder="Password" name="password" value="<?= $profile['password']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputAddress">Alamat Lengkap </label>
          <input type="text" class="form-control" id="inputAddress" placeholder="ex: Jl. Raya " value="<?= $profile['alamat']; ?>" name="alamat">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity"> Provinsi </label>
          <input type="text" class="form-control" id="inputProv" placeholder="ex: DKI Jakarta" name="provinsi" value="<?= $profile['provinsi']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">Kota</label>
          <input type="text" class="form-control" id="inputKota" placeholder="ex: Jakarta" name="kota" value="<?= $profile['kota']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="inputZip">Kode Pos </label>
          <input type="number" class="form-control" id="inputCode" placeholder="ex: 12345" name="kode_pos" value="<?= $profile['kode_pos']; ?>">
        </div>
        <button type="submit" class="btn btn-primary col text-center" name="akun">Save</button>
    </form>
  </div>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
      Tawk_LoadStart = new Date();
    (function() {
      var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/5f09c0465b59f94722ba88eb/default';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!--End of Tawk.to Script-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    function show() {
      var pswrd = document.getElementById('pswrd');
      var icon = document.querySelector('.fas');
      if (pswrd.type === "password") {
        pswrd.type = "text";
      } else {
        pswrd.type = "password";
        icon.style.color = "grey";
      }
    }
  </script>
</body>

</html>

<?php
if (isset($_POST['akun'])) {
  $ubah = $_SESSION['user']['id_user'];

  $nama_depan = $_POST['nama_depan'];
  $nama_belakang = $_POST['nama_belakang'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $provinsi = $_POST['provinsi'];
  $kota = $_POST['kota'];
  $kode_pos = $_POST['kode_pos'];

  $ubahprof = ("UPDATE user SET 
                    nama_depan = '$nama_depan',
                    nama_belakang = '$nama_belakang',
                    email = '$email',
                    password = '$password',
                    alamat = '$alamat',
                    provinsi = '$provinsi',
                    kota = '$kota',
                    kode_pos = '$kode_pos'
                    WHERE id_user = '$ubah'");
  $query_run = mysqli_query($conn, $ubahprof);
  if ($query_run) {
    $_SESSION['message'] = "Akun Berhasil Diupdate";
    $_SESSION['msg_type'] = "success";
    echo "<script>location='index.php';</script>";
  } else {
    $_SESSION['message'] = "Akun gagal Diupdate";
    $_SESSION['msg_type'] = "danger";
    echo "<script>location='akun.php';</script>";
  }
}

?>