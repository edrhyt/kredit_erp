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
  //   	foreach ($_POST as $key => $value) { $$key = $value; }
  //   	$where = array(
		// 	'nik' 	=> $nik
		// 	);
		// $absen=  $this->db->get_where('tb_karyawan',$where);
		// if($absen->num_rows()>0 ){
		// 	$d=  $absen->row_array();
		// 	if ($d['aktif'] == "Y") {
		// 			$data_session = array(
		// 							'id_karyawan'  		 => $d['id_karyawan'],
		// 							'id_divisi'  		 => $d['id_divisi'],
		// 							'id_jabatan'		 => $d['id_jabatan'],
		// 							'nama_lengkap'    	 => $d['nama_lengkap'],
		// 							'tempat_lahir'    	 => $d['tempat_lahir'],
		// 							'tgl_lahir'			 => $d['tgl_lahir'],
		// 							'no_ktp'			 => $d['no_ktp'],
		// 							'alamat_karyawan'	 => $d['alamat_karyawan'],
		// 							'no_hp'			 	 => $d['no_hp'],
		// 							'nik'    	 		 => $nik,
		// 							'aktif'			 	 => $d['aktif'],
		// 							'img'				 => $d['img'],
		// 	 					    );

		// 		$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Berhasil Absen!'));
  //               redirect(base_url("absensi"));

		// 	}else if ($d['aktif'] == "T"){
		// 		$this->session->set_flashdata("msg", $this->crud->msg_gagal('Karyawan Tidak Aktif'));
		// 		redirect(base_url());
		// 	}else{
		// 		$this->session->set_flashdata("msg", $this->crud->msg_gagal('Gagal Absen!'));
		// 		redirect(base_url());
		// 	}
		// }else{
		// 	$this->session->set_flashdata("msg", $this->crud->msg_gagal('Gagal Absen!'));
		// 		redirect(base_url());
		// }
		foreach ($_POST as $key => $value) { $$key = $value; }
    	$where = array(
			'nik' 	=> $nik
			);
		$absen=  $this->db->get_where('tb_karyawan',$where);
		if($absen->num_rows()>0 ){
			$d=  $absen->row_array();
			if ($d['aktif'] == "Y") {
					if (@$this->uri->segment(3)) {
			            $keterangan = ucfirst($this->uri->segment(3));
			        } else {
			            
			        }
			        if ('Masuk') {
			        	$keterangan = 'Masuk';
			        }elsex{
			        	$keterangan = 'Pulang';
			        }

					 $data = [
				            'tgl' => date('Y-m-d'),
				            'waktu' => date('H:i:s'),
				            'keterangan' => $keterangan,
				            'id_karyawan' => $d['id_karyawan']
				        ];
				        $result = $this->absensi->insert_data($data);
				        if ($result) {
				        	$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Berhasil Absen!'));
			                redirect(base_url("absensi"));
				            // $this->session->set_flashdata('response', [
				            //     'status' => 'success',
				            //     'message' => 'Absensi berhasil dicatat'
				            // ]);
				        } else {
				            $this->session->set_flashdata('response', [
				                'status' => 'error',
				                'message' => 'Absensi gagal dicatat'
				            ]);
				        }

			}else if ($d['aktif'] == "T"){
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Karyawan Tidak Aktif'));
				redirect(base_url("absensi"));
			}else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Gagal Absen'));
				redirect(base_url("absensi"));
			}
		}else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('NIK Karyawan Tidak Terdaftar'));
				redirect(base_url("absensi"));
		}
   //      if (@$this->uri->segment(3)) {
   //          $keterangan = ucfirst($this->uri->segment(3));
   //      } else {
   //          $absen_harian = $this->absensi->absen_harian_karyawan($id_karyawan)->num_rows();
   //          $keterangan = ($absen_harian < 2 && $absen_harian < 1) ? 'Masuk' : 'Pulang';
   //      }

   //      $data = [
   //          'tgl' => date('Y-m-d'),
   //          'waktu' => date('H:i:s'),
   //          'keterangan' => $keterangan,
   //          'id_karyawan' => $id_karyawan
   //      ];
   //      $result = $this->absensi->insert_data($data);
   //      if ($result) {
   //          $this->session->set_flashdata('response', [
   //              'status' => 'success',
   //              'message' => 'Absensi berhasil dicatat'
   //          ]);
   //      } else {
   //          $this->session->set_flashdata('response', [
   //              'status' => 'error',
   //              'message' => 'Absensi gagal dicatat'
   //          ]);
   //      }
   //      redirect('absensi');
    }

    public function getNik($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->karyawan->cekNik($id);
        echo json_encode($query);
    }
}
