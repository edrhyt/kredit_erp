<section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <a href="<?php echo base_url('barang_masuk/add_barang_masuk');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title"><?= $breadcrumb; ?></h2>
          <p class="section-lead">
            Halaman ini berisi data inventory barang.
          </p>
        </div>
  </section>

  <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Barang Masuk</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Supplier</th>
                      <th>Jumlah Masuk</th>
                      <th>Tanggal Masuk</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $no=1;
                    foreach ($barang_masuk as $r) :

                                            $id_barang_masuk = '<span class="badge badge-pill badge-info pd-y-2 pd-x-8">'.$r['id_barang_masuk'].'</span>';
                                            $satuan = '<span class="badge badge-pill badge-secondary pd-y-2 pd-x-8">'.$r['satuan_id'].'</span>';

                                        ?>
                                     
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $r['nama_barang']?><span><br><?= $id_barang_masuk; ?><span></td>
                                                <td><?= $r['supplier']?></td>
                                                <td><?= $r['jumlah_masuk']?><span><br><?= $satuan; ?><span></td>
                                                <td><?= $r['tgl_masuk']?></td>
                                                <td>
                                                  <a class="btn btn-icon icon-left btn-primary" href="'.base_url().'barang/edit_barang/'.$r->id_barang.'"><i class="far fa-edit"></i></a> 
                                                  <a class="btn btn-icon icon-left btn-danger" href="<?= base_url('barang_masuk/del_barang/') . $r['id_barang_masuk'] ?>" data-confirm="Apakah anda yakin ingin menghapus barang : '<?= $r['nama_barang']?>' ?" ><i class="far fa-trash-alt"></i></a>
                                            </tr> 

                                  <?php endforeach; ?>
                  
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>