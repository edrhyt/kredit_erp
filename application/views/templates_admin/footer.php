      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto ">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.js')?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.js')?>"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/vendor/chart.js/Chart.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/js/demo/chart-area-demo.js')?>"></script>
  <script src="<?= base_url('assets/js/demo/chart-pie-demo.js')?>"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- JavaScript Libraries -->
  <script src="<?= base_url('assets/lib/jquery/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/jquery/jquery-migrate.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/easing/easing.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/superfish/hoverIntent.js')?>"></script>
  <script src="<?= base_url('assets/lib/superfish/superfish.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/wow/wow.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/waypoints/waypoints.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/counterup/counterup.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/owlcarousel/owl.carousel.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/isotope/isotope.pkgd.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/lightbox/js/lightbox.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/touchSwipe/jquery.touchSwipe.min.js')?>"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?= base_url('assets/contactform/contactform.js')?>"></script>

  <!-- Template Main Javascript File -->
  <script src="<?= base_url('assets/js/main.js')?>"></script>

  <!-- General JS Scripts -->
  <!-- <script src="<?= base_url('assets/new/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/popper.min.js')?>" ></script>
  <script src="<?= base_url('assets/new/js/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/jquery.nicescroll.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/moment.min.js')?>"></script>
  <script src="<?= base_url('assets/new/js/stisla.js')?>"></script> -->

  <!-- JS Libraies -->
  <!-- <script src="<?= base_url('assets/new/plugin/datatable/jquery.dataTables.min.js')?>"></script>
  <script src="<?= base_url('assets/new/plugin/datatable/dataTables.bootstrap4.min.js')?>"></script> -->

  <!-- Template JS File -->
<!--   <script src="<?= base_url('assets/new/js/scripts.js')?>"></script>
  <script src="<?= base_url('assets/new/js/custom.js')?>"></script> -->


</body>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.klik_menu').click(function(){
        var menu = $(this).attr('id');
        if(menu == "dashboard"){
          $('.konten').load('admin.php');           
        }else if(menu == "penjualan"){
          $('.konten').load('penjualan.php');            
        }else if(menu == "tutorial"){
          $('.konten').load('tutorial.php');           
        }else if(menu == "sosmed"){
          $('.konten').load('sosmed.php');           
        }
      });
   
   
      // halaman yang di load default pertama kali
      $('.konten').load('admin.php');           
   
    });
  </script>

</html>