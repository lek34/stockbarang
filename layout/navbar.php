<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img style="margin-top:-3px;margin-right:20px;width: 40px;height: 40px;" src="assets/img/logo.svg" alt="Logo"> 
                <span style="font-size:20px;font-weight:bold;">IMS</span></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item"   href="#" data-target="#ubahpw" data-toggle="modal"><i class="fa-regular fa-user"></i> Ganti Password</a>
                        <a class="dropdown-item"   href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <div class="modal fade" id="ubahpw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                 <form method="post"  name="ubahpass" id="ubahpass">
                   <input type="hidden" name="iduser" value="<?php echo $_SESSION['id'];?>" > 
                   <label>Ubah Password</label>                               
                    <input type="password" name="password1" id="password1" class="form-control">     
                    <br> 
                    <label>Konfirmasi Password</label>                               
                    <input type="password" name="password2" id="password2" class="form-control">                           
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" style = "float:right;" class="btn btn-primary" name="ubahpw">Yes</button>
                </div>
				
				
                </form>   
            </div>
        </div>
    </div>