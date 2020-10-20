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
          <h2 class="section-title">Penjualan</h2>
          <p class="section-lead">
            Halaman ini berisi data Surat Order dan Surat Survey sistem ini.
          </p>
        </div>
  </section>

          <!-- CONTENT ROW -->
          <section class="pt-4" id="portfolio">
            <!-- <div class="container"> -->

              <div class="row portfolio-container">

                <div class="col-lg-12 portfolio-item filter-card wow fadeInUp">
                  <div class="portfolio-wrap">
                                        
                          <!-- CONTENT ROW -->

                      <!-- DataTales Example -->
                      <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                          <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary mt-2">Data Survey</h6>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url('penjualan/tambah_survey');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead class="thead-dark">
                                <tr>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Tgl SO</th>
                                  <th>Tgl Survey</th>
                                  <th>Tgl Kirim</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Tiger Nixon</td>
                                  <td>System Architect</td>
                                  <td>Edinburgh</td>
                                  <td>61</td>
                                  <td>2011/04/25</td>
                                  <td><a href="#" 
                                button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button>&nbsp;</a>
                                <!-- <a href="#" 
                                button class="btn btn-primary btn-xs"><i class="fa fa-info"></i></button>&nbsp;</a> -->
                                <a href="#" href="javascript:;"
                                  onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" 
                                  button class="btn btn-danger btn-xs"><i class="fas fa-trash-alt "></i></button></a></td>
                                </tr>
                                <tr>
                                  <td>Garrett Winters</td>
                                  <td>Accountant</td>
                                  <td>Tokyo</td>
                                  <td>63</td>
                                  <td>2011/07/25</td>
                                </tr>
                                <tr>
                                  <td>Ashton Cox</td>
                                  <td>Junior Technical Author</td>
                                  <td>San Francisco</td>
                                  <td>66</td>
                                  <td>2009/01/12</td>
                                </tr>
                                <tr>
                                  <td>Cedric Kelly</td>
                                  <td>Senior Javascript Developer</td>
                                  <td>Edinburgh</td>
                                  <td>22</td>
                                  <td>2012/03/29</td>
                                </tr>
                                <tr>
                                  <td>Airi Satou</td>
                                  <td>Accountant</td>
                                  <td>Tokyo</td>
                                  <td>33</td>
                                  <td>2008/11/28</td>
                                </tr>
                                <tr>
                                  <td>Brielle Williamson</td>
                                  <td>Integration Specialist</td>
                                  <td>New York</td>
                                  <td>61</td>
                                  <td>2012/12/02</td>
                                </tr>
                                <tr>
                                  <td>Herrod Chandler</td>
                                  <td>Sales Assistant</td>
                                  <td>San Francisco</td>
                                  <td>59</td>
                                  <td>2012/08/06</td>
                                </tr>
                                <tr>
                                  <td>Rhona Davidson</td>
                                  <td>Integration Specialist</td>
                                  <td>Tokyo</td>
                                  <td>55</td>
                                  <td>2010/10/14</td>
                                </tr>
                                <tr>
                                  <td>Colleen Hurst</td>
                                  <td>Javascript Developer</td>
                                  <td>San Francisco</td>
                                  <td>39</td>
                                  <td>2009/09/15</td>
                                </tr>
                                <tr>
                                  <td>Sonya Frost</td>
                                  <td>Software Engineer</td>
                                  <td>Edinburgh</td>
                                  <td>23</td>
                                  <td>2008/12/13</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <!-- CONTENT ROW -->

                    </div>
                  </div>

                  <div class="col-lg-12 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-wrap">
                                          
                            <!-- CONTENT ROW -->

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4 mt-4">
                          <div class="card-header py-3">
                            <div class="d-flex justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary mt-2">Data Surat Order</h6>&nbsp;&nbsp;&nbsp;
                              <a href="<?php echo base_url('penjualan/tambah_so');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
                          </div>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                  <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tgl SO</th>
                                    <th>Tgl Survey</th>
                                    <th>Tgl Kirim</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td><a href="#" 
                                button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button>&nbsp;</a>
                                <a href="<?= base_url('penjualan/detail_so');?>" 
                                button class="btn btn-primary btn-xs"><i class="fa fa-info"></i></button>&nbsp;</a>
                                <a href="#" href="javascript:;"
                                  onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" 
                                  button class="btn btn-danger btn-xs"><i class="fas fa-trash-alt "></i></button></a></td>
                                  </tr>
                                  <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                  </tr>
                                  <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                  </tr>
                                  <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                  </tr>
                                  <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                  </tr>
                                  <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                  </tr>
                                  <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                  </tr>
                                  <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010/10/14</td>
                                  </tr>
                                  <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009/09/15</td>
                                  </tr>
                                  <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008/12/13</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                        <!-- CONTENT ROW -->

                      </div>
                    </div>
                    <!-- CONTAINER -->
        </div>

      <!-- </div> -->
    </section><!-- #portfolio -->