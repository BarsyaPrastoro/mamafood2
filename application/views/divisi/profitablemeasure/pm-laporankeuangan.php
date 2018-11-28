<html>
<head>
    /<link rel="stylesheet" href="../../asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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
            <!-- Sidebar -->

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <h4><span class="glyphicon glyphicon-map-marker">&nbsp;</span>Profitable Measurer</h4>
                                <?= $acc_indicator ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <h2><strong>TOTAL PENDAPATAN:   <?= $totalall ?></strong></h2>    
                            </div>
                        
                        <div class="col-lg-2">
                            <form method="post" action="/pm/laporankeuangan/gantipersentase">
                                <label>Persentase</label>
                                <div class="input-group ">
                                    <input id="Persentase" name="persentase" type="text"
                                    class="form-control" value="<?= $persentase ?>" ></input> <span
                                    class="input-group-addon"> <span
                                    class="fa fa-percent"></span>
                                </span>
                                <button class="btn btn-secondary" >Ganti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6"> 
                <div  style="border: 1px solid black; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
                    <h5><strong>TOTAL PENDAPATAN TRANSAKSI JUAL BELI:   <?= $total ?></strong></h5>

                </div>                               
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th>Jenis Transaksi</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>

                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach($keuntunganjual as $row): ?>

                        <tr>
                            <td><?php if ($row->kategori == 0) :  ?>
                            <?php echo "Transaksi Penjualan Makanan"?>
                        <?php endif; ?>
                        <?php if ($row->kategori == 1) :  ?>
                            <?php echo "Transaksi Beli Saldo"?>
                        <?php endif; ?>
                    </td>
                    <td><?=$row->tanggal ?></td>
                    <td><?=$row->jumlah?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-6">
        <div  style="border: 1px solid black; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
            <h5><strong>TOTAL PENDAPATAN TOPUP SALDO: <?= $totalsatu ?></strong></h5>

        </div>                                
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
              <tr>
                <th>Jenis Transaksi</th>
                <th>Tanggal</th>
                <th>Jumlah</th>

            </tr>
        </thead>
        <tbody id="myTable">
            <?php foreach($keuntungansaldo as $row): ?>

                <tr>
                    <td><?php if ($row->kategori == 0) :  ?>
                    <?php echo "Transaksi Penjualan Makanan"?>
                <?php endif; ?>
                <?php if ($row->kategori == 1) :  ?>
                    <?php echo "Transaksi Beli Saldo"?>
                <?php endif; ?>
            </td>
            <td><?=$row->tanggal ?></td>
            <td><?=$row->jumlah?></td>

        </tr>
    <?php endforeach; ?>
</tbody>
</table>
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




    $(document).ready(function() {
        $('.input-daterange input').each(function() {
            $(this).datepicker();
        });
    });


    

</script>
</body>
</html>