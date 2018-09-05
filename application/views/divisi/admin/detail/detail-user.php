<!DOCTYPE html>
<?php

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
                        <li><a href="../../../login.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
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
                        <li class="cs">
                            <a href="../adm-pegawai.php">Akun Pegawai</a>
                        </li>
                         <li class="active cs">
                            <a href="../adm-user.php">Akun User</a>
                        </li>
                        <li class="form-inline" style="margin-top:300px; margin-left:40px">
                            <button type="button" class="btn btn-secondary">Delete Account</button>
                        </li>
                    </ul>
                </div>
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Barsya</label>
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
                                        <input type="text" class="form-control" id="name" disabled value="<?= $row['namaUser']?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">ID</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span>
                                        </span>
                                        <input type="text" class="form-control" id="email" disabled value="<?=$row['emailUser']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                        </span>
                                        <input type="email" class="form-control" id="email" disabled value="<?=$row['noTelpon']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                                        </span>
                                        <input type="text" class="form-control" id="email" disabled value="<?=$row['Alamat']; ?>" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label for="email">Telepon</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                        </span>
                                        <input type="email" class="form-control" id="email" disabled value="<?=$row['noTelpon']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                                        </span>
                                        <textarea class="form-control" rows="8" id="comment"></textarea>
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