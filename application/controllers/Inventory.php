<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	var $table   = "tb_inventory_barang";
	var $pk 	 = "id_barang";

	public function index()
	{
		$data['breadcrumb']="Inventory";
		$data['title']="Dashboard";
		$sql  = "SELECT * from tb_inventory_barang ORDER BY `id_barang` ASC ";
		$data['record_inv'] = $this->db->query($sql)->result();
		$this->template->load('layout_main','content_inventory',$data);
	}

	function add_new()
	{
		$data['breadcrumb']= "Tambah Inventory";
		$data['title']="Tambah Inventory";
		$this->template->load('layout_main','content_inventory_add',$data);
	}

	public function add_barang()
	{
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
				$data  = array(
					'id_barang'			=> '',
					'nama_barang'		=> $nama_barang,
					'merk'				=> $merk,
					'harga'				=> $harga,
					'stok_akhir'		=> $stok_akhir,
					'kondisi_bagus'		=> $kondisi_bagus,
					'kondisi_jelek'		=> $kondisi_jelek,
					'ready_jual'		=> $ready_jual,
					'tgl'     			=> $tgl,
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
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Karyawan berhasil di ubah!'));
				redirect(base_url('inventory'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Karyawan gagal di ubah!'));
				redirect(base_url('inventory/edit_barang/'.$id_barang));
			} 
		}
	}

	public function del_barang($id_barang){
		$this->crud->delete($this->table,  'id_barang', $id_barang );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('FPPL berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('FPPL gagal di hapus!'));
        }
        redirect(base_url('inventory'));
     }
}
