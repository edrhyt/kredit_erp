<?php
if($this->session->userdata('hak_akses') == 'Administrator'){ 
  $hak_akses = '<div class="badge bg-small badge-danger">Administrator</div>';
}

if($this->session->userdata('lokasi') == 'BDG'){ 
  $lokasi = 
  '<button type="button" class="btn btn-danger">
                        BANDUNG <span class="badge badge-transparent"></span>
                      </button>';
}else if($this->session->userdata('lokasi') == 'BATIM'){ 
  $lokasi = 
  '<button type="button" class="btn btn-danger">
                        BANDUNG TIMUR <span class="badge badge-transparent"></span>
                      </button>';
} else if($this->session->userdata('lokasi') == 'BARATA'){ 
  $lokasi = 
  '<button type="button" class="btn btn-danger">
                        BANDUNG BARAT <span class="badge badge-transparent"></span>
                      </button>';
} else{
  $lokasi = 
  '<button type="button" class="btn btn-danger">
                        MAJALENGKA <span class="badge badge-transparent"></span>
                      </button>';
}

$img = $this->session->userdata('img');

?>
<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama_lengkap');?></h2>
    <p class="section-lead">
      Ubah data dirimu di halaman ini
    </p>
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
           <?php echo $lokasi;?>
          <div class="profile-widget-header">
          <?php echo form_open_multipart('profile/do_edit_profile');?> 
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="new_img" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" <?php echo'style="background-image: url('.base_url("upload/img/").''.$img.');"';?>>
                    </div>
                </div>
            </div>
            <!-- <img alt="image" src="<?php echo base_url();?>assets/img/avatar/avatar-1.png"
              class="rounded-circle profile-widget-picture"> -->
            <div class="profile-widget-items">
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Bergabung</div>
                <div class="profile-widget-item-value"><?php echo $this->session->userdata('bergabung');?></div>
              </div>

              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Status Aktif</div>
                <div class="profile-widget-item-value"><?php echo $this->session->userdata('aktif');?></div>
              </div>
            </div>
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name"><?php echo $this->session->userdata('nama_lengkap');?> <div
                class="text-muted d-inline font-weight-normal">
                <div class="slash"></div> <?php echo $hak_akses;?>
              </div>
            </div>
          </div>
          <div class="profile-widget-description">
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php echo base_url('profile/ganti_password');?>" class="btn btn-icon btn-block icon-left btn-primary"><i class="far fa-edit"></i> Ganti Password</a>
              </div>
            </div>  
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12 col-12">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_lengkap');?>"
                    name="nama_lengkap" required="">
                  <div class="invalid-feedback">
                  Silahkan lengkapi telebih dahulu
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12 col-12">
                  <label>No KTP</label>
                  <input type="text" class="form-control" value="<?php echo $this->session->userdata('no_ktp');?>"
                    name="no_ktp" required="">
                  <div class="invalid-feedback">
                  Silahkan lengkapi telebih dahulu
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12 col-12">
                  <label>Alamat Lengkap</label>
                  <input type="text" class="form-control" value="<?php echo $this->session->userdata('alamat_lengkap');?>"
                    name="alamat_lengkap" required="">
                  <div class="invalid-feedback">
                  Silahkan lengkapi telebih dahulu
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-7 col-12">
                  <label>Email</label>
                  <input type="email" class="form-control" value="<?php echo $this->session->userdata('email');?>"
                    name="email" required="">
                  <div class="invalid-feedback">
                  Silahkan lengkapi telebih dahulu
                  </div>
                </div>
                <div class="form-group col-md-5 col-12">
                  <label>No HP</label>
                  <input type="tel" class="form-control" value="<?php echo $this->session->userdata('no_hp');?>" name="no_hp" required="">
                  <div class="invalid-feedback">
                  Silahkan lengkapi telebih dahulu
                  </div>
                </div>
              </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" name="submit" value="upload">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>