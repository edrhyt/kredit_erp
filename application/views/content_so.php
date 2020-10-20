<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <a href="<?php echo base_url('penjualan/add_new');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Surat Order</h2>
          <p class="section-lead">
            Halaman ini berisi data Surat Order.
          </p>
        </div>
  </section>

  <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Surat Order</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>No SO</th>
                      <th>Nama Koordinator</th>
                      <th>Alamat</th>
                      <th>Tgl SO</th>
                      <th>Tgl Survey</th>
                      <th>Tgl Kirim</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                    foreach ($record_so as $r)
                                        {

                                            // $sampel = 'ss';
                                            // if($r->kondisi_sampel == 'H'){ 
                                            //     $sampel = '<div class="badge badge-primary pd-y-2 pd-x-8">Hidup</div>';
                                            //   }else{ 
                                            //     $sampel = '<div class="badge badge-danger pd-y-2 pd-x-8">Mati</div>'; 
                                            //   }

                                              // $no_surat_order = '<span class="badge badge-pill badge-secondary pd-y-2 pd-x-8">'.$r->no_surat_order.'</span>'; 
                                              // $kode = '<span class="badge badge-pill badge-light pd-y-2 pd-x-8">'.$r->kode_detail.'</span>'; 
                                              //<td>'.$r->alamat.'</td>
                                        echo'
                                            <tr>
                                                <td>'.$r->no_surat_order.'</td>
                                                <td>'.$r->nama_koordinator.'</td>
                                                <td>'.$r->alamat.'</td>
                                                <td>'.$r->tgl_so.'</td>
                                                <td>'.$r->tgl_survey.'</td>
                                                <td>'.$r->tgl_kirim.'</td>
                                                <td>
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cogs"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item has-icon" href="'.base_url().'penjualan/view_so/'.$r->kode_detail.'"><i class="fas fa-eye"></i>Pilih Surat Order</a>
                                                <a class="dropdown-item has-icon" href="'.base_url().'penjualan/edit_so/'.$r->kode_detail.'"><i class="fas fa-user-edit"></i> Ubah</a>
                                                <div class="dropdown-divider"></div> 
                                                <a class="dropdown-item has-icon delete-modal text-danger" href="'.base_url().'penjualan/del_so/'.$r->kode_detail.'" data-confirm="Apakah anda yakin ingin menghapus surat order dengan nomor SO : '.$r->no_surat_order.' ini ?"><i class="far fa-trash-alt"></i> Hapus</a>
                                                </div>
                                                <a class="btn btn-icon icon-left btn-primary" href="'.base_url().'penjualan/add_survey1/'.$r->kode_detail.'"><i class="far fa-file"></i> Buat Survey</a>
                                                </td>
                                            </tr>';
                                        }  
                                     ?>
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>