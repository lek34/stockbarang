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
                        <h1 class="mt-4">User Manajemen</h1>
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
                                        User tidak berhasil ditambahkan!!
                                    </div>";
                            }
                            ?>
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus-square"></i> Tambah User
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                $ambilsemuadatalogin = mysqli_query($conn,"SELECT * from login");
                                                while($data=mysqli_fetch_array($ambilsemuadatalogin)){
                                                    $iduser = $data['iduser'];
                                                    $username = $data['username'];
                                                    $nama = $data['nama'];
                                                    $email= $data['email'];
                                                    $password = $data['password']; 
                                                    $status = $data['status'];    
                                            ?>
                                                <tr>
                                                    <td><?=$iduser?></td>
                                                    <td><?=$username?></td>
                                                    <td><?=$nama?></td>
                                                    <td><?=$email?></td>
                                                    <td><?=$password?></td>
                                                    <td><?=$status?></td>
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
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" role="form" name="tambahuser" id="tambahuser">
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
                <br>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
                <br>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control" required>
                <br>
                <input type="text" name="email" id="email" placeholder="Email" class="form-control" required>
                <br>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                <br>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" required>
                <br>
                <select name="status" class="form-control" >
                    <option value="admin">Admin</option>
                    <option value="non">Non Admin</option>
                </select>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="tambahuser" value="Tambah User"></input>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form> 

</html>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript">
    $("#tambahuser").validate({
        rules: {
            username:{
                required: true,
            },
            nama: {
                required: true,
            },
            email:{
                required: true,
            },
            password: {
                required: true,
                minlength: 8
            },
            cpassword: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
        action: "required"
        },
        messages: {
            username:{
                required: "<p style='color:red;'>Please enter your username</p>",
            },
            nama: {
                required: "<p style='color:red;'>Please enter your name</p>",
            },
            email:{
                required: "<p style='color:red;'>Please enter your email</p>"
            },
            password: {
                required: "<p style='color:red;'>Please enter your password</p>",
                minlength: "<p style='color:red;'>Your password must be at least 8 characters</p>"
            },
            cpassword: {
                required: "<p style='color:red;'>Please enter your password</p>",
                minlength: "<p style='color:red;'>Your password must be at least 8 characters</p>",
                equalTo: "<p style='color:red;'>Password didn't match</p>"
            },
            action: "Please provide some data"
        }
    });
</script>
