<!-- <?php
session_start();
include '../../Connect.php'; 
if(isset($_POST['submit'])){            
    $status = $_POST['status'];
    $nama = $_POST['name'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $sqlinsert = "INSERT INTO userperusahaan(`status`,`namaPegawai`,`noTelepon`,`alamat`,`password`)                                               VALUES('$status','$nama','$telepon','$alamat','$password')";
    if(mysqli_query($conn, $sqlinsert)){
        header('Refresh: 0');
    }else{
        echo "data entry failed";
        
        
    }
}


?> -->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
    </head>

    <body>
        <?= $topbar ?>
<!--    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                        <li><a href="../../logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
                    </ul>                    
                    <form class="navbar-form navbar-right" action="#" method="GET">                        
                        <div class="input-group">                            
                            <input type="text" class="form-control" placeholder="Search..." id="myInput" name="search" value="">
                        </div>
                    </form>
                </div>
            </div>
        </nav> -->

        <div id="wrapper" class="">
            <div class="container-fluid">
                <!-- Sidebar -->
                <?= $sidebarAdmin ?>
                <!-- <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <br>
                        </li>
                        <li class="sidebar-brand">
                            <img src="../../asset/gambar/LOGONAMA.png" id="logo" width="175px"> 
                        </li>
                        <li class="active cs">
                            <a href="adm-pegawai.php">Akun Pegawai</a>
                        </li>
                         <li class="cs">
                            <a href="adm-user.php">Akun User</a>
                        </li>
                        <li class="form-inline" style="margin-top:300px; margin-left:40px">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Create Account</button>
                        </li>
                    </ul>
                </div> -->
                <!-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding:10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Create Account</h2>
                            </div>
                        </div>
                        <hr>
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-8" style="border-right:1px solid lightgray">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Posisi</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                                            </span>
                                            <select class="form-control" id="status" name="status">
                                              <option value="1" id="1" name="1">Applicant Reviewer</option>
                                              <option value="2" id="2" name="2">Profitable Measure</option>
                                              <option value="3" id="3" name="3">Customer Service</option>
                                              <option value="4" id="4" name="4">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="text" class="form-control" name="email"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="password"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Telepon</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                            </span>
                                            <input type="text" class="form-control" name="telepon"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Alamat</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                                            </span>
                                            <input type="text" class="form-control" name="alamat"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">                                
                                    <div class="row">
                                        <div class="col-md-12" style="text-align:center">
                                            <div class="form-group">
                                                <input id="submit" name="submit" type="submit" class="btn btn-secondary" value="SUBMIT" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div> -->
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h4><span class="glyphicon glyphicon-map-marker">&nbsp;</span>Admin</h4>
                                    <?= $acc_indicator ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="float:right">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">                                
                              <table class="table table-bordered table-striped table-responsive" id="myTable"
                                     data-toggle="table"
                                     data-search="true"
                                     data-filter-control="true" 
                                     data-show-export="true"
                                     data-click-to-select="true"
                                     data-toolbar="#toolbar">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Jabatan</th>
                                    <th>Nama Pegawai</th>
                                      <th></th>
                                      
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($semuaPegawai as $row): ?>
                                        <tr >                                            
                                            <td><?= $row->idUser ?></td>
                                            <?php $id = $row->idUser ?>
                                            <td><?php if ($row->status == 1) :  ?>
                                                <?php echo "Applicant Reviewer"?>
                                            <?php endif; ?>

                                            <?php if ($row->status == 2) :  ?>
                                                <?php echo "Profitable Measurer"?>
                                            <?php endif; ?>

                                            <?php if ($row->status == 3) :  ?>
                                                <?php echo "Customer Service"?>
                                            <?php endif; ?>

                                            <?php if ($row->status == 4) :  ?>
                                                <?php echo "Admin"?>
                                            <?php endif; ?>
                                            </td>
                                            <td><?= $row->namaPegawai ?></td>                                        
                                            <td>
                                                <a href="/admin/pegawai/detail/<?php echo $id ?>">
                                                    Details
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                
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
