<?php
if($this->session->userdata('id_user') == '')  
{
    redirect(base_url().'Authentication/logout');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>TMS - <?php echo $title; ?></title>

  <!-- General CSS Files -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/tms_logo.svg') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/all.css')?>" >
  <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css')?>" >

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/plugin/datatable/dataTables.bootstrap4.min.css')?>">
 

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/components.css')?>">
  <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> -->
</head>

<body>
  <?php  echo $this->session->flashdata('msg'); ?>
  <div id="app">
    <div class="main-wrapper">
      
      <!-- Header Navigation -->
        <?php  $this->load->view('layout_nav_header'); ?>
      <!-- End Header Navigation  -->
      
      <!-- Sidebar Navigation -->
        <?php  $this->load->view('layout_nav_sidebar'); ?>
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
  <script src="<?= base_url('assets/js/jquery-3.5.1.min.js')?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js')?>" ></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets/js/jquery.nicescroll.min.js')?>"></script>
  <script src="<?= base_url('assets/js/moment.min.js')?>"></script>
  <script src="<?= base_url('assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url('assets/plugin/datatable/jquery.dataTables.min.js')?>"></script>
  <script src="<?= base_url('assets/plugin/datatable/dataTables.bootstrap4.min.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('assets/js/scripts.js')?>"></script>
  <script src="<?= base_url('assets/js/custom.js')?>"></script>

  <script>
    $(document).ready(function() {
    
    });
  </script>
</body>
</html>