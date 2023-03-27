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
                        <h1 class="mt-4">Supplier</h1>
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
                                        Supplier berhasil ditambahkan !
                                    </div>";
                            }
                            elseif ($_GET['alert'] == 2) {
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-times-circle'></i> Gagal !</h4>
                                        Supplier Gagal Ditambahkan !
                                    </div>";
                            }
                            elseif ($_GET['alert'] == 3) {
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-times-circle'></i> Sukses!</h4>
                                        Supplier Berhasil Diupdate !
                                    </div>";
                            }
                            elseif ($_GET['alert'] == 4) {
                              echo "<div class='alert alert-danger alert-dismissable'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <h4>  <i class='icon fa fa-times-circle'></i> Sukses!/h4>
                                      Supplier Berhasil Dihapus !
                                  </div>";
                          }
                            ?>
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus-square"></i> Tambah Supplier
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama Supplier</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambildatasupplier = mysqli_query($conn,"SELECT * FROM supplier");
                                                while($data=mysqli_fetch_array($ambildatasupplier)){
                                                    $idsup = $data['idsup'];
                                                    $namasupplier = $data['namasup'];
                                                    $alamat = $data['alamat'];
                                                    $notelp = $data['notelp'];    
                                            ?>
                                                <tr>
                                                    
                                                    <td><?=$namasupplier?></td>
                                                    <td><?=$alamat?></td>
                                                    <td><?=$notelp?></td>
                                                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idsup;?>">Edit</button>
                                                    
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idsup;?>">Delete</button></td>
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
          <h4 class="modal-title">Tambah Supplier</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form method="post">
                <input type="text" name="namasupplier" placeholder="Nama Supplier" class="form-control" required>
                <br>
                <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
                <br>
                <input type="text" name="tel" placeholder="Telepon" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary" name="tambahsupplier">Submit</button>
            </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  

        <!-- Edit Modal -->
        <?php
            $ambildatasupplier = mysqli_query($conn,"SELECT * FROM supplier");
            while($data=mysqli_fetch_array($ambildatasupplier)){
                $idsup = $data['idsup'];
                $namasupplier = $data['namasup'];
                $alamat = $data['alamat'];
                $notelp = $data['notelp'];
                 
        ?>
  <div class="modal fade" id="edit<?=$idsup;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Supplier</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form method="post">
                <input type="hidden" name="idupdtsup" value="<?=$idsup?>;">
                <label>Nama Supplier</label>
                <input type="text" name="namasupplier" value="<?=$namasupplier;?>" class="form-control" required>
                <br>
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?=$alamat;?>" class="form-control" required>
                <br>
                <label>No Tel</label>
                <input type="text" name="tel" value="<?=$notelp;?>" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary" name="updsup">Submit</button>
            </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



     <!-- Delete Modal -->
  <div class="modal fade" id="delete<?=$idsup;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form method="post">
                <input type="hidden" name="idupdtsup" value="<?=$idsup?>;">
                Apakah Anda Ingin Menghapus Supplier <?=$namasupplier;?> ?
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="hapussupplier">Yes</button>
            </form> 
           
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>           
  <?php
    }
    ?>
</html>
