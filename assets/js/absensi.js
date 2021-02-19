/* Table Absensi Custem Filtering */
if ($('#page-id').html() === 'data_absensi') {
    var pdfData = [];

    $(document).ready(() => {
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

        $('#date-query').on('change', () => {
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
        });
    });
}
/* End of Custom Filtering */