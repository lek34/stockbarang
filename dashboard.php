<?php
require 'config/config.php'
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    include_once 'layout/head.php'
    ?>
    <body class="sb-nav-fixed">
    <?php
    if (isset($_GET['alert']) && $_GET['alert'] == 1) {
    echo "<script>
            const notification = document.createElement('div');
            notification.textContent = 'Login berhasil! Selamat Datang ".$_SESSION['name']."';
            notification.style.cssText = 'position: fixed; top: 0%; right: 38%; padding: 10px;margin-top: 20px; background-color: white; color: green; font-weight: bold; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); z-index: 9999;';
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
          </script>";
}   
    ?>
            <?php
            include_once 'layout/navbar.php';
            ?>
        <div id="layoutSidenav">
        <?php
            include_once  'layout/sidebar.php';
            ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid">
                        <h1 class="mt-4 mb-4">Dashboard</h1>
                        
                        <div class="alert alert-info alert-dismissable mb-4">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p style="font-size:15px">
                                <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['name']; ?></strong> di Website IMS.
                            </p>        
                        </div>
                       
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                    <?php  
                                    // fungsi query untuk menampilkan data dari tabel obat
                                    $query = mysqli_query($conn, "SELECT COUNT(idbarang) as jumlah FROM stock ")
                                                                    or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));
                                    // tampilkan data
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                        Stock Barang <br>
                                        Item : <?php echo $data['jumlah']; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                    <?php  
                                    // fungsi query untuk menampilkan data dari tabel obat
                                    $query = mysqli_query($conn, "SELECT COUNT(idmasuk) as jumlah FROM masuk ")
                                                                    or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));
                                    // tampilkan data
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                        Transaksi Masuk <br>
                                        Jumlah : <?php echo $data['jumlah']; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="masuk.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                    <?php  
                                    // fungsi query untuk menampilkan data dari tabel obat
                                    $query = mysqli_query($conn, "SELECT COUNT(idkeluar) as jumlah FROM keluar ")
                                                                    or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));
                                    // tampilkan data
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                        Transaksi Keluar <br>
                                        Jumlah : <?php echo $data['jumlah']; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="keluar.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                    <?php  
                                    // fungsi query untuk menampilkan data dari tabel obat
                                    $query = mysqli_query($conn, "SELECT COUNT(idsup) as jumlah FROM supplier ")
                                                                    or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));
                                    // tampilkan data
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                        Supplier <br>
                                        Jumlah : <?php echo $data['jumlah']; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="supplier.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php  
                                    // fungsi query untuk menampilkan data dari tabel obat
                                    $query = mysqli_query($conn, "SELECT * from keluar m, stock s where s.idbarang = m.idbarang")
                                                                    or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));
                                    // tampilkan data
                                    $chart_data = "";
                                    while($row = mysqli_fetch_array($query)){
                                    $productname[] = $row['namabarang'];
                                    $sales[] = $row['quantity'];
}
                                    ?>

                        </div>
                </div>
                
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SOPHIA 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        
    </body>
     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Barang Masuk</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form method="post">
                <select name="barangnya" class="form-control">
                    <?php
                        $pilihanbarang = mysqli_query($conn,"select * from stock");
                        while($fetcharray = mysqli_fetch_array($pilihanbarang)){
                            $namabarang = $fetcharray['namabarang'];
                            $idbarang = $fetcharray['idbarang'];
                        
                    ?>
                    <option value="<?=$idbarang;?>"><?=$namabarang;?></option>
                <?php
                    }
                ?>
                </select>
                <br>
                <input type="number" name="qty" placeholder="Quantity" class="form-control" required>
                <br>
                <select name="supplier" class="form-control">
                    <?php
                        $pilihansupplier = mysqli_query($conn,"select * from supplier");
                        while($fetcharray=mysqli_fetch_array($pilihansupplier)){
                         $namasupplier=$fetcharray['namasup'];
                         $idsup=$fetcharray['idsup'];       
                    ?>
                    <option value="<?=$idsup;?>"><?=$namasupplier;?></option>        
                    <?php
                        }
                    ?>
                </select>
                <br>
                <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
            </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
</html>
