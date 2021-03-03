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
        success : function(data){
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