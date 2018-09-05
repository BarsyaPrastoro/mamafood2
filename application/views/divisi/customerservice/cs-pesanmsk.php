<!-- <!DOCTYPE html>
<?php
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
        <link rel="stylesheet" href="../../asset/css/style.css">
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
                        <li><a href="../../login.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
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
                <!-- <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <br>
                        </li>
                        <li class="sidebar-brand">
                            <img src="../../asset/gambar/LOGONAMA.png" id="logo" width="175px"> 
                        </li>
                        <li class="active cs">
                            <a href="cs-pesanmsk.php">Pesan Masuk</a>
                        </li>
                         <li class="cs">
                            <a href="cs-pesantkm.php">Pesan Terkirim</a>
                        </li>
                    </ul>
                </div> -->
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h4><span class="glyphicon glyphicon-map-marker">&nbsp;</span>Customer Service</h4>
                                    <h4><span class="glyphicon glyphicon-user">&nbsp;</span><i><?php echo ''.$_SESSION['username'];?></i></h4>
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
                                    <th>Nama</th>
                                    <th>Pesan</th>
                                    <th>Status</th>
                                      <th></th>
                                      
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>juan</td>
                                        <td>Haruskah ku ganti akun</td>
                                        <td>Pedagang</td>
                                        <td><a href="detail/detail-pesanmsk.php">Details</a></td>
                                    </tr>
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
