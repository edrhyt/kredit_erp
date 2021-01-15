<section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo base_url('survey');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('survey');?>">Data Survey</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Ubah Data Form Survey</h2>
          <p class="section-lead">
            halaman ini berisi Ubah Formulir Survey.
          </p>
        </div>
  </section>

  <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Isian Survey</h4>
                        <div class="card-header-action">
                            <form action="<?php echo base_url('survey/do_edit_survey'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                                <input type="hidden" name="id_survey" value="<?=$r['id_survey'];?>">
                                <input type="hidden" name="id_surat_order" value="<?=$r['id_surat_order'];?>">
                                <input type="hidden" name="kode_detail" value="<?=$r['kode_detail'];?>">
                            <div class="input-group">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SO </label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="no_surat_order" value="<?=$r['no_surat_order'];?>" readonly="" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal SO</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_so" value="<?=$r['tgl_so'];?>"  required="">
                                <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Survey</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_survey" value="<?=$r['tgl_survey'];?>" >
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Kirim</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_kirim" value="<?=$r['tgl_kirim'];?>" >
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_koordinator" value="<?=$r['nama_koordinator'];?>" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Konsumen</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="education_fields">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="nama_konsumen" value="<?=$r['nama_konsumen'];?>" aria-label="">
                                        <div class="input-group-append">
                                            <button class="btn btn-icon btn-primary icon-left btn-primary" type="button" onclick="education_fields();"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota/Kabupaten</label>
                                <div class="col-sm-12 col-md-7" >
                                    <select name="kab" id="kab" class="form-control selectric kab" >
                                        <option value="0">Pilih Kota/Kabupaten</option>
                                        <?php foreach($data->result() as $row):?>
                                            <option value="<?php echo $row->id_kab;?>"><?php echo $row->nama_kabupaten;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="kec" id="kec" class="form-control selectric kecamatan">
                                        <option value="0">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelurahan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="kel" id="kel" class="form-control selectric kelurahan">
                                        <option value="0">Pilih Kelurahan/Desa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control almt" name="alamat"
                                        required=""><?=$r['alamat_penagihan'];?></textarea>
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Jatuh Tempo</label>
                                <div class="col-lg-2">
                                    <select name="tgl_tempo" value="<?=$r['tgl_tempo'];?>" class="form-control selectric">
                                       <?php
                                        for ($i=1; $i<=31; $i++)
                                        {
                                            ?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            <!-- </div>
                            <div class="form-group row mb-4"> -->
                                <label class="col-form-label text-md-center col-12 col-md-3 col-lg-1">Bulan</label>
                                <div class="col-sm-12 col-md-2">
                                    <select name="bulan_awal" class="form-control selectric">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                     </select> 
                                </div>
                                <label class="col-form-label text-md-center col-12 col-md-3 col-lg-1">s/d</label>
                                <div class="col-sm-12 col-md-2">
                                    <select name="bulan_akhir" class="form-control selectric">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                     </select> 
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telepon</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control only-number" name="no_telp" value="<?= $r['no_telp'];?>" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    <button class="btn btn-danger" type="reset">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="float-left">
                            TMS - BANDUNG 2020
                        </div>
                        <div class="float-right">
                            Form Isian Surat Order
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function(){
            //call function get data edit
            get_data_edit();
 
            $('.kab').change(function(){ 
                var id=$(this).val();
                var id_kec = "<?php echo $id_kec;?>";
                $.ajax({
                    url : "<?php echo site_url('penjualan/get_data_kecamatan');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="kec"]').empty();
 
                        $.each(data, function(key, value) {
                            if(id_kec==value.id_kec){
                                $('select[name="kec"]').append('<option value="'+ value.id_kec +'" selected>'+ value.nama_kecamatan +'</option>').trigger('change');
                            }else{
                                $('select[name="kec"]').append('<option value="'+ value.id_kec +'">'+ value.nama_kecamatan +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            }); 
 
            //load data for edit
            function get_data_edit(){
                var id_survey = $('[name="id_survey"]').val();
                $.ajax({
                    url : "<?php echo site_url('penjualan/get_data_edit');?>",
                    method : "POST",
                    data :{id_survey :id_survey},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            // $('[name="product_name"]').val(data[i].product_name);
                            $('[name="kab"]').val(data[i].id_kab).trigger('change');
                            $('[name="kec"]').val(data[i].id_kec).trigger('change');
                            // $('[name="product_price"]').val(data[i].product_price);
                        });
                    }
 
                });
            }
             
        });
    </script>
<script type="text/javascript">
    function getTotal()
    {   
         var harga = parseInt($('#total_cart').val());
         var diskon = parseInt($('#diskon_dp').val());
         var total = harga - diskon;
         $("#total_dp").val(total);  
    }

    function getAngsuran()
    {   
         var angsuran = $('#angsuran').val();
         var harga = parseInt($('#total_cart').val());
         var total = (harga * angsuran);
         $("#total_angsuran").val(total);
         var angsuran_bln = total / angsuran;
         $("#angsuran_bln").val(angsuran_bln);
    }    

    function getNetto(){
        var angsuran = $('#angsuran').val();
        var diskon_koordinator = $('#text-box2').val();
        var total = $("#total_angsuran").val();
        var netto = total - diskon_koordinator;
        $("#netto").val(netto);
        var angsuran_bln = netto / angsuran;
        $("#angsuran_bln").val(parseInt(angsuran_bln));
    }

    function getEmpty(){
        getEmpty().load("<?php echo base_url();?>penjualan/empty_temp_dtl");
    }

    $(document).ready(function() {

        $("#submit_dtl").click(function() {

            // $('#submit_dtl').load("<?php echo base_url();?>penjualan/add_temp_dtl");
            $("#edit_dtl").addClass("btn btn-warning").removeClass("btn-secondary disabled").removeAttr("disabled");
            $("#submit_dtl").addClass("btn-secondary disabled").removeClass("btn-primary").attr('disabled','disabled');
            $('#total_cart').val($('#total_harga').text());
            $('.add_cart').attr('disabled', true);

            $.ajax({
                url : "<?php echo base_url();?>penjualan/add_temp_dtl",
                method : "POST",
                success :function(data){
                  console.log("sukses");
                }
              });

        });

        $("#edit_dtl").click(function() {
          $("#submit_dtl").addClass("btn-primary").removeClass("btn-secondary disabled").removeAttr("disabled");
          $("#edit_dtl").addClass("btn-secondary disabled").removeClass("btn-warning").attr('disabled','disabled');
          $(".frm_dtl").removeClass("tabel-detail-sukses").removeAttr("disabled");
          $("#add_row").addClass("btn-primary").removeClass("btn-secondary disabled").removeAttr("disabled");
          $("#delete_row").addClass("btn-danger").removeClass("btn-secondary disabled").removeAttr("disabled");
        });

        // $("#diskon_dp").keyup(function(){ 
        //  var harga = parseInt($('#total_cart').val());
        //  var diskon = parseInt($('#diskon_dp').val());
        //  var total = harga.replace('Rp','') - diskon_dp.replace('Rp','');
        //  $("#total_dp").val(total); 
        //     }); 

        $('#kab').change(function(){
        var id=$(this).val();
        $.ajax({
            url : "<?php echo base_url();?>penjualan/get_kecamatan",
            method : "POST",
            data : {id: id},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id_kec+'>'+data[i].nama+'</option>';
                }
                $('.kecamatan').html(html);
                
            }
        });
    });



    $("#edit_dtl").click(function() {
        $("#submit_dtl").addClass("btn-primary").removeClass("btn-secondary disabled").removeAttr("disabled");
        $("#edit_dtl").addClass("btn-secondary disabled").removeClass("btn-warning").attr('disabled','disabled');
        $('.add_cart').attr('disabled', false);
        $('#total_cart').val(0);   
    });
    $('#modal_barang').on('click', function(){
        $.ajax({
        url : "<?php echo base_url();?>penjualan/empty_temp_dtl",
        method : "POST",
        success :function(data){
          console.log("sukses");
        }
      });
    });


     $('#kec').change(function(){
        var id=$(this).val();
        $.ajax({
            url : "<?php echo base_url();?>penjualan/get_kelurahan",
            method : "POST",
            data : {id: id},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id_kel+'>'+data[i].nama+'</option>';
                }
                $('.kelurahan').html(html);
                
            }
        });

        
    });
    

    $('.add_cart').on('click', function(){
        // e.preventDefault();     
          var id_barang     = $(this).data("idbarang");
          var nama_barang   = $(this).data("namabarang");
          var harga         = $(this).data("harga");
          var quantity      = $('#' + id_barang).val();

          $.ajax({
            url : "<?php echo base_url();?>penjualan/add_to_cart",
            type : "POST",
            data : {id_barang: id_barang, nama_barang: nama_barang, harga: harga, quantity: quantity},
            success: function(data)
            {
              $('#detail_cart').html(data);
              // alert(data);
            }
          });
    });

    $(function(){
        $('#form1').show();
        $('#form2').hide();


        // Test 
        $('#hadiah').on('click', function(){
            $('#form1').show();
            $('#form2').hide();
        });

        $('#diskon_koordinator').on('click', function(){
            $('#form1').hide();
            $('#form2').show();
        });
    });

    $(".only-number").keypress(function (e){
      var charCode = (e.which) ? e.which : e.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
    });


    // Load shopping cart
    $('#detail_cart').load("<?php echo base_url();?>penjualan/load_cart");

    //Hapus Item Cart
    $(document).on('click','.remove_cart',function(){
      var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
      $.ajax({
        url : "<?php echo base_url();?>penjualan/hapus_cart",
        method : "POST",
        data : {row_id : row_id},
        success :function(data){
          $('#detail_cart').html(data);
        }
      });
    });

    });
</script>