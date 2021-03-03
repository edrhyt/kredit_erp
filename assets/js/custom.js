// $(document).ready(function() {
$('.data-table1').DataTable();

$('.data-table2').DataTable({
    "order": [[0, "desc"]]
});

window.setTimeout(function () {
    $(".alert").slideDown(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 4000);

$('.data-table1').on('click', '.non-aktif-modal', function (ev) {
    var href = $(this).attr('href');
    if (!$('#dataConfirmModal1').length) {
        $('body').append('<div class="modal fade" id="dataConfirmModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog mdl-del my-md"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel">Status Petugas</h4></div><div class="modal-body pd-bottom-z"><div class="alert1 alert-warning1"><p class="isi_modal"></p></div></div><div class="modal-footer"><a class="btn btn-primary" id="dataConfirmOK1">Simpan Perubahan</a><button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button></div></div> </div></div>');
    }
    $('#dataConfirmModal1').find('.isi_modal').text($(this).attr('data-confirm'));
    $('#dataConfirmOK1').attr('href', href);
    $('#dataConfirmModal1').modal({
        show: true
    });
    return false;
});

$('.data-table1').on('click', '.reset-modal', function (ev) {
    var href = $(this).attr('href');
    if (!$('#dataConfirmModal').length) {
        $('body').append('<div class="modal fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog mdl-del my-md"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel">Pemberitahuan</h4></div><div class="modal-body pd-bottom-z"><div class="alert1 alert-warning1"><p class="isi_modal"></p></div></div><div class="modal-footer"><a class="btn btn-primary" id="dataConfirmOK">Reset Ulang</a><button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button></div></div> </div></div>');
    }
    $('#dataConfirmModal').find('.isi_modal').text($(this).attr('data-confirm'));
    $('#dataConfirmOK').attr('href', href);
    $('#dataConfirmModal').modal({
        show: true
    });
    return false;
});


$('.data-table1').on('click', '.delete-modal', function (ev) {
    var href = $(this).attr('href');
    if (!$('#dataConfirmModal2').length) {
        $('body').append('<div class="modal fade" id="dataConfirmModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog mdl-del my-md"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel">Hapus Petugas</h4></div><div class="modal-body pd-bottom-z"><div class="alert1 alert-warning1"><p class="isi_modal"></p></div></div><div class="modal-footer"><a class="btn btn-danger" id="dataConfirmOK2">Hapus</a><button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button></div></div> </div></div>');
    }
    $('#dataConfirmModal2').find('.isi_modal').text($(this).attr('data-confirm'));
    $('#dataConfirmOK2').attr('href', href);
    $('#dataConfirmModal2').modal({
        show: true
    });
    return false;
});

$('.data-table2').on('click', '.delete-modal', function (ev) {
    var href = $(this).attr('href');
    if (!$('#dataConfirmModal2').length) {
        $('body').append('<div class="modal fade" id="dataConfirmModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog mdl-del my-md"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data</h4></div><div class="modal-body pd-bottom-z"><div class="alert1 alert-warning1"><p class="isi_modal"></p></div></div><div class="modal-footer"><a class="btn btn-danger" id="dataConfirmOK2">Hapus</a><button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button></div></div> </div></div>');
    }
    $('#dataConfirmModal2').find('.isi_modal').text($(this).attr('data-confirm'));
    $('#dataConfirmOK2').attr('href', href);
    $('#dataConfirmModal2').modal({
        show: true
    });
    return false;
});
// });

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function () {
    readURL(this);
});


// tabel multi

var i = 1;
var $no = parseInt($('#addr0s').html());
$("#add_row").click(function () {
    b = i - 1;
    $('#addr' + i).html($('#addr' + b).html()).find('td:first-child').html($no + i);
    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
    $('#tab_logic').append('')

    i++;
});

$("#delete_row").click(function () {
    if (i > 1) {
        $("#addr" + (i - 1)).html('');
        i--;
    } else {
        $('#addr').remove();
    };
});

//
var room = 1;
function education_fields() {
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="input-group mb-3"><input type="text" class="form-control" name="nama_konsumen[]" aria-label=""><div class="input-group-append"><button class="btn btn-icon btn-danger icon-left" type="button"  onclick="remove_education_fields(' + room + ');"><i class="fas fa-minus"></i></button></div></div>';

    objTo.appendChild(divtest)
}
function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}

function remove_fields() {
    $('#removeclass').remove();
}

"use strict";
