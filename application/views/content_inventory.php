<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <a href="<?php echo base_url('inventory/add_new');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Petugas</h2>
          <p class="section-lead">
            Halaman ini berisi data-data petugas sistem ini.
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
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Merk</th>
                      <th>Harga</th>
                      <th>Stok Akhir</th>
                      <th>Kondisi Bagus</th>
                      <th>Kondisi Jelek</th>
                      <th>Ready Jual</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                                             $no=1;
                    foreach ($record_inv as $r)
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
                                                <td>'.$no.'</td>
                                                <td>'.$r->nama_barang.'</td>
                                                <td>'.$r->merk.'</td>
                                                <td>'.$this->auth->rupiah($r->harga).'</td>
                                                <td>'.$r->stok_akhir.'</td>
                                                <td>'.$r->kondisi_bagus.'</td>
                                                <td>'.$r->kondisi_jelek.'</td>
                                                <td>'.$r->ready_jual.'</td>
                                                <td>'.$this->auth->tanggal_indo($r->tgl).'</td>

                                                <td>
                                                <a class="btn btn-icon icon-left btn-primary" href="'.base_url().'inventory/edit_barang/'.$r->id_barang.'"><i class="far fa-edit"></i></a> 
                                                <a class="btn btn-icon icon-left btn-danger" href="'.base_url().'inventory/del_barang/'.$r->id_barang.'"data-confirm="Apakah anda yakin ingin menghapus barang : '.$r->nama_barang.' ?"><i class="far fa-trash-alt"></i></a>
                                            </tr>';
                                       $no++; }

                                     ?>
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>