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
            include_once  'layout/navbar.php';
            ?>
        <div id="layoutSidenav">
            <?php
            include_once  'layout/sidebar.php';
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Barang Keluar</h1>
                        <?php  
                            // fungsi untuk menampilkan pesan
                            // jika alert = "" (kosong)
                            // tampilkan pesan "" (kosong)
                            if (empty($_GET['alert'])) {
                                echo "";
                            } 
                            elseif ($_GET['alert'] == 1) {
                                echo "<div class='alert alert-success alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                                        Data berhasil ditambahkan !
                                    </div>";
                            }
                            elseif ($_GET['alert'] == 2) {
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-times-circle'></i> Gagal !</h4>
                                        Stok yang ingin ditambahkan tidak mencukupi!!
                                    </div>";
                            }
                            ?>
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus-square"></i> Update Barang Keluar
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Departemen</th>
                                                <th>Kondisi</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                $ambilsemuadatastock = mysqli_query($conn,"SELECT * from keluar m, stock s where s.idbarang = m.idbarang");
                                                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $tanggal = $data['tanggal'];
                                                    $namabarang = $data['namabarang'];
                                                    $deskripsi = $data['penerima'];
                                                    $kondisi = $data['kondisi']; 
                                                    $quantity = $data['quantity'];    
                                            ?>
                                                <tr>
                                                    <td><?=$tanggal?></td>
                                                    <td><?=$namabarang?></td>
                                                    <td><?=$deskripsi?></td>
                                                    <td><?=$quantity?></td>
                                                    <td><?=$kondisi?></td>
                                                </tr>

                                            <?php
                                                };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
          <h4 class="modal-title">Barang Keluar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form method="post">
                <select name="barang" class="form-control">
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
                <input type="text" name="penerima" placeholder="Bagian" class="form-control" required>
                <br>
                <input type="text" name="kondisi" placeholder="Kondisi" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary" name="barangkeluar">Submit</button>
            </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
</html>
