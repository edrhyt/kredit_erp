<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('admin')?>">TUNAS MITRA SEJAHTERA</a>
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
              <li class="<?php if($page== 'kepegawaian'){echo'active';}?>"><a class="nav-link" href="<?= base_url('kepegawaian')?>"><i class="far fa-address-card"></i> <span>Kepegawaian</span></a></li>
              <li class="<?php if($page== 'finance'){echo'active';}?>"><a class="nav-link" href="<?= base_url('finance')?>"><i class="fas fa-money-check-alt"></i> <span>Finance</span></a></li>
              <li class="nav-item dropdown <?php if($drop== 'Laporan'){echo'active';}?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($page== 'lap_penjualan'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_penjualan')?>">Penjualan</a></li>
                  <li class="<?php if($page== 'lap_collection'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_collection')?>">Collection</a></li>
                  <li class="<?php if($page== 'lap_inventory'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_inventory')?>">Inventory</a></li>
                  <li class="<?php if($page== 'lap_finance'){echo'active';}?>"><a class="nav-link" href="<?= base_url('laporan_finance')?>">Finance</a></li>
                </ul>
              </li>
              <li class="menu-header">KELOLA USER</li>
              <li class="<?php if($page== 'user'){echo'active';}?>"><a class="nav-link" href="<?= base_url('user')?>"><i class="fas fa-user-cog"></i> <span>User</span></a></li>
            <!--   <li class="menu-header">Laporan</li>
              <li class="<?php if($page== 'lhu'){echo'active';}?>"><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Laporan Hasil Uji</span></a></li>
               -->
        </aside>
      </div>
