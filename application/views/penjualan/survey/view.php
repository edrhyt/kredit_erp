<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?php echo base_url('survey');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Survey <?=$r['no_surat_order'];?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('survey');?>">Data Survey</a></div>
            <div class="breadcrumb-item">Lihat Data Survey</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Lihat Data Survey</h2>
        <p class="section-lead">
            Di halaman ini berisi Data Survey dengan Kode <?=$r['no_surat_order'];?>
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="section-title mt-0">
                            No Surat Order :
                            <small class="text-muted"><?=$r['no_surat_order'];?></small>
                        </div>
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row">Tanggal SO</th>
                                    <td>: &nbsp;&nbsp;<?=$r['tgl_so'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Survey</th>
                                    <td>: &nbsp;&nbsp;<?=$r['tgl_survey'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Kirim</th>
                                    <td>: &nbsp;&nbsp;<?= $r['tgl_kirim'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Koordinator</th>
                                    <td>: &nbsp;&nbsp;<?=$r['nama_koordinator'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Konsumen</th>
                                    <td>: &nbsp;&nbsp;<?=$r['nama_konsumen'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kabupaten</th>
                                    <td>: &nbsp;&nbsp;<?=$r['id_kab'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kecamatan</th>
                                    <td>: &nbsp;&nbsp;<?=$r['id_kec'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelurahan</th>
                                    <td>: &nbsp;&nbsp;<?=$r['id_kel'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>: &nbsp;&nbsp;<?=$r['alamat_penagihan'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Jatuh Tempo</th>
                                    <td>: <small class="text-muted">&nbsp;&nbsp; Tanggal </small> &nbsp;&nbsp;<?=$r['tgl_tempo'];?><small class="text-muted">&nbsp;&nbsp; Bulan </small>&nbsp;&nbsp;<?=$r['bulan_awal'];?><small class="text-muted">&nbsp;&nbsp; s/d </small>&nbsp;&nbsp;<?=$r['bulan_akhir'];?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="section-title mt-0">
                            Tabel Barang SO Kode :
                            <small class="text-muted"><?=$r['no_surat_order'];?></small>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $i = 0;
                        foreach ($rd as $rows)
                        {
                            $i++;
                        echo'
                            <tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$rows['nama_brg'].'</td>
                            <td>'.$rows['harga_brg'].'</td>
                            <td>'.$rows['jumlah'].'</td>
                            </tr>';
                        }    
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="float-left">
                            TMS - Bandung 2020
                        </div>
                        <div class="float-right">
                            Data Surat Order
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>