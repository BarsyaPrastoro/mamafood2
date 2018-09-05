<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
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
                <?= $sidebar ?>
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h4><span class="glyphicon glyphicon-map-marker">&nbsp;</span>ApplicantReveiwer</h4>
                                    <?= $acc_indicator?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="float:right">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <table class="table table-bordered table-striped" id="myTable">
                                <thead>
                                  <tr>
                                    <th>Nomor Pendaftaran</th>
                                    <th>Nama Pedagang</th>
                                    <th>Status</th>
                                      <th></th>
                                  </tr>
                                </thead>
                                <tbody id="myTable">
                                  <!-- <?php
                                      $query = mysqli_query($conn, $sql);
                                      while ($row = mysqli_fetch_array($query)){  
                                        $id = $row['idPedagang'];
                                        if($row['statusAkun'] == 0) {
                                            $status = "Pending";
                                        } else {
                                            $status= "Accepted";
                                        }
                                        echo'<tr>                                        
                                        <td>'.$row['idPedagang'].'</td>
                                        <td>'.$row['namaUser'].'</td>
                                        <td>'.$status.'</td>
                                        <td><a href="./detail/detail-pengajuanpdg.php?id=' . $id . '">Details</a></td>
                                        </tr>';
                                      }
                                      ?> -->    
                                      <?php foreach($dataPengajuan as $row): ?>
                                        <tr>
                                            <td><?= $row->idUser ?></td>
                                            <td><?= $row->namaUser ?></td>
                                            <td>
                                                <?= ($row->statusAkun == 0)?"Pending":"Accepted" ?>
                                            </td>
                                            <td>
                                                <a href="">
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