<?php  echo $this->session->flashdata('msg'); ?>
<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?php echo base_url('profile');?>">Profile</a></div>
      <div class="breadcrumb-item">Ganti Password</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama_lengkap');?></h2>
    <p class="section-lead">
      Ubah passwordmu di halaman ini !
    </p>
    <br>
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">
            <img alt="image" src="<?php echo base_url();?>upload/img/<?php echo $this->session->userdata('img');?>"
              class="rounded-circle profile-widget-picture">
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
                <div class="slash"></div> <?php echo $this->session->userdata('hak_akses');?>
              </div>
            </div>
          </div>
          <div class="profile-widget-description">
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php echo base_url('profile');?>" class="btn btn-icon btn-block icon-left btn-primary"><i class="far fa-edit"></i> Ganti Profile</a>
              </div>
            </div>  
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
        <form action="<?php echo base_url('profile/do_edit_password'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
            <div class="card-header">
              <h4>Edit Password</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12 col-12">
                  <label>Password Lama</label>
                  <input type="password" class="form-control" name="pass_lama" required="">
                  <div class="invalid-feedback">
                    Silahkan lengkapi telebih dahulu
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12 col-12">
                  <label>Password Baru</label>
                  <input type="password" class="form-control" name="pass_baru" required="">
                  <div class="invalid-feedback">
                    Silahkan lengkapi telebih dahulu
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12 col-12">
                  <label>Ulangi Password</label>
                  <input type="password" class="form-control" name="pass_baru_ulang" required="">
                  <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" name="submit">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>