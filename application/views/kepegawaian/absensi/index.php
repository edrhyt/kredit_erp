<section class="section">
        <p id="page-id" style="display: none;"><?= $this->uri->segment(1); ?></p>
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <input type="date" class="btn btn-danger daterange-btn icon-left btn-icon" name="date-query" id="date-query">          </div>
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
                <div class="card-header position-relative">
                  <h4>Data Absensi</h4>
                  <div class="abs-type-container d-flex">
                    <div class="harian-container">
                      <input class="radio-abs" type="radio" name="inlineRadioOptions" id="radio-harian" value="harian" checked></input>
                      <label for="radio-harian">Harian</label>                    
                    </div>
                    <div class="bulanan-container">
                      <input class="radio-abs" type="radio" name="inlineRadioOptions" id="radio-bulanan" value="bulanan">
                      <label for="radio-bulanan">Bulanan</label>                      
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="table-responsive absensi" id="data-absensi">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-2 p-0 d-flex">
                          <a href="<?= base_url(); ?>" target="_blank" rel="noopener noreferrer" id="get-laporan">
                            <button class="btn btn-primary w-100 h-100 mr-4" id="cetak-laporan">Cetak Laporan</button>
                          </a>
                        </div>
                        <div class="col-md-10 p-0 d-flex">
                          <input class="search form-control w-100 h-100 " placeholder="Search" />
                        </div>
                      </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover mt-4" id="data-absensi-harian">
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
                    
                    <div id="data-absensi-list">
                      <table class="table-bulanan mt-4 table-striped table-bordered table-responsive" id="data-absensi-bulanan">
                        <thead>
                          <tr class="row-head">
                            <th class="em-no">No</th>
                            <th class="em-name">NIK</th>
                            <th class="em-nik">Nama</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                      <div id="legend" class="mt-4">
                        <p>*Cell warna merah: <strong>Tidak masuk kerja.</strong></p>
                        <p>*Cell warna kuning: <strong>Masuk dengan durasi kerja < 8 jam.</strong></p>
                        <p>*Cell warna hijau: <strong>Masuk dengen durasi kerja >= 8 jam.</strong></p>
                      </div>
                    </div>
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