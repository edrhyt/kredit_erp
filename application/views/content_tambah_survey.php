<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <a href="<?php echo base_url('pengguna/add_new');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Petugas</h2>
          <p class="section-lead">
            Halaman ini berisi data-data petugas sistem ini.
          </p>
        </div>
  </section>

          <!-- CONTENT ROW -->
            <!-- <div class="container"> -->

              <div class="d-flex justify-content-center">
                            <h2 class="m-0 font-weight-bold text-primary mt-2">Form Surat Survey</h2>
                          </div>

              <div class="row portfolio-container">

                <div class="col-lg-12 filter-app wow fadeInUp">
                  <div class="portfolio-wrap">
                                        
                          <!-- CONTENT ROW -->

                      <!-- DataTales Example -->
                      <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                          <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary mt-2">Form Surat Survey</h6>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <form id="myform" action="#" method="post" onSubmit="return validasi()" enctype="multipart/form-data">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="id" value="" width="60px">
                                    <tr>
                                      <td>TANGGAL SURAT ORDER &nbsp; :</td>
                                      <td><input class="form-control" type="date" name="tgl_so" required></td>
                                    </tr>
                                    <tr>
                                      <td>TANGGAL SURVEY &nbsp; :</td>
                                      <td><input class="form-control" type="date" name="tgl_survey" required></td>
                                    </tr>
                                    <tr>
                                      <td>TANGGAL KIRIM &nbsp; :</td>
                                      <td><input class="form-control" type="date" name="tgl_kirim" required></td>
                                    </tr>
                                    <tr>
                                      <td>NAMA KOORDINATOR&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nama_koor" required></td>
                                    </tr>
                                    <tr>
                                      <td>NAMA KONSUMEN&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nama_koor" required></td>
                                    </tr>
                                    <tr>
                                      <td>ALAMAT PENAGIHAN&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="alamat_koor" required></td>
                                    </tr>
                                    <tr>
                                      <td>DESA&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="alamat_koor" required></td>
                                    </tr>
                                    <tr>
                                      <td>KECAMATAN&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="alamat_koor" required></td>
                                    </tr>
                                    <tr>
                                      <td>KOTA&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="alamat_koor" required></td>
                                    </tr>
                                    <tr>
                                      <td>TELP/HP&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="alamat_koor" required></td>
                                    </tr>
                                    <!-- <tr>
                                      <td>
                                        <div class="d-flex justify-content-center">
                                          <h6 class="m-0 font-weight-bold text-primary mt-2">TANGGAL JATUH TEMPO</h6>
                                        </div>
                                      </td>
                                    </tr> -->
                                    <tr>
                                      <td>TANGGAL MULAI&nbsp; :</td>
                                      <td><input class="form-control" type="date" name="alamat_koor" required></td>
                                    </tr>
                                    <!-- <tr>
                                      <td>
                                        <div class="d-flex justify-content-center">
                                          <h6 class="m-0 font-weight-bold text-primary mt-2">s/d</h6>
                                        </div>
                                      </td>
                                    </tr> -->
                                    <tr>
                                      <td>TANGGAL SELESAI&nbsp; :</td>
                                      <td><input class="form-control" type="date" name="alamat_koor" required></td>
                                    </tr>
                                  </table>
                                  <div class="d-flex flex-row-reverse">
                                  &nbsp;&nbsp;&nbsp; <a type="button" class="btn btn-success" data-toggle="modal" data-target="#invoiceModalSurvey" href="#">  &nbsp;Selesai</a><br>
                                  </div>
                                </div>  
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- CONTENT ROW -->

                    </div>
                  </div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="invoiceModalSurvey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Invoice Surat Survey</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="card">
            <div class="card-header">
              Invoice
              <strong>05/10/2020</strong>
              <span class="float-right"> <strong>Status:</strong> Pending</span>

            </div>
            <div class="card-body">
              <div class="row mb-4">

                <div class="col-sm-4 ">
                  <h6 class="mb-3">TANGGAL SO :</h6>
                  <div>
                    <strong class="d-flex justify-content-center mb-3">05/10/2020</strong>
                  </div>
                </div>
                <div class="col-sm-4">
                  <h6 class="mb-3">TANGGAL SURVEY :</h6>
                  <div>
                    <strong class="d-flex justify-content-center mb-3">06/10/2020</strong>
                  </div>
                </div>
                <div class="col-sm-4">
                  <h6 class="mb-3">TANGGAL KIRIM :</h6>
                  <div>
                    <strong class="d-flex justify-content-center mb-3">08/10/2020</strong>
                  </div>
                </div>
<!--                 <div class="col-lg-12 d-flex justify-content-center"> -->
                  <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-1">
                      <h6>NAMA KOORDINATOR :</h6>
                      <h6 class="ml-3"><strong>RIVALDI</strong></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                      <h6>NAMA KONSUMEN :</h6>
                      <h6 class="ml-3"><strong>SLAMET</strong></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                      <h6>DESA :</h6>
                      <h6 class="ml-3"><strong>SUKAMELANG</strong></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                      <h6>KECAMATAN</h6>
                      <h6 class="ml-3"><strong>SUBANG</strong></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                      <h6>KOTA :</h6>
                      <h6 class="ml-3"><strong>SUBANG</strong></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                      <h6>TELP/HP :</h6>
                      <h6 class="ml-3"><strong>089671875XXX</strong></h6>
                    </div>
                  </div>
                <!-- </div> -->

              </div>

          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>