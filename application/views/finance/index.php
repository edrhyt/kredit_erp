    <section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Keuangan</h2>
          <p class="section-lead">
            Halaman ini berisi Data Kuangan Tunas Mitra Sejahtera.
          </p>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Keuangan</h4>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tanggal Transaksi</th>
                      <th>Uang Masuk</th>
                      <th>Uang Keluar</th>
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
        </div>
  </section>

     

            </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->