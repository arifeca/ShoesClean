<?php
session_start();
require_once 'admin/conn.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="homeutama"> -->

    <title> Shoes & Clean</title>
</head>

<body class="mt-10s">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shoes & Clean</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Akun
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if (isset($_SESSION['user'])) : ?>
                                <a class="dropdown-item" href="akun.php">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="riwayat.php">Riwayat Pemesanan</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>

                            <?php else : ?>
                                <a class="dropdown-item" href="login.php">Masuk</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="daftar.php">Daftar</a>
                            <?php endif ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $select = $conn->query("SELECT * FROM orderan WHERE id_orderan = '$_GET[id]'");
    $detail = $select->fetch_assoc();
    ?>
    <div class="container detail">
        <h3>Detail Pemesanan</h3>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $detail['tanggal_order']; ?></td>
                    </tr>
                    <tr>
                        <th>Ukuran Sepatu</th>
                        <td><?= $detail['ukuran_sepatu']; ?></td>
                    </tr>
                    <tr>
                        <th>Treatment</th>
                        <td><?= $detail['treatment']; ?></td>
                    </tr>
                    <tr>
                        <th>harga</th>
                        <td>Rp.<?= number_format($detail['harga']); ?></td>
                    </tr>
                    <tr>
                        <th>alamat</th>
                        <td><?= $detail['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>note tambahan</th>
                        <td><?= $detail['note']; ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="riwayat.php" class="btn btn-primary">Back</a>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>