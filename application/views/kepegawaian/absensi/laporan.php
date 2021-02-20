<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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

        .good {
            background-color: rgba(20, 255, 20, 0.12);
        }

        .bad {
            background-color: rgba(255, 20, 20, 0.12);
        }
    </style>
</head>
<body>
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
</body>
</html>