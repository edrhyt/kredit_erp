<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	var $table   = "tb_surat_order";
	var $table2   = "tb_survey";
    var $tables  = "tb_barang_so";
	var $pk 	 = "id_surat_order";
	var $pk2 	 = "id_survey";
	//var $penjualan = 
	// var $penjualan = 'tb_inventory_barang';

	function __construct(){
		parent::__construct();
		$this->load->model('M_inventory');
	}
	

    // VERIFIKASI PART

	public function view_verifikasi($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['breadcrumb']= "Detail Verifikasi";
		$data['record_verifikasi']=$this->crud->getSurvey();
		$data['sp']=$this->crud->get_sp_id('tb_karyawan', ['id_karyawan_sp' => $id]);
		$data['db']=$this->crud->get_db_id('tb_karyawan', ['id_karyawan_db' => $id]);
		$data['ss']=$this->crud->get_ss_id('tb_karyawan', ['id_karyawan_ss' => $id]);
		$data['surveyor']=$this->crud->get_surveyor_id('tb_karyawan', ['id_surveyor' => $id]);
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSurveyID('tb_survey', ['kode_detail' => $id]);
		
		$data['title'] = "Detail Verifikasi - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','penjualan/verifikasi/view',$data);
	}

	public function do_verifikasi(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['terima']))
        {
			$hasil = 'Diterima';
		}else if(isset($_POST['tolak'])){
			$hasil = 'Ditolak';
		}else{
			$hasil = 'Batal';
		}
		
		$data  = array(
				'tgl_verifikasi'	=> date('Y-m-d'),
				'kode_tolak'		=> $kode_tolak,
				'status'			=> $hasil,
				'keterangan'		=> $keterangan
			);
		
			$this->crud->update($this->table2,$data, $this->pk2,$id_survey);
			if ($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Survey berhasil di verifikasi!'));
				redirect(base_url('survey'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di verifikasi!'));
				redirect(base_url('verifikasi/view_verifikasi/'.$kode_detail));
			}			
		
	}

	public function view_verifikasi_hasil($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['breadcrumb']= "Detail Verifikasi";
		$data['record_verifikasi']=$this->crud->getSurvey();
		$data['sp']=$this->crud->get_sp_id('tb_karyawan', ['id_karyawan_sp' => $id]);
		$data['db']=$this->crud->get_db_id('tb_karyawan', ['id_karyawan_db' => $id]);
		$data['ss']=$this->crud->get_ss_id('tb_karyawan', ['id_karyawan_ss' => $id]);
		$data['surveyor']=$this->crud->get_surveyor_id('tb_karyawan', ['id_surveyor' => $id]);
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSurveyID('tb_survey', ['kode_detail' => $id]);
		
		$data['title'] = "Detail Verifikasi - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','penjualan/verifikasi/view_hasil',$data);
	}

}