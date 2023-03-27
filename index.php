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
            include 'layout/navbar.php';
            ?>
        <div id="layoutSidenav">
            <?php
            include 'layout/sidebar.php';
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Stock Item</h1>
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
                                        Item berhasil ditambahkan !
                                    </div>";
                            }
                            elseif ($_GET['alert'] == 2) {
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-times-circle'></i> Gagal!</h4>
                                        Item Gagal Ditambahkan !
                                    </div>";
                            }
                            elseif ($_GET['alert'] == 3) {
                              echo "<div class='alert alert-success alert-dismissable'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                                      Item Berhasil Diupdate !
                                  </div>";
                          }
                          elseif ($_GET['alert'] == 4) {
                            echo "<div class='alert alert-success alert-dismissable'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4> <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                                    Item Berhasil Dihapus !
                                </div>";
                        }
                            ?>
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus-square"></i> Tambah Item
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Deskripsi</th>
                                                <th>Stock</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambilsemuadatastock = mysqli_query($conn,"SELECT * , (select sum(quantity) from qstock where idbarang = stock.idbarang) as jumlah  FROM stock");
                                                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $idbarang = $data['idbarang'];
                                                    $namabarang = $data['namabarang'];
                                                    $deskripsi = $data['deskripsi'];
                                                    $stock = $data['jumlah'];    
                                            ?>
                                                <tr>
                                                    
                                                    <td><?=$namabarang?></td>
                                                    <td><?=$deskripsi?></td>
                                                    <td><?=$stock?></td>
                                                    <td>
                                                    <a href="stokdetail.php?id=<?=$idbarang;?>" class="btn btn-primary">View</a>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idbarang;?>">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idbarang;?>">Delete</button>
                                                    </td>
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
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form method="post">
                <label>Nama Barang</label>
                <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                <br>
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
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
            $ambilsemuadatastock = mysqli_query($conn,"SELECT * FROM stock");
            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                $idbarang = $data['idbarang'];
                $namabarang = $data['namabarang'];
                $deskripsi = $data['deskripsi'];
                 
        ?>
  <div class="modal fade" id="edit<?=$idbarang;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form method="post">
                <input type="hidden" name="idbaranghapus" value="<?=$idbarang?>;">
                <label>Nama Barang</label>
                <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                <br>
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
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
  <div class="modal fade" id="delete<?=$idbarang;?>">
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
                <input type="hidden" name="idb" value="<?=$idbarang?>;">
                Apakah Anda Ingin Menghapus Item <?=$namabarang;?> ?
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="hapusbarang">Yes</button>
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
