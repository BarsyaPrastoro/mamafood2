 <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <br>
        </li>
        <li class="sidebar-brand">
            <img width="175px" src="<?php echo base_url() . 'public/images/LOGONAMA.png'; ?>" /> 
        </li>
        <li class="<?= ($nama_hal == 'pesan-msk')?'active':'' ?> cs">
            <a href="/cs/pesanmasuk">Pesan Masuk</a>
        </li>
        <!-- <li class="active cs">
            <a href="cs-pesanmsk.php">Pesan Masuk</a>
        </li> -->
        <li class="<?= ($nama_hal == 'pesan-tkm')?'active':'' ?> cs">
            <a href="/cs/pesanterkirim">Pesan Terkirim</a>
        </li>
        <!-- <li class="cs">
            <a href="cs-pesantkm.php">Pesan Terkirim</a>
        </li> -->
    </ul>
    <form class="navbar-form navbar-right" action="#" method="GET">                        
        <div class="input-group">                            
            <input type="text" class="form-control" placeholder="Search..." id="myInput" name="search" value="">
        </div>
    </form>
</div> 