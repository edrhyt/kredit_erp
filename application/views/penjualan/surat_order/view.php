<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?php echo base_url('so');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Surat Order <?=$r['no_surat_order'];?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('so');?>">Surat Order</a></div>
            <div class="breadcrumb-item">Lihat Data Surat Order</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Lihat Data Surat Order</h2>
        <p class="section-lead">
            Di halaman ini berisi Data Surat Order dengan Kode <?=$r['no_surat_order'];?>
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php //var_dump($rd); ?>
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
                                    <td>: &nbsp;&nbsp;<?=$r['tgl_s'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Kirim</th>
                                    <td>: &nbsp;&nbsp;<?= $r['tgl_k'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Koordinator</th>
                                    <td>: &nbsp;&nbsp;<?=$r['nama_koordinator'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kabupaten</th>
                                    <td>: &nbsp;&nbsp;<?=$r['nama_kabupaten'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kecamatan</th>
                                    <td>: &nbsp;&nbsp;<?=$r['nama_kecamatan'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelurahan</th>
                                    <td>: &nbsp;&nbsp;<?=$r['nama_kelurahan'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>: &nbsp;&nbsp;<?=$r['alamat'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jumlah Angsuran</th>
                                    <td>: &nbsp;&nbsp;<?=$r['jml_angsuran'];?> Bulan</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hadiah</th>
                                    <td>: &nbsp;&nbsp;<?=$r['hadiah'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Diskon Koordinator</th>
                                    <td>: &nbsp;&nbsp;Rp. <?=$r['diskon_koordinator'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Diskon DP</th>
                                    <td>: &nbsp;&nbsp;Rp. <?=$r['diskon_dp'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Pembayaran</th>
                                    <td>: &nbsp;&nbsp;Rp. <?=$r['total'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Netto</th>
                                    <td>: &nbsp;&nbsp;Rp. <?=$r['netto'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Angsuran 1</th>
                                    <td>: &nbsp;&nbsp;Rp. <?=$r['angsuran1'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Angsuran/Bulan</th>
                                    <td>: &nbsp;&nbsp;Rp. <?=$r['angsuran_bln'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Sales Promotor</th>
                                    <td>: &nbsp;&nbsp;<?=$sp['nama_lengkap'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Demo Booker</th>
                                    <td>: &nbsp;&nbsp;<?=$db['nama_lengkap'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">SPV Sales</th>
                                    <td>: &nbsp;&nbsp;<?=$ss['nama_lengkap'];?></td>
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