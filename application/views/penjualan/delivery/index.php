<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Delivery</h2>
          <p class="section-lead">
            Halaman ini berisi Data Survey berdasarkan rencana kirim.
          </p>
        </div>
  </section>

  <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Delivery</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode SO</th>
                      <th>Nama Koordinator</th>
                      <!-- <th>Nama Konsumen</th> -->
                      <th>Tgl Kirim</th>
                      <th>Alamat Penagihan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                      $no=1;
                      $i = 0;
                    foreach ($record_survey as $r) :
                                      $telp = '<span class="badge badge-pill badge-info pd-y-2 pd-x-8">'.$r['no_telp'].'</span>';

                                      if ($r['status_delivery'] == 'Proses') {
                                        $status = '<span class="badge badge-pill badge-info pd-y-2 pd-x-8">'.$r['status_delivery'].'</span>';
                                      }elseif ($r['status_delivery'] == 'Batal') {
                                        $status = '<span class="badge badge-pill badge-danger pd-y-2 pd-x-8">'.$r['status_delivery'].'</span>';
                                      }elseif ($r['status_delivery'] == 'Pending'){
                                        $status = '<span class="badge badge-pill badge-warning pd-y-2 pd-x-8">'.$r['status_delivery'].'</span>';
                                      }else{
                                        $status = '<span class="badge badge-pill badge-success pd-y-2 pd-x-8">'.$r['status_delivery'].'</span>';
                                      }
                                      

                            ?>
                                            <tr>
                                                <td><?= $no++?></td>
                                                <td><?= $r['no_surat_order']?></td>
                                                <td><?= $r['nama_koordinator']?><span><br><?=$telp ?><span></td>
                                                <!-- <td><?= $r['nama_konsumen']?></td> -->
                                                <td><?= $r['tgl_kirim']?></td>
                                                <td><?= $r['alamat_penagihan']?></td>
                                                <td><?= $status?></td>
                                                <td>
                                                  <?php if($r['status_delivery'] != 'Yes' && $r['status_delivery'] != 'Batal' && $r['status_delivery'] != 'Pending' && $r['status_petugas'] == '0'){?>
                                                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fas fa-cogs"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <?php if($r['status_delivery'] == 'Proses' && $r['status_petugas'] == '0'){?>
                                                    <a class="dropdown-item has-icon" href="<?= base_url('delivery/add_delivery/').$r['kode_detail']?>"><i class="fas fa-users"></i>Tambah Petugas</a><div class="dropdown-divider"></div>
                                                  <?php } ?>
                                                    <a class="dropdown-item has-icon delete-modal text-danger" href="<?= base_url('survey/del_survey/').$r['kode_detail']?>" data-confirm="Apakah anda yakin ingin menghapus surat order dengan nomor SO : <?=$r['no_surat_order']?> ini ?"><i class="far fa-trash-alt"></i> Hapus</a>
                                                  <?php } if($r['status_delivery'] == 'Yes' || $r['status_delivery'] == 'Batal'){ ?>
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="fas fa-cogs"></i>
                                                      </button>
                                                    <div class="dropdown-menu">
                                                      <a class="dropdown-item has-icon" href="<?= base_url('delivery/view_delivery_hasil/').$r['kode_detail']?>"><i class="fas fa-eye"></i>Lihat Data</a><div class="dropdown-divider"></div>
                                                      <a class="dropdown-item has-icon delete-modal text-danger" href="<?= base_url('survey/del_survey/').$r['kode_detail']?>" data-confirm="Apakah anda yakin ingin menghapus surat order dengan nomor SO : <?=$r['no_surat_order']?> ini ?"><i class="far fa-trash-alt"></i> Hapus</a>

                                                <?php } if($r['status_delivery'] == 'Pending'){ ?>
                                                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="fas fa-cogs"></i>
                                                      </button>
                                                    <div class="dropdown-menu">
                                                      <a class="dropdown-item has-icon" href="<?= base_url('delivery/view_delivery_hasil/').$r['kode_detail']?>"><i class="fas fa-eye"></i>Lihat Data</a><div class="dropdown-divider"></div>
                                                      <a class="dropdown-item has-icon delete-modal text-danger" href="<?= base_url('survey/del_survey/').$r['kode_detail']?>" data-confirm="Apakah anda yakin ingin menghapus surat order dengan nomor SO : <?=$r['no_surat_order']?> ini ?"><i class="far fa-trash-alt"></i> Hapus</a>

                                                  <?php } ?>
                                                  <?php if($r['status_delivery'] == 'Proses' && $r['status_petugas'] == '1'){?>
                                                  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fas fa-cogs"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <?php if($r['status_delivery'] == 'Proses' && $r['status_petugas'] == '1'){?>
                                                    <a class="dropdown-item has-icon" href="<?= base_url('delivery/view_delivery/').$r['kode_detail']?>"><i class="fas fa-truck"></i>Konfirmasi Pengiriman</a><div class="dropdown-divider"></div>
                                                  <?php } ?>
                                                    <a class="dropdown-item has-icon delete-modal text-danger" href="<?= base_url('survey/del_survey/').$r['kode_detail']?>" data-confirm="Apakah anda yakin ingin menghapus surat order dengan nomor SO : <?=$r['no_surat_order']?> ini ?"><i class="far fa-trash-alt"></i> Hapus</a>
                                                  <?php } ?>
                                          </div>
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