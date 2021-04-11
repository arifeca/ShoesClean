<?php 
session_start();
require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" type="text/css" href="../assets/style.css" />
        <title> </title>
    </head>
    <body>
        <!-- navs -->
        <div class="navbar">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="index.php">SHOES CLEAN ADMIN</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>

        <!-- MAIN CONTENT -->
        <div class="container login">
            <h4 claas="text-center">Form Masuk Admin</h4>
            <hr />
            <form action="" method="post">
                <div class="from-grup">
                    <label>Username</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Username Admin"
                        name="username"
                    >
                </div>
                <div class="from-grup">
                    <label>Password </label>
                    <input
                        type="Password"
                        class="form-control"
                        placeholder="Password Admin"
                        name="password"
                    >
                </div>
                <br />
                <a class="lost_pass" href="#">forget password?</a>
                <button
                    type="submit"
                    class="btn btn-primary col text-center"
                    name="login"
                >
                    login
                </button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

<?php
    if( isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $ambil = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

        $akunyangcocok = $ambil->num_rows;

        if( $akunyangcocok == 1){

            $akun = $ambil->fetch_assoc();
            $_SESSION["admin"] = $akun;

            echo "<div class='alert alert-info'>Login Berhasil!</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            
        }else{
            echo "<div class='alert alert-danger'>email/password salah!</div>";
            echo "<meta http-equiv='refresh' content='1;url=login_pelanggan.php'>";
        }
    }
?>
