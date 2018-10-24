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
                        <li><a href="../../login.html"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
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
                <?= $sidebar ?>
                <?php if(isset($dataMenu)): ?>
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4" style="position: fixed; margin-top: 250px;">

                                <form method="post" action="/reviewer/pengajuan-menu/approve/<?php echo $dataMenu['idMenu'];?>">
                                    <div class="form-inline acc">
                                        <input name=accept type="submit" class="btn btn-secondary" value="Accept"/>
                                        <button type="button" class="btn btn-secondary">Decline</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8 menukon">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Menu</label>
                                            <input type="text" class="form-control" id="name" disabled value="<?= $dataMenu['namaMenu']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Harga Menu</label>
                                            <input type="text" class="form-control" id="name" disabled value="<?= $dataMenu['hargaMenu']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Deskripsi</label>
                                            <input type="text" class="form-control" id="name" disabled value="<?= $dataMenu['deskripsiMenu']?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="fotomenudape"src="data:image/jpeg;base64, <?= $dataMenu['fotoMenu'] ?>"
                                            width="300px">
                                    </div>
                                <hr>
                                </div>
                                <?php endif; ?>
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