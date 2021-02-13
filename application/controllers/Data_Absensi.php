<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Absensi extends CI_Controller {

	var $table = "absensi";
	var $pk = "id_absensi";

	public function __construct() {
		parent::__construct();
        // date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Absensi_model', 'absensi');
		$this->load->model('Karyawan_model', 'karyawan');
	}

	public function index()
	{
		$data['breadcrumb']="Absensi";
		$data['title']="Absensi";
		$data['drop']="";
		$data['page']="Absensi";
		
		$record_absensi = $this->absensi->getAbsensi();
		
		$i = 0;
		foreach($record_absensi as $row) {
			// Foto Url
			$record_absensi[$i]['foto'] = $this->karyawan->getKaryawan(
				'id_karyawan', 
				$row['id_karyawan'])
				->result_array()[0]['img'];
			
			// Nama Lengkap
			$record_absensi[$i]['nama'] = $this->karyawan->getKaryawan(
				'id_karyawan', 
				$row['id_karyawan'])
				->result_array()[0]['nama_lengkap'];
			
			// Divisi
			$record_absensi[$i]['divisi'] = $this->karyawan->getKaryawan(
				'id_karyawan', 
				$row['id_karyawan'])
				->result_array()[0]['id_divisi'];
			$i++;
		}
		unset($i);

		$data['record_absensi'] = $record_absensi;

		$this->template->load('layout_main', 'kepegawaian/absensi/index', $data);
	}

}
