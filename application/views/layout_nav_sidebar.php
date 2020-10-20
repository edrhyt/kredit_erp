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
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i><span>Penjualan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('penjualan/surat_order')?>">Surat Order</a></li>
                  <li><a class="nav-link" href="<?= base_url('penjualan/survey')?>">Survey</a></li>
                  <li><a class="nav-link" href="<?= base_url('penjualan/verifikasi')?>">Verifikasi</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Collection</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('collection/pelanggan')?>">Data Pelanggan</a></li>
                  <li><a class="nav-link" href="<?= base_url('collection/return_barang')?>">Return Barang</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i><span>Inventory</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('inventory')?>">Data Barang</a></li>
                  <li><a class="nav-link" href="<?= base_url('collection/barang_masuk')?>">Barang Masuk</a></li>
                  <li><a class="nav-link" href="<?= base_url('collection/barang_keluar')?>">Barang Keluar</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('kepegawaian')?>"><i class="far fa-address-card"></i> <span>Kepegawaian</span></a></li>
              <li class="menu-header">KELOLA USER</li>
              <li><a class="nav-link" href="<?= base_url('user')?>"><i class="fas fa-user-cog"></i> <span>User</span></a></li>
            <!--   <li class="menu-header">Laporan</li>
              <li class="<?php if($page== 'lhu'){echo'active';}?>"><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Laporan Hasil Uji</span></a></li>
               -->
        </aside>
      </div>