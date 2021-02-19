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
		
		// $record_absensi = $this->absensi->getAbsensi();
		// $record_daily = $this->absensi->getDailyAbsensi(mktime(0, 0, 0, 2, 10, 2021))->result_array();
		
		// $i = 0;
		// foreach($record_daily as $row) {			
		// 	// Nama Lengkap
		// 	$record_daily[$i]['nama'] = $this->karyawan->getKaryawan(
		// 		'id_karyawan', 
		// 		$row['id_karyawan'])
		// 		->result_array()[0]['nama_lengkap'];
			
		// 	// Divisi
		// 	$record_daily[$i]['divisi'] = $this->karyawan->getKaryawan(
		// 		'id_karyawan', 
		// 		$row['id_karyawan'])
		// 		->result_array()[0]['id_divisi'];
		// 	$i++;
		// }
		// unset($i);

		// $data['record_absensi'] = $record_absensi;
		// $data['record_karyawan'] = $this->karyawan->get_all(array('id_karyawan', 'id_divisi', 'nama_lengkap'));
		// $data['record_daily'] = $record_daily;

		$this->template->load('layout_main', 'kepegawaian/absensi/index', $data);
	}

	public function daily()
	{
		header("Content-Type: application/json");

		if(isset($_POST['date'])) {
			$date = strtotime($_POST['date']);

			$json = json_encode($this->getNormalizeDailyAbsensi($date));

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

	public function laporan()
	{
		$date = strtotime($_GET['date']);
		$data = $this->getNormalizeDailyAbsensi($date, FALSE);
		// $data = array('HH' => 'HHH');
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->filename = 'laporan-absensi-'.$date.'.pdf';

		$this->pdf->load_view('kepegawaian/absensi/laporan', $data);
		return $this->pdf->stream();
	}

	protected function getNormalizeDailyAbsensi($date, $dataOnly = FALSE) 
	{
		$results = $this->absensi->getDailyAbsensi(date('Y-m-d', $date))->result_array();

		/* Normalize Array to return as JSON */
		$i = 0;
		foreach($results as $res) {
			$masuk = new DateTime($res['masuk']);
			$pulang = new DateTime($res['pulang']);
			$durasi = $pulang->diff($masuk);

			if($res['masuk'] != NULL) $results[$i]['masuk'] =  date('g:i A', strtotime($res['masuk']));
			if($res['pulang'] != NULL) $results[$i]['pulang'] =  date('g:i A', strtotime($res['pulang']));

			$results[$i]['durasi'] = array('jam' => $durasi->h, 'menit' => $durasi->i);

			$results[$i]['no'] = $i+1;

			$results[$i]['nama'] = $this->karyawan->getKaryawan(
				'id_karyawan', 
				$res['id_karyawan'])
				->result_array()[0]['nama_lengkap'];

			$results[$i]['divisi'] = $this->karyawan->getKaryawan(
				'id_karyawan', 
				$res['id_karyawan'])
				->result_array()[0]['id_divisi'];
			
			$durasi->h < 8 ? $results[$i]['keterangan'] = 'bad' : $results[$i]['keterangan'] = 'good';

			$i++;
		}
		unset($i);
		$final['recordsDate'] = date('j F, Y', $date);
		$final['recordsTotal'] = count($results);
		$final['data'] = $results;
		/* End of Normalize Array to return as JSON */

		if($dataOnly) {
			return $final['data'];
		}

		return $final;
	}
}
