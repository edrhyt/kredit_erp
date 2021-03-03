<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_Keluar extends CI_Controller {

    var $table   = "tb_inventory_barang";
    var $pk      = "id_barang";
    var $table2  = "tb_inventory_keluar";
    var $pk2     = "id_barang_keluar";

    public function __construct()
    {
       parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('m_barang');
    }

    public function index()
    {
        $data['breadcrumb']="Barang keluar";
        $data['title']="Barang keluar";
        $data['drop']="Inventory";
        $data['page']="barang_keluar";
        $data['barang_keluar'] = $this->m_barang->getBarangkeluar();
        $this->template->load('layout_main','inventory/barang_keluar/index',$data);
    }

    function add_barang_keluar()
    {
        $data['drop']="Inventory";
        $data['page']="barang_keluar";
        $data['breadcrumb']= "Tambah Barang";
        $data['title']="Barang keluar";
        // $data['barang'] = $this->admin_model->get('tb_inventory_barang');
        $data['barang'] = $this->m_barang->getBarang();

        // // Mendapatkan dan men-generate kode transaksi barang keluar
            $kode = 'T-BK-' . date('ymd');
            $kode_terakhir = $this->admin_model->getMax('tb_inventory_keluar', 'id_barang_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_keluar'] = $kode . $number;
        // $data['id_barang_keluar'] = $this->generate_code->_Code($this->table,'id_barang_keluar','T-BM-');

        $this->template->load('layout_main','inventory/barang_keluar/add',$data);
    }

    function do_add_barang_keluar()
    {
        // Mendapatkan dan men-generate kode transaksi barang keluar
        // $kode = 'T-BM-' . date('ymd');
        // $kode_terakhir = $this->admin_model->getMax('tb_inventory_keluar', 'id_barang_keluar', $kode);
        // $kode_tambah = substr($kode_terakhir, -5, 5);
        // $kode_tambah++;
        // $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        // $data['id_barang_keluar'] = $kode . $number;

    foreach ($_POST as $key => $value) { $$key = $value; }
     if(isset($_POST['submit']))
        {
            $data  = array(
                'id_barang_keluar'   => $id_barang_keluar,
                'barang_id'         => $barang_id,
                'jumlah_keluar'      => $jumlah_keluar,
                'tgl_keluar'         => $tgl_keluar
            );

            $this->db->insert($this->table2,$data);

            if ($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Barang baru berhasil di simpan!'));
                redirect(base_url('barang_keluar'));
            }
            else
            {
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Barang gagal di simpan!'));
                redirect(base_url('barang_keluar'));
            }
        }
    }

     private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal keluar', 'required|trim');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah keluar', 'required|trim|numeric|greater_than[0]');
    }

    public function add_keluar()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['drop']="Inventory";
            $data['page']="barang_keluar";
            $data['breadcrumb']= "Tambah Barang";
            $data['title']="Barang keluar";
            $data['barang'] = $this->admin_model->get('tb_inventory_barang');

            // Mendapatkan dan men-generate kode transaksi barang keluar
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->admin_model->getMax('tb_inventory_keluar', 'id_barang_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_keluar'] = $kode . $number;

            $this->template->load('layout_main','inventory/barang_keluar/add',$data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin_model->insert('tb_inventory_keluar', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('inventory');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('inventory/add_keluar');
            }
        }
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin_model->cekStok($id);
        echo json_encode($query);
    }

     public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin_model->delete('tb_inventory_keluar', 'id_barang_keluar', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('barang_keluar');
    }

    public function del_barang($id_barang_keluar){
        $this->crud->delete($this->table2,  'id_barang_keluar', $id_barang_keluar );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data SO berhasil di hapus!'));
        }else{
            $this->session->set_flashdata("msg", $this->crud->msg_gagal('Data SO gagal di hapus!'));
        }
        redirect(base_url('barang_keluar'));
     }

}