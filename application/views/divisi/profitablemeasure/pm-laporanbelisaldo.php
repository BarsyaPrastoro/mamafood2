<html>
<head>
    <!-- <link rel="stylesheet" href="../../asset/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    
    
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
    <?= $topbar ?>
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
    -->
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
                        <li class="active cs">
                            <a href="pm-laporanbelisaldo.php">Laporan Pembelian Saldo</a>
                        </li>
                        <li class="cs">
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
                                    <?= $acc_indicator ?>
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
                              <table class="table table-bordered" id="myTable">
                                <thead>
                                  <tr>
                                    <th>No Transaksi</th>
                                    <th>Top-Up</th>
                                    <th>Tanggal/Waktu</th>
                                    <th>Nama Pembeli</th>
                                    
                                    <th>Bukti Transfer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php foreach($semuaPembelian as $row): ?>
                                    <?php $id = $row->id_topup ?>
                                    <tr data-toggle="modal" data-target="#modal<?php echo($id)  ?>">
                                        <td><?=$row->id_topup?></td>
                                        <td><?=$row->jumlah_topup ?></td>
                                        <td><?=$row->tanggal ?></td>
                                        <td><?=$row->namaUser ?></td>
                                        <td>
                                            Foto
                                        </td>
                                        <td><?=$row->status_approval ?></td>

                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?php echo($id) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                                            <div class="col-md-5">
                                                <img class="fotoktpdape" src= "data:image/jpeg;base64, <?= $row->bukti_transfer?>">
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form  method="post" action="/pm/laporanbelisaldo/approve/<?php echo($id)?>">
                                                <input type="submit" name="submit" class="btn btn-secondary" value="SUBMIT">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    


    $(function () {
        $('#datetimepicker1').datetimepicker();
    });


    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')

  })

    
    
    
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
    
    
    
</script>
</body>
</html>