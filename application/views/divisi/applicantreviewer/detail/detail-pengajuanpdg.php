<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <?= $topbar ?>
       <!--  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
    -->
    <div id="wrapper" class="">
        <div class="container-fluid">
            <!-- Sidebar -->
            <?= $sidebar ?>
                <!-- <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <br>
                        </li>
                        <li class="sidebar-brand">
                            <img src="../../../asset/gambar/LOGONAMA.png" id="logo" width="175px"> 
                        </li>
                        <li class="active cs">
                            <a href="../apr-pengajuanpdg.php">Pengajuan Pedagang</a>
                        </li>
                         <li class="cs">
                            <a href="../apr-datapdg.php">Data Pedagang</a>
                        </li>                
                        <li class="cs">
                            <a href="../apr-dataplg.php">Data Pelanggan</a>
                        </li>
                        <li class="cs">
                            <a href="../apr-konfirm.php">Konfirmasi Menu</a>
                        </li>
                    </ul>
                </div> -->
                <?php if(isset($dataPedagang) && isset($dataMenuPedagang)): ?>
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4" style="position: fixed">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input type="text" class="form-control" id="name" disabled value="<?= $dataPedagang['namaUser']?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" disabled value="<?=$dataPedagang['emailUser']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Telepon</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                            </span>
                            <input type="email" class="form-control" id="email" disabled value="<?=$dataPedagang['noTelpon']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                        </span>
                        <input type="email" class="form-control" id="email" disabled value="<?=$dataPedagang['Alamat']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Nomor KTP</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span>
                    </span>
                    <input type="email" class="form-control" id="email" disabled value="<?=$dataPedagang['FotoKtp']; ?>" />
                </div>
            </div>
            <!-- div class="form-group">
                <label for="name">KTP</label>
                <div style="text-align: center">
                    <img class="fotoktppepe" src="data:image/jpeg;base64,<?= base64_encode( $dataPedagang['FotoKtp'] )?>">
                </div>
            </div> -->
            <form method="post" action="/reviewer/pengajuan/detail/approve/<?= $dataPedagang['idPedagang'];?>">
                <div class="form-inline acc">
                    <input name=accept type="submit" class="btn btn-secondary" value="Accept"/>
                    <button type="button" class="btn btn-secondary">Decline</button>
                </div>
            </form>
        </div>
    </div>

<?php endif; ?>
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