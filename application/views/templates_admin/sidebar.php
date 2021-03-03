<body id="page-top">

  <!-- Page Wrapper -->
  <div id="page-warp">

  <div id="wrapper">

    <div id="sidebar">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
                  <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4" href="#">
                          <img class="rounded-circle" src="<?= base_url('assets/img/user.png')?>" alt="" height="80px" width="80px">
                  </a>
                  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-text d-flex align-items-center justify-content-center">Admin</div>
                  </a>
                  
                  <!-- Nav Item - Dashboard -->
                    <li <?= $this->uri->segment(1)=="admin" || $this->uri->segment(1)=='' ? 'class="nav-item active d-flex align-items-center justify-content-center ml-auto"' : ''?> class="nav-item d-flex align-items-center justify-content-center ml-auto">
                      <a class="nav-link klik_menu" href="<?= base_url('admin')?>" id="dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li <?= $this->uri->segment(1)=="penjualan" ? 'class="nav-item active d-flex align-items-center justify-content-center ml-auto"' : ''?> class="nav-item d-flex align-items-center justify-content-center ml-auto">
                      <a class="nav-link klik_menu" href="<?= base_url('penjualan')?>" id="penjualan">
                        <i class="fa fa-book"></i>
                        <span>Penjualan</span>
                      </a>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li <?= $this->uri->segment(1)=="collection" ? 'class="nav-item active d-flex align-items-center justify-content-center ml-auto"' : ''?> class="nav-item d-flex align-items-center justify-content-center ml-auto">
                      <a class="nav-link" href="<?= base_url('collection')?>" >
                        <i class="fa fa-users"></i>
                        <span>Collection</span>
                      </a>
                    </li>

                    <!-- Nav Item - Charts -->
                    <li <?= $this->uri->segment(1)=="inventory" ? 'class="nav-item active d-flex align-items-center justify-content-center ml-auto"' : ''?> class="nav-item d-flex align-items-center justify-content-center ml-auto">
                      <a class="nav-link" href="<?= base_url('inventory')?>">
                        <i class="fa fa-folder"></i>
                        <span>Inventory</span></a>
                    </li>

                    <!-- Nav Item - Tables -->
                    <li <?= $this->uri->segment(1)=="absensi" ? 'class="nav-item active d-flex align-items-center justify-content-center ml-auto"' : ''?> class="nav-item d-flex align-items-center justify-content-center ml-auto">
                      <a class="nav-link" href="<?= base_url('absensi')?>">
                        <i class="fa fa-address-book"></i>
                        <span>Absensi</span></a>
                    </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    </div>

    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-black"><b>Selamat Pagi, </b><?php echo $this->session->userdata('nama_lengkap');?></h1>

          <nav class="navbar navbar-expand-lg main-navbar">
          
          <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo base_url('upload/img/'.$this->session->userdata('img')) ;?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama_lengkap');?></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title"><?php echo $this->session->userdata('hak_akses');?></div>
                <a href="<?php echo base_url('profile');?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile & Settings
                </a>
                <a href="<?php echo base_url('Authentication/logout');?>" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        </div>