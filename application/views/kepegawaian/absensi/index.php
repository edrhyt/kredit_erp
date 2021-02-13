<section class="section">
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
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama Karyawan</th>
                      <th>Tanggal Absensi</th>
                      <th>Jam Masuk</th>
                      <th>Jam Pulang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $no = 1;
                      foreach( $record_absensi as $r ) {
                        $print = `
                          <tr>
                            <td>$no</td>
                            <td>Foto</td>
                            <td>$r</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        `;
                      }

                    ?>
                  </tbody>
                  </table>
                  <p>
                    <?php var_dump($record_absensi); ?>
                  </p>
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