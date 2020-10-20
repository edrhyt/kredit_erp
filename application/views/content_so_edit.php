<section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo base_url('penjualan/surat_order');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1><?= $breadcrumb; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url('admin');?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?php echo base_url('penjualan/surat_order');?>">Surat Order</a></div>
            <div class="breadcrumb-item"><?= $breadcrumb; ?></div>
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Ubah Data Form Surat Order</h2>
          <p class="section-lead">
            halaman ini berisi Ubah Formulir Surat Order.
          </p>
        </div>
  </section>

  <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Isian Surat Order</h4>
                        <div class="card-header-action">
                            <form action="<?php echo base_url('penjualan/do_edit_so'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                            <div class="input-group">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SO </label>
                                <div class="col-sm-12 col-md-3">
                                    <input type="text" class="form-control text-right" name="no_surat_order" value="<?php echo $this->session->userdata('lokasi');?> - " readonly="" required="">
                                </div>
                                <input type="text" class="form-control" name="no_surat_order" value="<?=$r['no_surat_order'];?>" required="">
                                <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal SO</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="form-control" name="tgl_so" value="<?=$r['tgl_so'];?>"  required="">
                                <div class="invalid-feedback">
                                  Silahkan lengkapi telebih dahulu
                                </div>
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Survey</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="form-control" name="tgl_survey" value="<?=$r['tgl_survey'];?>" >
                              </div>
                              <label class="col-form-label text-md-right col-12 col-md-2 col-lg-1">Tanggal Kirim</label>
                              <div class="col-sm-12 col-md-3">
                                <input type="date" class="form-control" name="tgl_kirim" value="<?=$r['tgl_kirim'];?>" >
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_koordinator" value="<?=$r['nama_koordinator'];?>" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control almt" name="alamat"
                                        required=""><?=$r['alamat'];?></textarea>
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Barang</label>
                                <div class="col-sm-12 col-md-7">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollable"><i class="far fa-edit"></i> Ubah Data Barang</a>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Diskon Koordinator</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="diskon_koordinator" value="<?=$r['diskon_koordinator'];?>" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Diskon DP</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="diskon_dp" value="<?=$r['diskon_dp'];?>" required="">
                                    <div class="invalid-feedback">
                                        Silahkan lengkapi telebih dahulu
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="total" value="<?=$r['total'];?>" required="" readonly="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    <button class="btn btn-danger" type="reset">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="float-left">
                            TMS - BANDUNG 2020
                        </div>
                        <div class="float-right">
                            Form Isian Surat Order
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="padding-right:0px !important">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <form id="form_dtl" style="width:100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container tbl_input">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover " id="tab_logic" >
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th class="text-center">
                                            Nama Barang
                                        </th>
                                        <th class="text-center">
                                            Merk
                                        </th>
                                        <th class="text-center">
                                            Type
                                        </th>
                                        <th class="text-center">
                                            Jumlah barang
                                        </th>
                                        <th class="text-center">
                                            Harga Satuan
                                        </th>
                                        <th class="text-center">
                                            Jumlah
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $i = 1;
                                foreach ($rd as $rows ) { 
                                  
                                    ?>
                                    <tr id='addr0'>
                                        <td><?=$i;?></td>
                                        <td>
                                            <input type="text" name='nama_brg[]' value="<?=$rows['nama_brg'];?>" placeholder='Nama Barang' class="form-control frm_dtl"/>
                                        </td>
                                        <td>
                                            <input type="text" name='merk_brg[]' value="<?=$rows['merk_brg'];?>" placeholder='Merk Barang' class="form-control frm_dtl" />
                                        </td>
                                        <td>
                                            <input type="text" name='type_brg[]' value="<?=$rows['type_brg'];?>" placeholder='Type Barang' class="form-control frm_dtl" />
                                        </td>
                                        <td>
                                            <input type="number" name='jml_brg[]' value="<?=$rows['jml_brg'];?>" placeholder='Jumlah Barang' class="form-control frm_dtl"/>
                                        </td>
                                        <td>
                                            <input type="text" name='harga_brg[]' value="<?=$rows['harga_brg'];?>" placeholder='Harga Satuan' class="form-control frm_dtl"/>
                                        </td>
                                        <td>
                                            <input type="text" name='jum[]' value="<?=$rows['jumlah'];?>" placeholder='Jumlah' class="form-control frm_dtl"/>
                                        </td>
                                    </tr>
                                    <?php $i++; }?>

                                    <tr id='addr1'></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="add_row" class="btn btn-primary float-left">Tambah Baris</div>
                    <div id='delete_row' class="float-right btn btn-danger">Hapus Baris</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="edit_dtl" class="btn btn-secondary disabled" disabled>Edit</button>
                <button type="button" class="btn btn-primary" id="submit_dtl">Simpan Perubahan</button>
            </div>
        </div>
        </form>
    </div>
</div>