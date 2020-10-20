<section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo base_url('penjualan/surat_order');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('penjualan/surat_order');?>">Surat Order</a></div>
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
                            <form action="<?php echo base_url('penjualan/add_so'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                            <div class="input-group">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SO </label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" class="form-control text-center" name="no_surat_order" value="<?php echo $this->session->userdata('lokasi');?> - " readonly="" required="">
                                </div>
                                <input type="text" class="form-control" name="no_surat_order" required="">
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
                                        <option value="0">-PILIH-</option>
                                        <?php foreach($data->result() as $row):?>
                                            <option value="<?php echo $row->id_kab;?>"><?php echo $row->nama;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="kec" id="kec" class="form-control selectric kecamatan">
                                        <option value="0">-PILIH-</option>
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
                                    <textarea class="form-control almt" name="alamat" required=""></textarea>
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Barang</label>
                                <div class="col-sm-12 col-md-7">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollable"><i class="far fa-edit"></i> Tambah Data Barang</a>
                                </div>
                            </div>
                            <!-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                              <div class="selectgroup w-100 col-sm-12 col-md-7">
                                <label class="selectgroup-item">
                                  <input type="radio" name="value" id="hadiah" value="50" class="selectgroup-input" checked="">
                                  <span class="selectgroup-button">Hadiah</span>
                                </label>
                                <label class="selectgroup-item">
                                  <input type="radio" name="value" id="diskon_koordinator" value="100" class="selectgroup-input">
                                  <span class="selectgroup-button">Diskon Koordinator</span>
                                </label>
                                </div>
                            </div> -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="total" required="" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Angsuran(5 - 10)</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="diskon_dp" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Diskon DP</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="diskon_dp" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Angsuran 1</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="total" required="" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hadiah</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="hadiah" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Diskon Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="diskon_koordinator" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Netto</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="total" required="" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Angsuran/Bulan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="total" required="" readonly="">
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
                        <div class="col-md-8">
                            <h4>Produk</h4>
                            <div class="row">
                            <?php foreach ($inv as $row) : ?>
                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <!-- <img width="200" src="<?php echo base_url().'assets/images/'.$row->produk_image;?>"> -->
                                        <div class="caption">
                                            <h6><?php echo $row->nama_barang;?></h6>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <h5><?php echo 'Rp '.number_format($row->harga);?></h5>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" name="quantity" id="<?php echo $row->id_barang;?>" value="1" class="quantity form-control">
                                                </div>
                                            </div>
                                            <button class="add_cart btn btn-success btn-block" data-idbarang="<?php echo $row->id_barang;?>" data-namabarang="<?php echo $row->nama_barang;?>" data-harga="<?php echo $row->harga;?>">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                                
                            </div>

                        </div>
                        <div class="col-md-4">
                            <h4>Shopping Cart</h4>
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
                        <!-- <div class="col-md-12 column">
                            <table class="table table-bordered table-hover " id="tab_logic" >
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th class="text-center">
                                            Nama Barang
                                        </th>
                                        <th class="text-center">
                                            Merk
                                        </th>
                                        <th class="text-center">
                                            Type
                                        </th>
                                        <th class="text-center">
                                            Jumlah barang
                                        </th>
                                        <th class="text-center">
                                            Harga Satuan
                                        </th>
                                        <th class="text-center">
                                            Jumlah
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0'>
                                        <td id="addr0s">1</td>
                                        <td>
                                            <input type="text" name='nama_brg[]' placeholder='Nama Barang' class="form-control frm_dtl" />
                                        </td>
                                        <td>
                                            <input type="text" name='merk_brg[]' placeholder='Merk Barang' class="form-control frm_dtl" />
                                        </td>
                                        <td>
                                            <input type="text" name='type_brg[]' placeholder='Type Barang' class="form-control frm_dtl" />
                                        </td>
                                        <td>
                                            <input type="text" id="jml_brg" name='jml_brg[]' placeholder='Jumlah Barang' class="form-control frm_dtl"  />
                                        </td>
                                        <td>
                                            <input type="text" id="harga_brg" name='harga_brg[]' placeholder='Harga Satuan' class="form-control frm_dtl"  />
                                        </td>
                                        <td>
                                            <input type="text" id="jum" name='jum[]' placeholder='Jumlah' class="form-control frm_dtl" readonly="" />
                                            
                                        </td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                   <!--  <div id="add_row" class="btn btn-primary float-left">Tambah Baris</div>
                    <div id='delete_row' class="float-right btn btn-danger">Hapus Baris</div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="edit_dtl" class="btn btn-secondary disabled" disabled>Edit</button>
                <button type="button" class="btn btn-primary" id="submit_dtl">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
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

                                                 $('.add_cart').click(function(){
                                                  var id_barang     = $(this).data("idbarang");
                                                  var nama_barang   = $(this).data("namabarang");
                                                  var harga         = $(this).data("harga");
                                                  var quantity      = $('#' + id_barang).val();
                                                  $.ajax({
                                                    url : "<?php echo base_url();?>penjualan/add_to_cart",
                                                    method : "POST",
                                                    data : {id_barang: id_barang, nama_barang: nama_barang, harga: harga, quantity: quantity},
                                                    success: function(data){
                                                      $('#detail_cart').html(data);
                                                    }
                                                  });
                                                });

                                                // Load shopping cart
                                                $('#detail_cart').load("<?php echo base_url();?>penjualan/load_cart");

                                                //Hapus Item Cart
                                                $(document).on('click','.hapus_cart',function(){
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

                                                for (var j = 0; j < 7; j++) {
                                                    $(this).parents('#addr' + j ).children('#harga_brg,#jml_brg').keyup(function() {
                                                        var harga_brg   = parseInt($(this).parents('#addr' + j ).children('#harga_brg').val());
                                                        var jml_brg     = parseInt($(this).parents('#addr' + j ).children('#jml_brg').val());
                                                        var jum         = harga_brg * jml_brg ;
                                                        $(this).parents('#addr' + j ).children('#jum').val(jum);
                                                    });
                                                }
                                                                                                    // for (var i = 0; i < 10; i++) {
                                                    // var addr = $('#addr' + i);
                                                    // $(addr + ' #harga_brg,' + addr + ' #jml_brg').keyup(function() {
                                                    //     var harga_brg   = parseInt($(addr + ' #harga_brg').val());
                                                    //     var jml_brg     = parseInt($(addr + ' #jml_brg').val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $(addr + ' #jum').val(jum);
                                                    // });
                                                                                                   
                                                    // }
                                                    // $("#addr0 #harga_brg,#addr0 #jml_brg").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr0 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr0 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr0 #jum").val(jum);
                                                    // });
                                                    // $("#addr1 #harga_brg,#addr1 #jml_brg,#addr1 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr1 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr1 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr1 #jum").val(jum);
                                                    // });
                                                    //    $("#addr2 #harga_brg,#addr2 #jml_brg,#addr2 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr2 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr2 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr2 #jum").val(jum);
                                                    // });
                                                    //    $("#addr3 #harga_brg,#addr3 #jml_brg,#addr3 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr3 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr3 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr3 #jum").val(jum);
                                                    // });
                                                    //    $("#addr4 #harga_brg,#addr4 #jml_brg,#addr4 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr4 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr4 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr4 #jum").val(jum);
                                                    // });
                                                    //    $("#addr5 #harga_brg,#addr5 #jml_brg,#addr5 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr5 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr5 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr5 #jum").val(jum);
                                                    // });
                                                    //    $("#addr6 #harga_brg,#addr6 #jml_brg,#addr6 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr6 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr6 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr6 #jum").val(jum);
                                                    // });
                                                    //    $("#addr7 #harga_brg,#addr7 #jml_brg,#addr7 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr7 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr7 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr7 #jum").val(jum);
                                                    // });
                                                    //    $("#addr8 #harga_brg,#addr8 #jml_brg,#addr8 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr8 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr8 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr8 #jum").val(jum);
                                                    // });
                                                    //    $("#addr9 #harga_brg,#addr9 #jml_brg,#addr9 #jum").keyup(function() {
                                                    //     var harga_brg   = parseInt($("#addr9 #harga_brg").val());
                                                    //     var jml_brg     = parseInt($("#addr9 #jml_brg").val());
                                                    //     var jum         = harga_brg * jml_brg ;
                                                    //     $("#addr9 #jum").val(jum);
                                                    // });
                                                });
                                            </script>