<?php
session_start();
require_once 'admin/conn.php';

$id_or = $_GET["id"];
$ambil = $conn->query("SELECT * FROM orderan WHERE id_orderan = '$id_or' ");
$order = $ambil->fetch_assoc();

$data_met = array();
$metod = $conn->query("SELECT * FROM metode");
while ($met = $metod->fetch_assoc()) {
  $data_met[] = $met;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/style.css">

  <title>Pembayaran</title>
</head>

<body class="body-bayar">
  <h1></h1>

  <div class="navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Sneakers Rescue</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
    <div class="container bayar">
      <div class="jumbotron">
        <h1 class="display-4">Metode Pembayaran</h1>

        <form method="post" enctype="multipart/form-data">
          <?php foreach ($data_met as $key => $value) : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="metod" value="<?= $value['metode']; ?>" checked>
              <label class="form-check-label">
                <?= $value['metode']; ?>
              </label>
            </div>
          <?php endforeach ?>
          <div class="alert alert-info"> Bayar Ke No.rek BCA #231312381318 | total tagihan anda <strong>Rp. <?= number_format($order['harga']); ?></div>
          <!-- </div>No.rek BCA #231312381318</p> -->


          #jika anda menggunakan metode pembayaran bayar di tempat kosongkan form bukti transfer
          <hr class="my-4">

          <div class="form-group">
            <label for="exampleFormControlFile1">Masukkan Bukti Transfer</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
          </div>
        </form>
        <button type="submit" class="btn btn-primary btn-lg btn-block" name="bayar">Order</button>
        <a href="ubah.php?id=<?= $order['id_orderan']; ?>" class="btn btn-info btn-lg btn-block">Ubah Pemesanan</a>

      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
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
<?php
// if (isset($_POST['batal']))
// {
//   unset($_SESSION['order']);
//   echo "<script>alert('apakah anda yakin ingin membatalkan pemesanan ini?');</script>";
//   echo "<script>location = 'index.php';</script>";

// }

if (isset($_POST['bayar'])) {
  // $conn->query("SELECT * FROM pembayaran JOIN metode ON pembayaran.metode=metode.metode JOIN orderan ON pembayaran.jumlah=orderan.harga");

  $namabukti = $_FILES['foto']['name'];
  $lokasibukti = $_FILES['foto']['tmp_name'];
  $namafiks = date("YmdHis") . $namabukti;
  move_uploaded_file($lokasibukti, "assets/bukti_pembayaran/$namafiks");

  $metod = $_POST['metod'];
  $jumlah = $order["harga"];
  $tanggal = date("y-m-d");

  $conn->query("INSERT INTO pembayaran VALUES ('', '$id_or', '$metod', '$jumlah', '$tanggal', '$namafiks')");
  $conn->query("UPDATE orderan SET status='sukses' WHERE id_orderan='$id_or'");
  echo "<script> alert('Pembayaran sukses');</script>";
  echo "<script>location='index.php';</script>";
  unset($_SESSION['order']);
}
?>