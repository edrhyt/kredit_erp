<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	var $table   = "tb_inventory_barang";
	var $pk 	 = "id_barang";
	var $table2  = "tb_inventory_barang_masuk";
	var $pk2 	 = "id_barang_masuk";

	public function __construct()
    {
       parent::__construct();

        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['breadcrumb']="Inventory";
		$data['title']="Dashboard";
		$data['drop']="Inventory";
		$data['page']="Inventory";
		$data['record_inv'] = $this->admin_model->getBarang();
		$this->template->load('layout_main','inventory/data_barang/index',$data);
	}


	function add_new()
	{
		$data['drop']="Inventory";
		$data['page']="Inventory";
		$data['breadcrumb']= "Tambah Barang";
		$data['title']="Tambah Inventory";
		if ($this->form_validation->run() == false) {
		$data['satuan'] = $this->admin_model->get('satuan');

		// // Mengenerate ID Barang
  //       $kode_terakhir = $this->admin_model->getMax('tb_inventory_barang', 'id_barang');
  //       $kode_tambah = substr($kode_terakhir, -6, 6);
  //       $kode_tambah++;
  //       $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $data['id_barang'] = $this->gencode->_Code($this->table,'id_barang','B');

		$this->template->load('layout_main','content_inventory_add',$data);
		} else {
            $input = $this->input->post(null, true);
            $insert = $this->admin_model->insert('tb_inventory_barang', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('inventory');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('inventory/add_new');
            }
        }
	}

	public function add_barang()
	{
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
				$data  = array(
					'id_barang'			=> $this->gencode->_Code($this->table,'id_barang','B'),
					'nama_barang'		=> $nama_barang,
					'merk'				=> $merk,
					'stok_akhir'		=> '0',
					'satuan_id'			=> $satuan_id,
					'kondisi_bagus'		=> '0',
					'kondisi_jelek'		=> '0',
					'ready_jual'		=> '0',
					'harga'				=> $harga,
				);

				$this->db->insert($this->table,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Inventory baru berhasil di simpan!'));
					redirect(base_url('inventory'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Inventory gagal di simpan!'));
					redirect(base_url('inventory'));
				}
			}
	}

	public function edit_barang($id_barang){
		$data['drop']="Inventory";
		$data['page']="Inventory";
		$data['breadcrumb']= "Edit Inventory Barang";
		$rows = $this->crud->getByID($this->table,$this->pk,$id_barang);
		$data['r'] =  array(
            		'id_barang'			=> $rows[0]['id_barang'],
					'nama_barang'		=> $rows[0]['nama_barang'],
					'merk'				=> $rows[0]['merk'],
					'harga'				=> $rows[0]['harga'],
					'stok_akhir'		=> $rows[0]['stok_akhir'],
					'kondisi_bagus'		=> $rows[0]['kondisi_bagus'],
					'kondisi_jelek'		=> $rows[0]['kondisi_jelek'],
					'ready_jual'		=> $rows[0]['ready_jual'],
					'tgl'     			=> $rows[0]['tgl'],
            );
		$data['title'] = "Edit Barang - ".$rows[0]['nama_barang'];
		$this->template->load('layout_main','content_inventory_edit',$data);
	}

	public function do_edit_barang(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['submit']))
        {

			$data = array(
					'nama_barang'		=> $nama_barang,
					'merk'				=> $merk,
					'harga'				=> $harga,
					'stok_akhir'		=> $stok_akhir,
					'kondisi_bagus'		=> $kondisi_bagus,
					'kondisi_jelek'		=> $kondisi_jelek,
					'ready_jual'		=> $ready_jual,
					'tgl'     			=> $tgl
			);
			$this->crud->update($this->table,$data, $this->pk,$id_barang);
			
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Barang berhasil di ubah!'));
				redirect(base_url('inventory'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Barang gagal di ubah!'));
				redirect(base_url('inventory/edit_barang/'.$id_barang));
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

	public function barang_masuk()
	{
		$data['breadcrumb']="Barang Masuk";
		$data['title']="Barang Masuk";
		$data['drop']="Inventory";
		$data['page']="barang_masuk";
		// $sql  = "SELECT * from tb_inventory_masuk ORDER BY `id_barang` ASC ";
		// $data['record_inv'] = $this->db->query($sql)->result();
		$this->template->load('layout_main','content_inventory_masuk',$data);
	}

	function add_barang_masuk()
	{
		$data['drop']="Inventory";
		$data['page']="barang_masuk";
		$data['breadcrumb']= "Tambah Barang";
		$data['title']="Barang Masuk";
		$data['barang'] = $this->admin_model->get('tb_inventory_barang');

		// Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->admin_model->getMax('tb_inventory_masuk', 'id_barang_masuk', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_masuk'] = $kode . $number;

		$this->template->load('layout_main','content_inventory_masuk_add',$data);
	}

	function do_add_barang_masuk()
	{
		// Mendapatkan dan men-generate kode transaksi barang masuk
        $kode = 'T-BM-' . date('ymd');
        $kode_terakhir = $this->admin_model->getMax('tb_inventory_masuk', 'id_barang_masuk', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        $data['id_barang_masuk'] = $kode . $number;

	foreach ($_POST as $key => $value) { $$key = $value; }
     if(isset($_POST['submit']))
        {
			$data  = array(
				'id_barang_masuk'	=> $id_barang_masuk,
				'supplier'			=> $nama_barang,
				'barang_id'			=> $barang_id,
				'jumlah_masuk'		=> $jumlah_masuk,
				'tgl_masuk'			=> $tgl_masuk,
			);

			$this->db->insert($this->table2,$data);

			if ($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Barang baru berhasil di simpan!'));
				redirect(base_url('inventory'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Barang gagal di simpan!'));
				redirect(base_url('inventory/add_barang_masuk'));
			}
		}
	}

	 private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required|trim|numeric|greater_than[0]');
    }

    public function add_masuk()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['drop']="Inventory";
			$data['page']="barang_masuk";
			$data['breadcrumb']= "Tambah Barang";
			$data['title']="Barang Masuk";
            $data['barang'] = $this->admin_model->get('tb_inventory_barang');

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->admin_model->getMax('tb_inventory_masuk', 'id_barang_masuk', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_masuk'] = $kode . $number;

            $this->template->load('layout_main','content_inventory_masuk_add',$data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin_model->insert('tb_inventory_masuk', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('inventory');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('inventory/add_masuk');
            }
        }
    }

	public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin_model->cekStok($id);
        echo json_encode($query);
    }
}
