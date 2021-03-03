/* Table Absensi Custem Filtering */
if ($('#page-id').html() === 'data_absensi') {
    // Config awal
    const baseUrl = $('#get-laporan').attr('href');

    // Config options untuk list.js
    const options = {
        valueNames: [
            'no',
            'nama',
            'tanggal',
            'masuk',
            'pulang',
            'durasi',
        ]
    };

    // Inisialisasi List (list.js lib)
    const absensiList = new List('data-absensi', options);

    // Fungsi render absen harian
    const absenHarian = () => {
        absensiList.clear();

        $.ajax({
            url: "data_absensi/daily",
            type: "POST",
            data: {
                'date': $('#date-query').val(),
            },
            success: data => {
                const listKaryawan = JSON.parse(data);

                listKaryawan.data.forEach(karyawan => {
                    let result = {
                        'no': karyawan.no,
                        'nama': karyawan.nama,
                        'tanggal': listKaryawan.recordsDate,
                        'masuk': karyawan.masuk,
                        'pulang': karyawan.pulang,
                        'durasi': karyawan.durasi.jam + ' Jam ' + karyawan.durasi.menit + ' Menit',
                    }

                    absensiList.add(result);
                });

                const listDurasi = document.querySelectorAll('.durasi');
                listDurasi.forEach(element => {
                    if ((parseInt(element.innerHTML.substring(0, 2)) < 8) && (parseInt(element.innerHTML.substring(0, 2)) > 0)) {
                        element.classList.remove('bad');
                        element.classList.remove('good');
                        element.classList.remove('warning');
                        element.classList.add('warning');
                    }
                    else if (parseInt(element.innerHTML.substring(0, 2)) == 0) {
                        element.classList.remove('bad');
                        element.classList.remove('good');
                        element.classList.remove('warning');
                        element.classList.add('bad');
                    }
                    else {
                        element.classList.remove('bad');
                        element.classList.remove('good');
                        element.classList.remove('warning');
                        element.classList.add('good');
                    }
                });

                $('#data-absensi-harian').show();
            },
            dataType: 'text',
        });
    }

    // Fungsi render absen bulanan
    const absenBulanan = () => {
        $('#data-absensi-bulanan thead tr').remove();

        $('#data-absensi-bulanan thead').append('<tr></tr>');
        $('#data-absensi-bulanan thead tr').append('<th>No</th>');
        $('#data-absensi-bulanan thead tr').append('<th>NIK</th>');
        $('#data-absensi-bulanan thead tr').append('<th>Nama</th>');

        $('#data-absensi-bulanan tbody tr').remove();

        $.ajax({
            url: "data_absensi/monthly",
            type: "POST",
            data: {
                'date': $('#date-query').val(),
            },
            success: data => {
                listKaryawan = JSON.parse(data);

                for (let i = 1; i <= listKaryawan.days; i++) {
                    $('#data-absensi-bulanan thead tr').append(`<th>${i}</th>`);
                }

                $('#data-absensi-bulanan thead tr').append(`<th>ABS</th>`);

                for (let j = 0; j < listKaryawan.data.length; j++) {
                    let abs = 0;

                    $('#data-absensi-bulanan tbody').append(`<tr id="row-abs-m-${j}">`);
                    $(`#row-abs-m-${j}`).append(`<td class="em-no">${j + 1}</td>`)
                    $(`#row-abs-m-${j}`).append(`<td class="em-nik">${listKaryawan.data[j].nik}</td>`)
                    $(`#row-abs-m-${j}`).append(`<td class="em-name">${listKaryawan.data[j].nama_lengkap}</td>`)

                    for (let k = 0; k < listKaryawan.data[j].absensi.length; k++) {

                        if (listKaryawan.data[j].absensi[k] == 2) {
                            $(`#row-abs-m-${j}`).append(`<td class="good"></td>`);
                        } else if (listKaryawan.data[j].absensi[k] == 1) {
                            $(`#row-abs-m-${j}`).append(`<td class="warning"></td>`);
                        } else if (listKaryawan.data[j].absensi[k] == 0) {
                            abs++;
                            $(`#row-abs-m-${j}`).append(`<td class="bad"></td>`);
                        } else {
                            $(`#row-abs-m-${j}`).append(`<td class="bad"></td>`);
                        }
                    }
                    $(`#row-abs-m-${j}`).append(`<td class="total-abs">${abs}</td>`);
                }

                $('#data-absensi-bulanan').show();
            },
            dataType: 'text',
        });
    }

    // Event listener untuk perubahan tanggal (elemen input id="date-query")
    $('#date-query').on('change', () => {
        if ($('#radio-harian').is(':checked')) {
            absenHarian();
            $('#get-laporan').attr('href', baseUrl + 'data_absensi/laporan?date=' + $('#date-query').val() + '&t=harian');
        } else if ($('#radio-bulanan').is(':checked')) {
            absenBulanan();
            $('#get-laporan').attr('href', baseUrl + 'data_absensi/laporan?date=' + $('#date-query').val() + '&t=bulanan');
        }
    });

    // Config tanggal hari ini
    $('#date-query').val(new Date().toISOString().slice(0, 10));
    $('#get-laporan').attr('href', baseUrl + 'data_absensi/laporan?date=' + $('#date-query').val() + '&t=harian');

    // Render Absen harian
    absenHarian();

    // Hide data absensi bulanan
    $('#data-absensi-bulanan').hide();

    $(document).ready(() => {
        // Event listener untuk radio button harian
        $('#radio-harian').on('click', () => {
            $('#data-absensi-bulanan').hide();
            absenHarian();
            $('#get-laporan').attr('href', baseUrl + 'data_absensi/laporan?date=' + $('#date-query').val() + '&t=harian');
        });

        // Event listener untuk radio button bulanan
        $('#radio-bulanan').on('click', () => {
            $('#data-absensi-harian').hide();
            absenBulanan();
            $('#get-laporan').attr('href', baseUrl + 'data_absensi/laporan?date=' + $('#date-query').val() + '&t=bulanan');
        });
    });
}
/* End of Custom Filtering */