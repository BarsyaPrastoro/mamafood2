<!DOCTYPE html>
<?php
session_start();
include '../../../Connect.php';
$id = $_GET['id'];
$sqlpegawai = "select * from userperusahaan where idUser=$id";
$resultpegawai = mysqli_query($conn,$sqlpegawai);
$rowpegawai = mysqli_fetch_array($resultpegawai);
if($rowpegawai['status'] == 1) {
    $status = "Applicant Reviewer";
}else if($rowpegawai['status'] == 2) {
    $status= "Profitable Measurer";
}else if($rowpegawai['status'] == 3){
    $status= "Customer Service";
}else if($rowpegawai['status'] == 4){
    $status= "Admin";
}

if(isset($_POST['delete'])){                
    $sqldelete = "DELETE FROM userperusahaan WHERE idUser=$id";
    if(mysqli_query($conn, $sqldelete)){        
        header('location: ../adm-pegawai.php');
    }else{
        echo "data entry failed";                
    }
}
    


    
?>
<html>
    <head>
        <link rel="stylesheet" href="../../../asset/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../../logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="#" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." id="myInput" name="search" value="">
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <div id="wrapper" class="">
            <div class="container-fluid">
                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <br>
                        </li>
                        <li class="sidebar-brand">
                            <img src="../../../asset/gambar/LOGONAMA.png" id="logo" width="175px"> 
                        </li>
                        <li class="active cs">
                            <a href="../adm-pegawai.php">Akun Pegawai</a>
                        </li>
                         <li class="cs">
                            <a href="../adm-user.php">Akun User</a>
                        </li>
                        <li class="form-inline" style="margin-top:300px; margin-left:40px">
                            <button type="button" class="btn btn-secondary">Edit</button>
                            <form method="post">
                                <input name="delete" type="submit" class="btn btn-secondary" value="delete"/>
                            </form>
                        </li>
                    </ul>
                </div>
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img src="../../../asset/gambar/printilan/garyisti.jpg" width="350px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                
                            </div>
                            <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" id="name" disabled value="<?= $rowpegawai['namaPegawai']?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Jabatan</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span>
                                            </span>
                                            <input type="text" class="form-control" id="email" disabled value="<?=$status; ?>" />
                                        </div>
                                    </div>                                
                                    <div class="form-group">
                                        <label for="email">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                                            </span>
                                            <input type="text" class="form-control" id="email" disabled value="<?=$rowpegawai['password']; ?>" />
                                        </div>
                                    </div>                                                                
                            </div>
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label for="email">Telepon</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                        </span>
                                        <input type="email" class="form-control" id="email" disabled value="<?=$rowpegawai['noTelepon']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                                        </span>
                                        <textarea class="form-control" rows="8" id="comment" disabled><?=$rowpegawai['alamat']; ?></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            
            
            $(document).ready(function(){
              $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
        </script>
    </body>
</html>