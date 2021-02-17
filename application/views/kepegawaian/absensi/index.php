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
                    <table class="table table-striped table-bordered table-hover data-table1" id="data-absensi">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>Nama Karyawan</th>
                          <th>Tanggal Absensi</th>
                          <th>Jam Masuk</th>
                          <th>Jam Pulang</th>
                          <th>Durasi Kerja</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $no = 1;
                          foreach( $record_absensi as $row ) {
                            if($row['foto']) {
                              $foto = '<img src="'.base_url().'upload/img/'.$row['foto'].'" class="img-tbl">';
                            } else {
                              $foto = '<img src="'.base_url().'upload/img/default.png" class="img-tbl">';
                            }

                            $nama = $row['nama'];
                            
                            if($row['divisi'] == '1'){ 
                              $divisi = '<div class="badge bg-small badge-info pd-x-8">Marketing</div>';
                            }else if($row['divisi'] == '2') { 
                              $divisi = '<div class="badge bg-small badge-success pd-x-8">Collection</div>'; 
                            }else { 
                              $divisi = '<div class="badge bg-small badge-danger pd-x-8">Administrator</div>'; 
                            }
                            
                            $masuk = new DateTime($row['masuk']);
                            $pulang = new DateTime($row['pulang']);
                            $durasi = $masuk->diff($pulang);
                            
                            $date = $masuk->format('F j, Y');

                            $status = $durasi->h >= 8 ? 'good' : 'bad'; 

                            echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$foto.'</td>
                                <td>'.$nama.'</br>'.$divisi.'</td>
                                <td>'.$date.'</td>
                                <td>'.$masuk->format('h:i A').'</td>
                                <td>'.$pulang->format('h:i A').'</td>
                                <td class="'.$status.'">'.$durasi->h.' Jam '.$durasi->i.' Menit</td>
                              </tr>
                            ';
                            $no++;
                          }

                        ?>
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
    var calendar = new ej.calendars.Calendar();

    // Render initialized calendar.
    calendar.appendTo('#ej2-calendar');
  </script>

     

            </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->