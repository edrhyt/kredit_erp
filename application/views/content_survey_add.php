<section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo base_url('penjualan/survey');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('penjualan/survey');?>">Survey</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Tambah Data Form Survey</h2>
          <p class="section-lead">
            halaman ini berisi Formulir Survey.
          </p>
        </div>
  </section>

  <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Isian Survey</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('penjualan/add_so'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                            <div class="input-group">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SO </label>
                                <div class="col-sm-12 col-md-3">
                                    <input type="text" class="form-control text-right" name="no_surat_order" value="<?php echo $this->session->userdata('lokasi');?> - " readonly="" required="">
                                </div>
                                <input type="text" class="form-control" name="no_surat_order" value="<?=$r['no_surat_order'];?>" required="">
                                <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal SO</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_so" required="">
                                <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Survey</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_survey" >
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Kirim</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_kirim" >
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_koordinator" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_koordinator" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Konsumen</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="education_fields">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="nama_konsumen[]" aria-label="">
                                        <div class="input-group-append">
                                            <button class="btn btn-icon btn-primary icon-left btn-primary" type="button" onclick="education_fields();"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota/Kabupaten</label>
                                <div class="col-sm-12 col-md-7" >
                                    <select class="form-control selectric" name="prop" id="prop" onchange="ajaxkec(this.value)">
                                      <option value="">Pilih Kota/Kabupaten</option>
                                      <?php 
                                      include 'koneksi.php';
                                      $query=$db->prepare("SELECT id_kab,nama FROM kabupaten ORDER BY nama");
                                      $query->execute();
                                      while ($data=$query->fetchObject()){
                                      echo '<option value="'.$data->id_kab.'">'.$data->nama.'</option>';
                                      }
                                      ?>
                                    <select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="kec" id="kec" onchange="ajaxkel(this.value)">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelurahan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="kel" id="kel">
                                        <option value="">Pilih Kelurahan/Desa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control almt" name="alamat" required=""></textarea>
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telp/HP</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="no_telp" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    <button class="btn btn-danger" type="reset">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="float-left">
                            TMS - BANDUNG 2020
                        </div>
                        <div class="float-right">
                            Form Isian Survey
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>