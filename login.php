<?php
require 'function.php';
//cek login terdaftar apa tidak
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $cekdatabase = mysqli_query($conn,"SELECT * FROM login WHERE username='$username'");
    $hitung = mysqli_num_rows($cekdatabase);
    if($hitung>0){
        while($data=mysqli_fetch_assoc($cekdatabase)){
            $hash = hash('sha256',$password);
            if($hash == $data['password']){
                session_start();
                $_SESSION['username'] = $data['username'];
                $_SESSION['id'] = $data['iduser'];
                $_SESSION['log']="True";
                header('location:dashboard.php?alert=1');
            }
            else{
                header('location:login.php?alert=2');
            }
        }
    }else{
        header('location:login.php?alert=2');
    }
    
//cek database
    // $cekdatabase = mysqli_query($conn,"Select * from login where username='$username' and password='$password'");
    // //hitung jumlah data
    // $hitung = mysqli_num_rows($cekdatabase);
    //     if($hitung>0){
    //         while($data=mysqli_fetch_array($cekdatabase)){
    //             session_start();
    //             $_SESSION['username']=$data['username'];
    //             $_SESSION['id']=$data['iduser'];
    //         }
    //         $_SESSION['log']='True';
    //         header('location:dashboard.php?alert=1'); 
    //     }
    //     else{
    //         header('location:login.php?alert=2');
    //     };
};

if(!isset($_SESSION['log'])){

} else {
    $_SESSION['nama']=$cekdatabase['nama'];
    header('location:index.php');
}



?>

<style>
    .bg-utama{
        background-color: #72D08E;
    }
</style>


<!DOCTYPE html>
<html lang="en">
    <?php
    include_once 'layout/head.php'
    ?>
    <body class="bg-utama">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container" style="margin-top: 65px;">
                    
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                            <?php  
                            // fungsi untuk menampilkan pesan
                            // jika alert = "" (kosong)
                            // tampilkan pesan "" (kosong)
                            if (empty($_GET['alert'])) {
                                echo "";
                            } 
                            // jika alert = 1
                            // tampilkan pesan Gagal "Username atau Password salah, cek kembali Username dan Password Anda"
                            elseif ($_GET['alert'] == 2) {
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-times-circle'></i> Gagal Login!</h4>
                                        Username atau Password salah, cek kembali Username dan Password Anda.
                                    </div>";
                            }
                            // jika alert = 2
                            // tampilkan pesan Sukses "Anda telah berhasil logout"
                            elseif ($_GET['alert'] == 3) {
                                
                                echo "<div class='alert alert-success alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                                        Anda telah berhasil logout.
                                    </div>";
                            }
                            ?>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Nama</label>
                                                <input class="form-control py-4" name="username" id="inputUsername" type="text" placeholder="Enter Username"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter Password" />
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button class="btn btn-primary" name="login" >Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
    </body>
</html>
