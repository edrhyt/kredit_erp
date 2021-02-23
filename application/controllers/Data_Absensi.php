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

		$this->template->load('layout_main', 'kepegawaian/absensi/index', $data);
	}

	public function daily()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
		else {
			header("HTTP/1.1 401 Unauthorized");
    		exit("You don't have access to this page!");
		}
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

	public function monthly()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			header("Content-Type: application/json");

			$date = [
				'y' => date('Y', strtotime($_POST['date'])), 
				'm' => date('m', strtotime($_POST['date'])),
				'd' => date('d', strtotime($_POST['date']))];

			$json = json_encode($this->getNormalizeMonthlyAbsensi($date));

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
			exit;
		} else {
			header("HTTP/1.1 401 Unauthorized");
    		exit("You don't have access to this page!");
		}
	}

	public function getNormalizeMonthlyAbsensi($date)
	{
		$listKaryawan = $this->karyawan->getFieldsKaryawan(['id_karyawan', 'nik', 'nama_lengkap']);

		/* Normalize data list karyawan */
		for($i = 0; $i < count($listKaryawan); $i++) {			
			$listKaryawan[$i]['absensi'] = array();
			$days = cal_days_in_month(CAL_GREGORIAN, $date['m'], $date['y']);

			for($j = 1; $j <= $days; $j++){
				$id_karyawan = $listKaryawan[$i]['id_karyawan'];
				$status = $this->absensi->checkKaryawanAbsensi($id_karyawan, $date['y'].'-'.$date['m'].'-'.$j);

				array_push($listKaryawan[$i]['absensi'], $status);
			}			
		}
		$json['recordDate'] = date('F Y', strtotime($date['y'].'-'.$date['m']));
		$json['days'] = cal_days_in_month(CAL_GREGORIAN, $date['m'], $date['y']);
		$json['data'] = $listKaryawan;

		return $json;
	}

	public function laporan()
	{
		if($_GET['t'] == 'harian'){
			$date = strtotime($_GET['date']);
			$data = $this->getNormalizeDailyAbsensi($date, FALSE);
			// $data = array('HH' => 'HHH');
		
			$this->load->library('pdf');
		
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->filename = 'laporan-absensi-'.$date.'.pdf';
	
			$this->pdf->load_view('kepegawaian/absensi/laporan', $data);
			return $this->pdf->stream();
		} elseif($_GET['t'] == 'bulanan') {
			$date = [
				'y' => date('Y', strtotime($_GET['date'])), 
				'm' => date('m', strtotime($_GET['date'])),
				'd' => date('d', strtotime($_GET['date']))];
			$data = $this->getNormalizeMonthlyAbsensi($date);
			
			// $this->template->load('layout_main', 'kepegawaian/absensi/laporan', $data);
		
			$this->load->library('pdf');
		
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->filename = 'laporan-absensi-'.date('m-Y', strtotime($_GET['date'])).'.pdf';
	
			$this->pdf->load_view('kepegawaian/absensi/laporan', $data);
			return $this->pdf->stream();
		}
	}

}
