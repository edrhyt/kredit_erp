<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepegawaian extends CI_Controller {

	var $table = "tb_karyawan";
	var $pk = "id_karyawan";

	public function index()
	{
		$data['breadcrumb']="Pegawai";
		$sql  = "SELECT * from tb_karyawan ORDER BY `id_karyawan` DESC ";
		$data['record_karyawan'] = $this->db->query($sql)->result();
		$data['title']="Kepegawaian";
		$data['drop']="";
		$data['page']="kepegawaian";
		$this->template->load('layout_main','kepegawaian/index',$data);
	}

	function tambah_pegawai()
	{
		$data['drop']="";
		$data['page']="kepegawaian";
		$data['data']=$this->m_kepegawaian->get_divisi();
		$data['breadcrumb']="Tambah pegawai";
		$data['title']="Tambah pegawai";
		$this->template->load('layout_main','kepegawaian/add',$data);
	}

	function get_jabatan(){
		$id=$this->input->post('id');
		$data=$this->m_kepegawaian->get_jabatan($id);
		echo json_encode($data);
	}

	function get_data_jabatan($id_divisi){
        $query = $this->db->get_where('jabatan', array('id_jabatan' => $id_jabatan	));
        return $query;
        var_dump($query);
    }

    function get_data_edit(){
        $nik = $this->input->post('nik',TRUE);
        $data = $this->crud->get_data_nik($nik)->result();
        echo json_encode($data);
        var_dump($data);
    }

	public function add_pegawai()
	{
		foreach ($_POST as $key => $value) { $$key = $value; }

		$config = array(
			'upload_path' => "./upload/img/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'file_name' => date('Y-m-d'),
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "1500",
			'max_width' => "1500"
		);
    
		$this->load->library('upload', $config);
        // if ($this->upload->do_upload('berkas')) {
			if(isset($_POST['submit']))
            {
				$data  = array(
					'id_karyawan'   	=> '',
					'id_divisi'   		=> $divisi,
					'id_jabatan'   		=> $jabatan,
					'nik'				=> $this->generate_code->_Code($this->table,'nik','TMS'),
					'nama_lengkap'  	=> $nama_lengkap,
					'tempat_lahir' 	 	=> $tempat_lahir,
					'tgl_lahir'  		=> $tgl_lahir,
					'no_ktp' 			=> $no_ktp,
					'alamat_karyawan'	=> $alamat,
					'no_hp' 			=> $no_hp,
					'aktif'				=> 'Y',
					'img'				=> ''//$this->upload->data("file_name")
				);
			
			$this->db->insert($this->table,$data);
			if ($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Pegawai baru berhasil di simpan!'));
				redirect(base_url('kepegawaian'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Pegawai baru gagal di simpan!'));
				redirect(base_url('kepegawaian/tambah_pegawai'));
			}
			}//end if isset
  //       }else{
		// 	$this->session->set_flashdata("msg", $this->crud->msg_gagal('Foto gagal di simpan'));
		// 		redirect(base_url('kepegawaian/add_karyawan'));
		// }
	}

	public function edit($id_karyawan){
		$data['drop']="";
		$data['page']="kepegawaian";
		$data['breadcrumb']="Edit Pegawai";
		$data['title']="Edit Pegawai";
		$rows = $this->crud->getByID($this->table,$this->pk,$id_karyawan);
		$data['data']=$this->m_kepegawaian->get_divisi();
		$data['r'] =  array(
			'id_karyawan'   => $rows[0]['id_karyawan'],
			'id_divisi'   	=> $rows[0]['id_divisi'],
			'id_jabatan'   	=> $rows[0]['id_jabatan'],
			'nik'			=> $rows[0]['nik'],
			'nama_lengkap'  => $rows[0]['nama_lengkap'],
			'tempat_lahir'  => $rows[0]['tempat_lahir'],
			'tgl_lahir'  	=> $rows[0]['tgl_lahir'],
			'no_ktp' 		=> $rows[0]['no_ktp'],
			'alamat'  		=> $rows[0]['alamat_karyawan'],
			'no_hp' 		=> $rows[0]['no_hp'],
			'aktif'			=> $rows[0]['aktif']
			// 'img'			=> $rows[0]['img']
            );
		$this->template->load('layout_main','kepegawaian/edit',$data);
	}

	public function do_edit(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['submit']))
        {
			// $config = array(
			// 	'upload_path' => "./upload/img/",
			// 	'allowed_types' => "gif|jpg|png|jpeg|pdf",
			// 	'file_name' => $nama_lengkap.'-'.date('Y-m-d'),
			// 	'overwrite' => TRUE,
			// 	'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 	'max_height' => "1500",
			// 	'max_width' => "1500"
			// 	);

			// 	if (!empty($_FILES["new_img"]["name"])) {
			// 		$this->load->library('upload', $config);
			// 		$this->upload->do_upload('new_img');
			// 		$img = $this->upload->data("file_name");
			// 	} else {
			// 		$img = $old_img;
			// 	}

			$data = array(
					'id_karyawan'   => $id_karyawan,
					'id_divisi'   	=> $divisi,
					'id_jabatan'   	=> $jabatan,
					'nama_lengkap'  => $nama_lengkap,
					'tempat_lahir'  => $tempat_lahir,
					'tgl_lahir'  	=> $tgl_lahir,
					'no_ktp' 		=> $no_ktp,
					'alamat_karyawan'  		=> $alamat,
					'no_hp' 		=> $no_hp
					// 'img'			=> $img
			);
			$this->crud->update($this->table,$data, $this->pk,$id_karyawan);
			
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Pegawai berhasil di ubah!'));
				redirect(base_url('kepegawaian'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Pegawai gagal di ubah!'));
				redirect(base_url('kepegawaian/edit/'.$id_user));
			} 
		}
	}
	
	public function nonaktifkan($id_karyawan){
        $data = array('aktif'  => 'T');
        $this->crud->update($this->table,$data,$this->pk,$id_karyawan);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Pegawai berhasil di nonaktifkan!'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('Pegawai gagal di nonaktifkan!'));
			}  
			redirect(base_url('kepegawaian'));
	}
	
	public function aktifkan($id_karyawan){
        $data = array('aktif'  => 'Y');
        $this->crud->update($this->table,$data,$this->pk,$id_karyawan);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Pegawai berhasil di aktifkan!'));
            }else{
                $this->session->set_flashdata("msg", $this->crud->msg_gagal('Pegawai gagal di aktifkan!'));
			}  
			redirect(base_url('kepegawaian'));
	}
	

	public function del_karyawan($id_karyawan){
		$this->crud->deleteImage($id_karyawan);
        $this->crud->delete($this->table,  $this->pk, $id_karyawan );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Pegawai berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Pegawai gagal di hapus!'));
        }
        redirect(base_url('kepegawaian'));
     }

}
