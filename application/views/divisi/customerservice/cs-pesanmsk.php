<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
</head>
<body>
    
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding:10px;">
            <?= $modalpesan?>
        </div>
    </div>
</div>

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
        </nav> -->

        <div id="wrapper" class="">
            <div class="container-fluid">
                <?= $sidebarCS ?>
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
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Tanggal</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($mail as $row): ?>
                                    <?php $idPesan = $row->idPesan ?>
                                    <tr>
                                        <td><?=  $row->namaUser ?></td>
                                        <td>
                                            <?php if ($row->role == 0) :  ?>
                                                <?php echo "Pembeli"?>
                                            <?php endif; ?>

                                            <?php if ($row->role == 1) :  ?>
                                                <?php echo "Pedagang"?>
                                            <?php endif; ?>

                                        </td>
                                        <td><?=  $row->tanggal ?></td>
                                        <td><a href="/cs/pesanmasuk/detail/<?php echo $idPesan ?>" data-toogle = "modal">Detail</a></td>
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
