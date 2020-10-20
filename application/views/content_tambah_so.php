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
                            <h2 class="m-0 font-weight-bold text-primary mt-2">Form Surat Order</h2>
                          </div>

              <div class="row portfolio-container">

                <div class="col-lg-12 filter-app wow fadeInUp">
                  <div class="portfolio-wrap">
                                        
                          <!-- CONTENT ROW -->

                      <!-- DataTales Example -->
                      <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                          <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary mt-2">Form Surat Order</h6>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <form id="myform" action="#" method="post" onSubmit="return validasi()" enctype="multipart/form-data">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="id" value="" width="60px">
                                    <tr>
                                      <td>NAMA KOORDINATOR&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nama_koor" required></td>
                                    </tr>
                                    <tr>
                                      <td>ALAMAT &nbsp; :</td>
                                      <td><input class="form-control" type="text" name="alamat_koor" required></td>
                                    </tr>
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
                                  </table>
                                  <div class="d-flex justify-content-center">
                                    &nbsp;&nbsp;&nbsp; <a type="button" class="btn btn-warning" href="#">  &nbsp;Tambah Diskon</a><br>
                                  </div>
                                </div>  
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- CONTENT ROW -->

                    </div>


                <div class="col-lg-12 filter-app wow fadeInUp">
                  <div class="portfolio-wrap">
                                        
                          <!-- CONTENT ROW -->

                      <!-- DataTales Example -->
                      <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                          <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary mt-2">Form Barang</h6>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <form id="myform" action="<?php echo base_url('admin/proses_tambah_perkara') ?>" method="post" onSubmit="return validasi()" enctype="multipart/form-data">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="id" value="" width="60px">
                                    <tr>
                                      <td>NOMOR &nbsp; :</td>
                                      <td><input class="form-control" type="text" value="1" name="nomor_perkara" disabled="" required></td>
                                    </tr>
                                    <tr>
                                      <td>NAMA BARANG&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                    <tr>
                                      <td>MERK&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                    <tr>
                                      <td>TYPE&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                    <tr>
                                      <td>JUMLAH BARANG&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                    <tr>
                                      <td>HARGA SATUAN&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                    <tr>
                                      <td>JUMLAH&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                  </table>
                                  <div class="d-flex flex-row-reverse">
                                  &nbsp;&nbsp;&nbsp; <a type="button" class="btn btn-primary" href="#">  &nbsp;Tambah Data Barang</a><br>
                                  </div>
                                </div>  
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- CONTENT ROW -->

                    </div>

                    <div class="col-lg-12 filter-app wow fadeInUp">
                  <div class="portfolio-wrap">
                                        
                          <!-- CONTENT ROW -->

                      <!-- DataTales Example -->
                      <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                          <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-danger mt-2">Form Diskon</h6>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <form id="myform" action="<?php echo base_url('admin/proses_tambah_perkara') ?>" method="post" onSubmit="return validasi()" enctype="multipart/form-data">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="id" value="" width="60px">
                                    <tr>
                                      <td>DISKON KOORDINATOR&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                    <tr>
                                      <td>DISKON DP&nbsp; :</td>
                                      <td><input class="form-control" type="text" name="nomor_perkara" required></td>
                                    </tr>
                                  </table>
                                  <div class="d-flex flex-row-reverse">
                                  &nbsp;&nbsp;&nbsp; <a type="button" class="btn btn-success" data-toggle="modal" data-target="#invoiceModal" href="<?php echo base_url().'user/tambah_user' ?>">  &nbsp;Selesai</a><br>
                                  </div>
                                </div>  
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>                    

                  </div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Invoice Surat Order</h5>
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
                <div class="col-sm-6">
                  <h6 class="mb-3">NAMA :</h6>
                  <div class="d-flex justify-content-center mb-3">
                    <strong>RIVALDI</strong>
                  </div>
                  <h6 class="mb-3">ALAMAT :</h6>
                  <div>
                    <strong class="d-flex justify-content-center mb-3">CIMAHI</strong>
                  </div>
                </div>

                <div class="col-sm-6">
                  <h6 class="mb-3">TANGGAL SO :</h6>
                  <div>
                    <strong class="d-flex justify-content-center mb-3">05/10/2020</strong>
                  </div>
                  <h6 class="mb-3">TANGGAL SURVEY :</h6>
                  <div>
                    <strong class="d-flex justify-content-center mb-3">-</strong>
                  </div>
                  <h6 class="mb-3">TANGGAL KIRIM :</h6>
                  <div>
                    <strong class="d-flex justify-content-center mb-3">-</strong>
                  </div>
                </div>

              </div>

              <div class="table-responsive-sm">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="center">NO</th>
                      <th>NAMA BARANG</th>
                      <th>MERK</th>
                      <th>TYPE</th>

                      <th class="right">JUMLAH BARANG</th>
                      <th class="center">HARGA SATUAN</th>
                      <th class="right">JUMLAH</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="center">1</td>
                      <td class="left strong">KOMPOR</td>
                      <td class="left">MIYAKO</td>
                      <td class="left">M123</td>

                      <td class="right">1</td>
                      <td class="center">$999,00</td>
                      <td class="right">$999,00</td>
                  </tr>
                  <tr>
                      <td class="center">2</td>
                      <td class="left strong">KOMPOR</td>
                      <td class="left">MIYAKO</td>
                      <td class="left">M123</td>

                      <td class="right">1</td>
                      <td class="center">$999,00</td>
                      <td class="right">$999,00</td>
                  </tr>
                  <tr>
                      <td class="center">3</td>
                      <td class="left strong">KOMPOR</td>
                      <td class="left">MIYAKO</td>
                      <td class="left">M123</td>

                      <td class="right">1</td>
                      <td class="center">$999,00</td>
                      <td class="right">$999,00</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-5">

              </div>
              <div class="d-flex flex-row-reverse">
              <div class="col-lg-4 col-sm-5 mr-5">
                <table class="table table-clear">
                  <tbody>
                    <tr>
                      <td class="left">
                        <strong>TOTAL</strong>
                      </td>
                      <td class="right">$8.497,00</td>
                    </tr>
                    <tr>
                      <td class="left">
                        <strong>NETTO</strong>
                      </td>
                      <td class="right">$1,699,40</td>
                    </tr>
                    <tr>
                      <td class="left">
                        <strong>ANGSURAN 1</strong>
                      </td>
                      <td class="right">$679,76</td>
                    </tr>
                    <tr>
                      <td class="left">
                        <strong>ANGSURAN/BULAN</strong>
                      </td>
                      <td class="right">
                        <strong>$7.477,36</strong>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
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