<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	var $table   = "tb_login";
	var $pk		 = "id_user";

	public function index()
	{
		$data['drop']="";
		$data['page']="";
		$data['page'] = "profile";
		$data['title'] = "TMS Profile";
		$this->template->load('layout_main','profile/index',$data);
	}

	public function ganti_password()
	{
		$data['drop']="";
		$data['page']="";
		$data['title'] = "TMS Profile";
		$this->template->load('layout_main','profile/edit',$data);
	}

	public function do_edit_profile()
	{
		$idUser   =  $this->session->userdata('id_user');
		$username = $this->session->userdata('username');
		foreach ($_POST as $key => $value) { $$key = $value; }

		$config = array(
			'upload_path' => "./upload/img/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'file_name' => $username.'-'.date('Y-m-d'),
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "1500",
			'max_width' => "1500"
			);

			if (!empty($_FILES["new_img"]["name"])) {
				$this->load->library('upload', $config);
				$this->upload->do_upload('new_img');
				$img = $this->upload->data("file_name");
			} else {
				$img = $this->session->userdata('img');
			}	


        if(isset($_POST['submit']))
        {
			$data = array(
				'nama_lengkap'  => $nama_lengkap,
				'no_ktp'		=> $no_ktp,
				'alamat_lengkap'=> $alamat_lengkap,
				'email'  		=> $email,
				'no_hp' 		=> $no_hp,
				'img'			=> $img
				);
		}
		$editprofile = $this->crud->update($this->table,$data, $this->pk,$idUser);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data profile berhasil di ubah'));
			$this->session->set_userdata('nama_lengkap',$nama_lengkap);
			$this->session->set_userdata('email',$email);
			$this->session->set_userdata('no_hp',$no_hp);
			$this->session->set_userdata('img',$img);
		}else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal("Data profile gagal di ubah"));
		}
		redirect(base_url('profile'));
	}

	public function do_edit_password()
	{
		$idUser  =  $this->session->userdata('id_user');
		foreach ($_POST as $key => $value) { $$key = $value; }
		
		$oldpassTHIS =  $this->session->userdata('password'); 
		$oldpass 	 = 	MD5($pass_lama);
		
		if($oldpassTHIS == $oldpass)
		{
			if($pass_baru == $pass_baru_ulang)
			{
				if(isset($_POST['submit']))
				{
					$data = array('password'  => MD5($pass_baru));
				}
				$editpass = $this->crud->update($this->table,$data, $this->pk,$idUser);
				if ($editpass != true) 
				{
					$this->session->set_userdata('password',MD5($pass_baru));
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Password berhasil di ubah'));
				}
				else 
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal());
				}
			}
			
			else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal());
			}
		}
		else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal());
		}
		redirect(base_url('profile/ganti_password'));
	}
}
