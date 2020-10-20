<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function index()
	{
		$this->load->view('auth/v_login');
	}
	
	public function do_login()
	{
		foreach ($_POST as $key => $value) { $$key = $value; }
		$koneksi = $this->auth->get_mysqli();
		$pass = $this->auth->anti_injection($password,$koneksi);
    	$where = array(
			'username' 	=> $username,
			'password' 	=> MD5($password)
			);
		$login=  $this->db->get_where('tb_login',$where);
		if($login->num_rows()>0 ){
			$d=  $login->row_array();
			if ($d['hak_akses'] == "Administrator") {
					$data_session = array(
									'username'  		 => $username,
									'nama_lengkap'    	 => $d['nama_lengkap'],
									'password'  		 => $d['password'],
									'id_user'			 => $d['id_user'],
									'hak_akses'			 => $d['hak_akses'],
									'email'				 => $d['email'],
									'no_tlp'			 => $d['no_tlp'],
									'aktif'			 	 => $d['aktif'],
									'bergabung'			 =>	$this->auth->tanggal_indo($d['bergabung']),
									// 'img'				 => $d['img'],
									'lokasi'			 	 => $d['lokasi'],
			 					    );

				$this->session->set_userdata($data_session);
                redirect(base_url("admin"));

			}else if ($d['hak_akses'] == ""){
			
			
			}else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Username atau Password salah!'));
				redirect(base_url());
			}
		}else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Username atau Password salah!'));
				redirect(base_url());
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}	
