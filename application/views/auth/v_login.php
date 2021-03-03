<?php
if($this->session->userdata('id_user') <> '') 
{
  redirect(base_url('admin'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login TMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css')?>">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	<?php  echo $this->session->flashdata('msg'); ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-more" style="background-image: url('assets/img/undraw_login.svg');">
					<!-- BACKGROUND IMAGE -->
				</div>
				<form action="<?= base_url('authentication/do_login'); ?>" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						TUNAS MITRA SEJAHTERA
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
			

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/bootstrap/js/js_login/popper.js')?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/js_login/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/daterangepicker/moment.min.js')?>"></script>
	<script src="<?= base_url('assets/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/js/main_login.js')?>"></script>

</body>
</html>