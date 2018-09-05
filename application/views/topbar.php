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
                <li><!-- <a href="../../login.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a> -->
                    <form class="form" method="post" action="../logout" >
                        <button  name="logout" type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </li>
            </ul>                    
            <form class="navbar-form navbar-right" action="#" method="GET">                        
                <div class="input-group">                            
                    <input type="text" class="form-control" placeholder="Search..." id="myInput" name="search" value="">
                </div>
            </form>
        </div>
    </div>
</nav>