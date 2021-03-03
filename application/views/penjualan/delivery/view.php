<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?php echo base_url('delivery');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Delivery <?=$r['no_surat_order'];?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('delivery');?>">Data Pengiriman</a></div>
            <div class="breadcrumb-item">Lihat Data Pengiriman</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Lihat Data Pengiriman</h2>
        <p class="section-lead">
            Di halaman ini berisi Data Pengiriman dengan Kode <?=$r['no_surat_order'];?>
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
                                    <td>: &nbsp;&nbsp;<?=$r['alamat_penagihan'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Jatuh Tempo</th>
                                    <td>: <small class="text-muted">&nbsp;&nbsp; Tanggal </small> &nbsp;&nbsp;<?=$r['tgl_tempo'];?><small class="text-muted">&nbsp;&nbsp; Bulan </small>&nbsp;&nbsp;<?=$r['bulan_awal'];?><small class="text-muted">&nbsp;&nbsp; s/d </small>&nbsp;&nbsp;<?=$r['bulan_akhir'];?></td>
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
                                <tr>
                                    <th scope="row">Surveyor</th>
                                    <td>: &nbsp;&nbsp;<?=$surveyor['nama_lengkap'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Driver</th>
                                    <td>: &nbsp;&nbsp;<?=$driver['nama_lengkap'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Helper</th>
                                    <td>: &nbsp;&nbsp;<?=$helper['nama_lengkap'];?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="section-title mt-0">
                            Tabel Barang SO Kode :
                            <small class="text-muted"><?=$r['no_surat_order'];?></small>
                        </div>
                        <form action="<?php echo base_url('delivery/do_delivery'); ?>" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="id_survey" value="<?=$r['id_survey'];?>">
                            <input type="hidden" name="id_surat_order" value="<?=$r['id_surat_order'];?>">
                            <input type="hidden" name="kode_detail" value="<?=$r['kode_detail'];?>">
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
                        <center>
                                 <button class="btn btn-primary" type="submit" name="yes">YES</button>
                                 <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$r['kode_detail'];?>">BATAL</button>
                                 <button class="btn btn-warning" data-toggle="modal" data-target="#ModalBatal<?=$r['kode_detail'];?>">PENDING</button>
                        </center>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="float-left">
                            TMS - Bandung 2020
                        </div>
                        <div class="float-right">
                            Delivery
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
 $i = 0;
 $now = date('Y-m-d');
 $tglnow = $this->auth->hari_ini() . " - " . $this->auth->tanggal_indo($now);
 foreach ($record_delivery as $r)
 {
    $i++;
?>
 <form action="<?php echo base_url('delivery/do_delivery'); ?>" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="id_survey" value="<?=$r['id_survey'];?>">
                            <input type="hidden" name="id_surat_order" value="<?=$r['id_surat_order'];?>">
                            <input type="hidden" name="kode_detail" value="<?=$r['kode_detail'];?>">
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal<?= $r['kode_detail'];?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kode SO : <?= $r['no_surat_order']?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home<?= $i;?>" role="tabpanel"
                            aria-labelledby="home-tab">
                            <br>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SO</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="no_surat_order" value="<?= $r['no_surat_order']?>" 
                                       readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hari/Tanggal</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="tanggal" value="<?= $tglnow; ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Tolak Survey</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="kode_tolak" value="KNG"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">KNG</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="kode_tolak" value="k"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">K</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="kode_tolak" value="KPS"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">KPS</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                              <div class="col-sm-12 col-md-7">
                                <div class="text-muted font-weight-normal">
                                  * ) KNG = Karakter No Good.<br>
                                  * ) K = Kontrak.<br>
                                  * ) KPS = Kapasitas.<br>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control almt" name="keterangan" required=""></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger" name="batal">Batal Pengiriman</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php }
?>

<?php
 $i = 0;
 $now = date('Y-m-d');
 $tglnow = $this->auth->hari_ini() . " - " . $this->auth->tanggal_indo($now);
 foreach ($record_delivery as $r)
 {
    $i++;
?>

 <form action="<?php echo base_url('delivery/do_delivery'); ?>" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="id_survey" value="<?=$r['id_survey'];?>">
                            <input type="hidden" name="id_surat_order" value="<?=$r['id_surat_order'];?>">
                            <input type="hidden" name="kode_detail" value="<?=$r['kode_detail'];?>">
<div class="modal fade" tabindex="-1" role="dialog" id="ModalBatal<?= $r['kode_detail'];?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kode SO : <?= $r['no_surat_order']?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home<?= $i;?>" role="tabpanel"
                            aria-labelledby="home-tab">
                            <br>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SO</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="no_surat_order" value="<?= $r['no_surat_order']?>" 
                                       readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hari/Tanggal</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="tanggal" value="<?= $tglnow; ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Batal Survey</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="kode_batal" value="TSAP"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">TSAP</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="kode_batal" value="TIS"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">TIS</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="kode_batal" value="UM"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">UM</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="kode_batal" value="BD"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">PAL</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                              <div class="col-sm-12 col-md-7">
                                <div class="text-muted font-weight-normal">
                                  * ) TSAP = Tidak Siap Angsuran Pertama.<br>
                                  * ) TIS = Tidak Dapat Izin Suami.<br>
                                  * ) UM = ....<br>
                                  * ) BD = Black Depp.
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control almt" name="keterangan" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Kirim Baru</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="date" class="btn btn-primary daterange-btn icon-left btn-icon" name="tgl_kirim_baru" value="<?=$r['tgl_kirim'];?>" required="" >
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning" name="pending">Pending Pengiriman</button>
                </div>
            </div>
        </div>
    </form>
</div>
</form>
<?php }
?>