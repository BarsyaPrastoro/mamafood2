<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <br>
        </li>
        <li class="sidebar-brand">
            <img width="175px" src="<?php echo base_url() . 'public/images/LOGONAMA.png'; ?>" /> 
        </li>
        <li class="<?= ($nama_hal == 'pengajuan-pedagang')?'active':'' ?> cs">
            <a href="/reviewer/pengajuan">Pengajuan Pedagang</a>
        </li>
         <li class="<?= ($nama_hal == 'reviewer-pedagang')?'active':'' ?> cs">
            <a href="/reviewer/pedagang">Data Pedagang</a>
        </li>                
        <li class="<?= ($nama_hal == 'reviewer-pelanggan')?'active':'' ?> cs">
            <a href="/reviewer/pelanggan">Data Pelanggan</a>
        </li>
        <li class="<?= ($nama_hal == 'konfirmasi-menu')?'active':'' ?> cs">
            <a href="/reviewer/pengajuan-menu">Konfirmasi Menu</a>
        </li>
    </ul>
</div>