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
  <link rel="stylesheet" href="<?= base_url('assets/new/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/all.css')?>" >
  <link rel="stylesheet" href="<?= base_url('assets/new/css/mystyle.css')?>" >

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/new/plugin/datatable/dataTables.bootstrap4.min.css')?>">
 

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/style.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/components.css')?>">
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
</head>

<body>
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

  <script src="<?= base_url('assets/new/js/ajax_daerah.js')?>"></script>

  <script>
    $(document).ready(function() {
    $("#submit_dtl").click(function() {
        var nama_brg = $('input[name="nama_brg[]"]').map(function() {
            return this.value;
        }).get();
        var merk_brg = $('input[name="merk_brg[]"]').map(function() {
            return this.value;
        }).get();
        var type_brg = $('input[name="type_brg[]"]').map(function() {
            return this.value;
        }).get();
        var jml_brg = $('input[name="jml_brg[]"]').map(function() {
            return this.value;
        }).get();
        var harga_brg = $('input[name="harga_brg[]"]').map(function() {
            return this.value;
        }).get();
        var jum = $('input[name="jum[]"]').map(function() {
            return this.value;
        }).get();
      

        $.ajax({
            url: "<?php echo base_url('penjualan/add_temp_dtl'); ?>",
            type: "POST",
            data: {
                'nama_brg[]': nama_brg,
                'merk_brg[]': merk_brg,
                'type_brg[]': type_brg,
                'jml_brg[]': jml_brg,
                'harga_brg[]': harga_brg,
                'jum[]': jum,
            },
            success: function(data) {
                $("#edit_dtl").addClass("btn btn-warning").removeClass("btn-secondary disabled").removeAttr("disabled");
                $("#submit_dtl").addClass("btn-secondary disabled").removeClass("btn-primary").attr('disabled','disabled');
                $(".frm_dtl").addClass("tabel-detail-sukses").attr('disabled','disabled');
                $("#add_row").addClass("btn-secondary disabled").removeClass("btn-primary").attr('disabled','disabled');
                $("#delete_row").addClass("btn-secondary disabled").removeClass("btn-danger").attr('disabled','disabled');
                console.log(data);
            },
            error: function(xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            }
        });

        return false;
        });

        $("#edit_dtl").click(function() {
          $("#submit_dtl").addClass("btn-primary").removeClass("btn-secondary disabled").removeAttr("disabled");
          $("#edit_dtl").addClass("btn-secondary disabled").removeClass("btn-warning").attr('disabled','disabled');
          $(".frm_dtl").removeClass("tabel-detail-sukses").removeAttr("disabled");
          $("#add_row").addClass("btn-primary").removeClass("btn-secondary disabled").removeAttr("disabled");
          $("#delete_row").addClass("btn-danger").removeClass("btn-secondary disabled").removeAttr("disabled");
        });
    });
  </script>
  <script src="<?= base_url('assets/new/js/jquery-2.2.3.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/bootstrap.js')?>"></script>
</body>
</html>