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
          <h2 class="section-title">Laporan</h2>
          <p class="section-lead">
            Halaman ini berisi Data Laporan sistem ini.
          </p>
           <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Sales Promotor</h4>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Sales Promotor</th>
                      <th>HSL</th>
                      <th>PDS</th>
                      <th>RCK</th>
                      <th>ACT</th>
                      <th>KOM</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no=1;
                    foreach ($record_sp as $r) :

                                          $nik = '<span class="badge badge-pill badge-info pd-y-2 pd-x-8">'.$r['nik'].'</span>';
                                        ?>
                                            <tr>
                                                <td><?= $no++;?></td>
                                                <td><?= $r['nama_lengkap']?><span><br><?=$nik ?><span></td>
                                            </tr>
                                     <?php endforeach; ?>
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Demo Booker</h4>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Demo Booker</th>
                      <th>HSL</th>
                      <th>PDS</th>
                      <th>RCK</th>
                      <th>ACT</th>
                      <th>KOM</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no=1;
                    foreach ($record_db as $r) :
                                        $nik = '<span class="badge badge-pill badge-info pd-y-2 pd-x-8">'.$r['nik'].'</span>';
                                        ?>
                                            <tr>
                                                <td><?= $no++;?></td>
                                                <td><?= $r['nama_lengkap']?><span><br><?=$nik ?><span></td>
                                            </tr>
                                     <?php endforeach; ?>
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Sales Supervisor</h4>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Sales Supervisor</th>
                      <th>HSL</th>
                      <th>PDS</th>
                      <th>RCK</th>
                      <th>ACT</th>
                      <th>KOM</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no=1;
                    foreach ($record_ss as $r) :
                                        $nik = '<span class="badge badge-pill badge-info pd-y-2 pd-x-8">'.$r['nik'].'</span>';
                                        ?>
                                            <tr>
                                                <td><?= $no++;?></td>
                                                <td><?= $r['nama_lengkap']?><span><br><?=$nik ?><span></td>
                                            </tr>
                                     <?php endforeach; ?>
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