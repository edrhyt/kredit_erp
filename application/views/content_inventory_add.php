<section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo base_url('inventory');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('inventory');?>">Inventory</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Tambah Data Form Inventory</h2>
          <p class="section-lead">
            halaman ini berisi Formulir Inventory.
          </p>
        </div>
  </section>

  <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Isian Inventory</h4>
                        <div class="card-header-action">
                            <form action="<?php echo base_url('inventory/add_barang'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-3">Tanggal</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl" required="">
                                <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Barang</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_barang" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Merk</label>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" class="form-control" name="merk" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                <div class="col-sm-12 col-md-3">
                                    <input type="text" class="form-control" name="harga" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stok Akhir</label>
                                <div class="col-sm-12 col-md-2">
                                    <input type="text" class="form-control" name="stok_akhir" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3">Kondisi Bagus</label>
                              <div class="col-sm-12 col-md-2">
                                <input type="text" class="form-control" name="kondisi_bagus" required="">
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2">Kondisi Jelek</label>
                              <div class="col-sm-12 col-md-2">
                                <input type="text" class="form-control" name="kondisi_jelek" required="">
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ready Jual</label>
                                <div class="col-sm-12 col-md-3">
                                    <input type="text" class="form-control" name="ready_jual" required="">
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
                            Form Isian Inventory
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>