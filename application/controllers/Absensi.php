<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Absensi_model', 'absensi');
        $this->load->model('Karyawan_model', 'karyawan');
        $this->load->model('Jam_model', 'jam');
        $this->load->helper('Tanggal');
    }

	public function index()
	{
		$now = date('H:i:s');
		$this->load->view('layout_absensi');
	}

	public function absen()
    {		
		$karyawan =  $this->karyawan->getKaryawan( 'nik', $_POST['nik'] );		
		$absensi = $this->absensi->getTodayAbsensi($karyawan->row_array()[ 'id_karyawan' ]);


		if( $karyawan->num_rows() > 0 ) {

			$data_karyawan =  $karyawan->row_array();

			// var_dump($absensi->row_array());
			if( !$absensi->num_rows() ) {
					
				if ($data_karyawan['aktif'] == "Y") {
					
					$this->catatAbsen($data_karyawan, 'masuk', $absensi);
	
				} else if ($data_karyawan['aktif'] == "T"){

					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Karyawan Tidak Aktif'));					
					redirect(base_url("absensi"));

				} else {

					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Gagal Absen'));
					redirect(base_url("absensi"));
					// var_dump($absensi);
				}
			} else {
				if ( $_POST['opsi'] == '2' ){
					$this->catatAbsen($data_karyawan, 'pulang', $absensi);
				} else {

					$s = $absensi->row_array()['masuk'];
					$dt = new DateTime($s);
					$date = $dt->format('d-m-Y');
					$time = $dt->format('h:i:s A');
	
					
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Anda sudah melakukan absensi pada '.$time));
					redirect(base_url("absensi"));
				}
			}



		} else {
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('NIK Karyawan Tidak Terdaftar'));
			redirect(base_url("absensi"));
			
		}
    }

	public function catatAbsen($karyawan, $keterangan, $absensi)
	{
		$data = [
			'id_karyawan' => $karyawan['id_karyawan'],
			$keterangan => date('Y-m-d H:i:s'),
			];

		if( $keterangan == 'masuk' ){

			$result = $this->absensi->insert_data($data);
			
			if ($result) {
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Berhasil Absen!'));
				redirect(base_url("absensi"));
				$this->session->set_flashdata('response', [
					'status' => 'success',
					'message' => 'Absensi berhasil dicatat'
				]);
			} else {
				$this->session->set_flashdata('response', [
					'status' => 'error',
					'message' => 'Absensi gagal dicatat'
				]);
			}
		} elseif ( $keterangan == 'pulang' ) {
			if( $absensi->row_array()['masuk'] ) {

				if( $absensi->row_array()['pulang'] ) {
					var_dump($absensi);
					$s = $absensi->row_array()['pulang'];
					$dt = new DateTime($s);
					$date = $dt->format('d-m-Y');
					$time = $dt->format('h:i:s A');

					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Anda sudah melakukan absensi pada '.$time));
					redirect(base_url("absensi"));
					
				} else {
					$result = $this->absensi->updateAbsensi($absensi->row_array()['id_absen'], $data);
	
					if ($result) {
						$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Berhasil Absen!'));
						redirect(base_url("absensi"));
						$this->session->set_flashdata('response', [
							'status' => 'success',
							'message' => 'Absensi berhasil dicatat'
						]);
					} else {
						$this->session->set_flashdata('response', [
							'status' => 'error',
							'message' => 'Absensi gagal dicatat'
						]);
					}
				}

			} else {
				$this->session->set_flashdata('response', [
					'status' => 'error',
					'message' => 'Anda belum melakukan absensi masuk'
				]);
			}
			// var_dump($absensi->row_array()['masuk']);
		} else {
			$this->session->set_flashdata('response', [
				'status' => 'error',
				'message' => 'Absensi gagal dicatat'
			]);
		}
	}
}
