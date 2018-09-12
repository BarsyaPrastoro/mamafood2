<html>
    <head>
        <!-- <link rel="stylesheet" href="../../asset/css/style.css"> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
        
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
                <?= $sidebarPM ?>
                <!-- <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <br>
                        </li>
                        <li class="sidebar-brand">
                            <img src="../../asset/gambar/LOGONAMA.png" id="logo" width="175px"> 
                        </li>
                        <li class="cs">
                            <a href="pm-transaksipdgpbl.php">Transaksi Pedagang & Pembeli</a>
                        </li>
                         <li class="cs">
                            <a href="pm-laporankeuangan.php">Laporan Keuangan</a>
                        </li>                
                        <li class="cs">
                            <a href="pm-laporanbelisaldo.php">Laporan Pembelian Saldo</a>
                        </li>
                        <li class="active cs">
                            <a href="pm-laporanbelipromo.php">Laporan Pembelian Promo</a>
                        </li>
                        <li class="cs">
                            <a href="pm-laporanwithdraw.php">Laporan Withdraw</a>
                        </li>
                    </ul>
                </div> -->
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h4><span class="glyphicon glyphicon-map-marker">&nbsp;</span>Profitable Measurer</h4>
                                    <h4><span class="glyphicon glyphicon-user">&nbsp;</span><i><?php echo ''.$_SESSION['username'];?></i></h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Pilih Tanggal</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">                                
                              <table class="table table-bordered table-striped" id="myTable">
                                <thead>
                                  <tr>
                                    <th>No Transaksi</th>
                                    <th>Nama Pembeli</th>
                                      <th>Tanggal/Waktu</th>
                                      <th>Top-Up</th>
                                  </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td>a213</td>
                                        <td>Melly</td>
                                        <td>20-12-2017</td>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <td>a213</td>
                                        <td>Melly</td>
                                        <td>20-12-2017</td>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <td>a213</td>
                                        <td>Melly</td>
                                        <td>20-12-2017</td>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <td>a213</td>
                                        <td>Melly</td>
                                        <td>20-12-2017</td>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <td>a213</td>
                                        <td>Melly</td>
                                        <td>20-12-2017</td>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <td>a213</td>
                                        <td>Melly</td>
                                        <td>20-12-2017</td>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <td>a213</td>
                                        <td>Melly</td>
                                        <td>20-12-2017</td>
                                        <td>200.000</td>
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
            
            
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
            
            
        </script>
    </body>
</html>