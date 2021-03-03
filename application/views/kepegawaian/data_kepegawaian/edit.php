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
                     <input type="hidden" value="<?=$r['nik'];?>" name="nik">
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
                       <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_lahir" value="<?=$r['tgl_lahir'];?>" required="">
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
                              <option value="<?=$r['id_divisi'];?>" selected disabled>Pilih Divisi</option>
                                <?php foreach ($divisi as $d) : ?>
                                    <option <?= $r['id_divisi'] == $d['id_divisi'] ? 'selected' : ''; ?> <?= set_select('id_divisi', $d['id_divisi']) ?> value="<?= $d['id_divsi'] ?>"><?= $d['divisi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                        <div class="col-sm-12 col-md-8">
                            <select name="jabatan" id="jabatan" class="form-control selectric jabatan">
                                <option value="<?=$r['id_jabatan'];?>" selected disabled>Pilih Jabatan</option>
                                <?php foreach ($jabatan as $j) : ?>
                                    <option <?= $r['id_jabatan'] == $j['id_jabatan'] ? 'selected' : ''; ?> <?= set_select('id_jabatan', $j['id_jabatan']) ?> value="<?= $j['id_jabatan'] ?>"><?= $j['nama_jabatan'] ?></option>
                                <?php endforeach; ?>
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
      //call function get data edit
      get_data_edit();

      $('.divisi').change(function(){ 
          var id=$(this).val();
          var id_jabatan = "<?php echo $id_jabatan;?>";
          $.ajax({
              url : "<?php echo site_url('kepegawaian/get_data_jabatan');?>",
              method : "POST",
              data : {id: id},
              async : true,
              dataType : 'json',
              success: function(data){

                  $('select[name="jabatan"]').empty();

                  $.each(data, function(key, value) {
                      if(id_jabatan==value.id_jabatan){
                          $('select[name="jabatan"]').append('<option value="'+ value.id_jabatan +'" selected>'+ value.jabatan +'</option>').trigger('change');
                      }else{
                          $('select[name="jabatan"]').append('<option value="'+ value.id_jabatan +'">'+ value.jabatan +'</option>');
                      }
                  });

              }
          });
          return false;
      });

      //load data for edit
        function get_data_edit(){
            var nik = $('[name="nik"]').val();
            $.ajax({
                url : "<?php echo site_url('kepegawaian/get_data_edit');?>",
                method : "POST",
                data :{nik :nik},
                async : true,
                dataType : 'json',
                success : function(data){
                    $.each(data, function(i, item){
                        $('[name="divisi"]').val(data[i].id_divisi).trigger('change');
                        $('[name="jabatan"]').val(data[i].id_jabatan).trigger('change');
                    });
                }

            });
        }

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