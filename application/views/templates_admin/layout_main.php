<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/all.css')?>" >
  <link rel="stylesheet" href="<?= base_url('assets/new/css/mystyle.css')?>" >

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/new/plugin/datatable/dataTables.bootstrap4.min.css')?>">
 

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/style.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/components.css')?>">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      
      <!-- Header Navigation -->
        <?php  $this->load->view('templates_admin/layout_nav_header'); ?>
      <!-- End Header Navigation  -->
      
      <!-- Sidebar Navigation -->
        <?php  $this->load->view('templates_admin/layout_nav_sidebar'); ?>
      <!-- End Sidebar Navigation -->
     
      <!-- Main Content -->
      <div class="main-content">
       
          <?php echo $contents; ?>
          
      </div>
      
      <!-- <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer> -->
    </div>
  </div>
 

  <!-- General JS Scripts -->
  <script src="<?= base_url('assets/new/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/popper.min.js')?>" ></script>
  <script src="<?= base_url('assets/new/js/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/jquery.nicescroll.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/moment.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/stisla.js')?>"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url('assets/new/plugin/datatable/jquery.dataTables.min.js')?>"></script>
  <script src="<?= base_url('assets/new/plugin/datatable/dataTables.bootstrap4.min.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('assets/new/js/scripts.js')?>"></script>
  <script src="<?= base_url('assets/new/js/custom.js')?>"></script>