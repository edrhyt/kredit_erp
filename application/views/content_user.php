    <section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <!-- <div class="section-header-button">
            <a href="<?php echo base_url('user/tambah_user');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div> -->
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">User</h2>
          <p class="section-lead">
            Halaman ini berisi data user sistem ini.
          </p>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data User</h4>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>FOTO</th>
                      <th>USERNAME</th>
                      <th>NAMA LENGKAP</th>
                      <th>NO KTP</th>
                      <th>ALAMAT LENGKAP</th>
                      <th>KONTAK</th>
                      <th>STATUS</th>
                      <th>BERGABUNG</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    foreach ($record_user as $r)
                    {
                      if($r->aktif == 'Y'){ 
                        $link   = 'Nonaktifkan'; 
                        $word   = 'menonaktifkan';
                        $status = '<div class="badge badge-success pd-x-8">Active</div>';
                      }else{ 
                        $status = '<div class="badge badge-danger pd-x-8">Not Active</div>'; 
                        $link   = 'Aktifkan'; 
                        $word   = 'mengaktifkan';
                      }

                      if($r->img == "")
                      {
                        $foto = 'default.png';
                      }else{
                        $foto = $r->img;
                      }

                      if($r->hak_akses == 'Sales'){ 
                        $akses = '<div class="badge bg-small badge-info pd-x-8">Sales</div>';
                      }else if($r->hak_akses == 'Collection') { 
                        $akses = '<div class="badge bg-small badge-success pd-x-8">Collection</div>'; 
                      }else { 
                        $akses = '<div class="badge bg-small badge-danger pd-x-8">Administrator</div>'; 
                      }
                      
                      echo'
                        <tr>
                        <td><img src="'.base_url().'upload/img/'.$foto.'" class="img-tbl"></td>
                        <td>'.$r->username. '</br>'.$akses.'</td>
                        <td class="namaPenggguna">'.$r->nama_lengkap.'</td>
                        <td>'.$r->no_ktp.'</td>
                        <td>'.$r->alamat_lengkap.'</td>
                        <td>'.$r->no_hp.'</br>'.$r->email.'</td>
                        <td>'.$status.'</td>
                        <td>'.$this->auth->tanggal_indo($r->bergabung).'</td>
                        <td>
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item has-icon reset-modal" href="'.base_url().'user/reset_password/'.$r->id_user.'" data-confirm="Apakah anda yakin ingin mereset ulang password user ini : '.$r->username.' ?"> <i class="fas fa-unlock-alt"></i> Reset Password</a>
                          <a class="dropdown-item has-icon" href="'.base_url().'user/edit/'.$r->id_user.'"><i class="fas fa-user-edit"></i> Ubah</a>
                          <a class="dropdown-item has-icon non-aktif-modal" href="'.base_url().'user/'.$link.'/'.$r->id_user.'" data-confirm="Apakah anda yakin ingin '.$word.' User ini :'.$r->username.' ?"><i class="fas fa-user-lock"></i> '.$link.'</a>
                          <div class="dropdown-divider"></div> 
                          <a class="dropdown-item has-icon delete-modal text-danger" href="'.base_url().'user/del_pengguna/'.$r->id_user.'" data-confirm="Apakah anda yakin ingin menghapus user ini : '.$r->username.' ?"><i class="far fa-trash-alt"></i> Hapus</a>
                        </div>
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
        </div>
  </section>

     

            </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->