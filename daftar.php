<?php
require_once 'admin/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="assets/style.css" />
  <title> </title>
</head>

<body>
  <div class="navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Shoes&Clean</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </div>

  <div class="container daftar">
    <h4 claas="text-center">Pendaftaran Akun</h4>
    <hr />
    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputnamad">Nama Depan</label>
          <input type="text" class="form-control" placeholder="Nama Depan" name="nama_depan" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputNamab">Nama Belakang</label>
          <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" required>
        </div>

        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required />
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Password</label>
          <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required />
        </div>
      </div>
      <!-- <a href="homemasuk.html"></a> -->
      <button type="submit" class="btn btn-primary col text-center" name="daftar">
        Daftar
      </button>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['daftar'])) {
  $nama_depan = $_POST['nama_depan'];
  $nama_belakang = $_POST['nama_belakang'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $select = $conn->query("SELECT * FROM user WHERE email = '$email'");
  $cocok = $select->num_rows;
  if ($cocok == 1) {
    echo "<script>alert('email udah ads');
    document.location.href='daftar.php';</script>";
  } else {
    $conn->query("INSERT INTO user(id_user, nama_depan, nama_belakang, email, password) 
              VALUES('', '$nama_depan', '$nama_belakang', '$email', '$password' )");


    echo "<script>alert('daftar sukses');
  document.location.href='index.php';</script>";
  }
}
?>