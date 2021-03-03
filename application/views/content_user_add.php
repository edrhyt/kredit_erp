 <section class="section">
   <div class="section-header">
     <div class="section-header-back">
       <a href="<?php echo base_url('user');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
     </div>
     <h1><?= $breadcrumb?></h1>
     <div class="section-header-breadcrumb">
       <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
       <div class="breadcrumb-item"><a href="<?php echo base_url('user');?>">User</a></div>
       <div class="breadcrumb-item"><?= $breadcrumb?></div>
     </div>
   </div>
   <div class="section-body">
     <h2 class="section-title"><?= $breadcrumb?></h2>
     <p class="section-lead">
       Halaman ini berisi form untuk pendaftaran User baru
     </p>
     <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h4>Form User Baru</h4>
           </div>
           <div class="card-body">
             <div class="row">
               <div class="col-md-3">
               <?= form_open_multipart('user/add_user');?> 
                 <div class="avatar-upload">
                   <div class="avatar-edit">
                     <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="berkas" />
                     <label for="imageUpload"></label>
                   </div>
                   <div class="avatar-preview">
                     <div id="imagePreview" <?php echo'style="background-image: url('.base_url("upload/img/default.png").');"';?>>
                     </div>
                   </div>
                   <br>
                   <small>*Rekomendasi Ukuran 480px X 480px</small>
                 </div>
               </div>
               <div class="col-md-9">
                   <div class="form-group row mb-12">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="text" class="form-control" name="username" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="text" class="form-control" name="nama_lengkap" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KTP</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="tel" class="form-control" name="no_ktp" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="text" class="form-control" name="alamat_lengkap" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="tel" class="form-control" name="no_hp" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="email" class="form-control" name="email" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hak Akes</label>
                     <div class="col-sm-12 col-md-8">
                       <select class="form-control selectric" name="hak_akses">
                         <option value="Administrator">Administrator</option>
                       </select>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                     <div class="col-sm-12 col-md-8">
                       <button class="btn btn-primary" type="submit" name="submit" value="upload">Simpan</button>
                       <button class="btn btn-danger" type="reset">Batal</button>
                     </div>
                   </div>
                 
               </div>
             </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>