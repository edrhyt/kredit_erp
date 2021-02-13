<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('admin')?>">TUNAS MITRA SEJAHTERA</a>
            <a class="text-black">
              <h2 class="my-0 text-center"><label id="hours"><?= date('H') ?></label>:<label id="minutes"><?= date('i') ?></label>:<label id="seconds"><?= date('s') ?></label></h2>
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TMS</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">MAIN MENU</li>
              <li class="nav-item dropdown <?php if($drop== 'Penjualan'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i><span>Penjualan</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'Surat Order'){echo'active';}?>"><a class="nav-link" href="<?= base_url('so')?>">Surat Order</a></li>
                  <li class="<?php if($page== 'Survey'){echo'active';}?>"><a class="nav-link" href="<?= base_url('survey')?>">Survey</a></li>
                  <li class="<?php if($page== 'Verifikasi'){echo'active';}?>"><a class="nav-link" href="<?= base_url('delivery')?>">Delivery</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown <?php if($drop== 'Collection'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Collection</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'tagihan'){echo'active';}?>"><a class="nav-link" href="<?= base_url('tagihan')?>">Data Tagihan</a></li>
                  <li class="<?php if($page== 'tagihan_berjalan'){echo'active';}?>"><a class="nav-link" href="<?= base_url('tagihan_berjalan')?>">Tagihan Berjalan</a></li>
                  <li class="<?php if($page== 'tagihan_pending'){echo'active';}?>"><a class="nav-link" href="<?= base_url('tagihan_pending')?>">Tagihan Pending</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown <?php if($drop== 'Inventory'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i><span>Inventory</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'Barang'){echo'active';}?>"><a class="nav-link" href="<?= base_url('barang')?>">Data Barang</a></li>
                  <li class="<?php if($page== 'barang_masuk'){echo'active';}?>"><a class="nav-link" href="<?= base_url('barang_masuk')?>">Barang Masuk</a></li>
                  <li class="<?php if($page== 'barang_keluar'){echo'active';}?>"><a class="nav-link" href="<?= base_url('barang_keluar')?>">Barang Keluar</a></li>
                </ul>
              </li>              
              <li class="nav-item dropdown <?php if($drop== 'Kepegawaian'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-address-card"></i><span>Kepegawaian</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'kepegawaian'){echo'active';}?>"><a class="nav-link" href="<?= base_url('kepegawaian')?>">Data Kepegawaian</a></li>
                  <li class="<?php if($page== 'Absensi'){echo'active';}?>"><a class="nav-link" href="<?= base_url('data_absensi')?>">Absensi</a></li>
                </ul>
              </li>
              <li class="<?php if($page== 'finance'){echo'active';}?>"><a class="nav-link" href="<?= base_url('finance')?>"><i class="fas fa-money-check-alt"></i> <span>Finance</span></a></li>
              <li class="nav-item dropdown <?php if($drop== 'Laporan'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'lap_penjualan'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_penjualan')?>">Penjualan</a></li>
                  <li class="<?php if($page== 'lap_collection'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_collection')?>">Collection</a></li>
                  <li class="<?php if($page== 'lap_inventory'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_inventory')?>">Inventory</a></li>
                  <li class="<?php if($page== 'lap_finance'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_finance')?>">Finance</a></li>
                </ul>
              <li class="menu-header">Akuntansi</li>
              <li class="nav-item dropdown <?php if($drop== 'saldo_awal'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Saldo Awal</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'Saldo_awal'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>">Saldo Awal</a></li>
                  <li class="<?php if($page== 'Saldo_awal_hutang'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>">Saldo Awal Hutang</a></li>
                  <li class="<?php if($page== 'Saldo_awal_piutang'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>">Saldo Awal Piutang</a></li>
                  <li class="<?php if($page== 'Saldo_awal_intentaris'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>">Saldo Awal Inventaris</a></li>
                  <li class="<?php if($page== 'Saldo_awal_persediaan'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>">Saldo Awal Persediaan</a></li>
                </ul>
              <li class="<?php if($page== 'Setup_jurnal'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Setup Jurnal</span></a></li>  
              <li class="nav-item dropdown <?php if($drop== 'utang_dan_piutang'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Utang Dan Piutang</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'Saldo_awal'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>">Utang Usaha</a></li>
                  <li class="<?php if($page== 'Saldo_awal_hutang'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>">Piutang Usaha</a></li>
                </ul>
              </li>
              <li class="<?php if($page== 'Jurnal_umum'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Jurnal Umum</span></a></li>
              <li class="<?php if($page== 'Buku_besar'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Buku Besar</span></a></li> 
              <li class="<?php if($page== 'Neraca_saldo'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Neraca Saldo</span></a></li>
              <li class="<?php if($page== 'Jurnal_penyesuaian'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Jurnal Penyesuaian</span></a></li>
              <li class="<?php if($page== 'Laba_rugi'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Laba Rugi</span></a></li>
              <li class="<?php if($page== 'Perubahan_modal'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Perubahan Modal</span></a></li>
              <li class="<?php if($page== 'Neraca'){echo'active';}?>"><a class="nav-link" href="<?= base_url('#')?>"><i class="far fa-address-card"></i> <span>Neraca</span></a></li>             








              <li class="menu-header">KELOLA USER</li>
              <li class="<?php if($page== 'user'){echo'active';}?>"><a class="nav-link" href="<?= base_url('user')?>"><i class="fas fa-user-cog"></i> <span>User</span></a></li>
            <!--   <li class="menu-header">Laporan</li>
              <li class="<?php if($page== 'lhu'){echo'active';}?>"><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Laporan Hasil Uji</span></a></li>
               -->
        </aside>
      </div>
<script>
    var hoursLabel = document.getElementById("hours");
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    setInterval(setTime, 1000);

    function setTime() {
        secondsLabel.innerHTML = pad(Math.floor(new Date().getSeconds()));
        minutesLabel.innerHTML = pad(Math.floor(new Date().getMinutes()));
        hoursLabel.innerHTML = pad(Math.floor(new Date().getHours()));
    }

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }

    <?php if(@$this->session->absen_needed): ?>
        var absenNeeded = '<?= json_encode($this->session->absen_needed) ?>';
        <?php $this->session->sess_unset('absen_needed') ?>
    <?php endif; ?>
</script>