<?php
require_once 'conn.php';
require_once 'main.php';
require_once 'foot.php';
$select = $conn->query("SELECT * FROM about");
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
    <?php
    if(isset($_SESSION['message'])): ?>

    <div data-dismiss="alert" aria-label="Close" class="alert alert-<?= $_SESSION['msg_type']; ?>">


    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
    </div>
    <?php endif; ?>
    <h3>TENTANG KAMI</h3>
    <div class="line"></div>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <?= $about['about'];?>
                    </td>
                    <td><a href="editabout.php?id=<?= $about['id_about'];?>" class="btn btn-primary">edit</td>
                </tr>
            </tbody>
        </table>
    </div>