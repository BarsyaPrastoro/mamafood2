
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <br>
        </li>
        <li class="sidebar-brand">
            <img width="175px" src="<?php echo base_url() . 'public/images/LOGONAMA.png'; ?>" /> 
        </li>
        <li class=" <?= ($nama_hal == 'pm-transaksipdgpbl')?'active':'' ?> cs">
            <a href="/pm/transaksipedagang">Transaksi Pedagang & Pembeli</a>
        </li>
         <li class="<?= ($nama_hal == 'pm-laporankeuangan')?'active':'' ?> cs">
            <a href="/pm/laporankeuangan">Laporan Keuangan</a>
        </li>                
        <li class="<?= ($nama_hal == 'pm-laporanbelisaldo')?'active':'' ?> cs">
            <a href="/pm/laporanbelisaldo">Laporan Pembelian Saldo</a>
        </li>
        <li class="<?= ($nama_hal == 'pm-laporanbelipromo')?'active':'' ?> cs">
            <a href="/pm/laporanbelipromo">Laporan Pembelian Promo</a>
        </li>
        <li class="<?= ($nama_hal == 'pm-laporanwithdraw')?'active':'' ?> cs">
            <a href="/pm/laporanwithdraw">Laporan Withdraw</a>
        </li>
    </ul>
</div>