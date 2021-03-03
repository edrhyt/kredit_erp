<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <a href="<?php echo base_url('so/add_new');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Data Surat Order</h2>
          <p class="section-lead">
            Halaman ini berisi Data Surat Order.
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
                      <th>Kode SO</th>
                      <th>Nama Koordinator</th>
                      <th>Alamat</th>
                      <th>Tgl SO</th>
                      <!-- <th>Karyawan</th> -->
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no=1;
                      $i=0;
                    foreach ($record_so as $r) :

                                            $i++;
                                            if($this->crud->_cekSO($r['kode_detail']) ==  0)
                                            {
                                                $set = '<a class="btn btn-icon icon-left btn-info" href="'.base_url().'survey/add_survey/'.$r['kode_detail'].'"><i class="far fa-file"></i> Buat Survey</a>';
                                            }else{
                                                $set = '<mark> <i>Survey Telah dibuat</i> <i class="fas fa-check"></i> </mark>';
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $no++;?></td>
                                                <td><?= $r['no_surat_order']?></td>
                                                <td><?= $r['nama_koordinator']?></td>
                                                <td><?= $r['alamat']?></td>
                                                <!-- <td><?= $r['nama_kabupaten'],$r['nama_kecamatan'],$r['nama_kelurahan']?></td> -->
                                                <td><?= $r['tgl_so']?></td>
                                                <!-- <td><?= $r['nama_lengkap']?></td> -->
                                                <td>
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cogs"></i>
                                                </button>
                                                <!-- <td> -->
                                                  <!-- <a href="<?= base_url('barang/edit/') . $b['id_barang'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                                  <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barang/delete/') . $b['id_barang'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                              </td> -->
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item has-icon" href="<?= base_url('so/view_so/').$r['kode_detail']?>"><i class="fas fa-eye"></i>Pilih Surat Order</a>
                                                <a class="dropdown-item has-icon" href="<?= base_url('so/edit_so/').$r['kode_detail']?>"><i class="fas fa-user-edit"></i> Ubah</a>
                                                <div class="dropdown-divider"></div> 
                                                <a class="dropdown-item has-icon delete-modal text-danger" href="<?= base_url('so/del_so/').$r['kode_detail']?>" data-confirm="Apakah anda yakin ingin menghapus surat order dengan nomor SO : <?=$r['no_surat_order']?> ini ?"><i class="far fa-trash-alt"></i> Hapus</a>
                                                </div>
                                                <?=$set?>
                                                </td>
                                            </tr>
                                     <?php endforeach; ?>
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>