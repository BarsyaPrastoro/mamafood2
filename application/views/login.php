<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body class="app">
            <div class="row">
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-5" style="margin-top: 100px">
                    <img width="500px" src="<?php echo base_url() . 'public/images/LOGO.png'; ?>" /> 
                </div>
                <div class="col-md-5" style="margin-top: 200px">
                    <form class="form" method="post" action="/">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                          </div>
                          <button name="login" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </body>
</html>