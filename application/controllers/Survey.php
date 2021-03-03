<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

	var $table   = "tb_surat_order";
	var $table2   = "tb_survey";
	var $tables  = "tb_barang_so";
	var $pk2 	 = "id_survey";
	//var $penjualan = 
	// var $penjualan = 'tb_inventory_barang';

	function __construct(){
		parent::__construct();
		$this->load->model('M_inventory');
	}

	public function index()
	{
		$data['breadcrumb']= "Data Survey";
		$data['title']="Data Survey";
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['record_survey']=$this->crud->getSurvey();
		$this->template->load('layout_main','penjualan/survey/index',$data);
	}

	function get_kecamatan(){
		$id=$this->input->post('id');
		$data=$this->m_daerah->get_kecamatan($id);
		echo json_encode($data);
	}

	function get_data_kecamatan($id_kab){
        $query = $this->db->get_where('kecamatan', array('id_kab' => $id_kab));
        return $query;
    }

    function get_data_edit(){
        $kode_detail = $this->input->post('kode_detail',TRUE);
        $data = $this->crud->get_data_by($kode_detail)->result();
        echo json_encode($data);
        var_dump($data);
    }

	function get_kelurahan(){
		$id=$this->input->post('id');
		$data=$this->m_daerah->get_kelurahan($id);
		echo json_encode($data);
	}

	// SURVEY PART

	function add_survey($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['data']=$this->m_daerah->get_kabupaten();
		$data['breadcrumb']= "Tambah Survey";
		$data['kab'] = $this->admin_model->get('kabupaten');
        $data['kec'] = $this->admin_model->get('kecamatan');
        $data['kel'] = $this->admin_model->get('kelurahan');
        $data['surveyor']=$this->crud->get_karyawan_surveyor();
        $data['r'] = $this->crud->getSOID('tb_surat_order', ['kode_detail' => $id]);
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);

		$data['title']="Tambah Survey";
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','penjualan/survey/add',$data);
	}

	public function do_add_survey(){
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
				$data  = array(
					'id_survey'			=> '',
					'id_surat_order'	=> $id_surat_order,
					'kode_detail'   	=> $kode_detail,
					'no_surat_order'	=> $no_surat_order,
					'tgl_so'			=> $tgl_so,
					'tgl_survey'		=> $tgl_s,
					'tgl_kirim'			=> $tgl_k,
					'nama_koordinator'  => $nama_koordinator,
					'nama_konsumen'  	=> $nama_konsumen,
					'id_kab'			=> $kab,
					'id_kec'			=> $kec,
					'id_kel'			=> $kel,
					'alamat_penagihan'	=> $alamat,
					'tgl_tempo'			=> $tgl_tempo,
					'bulan_awal'		=> $bulan_awal,
					'bulan_akhir'		=> $bulan_akhir,
					'no_telp'			=> $no_telp,
					'tgl_verifikasi'	=> '',
					'kode_tolak'		=> '',
					'status'			=> 'Proses',
					'keterangan'		=> '',
					'kode_delivery'		=> '',
					'status_delivery'	=> 'Proses',
					'keterangan_delivery'=> '',
					'id_surveyor'		=> $surveyor,
					'status_petugas'	=> '0'
				);

				$this->db->insert($this->table2,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Survey baru berhasil di simpan!'));
					redirect(base_url('survey'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di simpan!'));
					redirect(base_url('so'));
				}
			}
	}

	function edit_survey($kode_detail){
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['data']=$this->m_daerah->get_kabupaten();
		$data['breadcrumb']= "Ubah Survey";
	
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		
		$data['r'] =  array(
	            'id_survey'			=> $rows[0]['id_survey'],
	            'id_surat_order'	=> $rows[0]['id_surat_order'],
	            'no_surat_order'    => $rows[0]['no_surat_order'],
            	'kode_detail'    	=> $rows[0]['kode_detail'],
				'no_surat_order'	=> $rows[0]['no_surat_order'],
				'tgl_so'			=> $rows[0]['tgl_so'],
				'tgl_survey'		=> $rows[0]['tgl_survey'],
				'tgl_kirim'			=> $rows[0]['tgl_kirim'],
				'nama_koordinator'  => $rows[0]['nama_koordinator'],
				'nama_konsumen'  	=> $rows[0]['nama_konsumen'],
				'id_kab'			=> $rows[0]['id_kab'],
				'id_kec'			=> $rows[0]['id_kec'],
				'id_kel'			=> $rows[0]['id_kel'],
				'alamat_penagihan'	=> $rows[0]['alamat_penagihan'],
				'tgl_tempo'			=> $rows[0]['tgl_tempo'],
				'bulan_awal'		=> $rows[0]['bulan_awal'],
				'bulan_akhir'		=> $rows[0]['bulan_akhir'],
				'no_telp'			=> $rows[0]['no_telp'],
				'tgl_verifikasi'	=> $rows[0]['tgl_verifikasi'],
				'kode_tolak'		=> $rows[0]['kode_tolak'],
				'status'			=> $rows[0]['status'],
				'keterangan'		=> $rows[0]['keterangan']
			);

		$data['title']="Ubah Survey";
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','penjualan/survey/edit',$data);
	}

	public function do_edit_survey(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['submit']))
        {
				$data  = array(
					'id_survey'			=> $id_survey,
					'id_surat_order'	=> $id_surat_order,
					'kode_detail'   	=> $kode_detail,
					'no_surat_order'	=> $no_surat_order,
					'tgl_so'			=> $tgl_so,
					'tgl_survey'		=> $tgl_survey,
					'tgl_kirim'			=> $tgl_kirim,
					'nama_koordinator'  => $nama_koordinator,
					'nama_konsumen'  	=> $nama_konsumen,
					'id_kab'			=> $kab,
					'id_kec'			=> $kec,
					'id_kel'			=> $kel,
					'alamat_penagihan'	=> $alamat,
					'tgl_tempo'			=> $tgl_tempo,
					'bulan_awal'		=> $bulan_awal,
					'bulan_akhir'		=> $bulan_akhir,
					'no_telp'			=> $no_telp,
					'tgl_verifikasi'	=> '',
					'kode_tolak'		=> '',
					'status'			=> 'Proses',
					'keterangan'		=> ''
				);

			$this->crud->update($this->table2,$data, $this->pk2,$id_survey);
			
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Survey berhasil di ubah!'));
				redirect(base_url('penjualan/survey/index'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di ubah!'));
				redirect(base_url('penjualan/survey/edit/'.$kode_detail));
			} 
		}
	}

	public function view_survey($kode_detail){
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['breadcrumb']= "Detail Survey";
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		
		
		$data['r'] =  array(
            	'id_survey'			=> $rows[0]['id_survey'],
	            'no_surat_order'    => $rows[0]['no_surat_order'],
            	'kode_detail'    	=> $rows[0]['kode_detail'],
				'no_surat_order'	=> $rows[0]['no_surat_order'],
				'tgl_so'			=> $rows[0]['tgl_so'],
				'tgl_survey'		=> $rows[0]['tgl_survey'],
				'tgl_kirim'			=> $rows[0]['tgl_kirim'],
				'nama_koordinator'  => $rows[0]['nama_koordinator'],
				'nama_konsumen'  	=> $rows[0]['nama_konsumen'],
				'id_kab'			=> $rows[0]['id_kab'],
				'id_kec'			=> $rows[0]['id_kec'],
				'id_kel'			=> $rows[0]['id_kel'],
				'alamat_penagihan'	=> $rows[0]['alamat_penagihan'],
				'tgl_tempo'			=> $rows[0]['tgl_tempo'],
				'bulan_awal'		=> $rows[0]['bulan_awal'],
				'bulan_akhir'		=> $rows[0]['bulan_akhir'],
				'no_telp'			=> $rows[0]['no_telp'],
			);
		
		$data['title'] = "Detail Survey - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','penjualan/survey/view',$data);
	}

	public function del_survey($kode_detail){
		$this->crud->delete($this->table,  'kode_detail', $kode_detail );
		$this->crud->delete($this->tables,  'kode_detail', $kode_detail );
		$this->crud->delete($this->table2,  'kode_detail', $kode_detail );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Survey berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di hapus!'));
        }
        redirect(base_url('survey'));
     }

}