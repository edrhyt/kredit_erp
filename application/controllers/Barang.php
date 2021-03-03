<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    var $table   = "tb_inventory_barang";
    var $pk      = "id_barang";
    var $table2  = "tb_inventory_barang_masuk";
    var $pk2     = "id_barang_masuk";

    public function __construct()
    {
       parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('m_barang');
    }

    public function index()
    {
        $data['breadcrumb']="Data Barang";
        $data['title']="Dashboard";
        $data['drop']="Inventory";
        $data['page']="Barang";
        $data['record_inv'] = $this->m_barang->getBarang();
        $this->template->load('layout_main','inventory/data_barang/index',$data);
    }


    function add_new()
    {
        $data['drop']="Inventory";
        $data['page']="Inventory";
        $data['breadcrumb']= "Tambah Barang";
        $data['title']="Tambah Inventory";
        // if ($this->form_validation->run() == false) {
        $data['satuan'] = $this->admin_model->get('satuan');
        $data['id_barang'] = $this->generate_code->_Code($this->table,'id_barang','B');

        $this->template->load('layout_main','inventory/data_barang/add',$data);
        // } else {
        //     $input = $this->input->post(null, true);
        //     $insert = $this->admin_model->insert('tb_inventory_barang', $input);

        //     if ($insert) {
        //         set_pesan('data berhasil disimpan');
        //         redirect('barang');
        //     } else {
        //         set_pesan('gagal menyimpan data');
        //         redirect('barang/add_new');
        //     }
        // }
    }

    public function add_barang()
    {
        foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
                $data  = array(
                    'id_barang'         => $this->generate_code->_Code($this->table,'id_barang','B'),
                    'nama_barang'       => $nama_barang,
                    'merk'              => $merk,
                    'stok_akhir'        => '0',
                    'satuan_id'         => 'Unit',
                    'kondisi_bagus'     => '0',
                    'kondisi_jelek'     => '0',
                    'ready_jual'        => '0',
                    'harga'             => $harga
                );

                $this->db->insert($this->table,$data);

                if ($this->db->affected_rows() > 0)
                {
                    $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Inventory baru berhasil di simpan!'));
                    redirect(base_url('barang'));
                }
                else
                {
                    $this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Inventory gagal di simpan!'));
                    redirect(base_url('barang'));
                }
            }
    }

    public function edit_barang($id_barang){
        $data['drop']="Inventory";
        $data['page']="Inventory";
        $data['breadcrumb']= "Edit Inventory Barang";
        $rows = $this->crud->getByID($this->table,$this->pk,$id_barang);
        $data['r'] =  array(
                    'id_barang'         => $rows[0]['id_barang'],
                    'nama_barang'       => $rows[0]['nama_barang'],
                    'merk'              => $rows[0]['merk'],
                    'harga'             => $rows[0]['harga'],
                    'stok_akhir'        => $rows[0]['stok_akhir'],
                    'kondisi_bagus'     => $rows[0]['kondisi_bagus'],
                    'kondisi_jelek'     => $rows[0]['kondisi_jelek'],
                    'ready_jual'        => $rows[0]['ready_jual'],
                    'tgl'               => $rows[0]['tgl'],
            );
        $data['title'] = "Edit Barang - ".$rows[0]['nama_barang'];
        $this->template->load('layout_main','inventory/data_barang/edit',$data);
    }

    public function do_edit_barang(){
        foreach ($_POST as $key => $value) { $$key = $value; }
        if(isset($_POST['submit']))
        {

            $data = array(
                    'nama_barang'       => $nama_barang,
                    'merk'              => $merk,
                    'harga'             => $harga,
                    'stok_akhir'        => $stok_akhir,
                    'kondisi_bagus'     => $kondisi_bagus,
                    'kondisi_jelek'     => $kondisi_jelek,
                    'ready_jual'        => $ready_jual,
                    'tgl'               => $tgl
            );
            $this->crud->update($this->table,$data, $this->pk,$id_barang);
            
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Barang berhasil di ubah!'));
                redirect(base_url('barang'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Barang gagal di ubah!'));
                redirect(base_url('barang/edit_barang/'.$id_barang));
            } 
        }
    }

    public function del_barang($id_barang){
        $this->crud->delete($this->table,  $this->pk, $id_barang );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Barang berhasil di hapus!'));
        }else{
            $this->session->set_flashdata("msg", $this->crud->msg_gagal('Barang gagal di hapus!'));
        }
        redirect(base_url('inventory'));
     }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin_model->cekStok($id);
        output_json($query);
    }
}