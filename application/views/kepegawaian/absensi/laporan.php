<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .desc {
            width: 100vw;
            position: relative;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #abs-table {
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #abs-table td, #abs-table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #abs-table tr:nth-child(even){background-color: #f2f2f2;}

        #abs-table tr:hover {background-color: #ddd;}

        #abs-table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #2F2F2F;
            color: #F2F2F2;
        }

        .warning {
            background-color: #ffffcb;
        }

        .good {
            background-color: rgba(20, 255, 20, 0.12);
        }

        .bad {
            background-color: rgba(255, 20, 20, 0.12);
        }

        .table-bulanan {
            width: 100vw;
            margin-top: 1em;
            font-size: 14px;
            border-collapse: collapse;
        }

        .table-bulanan td, th {
            border: 1px solid #ddd;
        }

        .table-bulanan tr:nth-child(even){background-color: #f2f2f2;}

        .table-bulanan .em-no, .table-bulanan .total-abs {
            text-align: center;
        }

        .table-bulanan .em-name, .table-bulanan .em-nik {
            text-align: left;
            padding: 5px;
            min-width: 100px;
        }

        .table-bulanan .em-name {
            width: 15%;
        }

        .table-bulanan th {
            min-width: 10%;
            text-align: center;
        }

        .table-bulanan th:last-child {
            width: 5%;
            padding: 5px;
        }

        .table-bulanan td:last-child, .table-bulanan tr td:first-child {
            text-align: center;
        }

        #legend {
            text-align: right;
            position: absolute;
            right: 0;
            top: 0;
        }

        #legend p {
            font-size: 14px;
            margin: 0;
        }
    </style>
</head>
<body>
    <p id="page-id" style="display: none;"><?= $this->uri->segment(1); ?></p>
    <div class="wrapper" style="width: 100vw;">
    <?php if($_GET['t'] == 'harian'){ ?>
        <div class="desc">
            <h2>Laporan Absensi</h2>
            <h4><?= $recordsDate ?></h4>
        </div>
        <div class="table-responsive absensi" id="data-absensi">
        <table class="table table-striped table-bordered table-hover mt-4" id="abs-table">
            <thead>
            <tr>
                <th class="sort" data-sort="no">No</th>
                <th class="sort" data-sort="nama">Nama Karyawan</th>
                <th class="sort" data-sort="masuk">Jam Masuk</th>
                <th class="sort" data-sort="pulang">Jam Pulang</th>
                <th class="sort" data-sort="durasi">Durasi Kerja</th>
            </tr>
            </thead>
            <tbody class="list">    
                <?php foreach($data as $record): ?>
                <tr>
                    <td class="no"><?= $record['no']; ?></td>
                    <td class="nama"><?= $record['nama']; ?></td>
                    <td class="masuk"><?php if($record['masuk'] != NULL) {echo $record['masuk']; } else {echo '-';} ?></td>
                    <td class="pulang"><?php if($record['pulang'] != NULL) {echo $record['pulang']; } else {echo '-';} ?></td>
                    <td class="durasi <?= $record['keterangan']; ?>"><?php if(($record['durasi']['jam'] > 0) || ($record['durasi']['menit'] > 0)){ echo $record['durasi']['jam'].' Jam '.$record['durasi']['menit'].' Menit'; } else { echo '-'; } ?></td>
                </tr>
                <?php endforeach; ?>
            
            </tbody>
        </table>           
        </div>
    <?php } elseif($_GET['t'] == 'bulanan') { ?>
        <div class="desc">
            <h2>Laporan Absensi</h2>
            <h4><?= $recordDate; ?></h4>            
            <div id="legend" class="mt-4">
                <p><strong>Keterangan: </strong></p>
                <p>*Cell warna merah: <strong>Tidak masuk kerja.</strong></p>
                <p>*Cell warna kuning: <strong>Durasi kerja kurang dari 8 jam.</strong></p>
                <p>*Cell warna hijau: <strong>Durasi kerja lebih dari sama dengan 8 jam.</strong></p>
            </div>
        </div>
        <table class="table-bulanan mt-4 table-striped table-bordered table-responsive" id="data-absensi-bulanan">
            <thead>
                <tr class="row-head">
                    <th class="em-no">No</th>
                    <th class="em-nik">NIK</th>
                    <th class="em-name">Nama</th>
                    <?php for($i = 1; $i <= $days; $i++){
                        echo "<th>$i</i>";
                    }
                    ?>
                    <th>ABS</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($data); $i++){
                    $abs = 0;
                    echo '<tr>';
                    for($j = 0; $j < $days+3; $j++) {
                        if($j == 0) {
                            echo '<td>'.($i+1).'</td>';
                        } elseif($j == 1) {
                            echo '<td>'.$data[$i]['nik'].'</td>';
                        } elseif($j == 2) {
                            echo '<td>'.$data[$i]['nama_lengkap'].'</td>';
                        } else {
                            if($data[$i]['absensi'][$j-3] == 0) {
                                $status = 'bad';
                                $abs ++;
                            } elseif($data[$i]['absensi'][$j-3] == 1) {
                                $status = 'warning';
                            } else {
                                $status = 'good';
                            }
                            echo '<td class="'.$status.'"></td>';
                        }
                    }
                    echo "<td>$abs</td>";
                    echo '</tr>';
                }?>
            </tbody>
        </table>        
    <?php } ?>
    </div>
</body>
</html>