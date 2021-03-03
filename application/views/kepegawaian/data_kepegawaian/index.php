    <section class="section">
        <div class="section-header">
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-button">
            <a href="<?php echo base_url('kepegawaian/tambah_pegawai');?>" class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Tambah baru</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Pegawai</h2>
          <p class="section-lead">
            Halaman ini berisi Data Pegawai sistem ini.
          </p>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Pegawai</h4>
                </div>
                <div class="card-body">
                  <div class="clearfix mb-3"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover data-table1" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama Lengkap</th>
                      <th>TTL</th>
                      <th>No KTP</th>
                      <th>Alamat</th>
                      <th>Kontak</th>
                      <th>Jabatan</th>
                      <th>NIK</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($record_karyawan as $r)
                    {

                      if($r->aktif == 'Y'){ 
                        $link   = 'Nonaktifkan'; 
                        $word   = 'menonaktifkan';
                        $status = '<div class="badge badge-success pd-x-8">Aktif</div>';
                      }else{ 
                        $status = '<div class="badge badge-danger pd-x-8">Tidak Aktif</div>'; 
                        $link   = 'Aktifkan'; 
                        $word   = 'mengaktifkan';
                      }


                      if($r->img == "")
                      {
                        $foto = 'default.png';
                      }else{
                        $foto = $r->img;
                      }

                      if($r->id_divisi == '1'){ 
                        $id_divisi = '<div class="badge bg-small badge-info pd-x-8">Marketing</div>';
                      }else if($r->id_divisi == '2') { 
                        $id_divisi = '<div class="badge bg-small badge-success pd-x-8">Collection</div>'; 
                      }else { 
                        $id_divisi = '<div class="badge bg-small badge-danger pd-x-8">Administrator</div>'; 
                      }

                      if($r->id_jabatan == '001'){ 
                        $id_jabatan = '<div class="badge bg-small badge-info pd-x-8">Kepala Cabang</div>';
                      }else if($r->id_jabatan == '002') { 
                        $id_jabatan = '<div class="badge bg-small badge-info pd-x-8">SPV Sales (SS)</div>'; 
                      }else if($r->id_jabatan == '003') { 
                        $id_jabatan = '<div class="badge bg-small badge-info pd-x-8">Demo Booker</div>';   
                      }else if($r->id_jabatan == '004') { 
                        $id_jabatan = '<div class="badge bg-small badge-info pd-x-8">Sales Promotor</div>'; 
                      }else if($r->id_jabatan == '005') { 
                        $id_jabatan = '<div class="badge bg-small badge-info pd-x-8">Training</div>'; 
                      }else if($r->id_jabatan == '006') { 
                        $id_jabatan = '<div class="badge bg-small badge-success pd-x-8">SPV Credit Control (CC)</div>'; 
                      }else if($r->id_jabatan == '007') { 
                        $id_jabatan = '<div class="badge bg-small badge-success pd-x-8">Surveyor</div>'; 
                      }else if($r->id_jabatan == '008') { 
                        $id_jabatan = '<div class="badge bg-small badge-success pd-x-8">Kolektor</div>'; 
                      }else if($r->id_jabatan == '009') { 
                        $id_jabatan = '<div class="badge bg-small badge-danger pd-x-8">Head</div>';
                      }else if($r->id_jabatan == '010') { 
                        $id_jabatan = '<div class="badge bg-small badge-danger pd-x-8">Staff</div>';
                      }else if($r->id_jabatan == '011') { 
                        $id_jabatan = '<div class="badge bg-small badge-danger pd-x-8">Driver</div>';
                      }else if($r->id_jabatan == '012') { 
                        $id_jabatan = '<div class="badge bg-small badge-danger pd-x-8">Helper</div>';      
                      }else { 
                        $id_jabatan = '<div class="badge bg-small badge-danger pd-x-8">OB/Umum</div>'; 
                      }
                      
                      echo'
                        <tr>
                        <td>'.$no.'</td>
                        <td><img src="'.base_url().'upload/img/'.$foto.'" class="img-tbl"></td>
                        <td>'.$r->nama_lengkap. '</br>'.$id_divisi.'</td>
                        <td>'.$r->tempat_lahir. '</br>'.$this->auth->tanggal_indo($r->tgl_lahir).'</td>
                        <td>'.$r->no_ktp.'</td>
                        <td>'.$r->alamat_karyawan.'</td>
                        <td>'.$r->no_hp.'</td>
                        <td>'.$id_jabatan.'</td>
                        <td>'.$r->nik.'</br>'.$status.'</td>
                        <td>
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item has-icon" href="'.base_url().'kepegawaian/edit/'.$r->id_karyawan.'"><i class="fas fa-user-edit"></i> Ubah</a>
                          <a class="dropdown-item has-icon non-aktif-modal" href="'.base_url().'kepegawaian/'.$link.'/'.$r->id_karyawan.'" data-confirm="Apakah anda yakin ingin '.$word.' User ini :'.$r->nama_lengkap.' ?"><i class="fas fa-user-lock"></i> '.$link.'</a>
                          <div class="dropdown-divider"></div> 
                          <a class="dropdown-item has-icon delete-modal text-danger" href="'.base_url().'kepegawaian/del_karyawan/'.$r->id_karyawan.'" data-confirm="Apakah anda yakin ingin menghapus karyawan ini : '.$r->nama_lengkap.' ?"><i class="far fa-trash-alt"></i> Hapus</a>
                        </div>
                        </td>
                        </tr>';
                    $no++;}  
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