<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <a href="<?php echo base_url('penjualan/add_survey');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Survey</h2>
          <p class="section-lead">
            Halaman ini berisi data Survey.
          </p>
        </div>
  </section>

  <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Survey</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>Tgl SO</th>
                      <th>Tgl Survey</th>
                      <th>Tgl Kirim</th>
                      <th>Nama Koordinator</th>
                      <th>Nama Konsumen</th>
                      <th>Kota</th>
                      <th>Kecamatan</th>
                      <th>Desa</th>
                      <th>Alamat Penagihan</th>
                      <th>Telp/HP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>