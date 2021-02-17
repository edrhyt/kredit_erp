<section class="section">
        <p id="page-id" style="display: none;"><?= $this->uri->segment(1); ?></p>
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <!-- <div class="section-header-button">
          </div> -->
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Absensi</h2>
          <p class="section-lead">
            Halaman ini berisi Data Absensi sistem ini.
          </p>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Absensi</h4>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="input-group d-flex flex-column">
                    <label for="date-query">Pilih Tanggal: </label>
                    <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon mb-4" name="date-query" id="date-query" value="<?= date('Y-m-d'); ?>">
                  </div>
                  <div class="table-responsive">
                  <?php //var_dump($record_daily); ?>
                    <table class="table table-striped table-bordered table-hover" id="data-absensi">
                      <thead>
                        <!-- <tr>
                          <th>No</th>
                          <th>Nama Karyawan</th>
                          <th>Tanggal Absensi</th>
                          <th>Jam Masuk</th>
                          <th>Jam Pulang</th>
                          <th>Durasi Kerja</th>
                        </tr> -->
                      </thead>
                      <tbody>
                        <!-- Data Absensi -->
                      </tbody>
                    </table>           
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
  <script>
    
  </script>

     

            </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->