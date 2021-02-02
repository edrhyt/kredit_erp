<?php
if($this->session->userdata('id_user') <> '') 
{
  redirect(base_url('admin'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; TMS </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/all.css" >
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/mystyle.css" >

  <!-- CSappS Libraries -->
  <link rel="stylesheet" href="./bower_components/bootstrap-social/bootstrap-social.css">
  

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/components.css">
</head>

<body>
<?php echo $this->session->flashdata('msg'); ?>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?php echo base_url()?>assets/img/tms.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold"><br/>TUNAS MITRA SEJAHTERA</span></h4>
            <p class="text-muted">Aplikasi pengelolaan TMS</p>
            <form action="<?php echo base_url('authentication/do_login'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
              <div class="form-group">
                <label for="email">Username</label>
                <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your username
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php echo base_url()?>assets/img/bg-login.svg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <!-- <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold" style="color: red;">TMS</h1>
                <h5 class="font-weight-normal text-muted-transparent" style="color: black;">Bandung, Jawa Barat</h5>
              </div> -->
              <!-- Jl. Cideng Indah No. 236 A, Kedawung-Cirebon <br> Email : <a class="text-light bb" target="_blank" href="mailto:cirebon@bkipm.kkp.go.id"> cirebon@bkipm.kkp.go.id </a> atau <a class="text-light bb" target="_blank" href="mailto:ski2cirebon@yahoo.co.id">ski2cirebon@yahoo.co.id</a> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/popper.min.js" ></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url()?>assets/js/custom.js"></script>

  <script>
  window.setTimeout(function () {
      $(".alert").slideDown(500, 0).slideUp(500, function () {
          $(this).remove();
      });
  }, 4000);

</script>

  <!-- Page Specific JS File -->
</body>
</html>
