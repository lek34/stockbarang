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
                        <h1 class="mt-4">History Item</h1>
                        <br>
                        <?php
                            $ambilnamabarang = mysqli_query($conn,"SELECT * FROM stock WHERE idbarang = $_GET[id]");
                            $data  = mysqli_fetch_assoc($ambilnamabarang);
                            $namabarang = $data['namabarang'];
                        ?>
                        <h3><?=$namabarang?></h3>
                        <div class="card mb-4">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Departemen</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Sisa</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        <?php
                                        $id = $_GET['id'];
                                        $sisa = 0;
                                        $ambilsemuadatastock = mysqli_query($conn,"SELECT * 
                                                                                        , (select sum(quantity) from qstock where idbarang = qstock.idbarang) as jumlah  
                                                                                        FROM qstock
                                                                                        where idbarang = $id order by tanggal");
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $tanggal = $data['tanggal'];
                                            $jenis = $data['jenis'];
                                            $masuk =0; $keluar=0;
                                            if($jenis=="masuk"){
                                              $ambildatasupplier = mysqli_query($conn,"SELECT * FROM supplier p,qstock r WHERE p.idsup = r.supplier");
                                                $datasup = mysqli_fetch_array($ambildatasupplier);
                                                $departemen = $datasup['namasup'];
                                                $masuk = $data['quantity'];
                                            }
                                            if($jenis=="keluar"){
                                                $departemen = $data['supplier'];
                                                $keluar = $data['quantity']*-1;
                                            }
                                            $sisa = $sisa + $masuk - $keluar;  
                                            echo"
                                                <tr>
                                                    <td>$tanggal</td>
                                                    <td>$departemen</td>
                                                    <td>$masuk</td>
                                                    <td>$keluar</td>
                                                    <td>$sisa</td>
                                                </tr>";
                                                }
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
                <label>Stock</label>
                <input type="number" name="stock" placeholder="Stock" class="form-control" required>
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
