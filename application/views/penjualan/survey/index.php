<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Data Survey</h2>
          <p class="section-lead">
            Halaman ini berisi Data Survey.
          </p>
        </div>
  </section>

  <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Survey</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode SO</th>
                      <th>Nama Koordinator</th>
                      <th>Nama Konsumen</th>
                      <th>Tgl Survey</th>
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

                                      if ($r['status'] == 'Proses') {
                                        $status = '<span class="badge badge-pill badge-info pd-y-2 pd-x-8">'.$r['status'].'</span>';
                                      }elseif ($r['status'] == 'Ditolak') {
                                        $status = '<span class="badge badge-pill badge-danger pd-y-2 pd-x-8">'.$r['status'].'</span>';
                                      }elseif ($r['status'] == 'Batal'){
                                        $status = '<span class="badge badge-pill badge-secondary pd-y-2 pd-x-8">'.$r['status'].'</span>';
                                      }else{
                                        $status = '<span class="badge badge-pill badge-success pd-y-2 pd-x-8">'.$r['status'].'</span>';
                                      }

                            ?>
                                            <tr>
                                                <td><?= $no++?></td>
                                                <td><?= $r['no_surat_order']?></td>
                                                <td><?= $r['nama_koordinator']?><span><br><?=$telp ?><span></td>
                                                <td><?= $r['nama_konsumen']?></td>
                                                <td><?= $r['tgl_survey']?></td>
                                                <td><?= $r['alamat_penagihan']?></td>
                                                <td><?= $status?></td>
                                                <td>
                                                   <?php if($r['status'] != 'Diterima' && $r['status'] != 'Ditolak' && $r['status'] != 'Batal'){?>
                                                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fas fa-cogs"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <?php if($r['status'] == 'Proses'){?>
                                                    <a class="dropdown-item has-icon" href="<?= base_url('verifikasi/view_verifikasi/').$r['kode_detail']?>"><i class="fas fa-check-circle"></i>Verifikasi Survey</a><div class="dropdown-divider"></div>
                                                  <?php } ?>
                                                    <a class="dropdown-item has-icon delete-modal text-danger" href="<?= base_url('survey/del_survey/').$r['kode_detail']?>" data-confirm="Apakah anda yakin ingin menghapus surat order dengan nomor SO : <?=$r['no_surat_order']?> ini ?"><i class="far fa-trash-alt"></i> Hapus</a>
                                                  <?php } if($r['status'] == 'Diterima' || $r['status'] == 'Ditolak' || $r['status'] == 'Batal'){ ?>
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="fas fa-cogs"></i>
                                                      </button>
                                                    <div class="dropdown-menu">
                                                      <a class="dropdown-item has-icon" href="<?= base_url('verifikasi/view_verifikasi_hasil/').$r['kode_detail']?>"><i class="fas fa-eye"></i>Lihat Data</a><div class="dropdown-divider"></div>
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