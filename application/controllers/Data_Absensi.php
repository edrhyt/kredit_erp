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
		$data['drop']="Kepegawaian";
		$data['page']="Absensi";
		
		$record_absensi = $this->absensi->getAbsensi();
		$record_daily = $this->absensi->getDailyAbsensi(mktime(0, 0, 0, 2, 10, 2021))->result_array();
		
		$i = 0;
		foreach($record_daily as $row) {			
			// Nama Lengkap
			$record_daily[$i]['nama'] = $this->karyawan->getKaryawan(
				'id_karyawan', 
				$row['id_karyawan'])
				->result_array()[0]['nama_lengkap'];
			
			// Divisi
			$record_daily[$i]['divisi'] = $this->karyawan->getKaryawan(
				'id_karyawan', 
				$row['id_karyawan'])
				->result_array()[0]['id_divisi'];
			$i++;
		}
		unset($i);

		// $data['record_absensi'] = $record_absensi;
		// $data['record_karyawan'] = $this->karyawan->get_all(array('id_karyawan', 'id_divisi', 'nama_lengkap'));
		$data['record_daily'] = $record_daily;

		$this->template->load('layout_main', 'kepegawaian/absensi/index', $data);
	}

	public function daily()
	{
		header("Content-Type: application/json");

		if(isset($_POST['date'])) {
			$date = strtotime($_POST['date']);
			$results = $this->absensi->getDailyAbsensi(date('Y-m-d', $date))->result_array();
			$json = json_encode($results);

			if ($json === false) {
				// Avoid echo of empty string (which is invalid JSON), and
				// JSONify the error message instead:
				$json = json_encode(["jsonError" => json_last_error_msg()]);
				if ($json === false) {
					// This should not happen, but we go all the way now:
					$json = '{"jsonError":"unknown"}';
				}
				// Set HTTP response status code to: 500 - Internal Server Error
				http_response_code(500);
			}
			echo $json;
		}
		return;
	}

}
