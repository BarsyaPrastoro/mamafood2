<html>
    <head>
        /<link rel="stylesheet" href="../../asset/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                                    <label>Pilih Rentang Tanggal</label>
                                    <div class="input-group input-daterange">
                                        <input id="startDate1" name="startDate1" type="text"
                                            class="form-control" readonly="readonly"> <span
                                            class="input-group-addon"> <span
                                            class="glyphicon glyphicon-calendar"></span>
                                        </span> <span class="input-group-addon">to</span> <input id="endDate1"
                                            name="endDate1" type="text" class="form-control" readonly="readonly">
                                        <span class="input-group-addon"> <span
                                            class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <canvas id="line-chart" width="800" height="380">
                                </canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">                                
                              
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
            
            
            
            
            $(document).ready(function() {
                $('.input-daterange input').each(function() {
                    $(this).datepicker();
                });
            });
            
            
            
            
            new Chart(document.getElementById("line-chart"), {
              type: 'line',
              data: {
                labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
                datasets: [{ 
                    data: [86,114,106,106,107,111,133,221,783,2478],
                    label: "Saldo",
                    borderColor: "#3e95cd",
                    fill: false
                  }, { 
                    data: [282,350,411,502,635,809,947,1402,3700,5267],
                    label: "Promo",
                    borderColor: "#8e5ea2",
                    fill: false
                  }, { 
                    data: [168,170,178,190,203,276,408,547,675,734],
                    label: "Withdraw",
                    borderColor: "#3cba9f",
                    fill: false
                  }
                ]
              },
              options: {
                title: {
                  display: true,
                  text: 'Laporan Keuangan'
                }
              }
            });
            
        </script>
    </body>
</html>