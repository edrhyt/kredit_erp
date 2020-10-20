<?php
if($this->session->userdata('id_user') == '')  
{
    redirect(base_url().'Authentication/logout');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> TUNAS MITRA SEJAHTERA </title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="<?= base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css">

  <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.5.1.js')?>"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url('assets/lib/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/animate/animate.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/ionicons/css/ionicons.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/lightbox/css/lightbox.css')?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/all.css')?>" >
  <link rel="stylesheet" href="<?= base_url('assets/new/css/mystyle.css')?>" >

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/new/plugin/datatable/dataTables.bootstrap4.min.css')?>">
 

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/style.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/components.css')?>">

  <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
    <script type="text/javascript">
        $(function() {
            var offset = $("#sidebar").offset();
            var topPadding = 0;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#sidebar").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#sidebar").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
    </script>

</head>