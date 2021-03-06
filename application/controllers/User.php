<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $table = "tb_login";
	var $password = "tms123";
	var $pk = "id_user";

	public function index()
	{
		$data['drop']="";
		$data['page']="user";
		$data['breadcrumb']="User";
		$sql  = "SELECT * FROM tb_login where hak_akses <> 'Administrator' ORDER BY id_user DESC";
		$data['record_user'] = $this->db->query($sql)->result();
		$data['title']="User";
		$this->template->load('layout_main','content_user',$data);
	}

	function tambah_user()
	{
		$data['drop']="";
		$data['page']="user";
		$data['breadcrumb']="Tambah User";
		$data['title']="Tambah User";
		$this->template->load('layout_main','content_user_add',$data);
	}

	public function add_user()
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
					'alamat_lengkap'=> $alamat_lengkap,
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
				redirect(base_url('user'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data pengguna baru gagal di simpan!'));
				redirect(base_url('user/add_user'));
			}
			}
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Foto gagal di simpan'));
				redirect(base_url('user/add_user'));
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
			redirect(base_url('user'));
	}

	public function edit($iduser){
		$data['drop']="";
		$data['page']="user";
		$data['breadcrumb']="Edit User";
		$rows = $this->crud->getByID($this->table,$this->pk,$iduser);
		$data['r'] =  array(
            'id_user'       => $rows[0]['id_user'],
            'username' 		=> $rows[0]['username'],
            'nama_lengkap'  => $rows[0]['nama_lengkap'],
            'no_ktp' 		=> $rows[0]['no_ktp'],
            'alamat_lengkap'=> $rows[0]['alamat_lengkap'],
            'no_hp' 		=> $rows[0]['no_hp'],
            'email' 		=> $rows[0]['email'],
			'hak_akses'     => $rows[0]['hak_akses'],
			'img'     		=> $rows[0]['img'],
			
            );
		$data['title']="Edit User";
		$this->template->load('layout_main','content_user_edit',$data);
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
				'no_ktp' 		=> $no_ktp,
				'alamat_lengkap'=> $alamat_lengkap,
				'no_hp' 		=> $no_hp,
				'email' 		=> $email,
				'hak_akses'     => $hak_akses,
				'img'			=> $img
			);
			$this->crud->update($this->table,$data, $this->pk,$id_user);
			
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data User berhasil di ubah!'));
				redirect(base_url('user'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data User gagal di ubah!'));
				redirect(base_url('user/edit/'.$id_user));
			} 
		}
	}
	
	public function nonaktifkan($iduser){
        $data = array('aktif'  => 'T');
        $this->crud->update($this->table,$data,$this->pk,$iduser);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('User berhasil di nonaktifkan!'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('User gagal di nonaktifkan!'));
			}  
			redirect(base_url('user'));
	}
	
	public function aktifkan($iduser){
        $data = array('aktif'  => 'Y');
        $this->crud->update($this->table,$data,$this->pk,$iduser);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('User berhasil di aktifkan!'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('User gagal di aktifkan!'));
			}  
			redirect(base_url('user'));
	}
	

	public function del_pengguna($iduser){
		$this->crud->deleteImage($iduser);
        $this->crud->delete($this->table,  $this->pk, $iduser );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('User berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('User gagal di hapus!'));
        }
        redirect(base_url('user'));
     }
}