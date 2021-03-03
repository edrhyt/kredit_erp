<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {

	var $table   = "tb_surat_order";
	var $table2   = "tb_survey";
	var $table3   = "tb_delivery";
    var $tables  = "tb_barang_so";
	var $pk 	 = "id_surat_order";
	var $pk2 	 = "id_survey";
	//var $penjualan = 
	// var $penjualan = 'tb_inventory_barang';

	function __construct(){
		parent::__construct();
		$this->load->model('M_inventory');
	}

	public function index()
	{
		$data['breadcrumb']= "Data Delivery";
		$data['title']="Data Delivery";
		$data['drop']="Penjualan";
		$data['page']="Verifikasi";
		$data['record_survey']=$this->crud->getSurvey();
		$data['record_delivery']=$this->crud->getDelivery();
		$this->template->load('layout_main','penjualan/delivery/index',$data);
	}

	function get_kecamatan(){
		$id=$this->input->post('id');
		$data=$this->m_daerah->get_kecamatan($id);
		echo json_encode($data);
	}

	function get_data_kecamatan($id_kab){
        $query = $this->db->get_where('kecamatan', array('id_kab' => $id_kab));
        return $query;
    }

    function get_data_edit(){
        $kode_detail = $this->input->post('kode_detail',TRUE);
        $data = $this->crud->get_data_by($kode_detail)->result();
        echo json_encode($data);
        var_dump($data);
    }

	function get_kelurahan(){
		$id=$this->input->post('id');
		$data=$this->m_daerah->get_kelurahan($id);
		echo json_encode($data);
	}

	function add_delivery($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Verifikasi";
		$data['data']=$this->m_daerah->get_kabupaten();
		$data['breadcrumb']= "Tambah Petugas";
		$data['kab'] = $this->admin_model->get('kabupaten');
        $data['kec'] = $this->admin_model->get('kecamatan');
        $data['kel'] = $this->admin_model->get('kelurahan');
        $data['driver']=$this->crud->get_karyawan_driver();
        $data['helper']=$this->crud->get_karyawan_helper();
        $data['r'] = $this->crud->getSurveyID('tb_survey', ['kode_detail' => $id]);
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);

		$data['title']="Tambah Petugas";
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','penjualan/delivery/add',$data);
	}

	public function do_add_delivery(){
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
            	$data2  = array(
					'status_petugas'	=> '1'
				);

				$this->crud->update($this->table2,$data2, $this->pk2,$id_survey);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Petugas Delivery berhasil ditambahkan!'));
					redirect(base_url('delivery'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Petugas Delivery gagal ditambahkan!'));
					redirect(base_url('delivery'));
				}

				$data  = array(
					'id_delivery'		=> '',
					'id_survey'			=> $id_survey,
					'id_surat_order'	=> $id_surat_order,
					'id_driver'			=> $driver,
					'id_helper'			=> $helper
				);
					
				// $this->update_status();

				$this->db->insert($this->table3,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Petugas Delivery berhasil ditambahkan!'));
					redirect(base_url('delivery'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Petugas Delivery gagal ditambahkan!'));
					redirect(base_url('delivery'));
				}
			}
	}

	public function view_delivery($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Verifikasi";
		$data['breadcrumb']= "Detail Delivery";
		$data['record_delivery']=$this->crud->getSurvey();
		$data['sp']=$this->crud->get_sp_id('tb_karyawan', ['id_karyawan_sp' => $id]);
		$data['db']=$this->crud->get_db_id('tb_karyawan', ['id_karyawan_db' => $id]);
		$data['ss']=$this->crud->get_ss_id('tb_karyawan', ['id_karyawan_ss' => $id]);
		$data['surveyor']=$this->crud->get_surveyor_id('tb_karyawan', ['id_surveyor' => $id]);
		$data['driver']=$this->crud->get_driver_id('tb_karyawan', ['id_driver' => $id]);
		$data['helper']=$this->crud->get_helper_id('tb_karyawan', ['id_helper' => $id]);
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSurveyID('tb_survey', ['kode_detail' => $id]);
		$data['title'] = "Detail Verifikasi - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','penjualan/delivery/view',$data);
	}

	public function do_delivery(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['yes']))
        {
			$hasil_deliv = 'Yes';
		}else if(isset($_POST['batal'])){
			$hasil_deliv = 'Batal';
		}else{
			$hasil_deliv = 'Pending';
		}
		
		$data  = array(
				'tgl_verifikasi'	=> date('Y-m-d'),
				'kode_delivery'		=> $kode_delivery,
				'status_delivery'			=> $hasil_deliv,
				'keterangan_delivery'		=> $keterangan_delivery,
				'tgl_kirim'			=> $tgl_kirim_baru
			);
		
			$this->crud->update($this->table2,$data, $this->pk2,$id_survey);
			if ($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Delivery berhasil di verifikasi!'));
				redirect(base_url('delivery'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Delivery gagal di verifikasi!'));
				redirect(base_url('delivery/view/'.$kode_detail));
			}			
		
	}

	public function view_delivery_hasil($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Verifikasi";
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
		$this->template->load('layout_main','penjualan/delivery/view_hasil',$data);
	}

}