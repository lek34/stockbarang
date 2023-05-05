<?php 
      $hak_akses = isset($_SESSION["hak_akses"]) ? $_SESSION["hak_akses"]  : '';
    

if ($hak_akses =='admin') { ?>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-dashboard"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-circle"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                                Stock Barang 
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus-square"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-minus-square"></i></div>
                                Barang Keluar
                            </a>

                            <a class="nav-link" href="supplier.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Supplier
                            </a>
                            
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                </nav>
</div>
<?php
      }
    ?>

