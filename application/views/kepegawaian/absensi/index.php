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
                    <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon mb-4" name="date-query" id="date-query">
                  </div>
                  <div class="table-responsive absensi" id="data-absensi">
                    <input class="search form-control" placeholder="Search" />
                    <table class="table table-striped table-bordered table-hover mt-4">
                      <thead>
                        <tr>
                          <th class="sort" data-sort="no">No</th>
                          <th class="sort" data-sort="nama">Nama Karyawan</th>
                          <th class="sort" data-sort="tanggal">Tanggal Absensi</th>
                          <th class="sort" data-sort="masuk">Jam Masuk</th>
                          <th class="sort" data-sort="pulang">Jam Pulang</th>
                          <th class="sort" data-sort="durasi">Durasi Kerja</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <tr>
                          <td class="no"></td>
                          <td class="nama"></td>
                          <td class="tanggal"></td>
                          <td class="masuk"></td>
                          <td class="pulang"></td>
                          <td class="durasi"></td>
                        </tr>
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