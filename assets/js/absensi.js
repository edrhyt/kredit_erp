/* Table Absensi Custem Filtering */
if ($('#page-id').html() === 'data_absensi') {
    var pdfData = [];

    $(document).ready(() => {
        const baseUrl = $('#get-laporan').attr('href');
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

        const absensiList = new List('data-absensi', options);

        const updateAbsensiList = () => {
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
                        pdfData.push(Object.assign({}, result));

                        absensiList.add(result);
                    });

                    const listDurasi = document.querySelectorAll('.durasi');
                    listDurasi.forEach(element => {
                        parseInt(element.innerHTML.charAt(0)) < 8 ? element.classList.add('bad') : element.classList.add('good');
                    });

                    // console.log(listKaryawan);
                },
                dataType: 'text',
            });
        }

        $('#date-query').on('change', () => {
            updateAbsensiList();
            $('#get-laporan').attr('href', baseUrl + 'data_absensi/laporan?date=' + $('#date-query').val());
        });

        $('#date-query').val(new Date().toISOString().slice(0, 10));

        updateAbsensiList();
        $('#get-laporan').attr('href', baseUrl + 'data_absensi/laporan?date=' + $('#date-query').val());
    });
}
/* End of Custom Filtering */