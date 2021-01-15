<section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo base_url('so');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('so');?>">Data Surat Order</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Tambah Data Form Surat Order</h2>
          <p class="section-lead">
            halaman ini berisi Formulir Surat Order.
          </p>
        </div>
  </section>

  <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Isian Surat Order</h4>
                        <div class="card-header-action">
                            <form action="<?php echo base_url('so/add_so'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                            <div class="input-group">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SO </label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" class="form-control text-center" name="no_surat_order" value="<?php echo $this->session->userdata('lokasi');?> - " readonly="" required="">
                                </div>
                                <input type="text" class="form-control only-number" name="no_surat_order" required="">
                                <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal SO</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_so" required="">
                                <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Survey</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_survey" >
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Kirim</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_kirim" >
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_koordinator" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota/Kabupaten</label>
                                <div class="col-sm-12 col-md-7" >
                                    <select name="kab" id="kab" class="form-control selectric">
                                        <option value="0" selected disabled="">Pilih Kota/Kabupaten</option>
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
                                        <option value="0" selected disabled="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelurahan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="kel" id="kel" class="form-control selectric kelurahan">
                                        <option value="0" selected disabled="">Pilih Kelurahan/Desa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control almt" name="alamat" required=""></textarea>
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Barang</label>
                                <div class="col-sm-12 col-md-7">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollable" onclick="<?= base_url('penjualan/empty_temp_dtl');?>" id="modal_barang"><i class="far fa-edit"></i> Tambah Data Barang</a>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="total_cart" required="" placeholder="Total Harga Barang" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Angsuran(5 - 10)</label>
                                <div class="col-sm-12 col-md-2">
                                    <select name="jml_angsuran" id="angsuran" onclick="getAngsuran()" class="form-control selectric">
                                        <option>Pilih Angsuran</option>
                                        <option value="5">5 Bulan</option>
                                        <option value="6">6 Bulan</option>
                                        <option value="7">7 Bulan</option>
                                        <option value="8">8 Bulan</option>
                                        <option value="9">9 Bulan</option>
                                        <option value="10">10 Bulan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Diskon DP</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" id="diskon_dp" onkeyup="getTotal()" class="form-control only-number" name="diskon_dp" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi</label>
                              <div class="selectgroup w-100 col-sm-12 col-md-7">
                                <label class="selectgroup-item">
                                  <input type="radio" name="opsi" id="hadiah" value="2" class="selectgroup-input" checked="">
                                  <span class="selectgroup-button selectgroup-button-icon">Hadiah</span>
                                </label>
                                <label class="selectgroup-item">
                                  <input type="radio" name="opsi" id="diskon_koordinator" value="1" class="selectgroup-input">
                                  <span class="selectgroup-button selectgroup-button-icon">Diskon Koordinator</span>
                                </label>
                              </div>
                            </div>

                            <!-- Test 1 -->
                            <div class="form-group row mb-4" id="form1">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hadiah</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="text-box1" name="hadiah">
                                </div>
                            </div>

                            <!-- Test 2 -->
                            <div class="form-group row mb-4" id="form2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Diskon Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control only-number" id="text-box2" onkeyup="getNetto()" name="diskon_koordinator">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Angsuran</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="total" id="total_angsuran" required="" placeholder="Total Angsuran" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Netto</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" name="netto" id="netto" readonly="">
                                </div>
                            </div>
                             <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Angsuran 1</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="angsuran1" id="total_dp" placeholder="Angsuran 1" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Angsuran/Bulan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="angsuran_bln" id="angsuran_bln" placeholder="Angsuran/Bulan" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">Sales Promotor</label>
                              <div class="col-sm-12 col-md-7" >
                                  <select name="karyawan_sp" class="form-control selectric">
                                      <option value="0" selected disabled="">Pilih Sales Promotor</option>
                                      <?php foreach($sales->result() as $row):?>
                                          <option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nama_lengkap;?></option>
                                      <?php endforeach;?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">Demo Booker</label>
                              <div class="col-sm-12 col-md-7" >
                                  <select name="karyawan_db" class="form-control selectric">
                                      <option value="0" selected disabled="">Pilih Demo Booker</option>
                                      <?php foreach($demo->result() as $row):?>
                                          <option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nama_lengkap;?></option>
                                      <?php endforeach;?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">SPV Sales</label>
                              <div class="col-sm-12 col-md-7" >
                                  <select name="karyawan_ss" class="form-control selectric">
                                      <option value="0" selected disabled="">Pilih SPV Sales (SS)</option>
                                      <?php foreach($ss->result() as $row):?>
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

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="padding-right:0px !important">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <form id="form_dtl" style="width:100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container tbl_input">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <h4>Produk</h4>
                            <div class="row sortable-card">
                            <?php foreach ($inv as $row) : ?>
                                <div class="col-md-5">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <button type="button" class="btn btn-info btn-block" disabled=""><?php echo $row->merk;?></button>
                                            <input type="hidden" name="merk" value="<?= $row->merk;?>">
                                            <div class="card-header">
                                                <h6><small><?php echo $row->nama_barang;?></small></h6>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <h6><small><?php echo 'Rp '.number_format($row->harga);?></small></h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" name="quantity" id="<?php echo $row->id_barang;?>" value="1" class="quantity form-control">
                                                </div>
                                            </div>
                                        </div>
                                            <button type="button" id="btn_dtl" class="add_cart btn btn-success btn-block" data-idbarang="<?php echo $row->id_barang;?>" data-namabarang="<?php echo $row->nama_barang;?>" data-harga="<?php echo $row->harga;?>">Tambah</button>
                                            <br>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                                
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h4>Keranjang</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_cart">

                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="edit_dtl" class="btn btn-secondary simpan disabled" disabled>Edit</button>
                <button type="button" class="btn btn-primary simpan" onclick="<?= base_url('penjualan/add_temp_dtl');?>" id="submit_dtl">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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