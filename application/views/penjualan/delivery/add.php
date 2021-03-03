<section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo base_url('delivery');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('delivery');?>">Data Surat Order</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Form Tambah Data Delivery</h2>
          <p class="section-lead">
            halaman ini berisi Formulir Tambah Data Delivery.
          </p>
        </div>
  </section>

  <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Isian delivery</h4>
                        <div class="card-header-action">
                            <form action="<?php echo base_url('delivery/do_add_delivery'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                                <input type="hidden" value="<?=$r['id_surat_order'];?>" name="id_surat_order">
                                <input type="hidden" value="<?=$r['id_survey'];?>" name="id_survey">
                            <div class="input-group">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-5">No SO </label>
                                <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control" value="<?=$r['no_surat_order'];?>" readonly="" required="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal SO</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" value="<?=$r['tgl_so'];?>"  required="" readonly="" disabled>
                                <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal survey</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" value="<?=$r['tgl_survey'];?>" required="" readonly="" disabled>
                              </div>
                              <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Kirim</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon"  value="<?=$r['tgl_kirim'];?>" required="" readonly="" disabled>
                              </div>
                              <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" value="<?=$r['nama_koordinator'];?>" required="" readonly="" disabled>
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
                                        <input type="text" class="form-control" value="<?=$r['nama_konsumen'];?>" aria-label="" readonly="" disabled>
                                        <<!-- div class="input-group-append">
                                            <button class="btn btn-icon btn-primary icon-left btn-primary" type="button" onclick="education_fields();"><i class="fas fa-plus"></i></button>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota/Kabupaten</label>
                                <div class="col-sm-12 col-md-7" >
                                    <select id="kab" readonly="" disabled="" class="form-control selectric kabupaten" >
                                        <option value="0">Pilih Kota/Kabupaten</option>
                                        <?php foreach ($kab as $k) : ?>
                                            <option <?= $r['id_kab'] == $k['id_kab'] ? 'selected' : ''; ?> <?= set_select('id_kab', $k['id_kab']) ?> value="<?= $k['id_kab'] ?>"><?= $k['nama_kabupaten'] ?></option>
                                        <?php endforeach; ?>
                                        <!-- <?php foreach($data->result() as $row):?>
                                            <option value="<?php echo $row->id_kab;?>"><?php echo $row->nama_kabupaten;?></option>
                                        <?php endforeach;?> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select id="kec" readonly="" disabled="" class="form-control selectric kecamatan">
                                        <?php foreach ($kec as $k) : ?>
                                            <option <?= $r['id_kec'] == $k['id_kec'] ? 'selected' : ''; ?> <?= set_select('id_kec', $k['id_kec']) ?> value="<?= $k['id_kec'] ?>"><?= $k['nama_kecamatan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelurahan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select id="kel" readonly="" disabled="" class="form-control selectric kelurahan">
                                        <?php foreach ($kel as $k) : ?>
                                            <option <?= $r['id_kel'] == $k['id_kel'] ? 'selected' : ''; ?> <?= set_select('id_kel', $k['id_kel']) ?> value="<?= $k['id_kel'] ?>"><?= $k['nama_kelurahan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control almt"
                                        required="" readonly="" disabled><?=$r['alamat_penagihan'];?></textarea>
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Jatuh Tempo</label>
                                <div class="col-lg-2">
                                    <select value="<?=$r['tgl_tempo'];?>" disabled class="form-control selectric">
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
                                    <select value="<?=$r['bulan_awal'];?>" disabled class="form-control selectric">
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
                                    <select value="<?=$r['bulan_akhir'];?>" disabled class="form-control selectric">
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
                                    <input type="text" class="form-control only-number" value="<?=$r['no_telp'];?>" disabled required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">Driver</label>
                              <div class="col-sm-12 col-md-7" >
                                  <select name="driver" class="form-control selectric">
                                      <option value="0" selected disabled="">Pilih Driver</option>
                                      <?php foreach($driver->result() as $row):?>
                                          <option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nama_lengkap;?></option>
                                      <?php endforeach;?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">Helper</label>
                              <div class="col-sm-12 col-md-7" >
                                  <select name="helper" class="form-control selectric">
                                      <option value="0" selected disabled="">Pilih Helper</option>
                                      <?php foreach($helper->result() as $row):?>
                                          <option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nama_lengkap;?></option>
                                      <?php endforeach;?>
                                  </select>
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
 
            $('.kabupaten').change(function(){ 
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
                var kode_detail = $('[name="kode_detail"]').val();
                $.ajax({
                    url : "<?php echo site_url('penjualan/get_data_edit');?>",
                    method : "POST",
                    data :{kode_detail :kode_detail},
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
                    html += '<option value='+data[i].id_kec+'>'+data[i].nama_kecamatan+'</option>';
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
                    html += '<option value='+data[i].id_kel+'>'+data[i].nama_kelurahan+'</option>';
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