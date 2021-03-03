<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title"><?= $breadcrumb; ?></h2>
          <p class="section-lead">
            Halaman ini berisi data Sales dan konsumen yang melakukan transaksi.
          </p>
        </div>
  </section>

<div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Tagihan</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode SO</th>
                      <th>Nama Konsumen</th>
                      <th>Tgl Kirim</th>
                      <th>No TTB</th>
                      <th>Tgl KWT</th>
                      <th>Ang</th>
                      <th>Total Tagihan</th>
                      <th>Bayar</th>
                      <th>Sisa</th>
                      <th>Keterangan</th>
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