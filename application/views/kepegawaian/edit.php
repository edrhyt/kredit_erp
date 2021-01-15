 <section class="section">
   <div class="section-header">
     <div class="section-header-back">
       <a href="<?php echo base_url('kepegawaian');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
     </div>
     <h1><?= $breadcrumb?></h1>
     <div class="section-header-breadcrumb">
       <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
       <div class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian');?>">Kepegawaian</a></div>
       <div class="breadcrumb-item"><?= $breadcrumb?></div>
     </div>
   </div>
   <div class="section-body">
     <h2 class="section-title"><?= $breadcrumb?></h2>
     <p class="section-lead">
       Halaman ini berisi form untuk ubah karyawan
     </p>
     <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h4>Form Ubah Karyawan</h4>
           </div>
           <div class="card-body">
             <div class="row">
               <div class="col-md-3">
               <?= form_open_multipart('kepegawaian/do_edit');?> 
                 <div class="avatar-upload">
                   <div class="avatar-edit">
                     <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="berkas" />
                     <label for="imageUpload"></label>
                   </div>
                   <div class="avatar-preview">
                     <div id="imagePreview" <?php echo'style="background-image: url('.base_url("upload/img/").''.$r['img'].');"';?>>
                     </div>
                   </div>
                   <br>
                   <small>*Rekomendasi Ukuran 480px X 480px</small>
                 </div>
               </div>
               <div class="col-md-9">
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="text" class="form-control" name="nama_lengkap" value="<?=$r['nama_lengkap'];?>" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                    <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="text" class="form-control" name="tempat_lahir" value="<?=$r['tempat_lahir'];?>" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                    <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Lahir</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="date" class="form-control" name="tgl_lahir" value="<?=$r['tgl_lahir'];?>" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KTP</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="tel" class="form-control" name="no_ktp" value="<?=$r['no_ktp'];?>" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                     <div class="col-sm-12 col-md-8">
                       <textarea class="form-control almt" name="alamat" required=""><?php echo $r['alamat'];?></textarea>
                          <div class="invalid-feedback">
                            Silahkan lengkapi telebih dahulu
                          </div>
                     </div>
                   </div>
                   <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP</label>
                     <div class="col-sm-12 col-md-8">
                       <input type="tel" class="form-control" name="no_hp" value="<?=$r['no_hp'];?>" required="">
                       <div class="invalid-feedback">
                         Silahkan lengkapi telebih dahulu
                       </div>
                     </div>
                   </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Divisi</label>
                        <div class="col-sm-12 col-md-8" >
                            <select name="divisi" id="divisi" class="form-control selectric">
                                <?php if($r['id_divisi'] == '1'){
                                        echo'
                                        <option value="" selected disabled>Marketing</option>';
                                      }else if($r['id_divisi'] == '2'){
                                        echo'
                                        <option value="" selected disabled>Collection</option>';
                                      }else if($r['id_divisi'] == '3'){
                                        echo'
                                        <option value="" selected disabled>Admin</option>';
                                      }
                                ?>
                                <?php foreach($data->result() as $row):?>
                                    <option value="<?php echo $row->id_divisi;?>"><?php echo $row->divisi;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                        <div class="col-sm-12 col-md-8">
                            <select name="jabatan" id="jabatan" class="form-control selectric jabatan">
                                <option value="<?=$r['id_jabatan'];?>" selected disabled>Pilih Jabatan</option>
                                <?php
                                      if($r['id_jabatan'] == '001'){
                                        echo'
                                        <option value="" selected>Kepala Cabang</option>';
                                      }else if($r['id_jabatan'] == '002'){
                                        echo'
                                        <option value="" selected>SPV Sales (SS)</option>';
                                      }else if($r['id_jabatan'] == '003'){
                                        echo'
                                        <option value="" selected>Demo Booker</option>';
                                      }else if($r['id_jabatan'] == '004'){
                                        echo'
                                        <option value="" selected>Sales Promotor</option>';
                                      }else if($r['id_jabatan'] == '005'){
                                        echo'
                                        <option value="" selected>Training</option>';
                                      }else if($r['id_jabatan'] == '006'){
                                        echo'
                                        <option value="" selected>SPV Credit Control (CC)</option>';
                                      }else if($r['id_jabatan'] == '007'){
                                        echo'
                                        <option value="" selected>Surveyor</option>';
                                      }else if($r['id_jabatan'] == '008'){
                                        echo'
                                        <option value="" selected>Kolektor</option>';
                                      }else if($r['id_jabatan'] == '009'){
                                        echo'
                                        <option value="" selected>Head</option>';
                                      }else if($r['id_jabatan'] == '010'){
                                        echo'
                                        <option value="" selected>Staff</option>';
                                      }else if($r['id_jabatan'] == '011'){
                                        echo'
                                        <option value="" selected>Driver</option>';
                                      }else if($r['id_jabatan'] == '012'){
                                        echo'
                                        <option value="" selected>Helper</option>';
                                      }else if($r['id_jabatan'] == '013'){
                                        echo'
                                        <option value="" selected>OB/Umum</option>';
                                      }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="<?=$r['id_karyawan'];?>" name="id_karyawan">
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

 <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#divisi').change(function(){
        var id=$(this).val();
        $.ajax({
            url : "<?php echo base_url();?>kepegawaian/get_jabatan",
            method : "POST",
            data : {id: id},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id_jabatan+'>'+data[i].jabatan+'</option>';
                }
                $('.jabatan').html(html);
                
            }
        });


    });


    });
</script>