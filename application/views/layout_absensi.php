<!DOCTYPE html>
<html lang="en">
<head>
	<title>Absensi TMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('assets/absensi/images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/fonts/iconic/css/material-design-iconic-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/absensi/css/main.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
</head>
<body>
	<?php echo $this->session->flashdata('msg'); ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="<?php echo base_url('absensi/absen'); ?>" method="POST" class="login100-form validate-form needs-validation" novalidate="" accept-charset="utf-8">

	              <div class="login100-form-title p-b-10">
					<label class="selectgroup-item">
	                  <input type="radio" name="opsi" id="absen_masuk" value="1" class="selectgroup-input" checked="">
	                  <span class="selectgroup-button-absensi selectgroup-button selectgroup-button-icon">Absen Masuk</span>
	                </label>
	                <label class="selectgroup-item">
	                  <input type="radio" name="opsi" id="absen_pulang" value="2" class="selectgroup-input">
	                  <span class="selectgroup-button-pulang selectgroup-button selectgroup-button-icon">Absen Pulang</span>
	                </label>
		            </div>

					<span class="login100-form-title p-b-26">
						ABSENSI TMS
					</span>
					<span class="login100-form-title p-b-48">
						<a class="nav-link text-black">
                            <h2 class="my-0 text-center"><label id="hours"><?= date('H') ?></label>:<label id="minutes"><?= date('i') ?></label>:<label id="seconds"><?= date('s') ?></label></h2>
                        </a>
					</span>

					<div class="wrap-input100 validate-input only-number" data-validate = "Tidak Boleh Kosong">
						<input class="input100" type="text" name="nik">
						<span class="focus-input100" data-placeholder="Nomor Induk Karyawan"></span>
					</div>

					<!-- <div class="container-login100-form-btn" id="form1">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								<a href="<?= base_url('absensi/absen/masuk') ?>" <?= ($absen == 1) ? 'disabled style="cursor:not-allowed"' : '' ?>></a>
								Absen Masuk
							</button>
						</div>
					</div> -->

					<!-- Test 1 -->
                    <div class="container-login100-form-btn" id="form1">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								<a href="<?= base_url('absensi/absen/masuk') ?>"></a>
								Absen Masuk
							</button>
						</div>
					</div>

                    <!-- Test 2 -->
                    <div class="container-login100-form-btn" id="form2">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								<a href="<?= base_url('absensi/absen/pulang') ?>"></a>
								Absen Pulang
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

</body>

<!--===============================================================================================-->
	<script src="<?= base_url('assets/absensi/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/absensi/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/absensi/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?= base_url('assets/absensi/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/absensi/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/absensi/vendor/daterangepicker/moment.min.js')?>"></script>
	<script src="<?= base_url('assets/absensi/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/absensi/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/absensi/js/main.js')?>"></script>

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

    $(document).ready(function() {

    $(".only-number").keypress(function (e){
      var charCode = (e.which) ? e.which : e.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
    });

     $(function(){
        $('#form1').show();
        $('#form2').hide();


        // Test 
        $('#absen_masuk').on('click', function(){
            $('#form1').show();
            $('#form2').hide();
        });

        $('#absen_pulang').on('click', function(){
            $('#form1').hide();
            $('#form2').show();
        });
    });



    });
</script>

</html>