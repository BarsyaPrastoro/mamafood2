<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
</head>
<?= $topbar ?>
<div id="wrapper" class="">
    <div class="container-fluid">
        <?= $sidebarCS ?>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h4><span class="glyphicon glyphicon-map-marker">&nbsp;</span>Customer Service</h4>
                            <?= $acc_indicator ?>
                        </div>
                    </div>
                    <?php if(isset($detailMail)):  ?>    

                        <!-- <?php //if(isset($detailMail)): ?> -->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input type="text" class="form-control" name="name" disabled value="<?= $detailMail['namaUser']?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="text" class="form-control" name="email" disabled value="<?= $detailMail['emailUser']?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Telepon</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                            </span>
                            <input type="text" class="form-control" name="telepon" disabled value="<?= $detailMail['noTelpon']?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Isi Pesan</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                        </span>
                        <textarea class="form-control" rows="7" disabled><?= $detailMail['isi']?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- <?php //endif; ?> -->

<?php endif; ?>
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
</html>