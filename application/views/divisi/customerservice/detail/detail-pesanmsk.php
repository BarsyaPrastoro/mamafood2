<!DOCTYPE html>
<?php
session_start();
include '../../../Connect.php'; 
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
                        <li class="active cs">
                            <a href="../cs-pesanmsk.php">Pesan Masuk</a>
                        </li>
                         <li class="cs">
                            <a href="../cs-pesantkm.php">Pesan Terkirim</a>
                        </li>
                    </ul>
                </div>
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-inline">
                                    <img class="img-circle" src="../../../asset/gambar/printilan/lili.jpg" width="75px">
                                    <label>Kakak</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="float:right">
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">                                
                                <textarea id="txtareapsn" disabled>blakadk adjaskdja jadhjasd ahdjadjk</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit" style="float:right;"><a href="../cs-pesanmsk.php"></a>Kembali</button>
                            </div>
                            <div class="col-lg-6" >
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Balas</button>
                                <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Untuk:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                          </div>
                                          <div class="form-group">
                                            <label for="message-text" class="col-form-label">Pesan:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                          </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-primary">Kirim</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
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
