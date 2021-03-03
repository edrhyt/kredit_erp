<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	var $table = "tb_login";
	var $password = "lhu123";
	var $pk = "id_user";

	public function index()
	{
		$data['page'] = "pengguna";
		$data['title'] = "SIS-LHU Pengguna";
		$sql  = "SELECT *from tb_login where hak_akses <> 'Administrator' ORDER BY id_user ASC";
		$data['record_pengguna'] = $this->db->query($sql)->result();
		$this->template->load('layout_main','content_pengguna',$data);
	}

	public function add_new()
	{
		$data['page'] = "pengguna";
		$data['title'] = "SIS-LHU Tambah Pengguna";
		$this->template->load('layout_main','content_pengguna_add',$data);
	}
	
	public function add_karyawan()
	{
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
    
		$this->load->library('upload', $config);
        if ($this->upload->do_upload('berkas')) {
			if(isset($_POST['submit']))
            {
				$data  = array(
					'id_user'       => '',
					'username'  	=> $username,
					'password' 		=> MD5($this->password),
					'nama_lengkap'  => $nama_lengkap,
					'no_ktp' 		=> $no_ktp,
					'alamat_lengkap'  => $alamat_lengkap,
					'no_hp' 		=> $no_hp,
					'email'   	    => $email,
					'hak_akses'     => $hak_akses,
					'bergabung'     => date('Y-m-d'),
					'aktif'			=> 'Y',
					'img'			=> $this->upload->data("file_name")
				);
			
			$this->db->insert($this->table,$data);
			if ($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data pengguna baru berhasil di simpan!'));
				redirect(base_url('pengguna'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data pengguna baru gagal di simpan!'));
				redirect(base_url('pengguna/add_new'));
			}
			}
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Foto gagal di simpan'));
				redirect(base_url('pengguna/add_new'));
		}
	}

	public function reset_password($iduser){
        $data = array('password'  => MD5($this->password));
        $this->crud->update($this->table,$data,'id_user',$iduser);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Password berhasil di reset!'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('Password gagal di reset!'));
			}  
			redirect(base_url('pengguna'));
	}

	public function edit($iduser){
		$data['page'] = "pengguna";
		$data['title'] = "SIS-LHU Ubah Pengguna";
		$rows = $this->crud->getByID($this->table,$this->pk,$iduser);
		$data['r'] =  array(
            'id_user'       => $rows[0]['id_user'],
            'username' 		=> $rows[0]['username'],
            'nama_lengkap'  => $rows[0]['nama_lengkap'],
            'no_tlp' 		=> $rows[0]['no_tlp'],
            'email' 		=> $rows[0]['email'],
			'hak_akses'     => $rows[0]['hak_akses'],
			'img'     		=> $rows[0]['img'],
			
            );
		$this->template->load('layout_main','content_pengguna_edit',$data);
	}

	public function do_edit(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['submit']))
        {
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
					$img = $old_img;
				}

			$data = array(
				'username' 		=> $username,
				'nama_lengkap'  => $nama_lengkap,
				'no_tlp' 		=> $no_tlp,
				'email' 		=> $email,
				'hak_akses'     => $hak_akses,
				'img'			=> $img
			);
			$this->crud->update($this->table,$data, $this->pk,$id_user);
			
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data pengguna berhasil di ubah!'));
				redirect(base_url('pengguna'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data pengguna gagal di ubah!'));
				redirect(base_url('pengguna/edit/'.$id_user));
			} 
		}
	}
	
	public function nonaktifkan($iduser){
        $data = array('aktif'  => 'T');
        $this->crud->update($this->table,$data,$this->pk,$iduser);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Pengguna berhasil di nonaktifkan!'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('Pengguna gagal di nonaktifkan!'));
			}  
			redirect(base_url('pengguna'));
	}
	
	public function aktifkan($iduser){
        $data = array('aktif'  => 'Y');
        $this->crud->update($this->table,$data,$this->pk,$iduser);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Pengguna berhasil di aktifkan!'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('Pengguna gagal di aktifkan!'));
			}  
			redirect(base_url('pengguna'));
	}
	

	public function del_pengguna($iduser){
		$this->crud->deleteImage($iduser);
        $this->crud->delete($this->table,  $this->pk, $iduser );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Pengguna berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Pengguna gagal di hapus!'));
        }
        redirect(base_url('pengguna'));
     }
}
