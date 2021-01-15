<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	var $table   = "tb_surat_order";
	var $table2   = "tb_survey";
    var $tables  = "tb_barang_so";
	var $pk 	 = "id_surat_order";
	var $pk2 	 = "id_survey";
	//var $penjualan = 
	// var $penjualan = 'tb_inventory_barang';

	function __construct(){
		parent::__construct();
		$this->load->model('M_inventory');
	}

	public function index()
	{
		$data['breadcrumb']= "Penjualan";
		$data['title']="Penjualan";
		$this->template->load('layout_main','content_penjualan',$data);
	}

	public function surat_order()
	{
		$data['breadcrumb']= "Surat Order";
		$data['title']="Surat Order";
		$data['drop']="Penjualan";
		$data['page']="Surat Order";
		$data['record_so']=$this->crud->getSO();
		$this->template->load('layout_main','content_so',$data);
	}

	public function survey()
	{
		$data['breadcrumb']= "Survey";
		$data['title']="Survey";
		$data['drop']="Penjualan";
		$data['page']="Survey";
		// $sql  = "SELECT * from tb_survey ORDER BY `id_survey` ASC ";
		// $data['record_survey'] = $this->db->query($sql)->result();
		$data['record_survey']=$this->crud->getSurvey();
		$this->template->load('layout_main','content_survey',$data);
	}

	public function verifikasi()
	{
		$data['breadcrumb']= "Delivery";
		$data['title']="Delivery";
		$data['drop']="Penjualan";
		$data['page']="Verifikasi";
		$data['record_survey']=$this->crud->getSurvey();
		$this->template->load('layout_main','content_verifikasi',$data);
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

	//SURAT ORDER PART

	function add_new(){
		$data['drop']="Penjualan";
		$data['page']="Surat Order";
		$data['data']=$this->m_daerah->get_kabupaten();
		$data['sales']=$this->crud->get_karyawan_sales();
		$data['demo']=$this->crud->get_karyawan_demo();
		$data['ss']=$this->crud->get_karyawan_ss();
		$data['inv']=$this->m_inventory->get_barang();
		// $so['data']=$this->crud->getSO();
		// var_dump($so);
		$data['breadcrumb']= "Tambah Surat Order";
		$data['title']="Tambah Surat Order";
		$this->template->load('layout_main','content_so_add',$data);
	}

	public function add_so(){
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
            	$data_karyawan = implode(',',$karyawan);
				$data  = array(
					'no_surat_order'	=> $this->session->userdata('lokasi').'-'.$no_surat_order,
					'kode_detail'   	=> $this->gencode->_Code($this->table,'kode_detail','BSO'),
					'tgl_so'			=> $tgl_so,
					'tgl_s'				=> $tgl_survey,
					'tgl_k'				=> $tgl_kirim,
					'nama_koordinator'  => $nama_koordinator,
					'id_kab'			=> $kab,
					'id_kec'			=> $kec,
					'id_kel'			=> $kel,
					'alamat'			=> $alamat,
					'jml_angsuran'		=> $jml_angsuran,
					'hadiah'			=> $hadiah,
					'diskon_koordinator'=> $diskon_koordinator,
					'diskon_dp' 		=> $diskon_dp,
					'total'     		=> $total,
					'netto'				=> $netto,
					'angsuran1'			=> $angsuran1,
					'angsuran_bln'		=> $angsuran_bln,
					'id_surat_order'	=> '',
					'id_karyawan'		=> $data_karyawan
				);

				$this->crud->_moveDetail();
				$this->db->empty_table('tb_temp1');
				$this->cart->destroy();
				$this->db->insert($this->table,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data SO baru berhasil di simpan!'));
					redirect(base_url('penjualan/surat_order'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data SO gagal di simpan!'));
					redirect(base_url('penjualan/surat_order'));
				}
			}
	}

	public function add_temp_dtl()
	{
	    foreach ($this->cart->contents() as $items){ 
	    $result[] = array(
	        'id'	 		=> $items['id'],
	        'kode_detail'   => $this->gencode->_Code($this->table,'kode_detail','BSO'),
			'name' 			=> $items['name'],
			// 'merk'			=> $this->input->post('merk');
			'price'			=> $items['price'], 
			'qty' 			=> $items['qty'],
	    	);
	    }
		$this->db->insert_batch('tb_temp1', $result);
	}

	function empty_temp_dtl(){
		$this->db->empty_table('tb_temp1');
	}

	public function view_so($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Surat Order";
		$data['breadcrumb']= "Detail Surat Order";
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSOID('tb_surat_order', ['kode_detail' => $id]);
		
		
		// $data['r'] =  array(
  //           'id_surat_order'    => $rows[0]['id_surat_order'],
  //           'no_surat_order'    => $rows[0]['no_surat_order'],
  //           'kode_detail'    	=> $rows[0]['kode_detail'],
  //           'nama_koordinator' 	=> $rows[0]['nama_koordinator'],
  //           'alamat'  			=> $rows[0]['alamat'],
  //           'tgl_so' 			=> $rows[0]['tgl_so'],
		// 	'tgl_survey'   		=> $rows[0]['tgl_survey'],
		// 	'tgl_kirim'    		=> $rows[0]['tgl_kirim'],
		// 	'id_kab'			=> $rows[0]['id_kab'],
		// 	'id_kec'			=> $rows[0]['id_kec'],
		// 	'id_kel'			=> $rows[0]['id_kel'],
		// 	'jml_angsuran'		=> $rows[0]['jml_angsuran'],
		// 	'hadiah'			=> $rows[0]['hadiah'],
		// 	'diskon_koordinator'=> $rows[0]['diskon_koordinator'],
		// 	'diskon_dp'			=> $rows[0]['diskon_dp'],
		// 	'total'				=> $rows[0]['total'],
		// 	'netto'				=> $rows[0]['netto'],
		// 	'angsuran1'			=> $rows[0]['angsuran1'],
		// 	'angsuran_bln'		=> $rows[0]['angsuran_bln'],
		// 	);
		
		$data['title'] = "Detail Surat Order - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','content_so_view',$data);
	}

	public function edit_so($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Surat Order";
		$data['breadcrumb']= "Edit Surat Order";
		$data['data']= $this->m_daerah->get_kabupaten();
		$data['inv']=$this->m_inventory->get_barang();
		$data['kab'] = $this->admin_model->get('kabupaten');
        $data['kec'] = $this->admin_model->get('kecamatan');
        $data['kel'] = $this->admin_model->get('kelurahan');
        $data['r'] = $this->crud->getSOID('tb_surat_order', ['kode_detail' => $id]);
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		// $data['r'] =  array(
  //           'id_surat_order'    => $rows[0]['id_surat_order'],
  //           'no_surat_order'    => $rows[0]['no_surat_order'],
  //           'kode_detail'    	=> $rows[0]['kode_detail'],
  //           'nama_koordinator' 	=> $rows[0]['nama_koordinator'],
  //           'alamat'  			=> $rows[0]['alamat'],
  //           'tgl_so' 			=> $rows[0]['tgl_so'],
		// 	'tgl_survey'   		=> $rows[0]['tgl_survey'],
		// 	'tgl_kirim'    		=> $rows[0]['tgl_kirim'],
		// 	'id_kab'			=> $rows[0]['id_kab'],
		// 	'id_kec'			=> $rows[0]['id_kec'],
		// 	'id_kel'			=> $rows[0]['id_kel'],
		// 	'jml_angsuran'		=> $rows[0]['jml_angsuran'],
		// 	'hadiah'			=> $rows[0]['hadiah'],
		// 	'diskon_koordinator'=> $rows[0]['diskon_koordinator'],
		// 	'diskon_dp'			=> $rows[0]['diskon_dp'],
		// 	'total'				=> $rows[0]['total'],
		// 	'netto'				=> $rows[0]['netto'],
		// 	'angsuran1'			=> $rows[0]['angsuran1'],
		// 	'angsuran_bln'		=> $rows[0]['angsuran_bln'],
		// 	'id_karyawan'		=> $rows[0]['id_karyawan'],
		// 	);

		$data['title'] = "Edit Surat Order - ".$rows[0]['id_surat_order'];	
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','content_so_edit',$data);
	}

	public function del_so($kode_detail){
		$this->crud->delete($this->table,  'kode_detail', $kode_detail );
		$this->crud->delete($this->tables,  'kode_detail', $kode_detail );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data SO berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data SO gagal di hapus!'));
        }
        redirect(base_url('penjualan/surat_order'));
     }

     function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id'	 		=> $this->input->post('id_barang'), 
			'name' 			=> $this->input->post('nama_barang'),  
			'price'			=> $this->input->post('harga'), 
			'qty' 			=> $this->input->post('quantity'),
		);
		$this->cart->insert($data);
		// $this->db->insert('tb_temp1', $data);
		echo $this->show_cart(); //tampilkan cart setelah added
	}

	function show_cart(){ //Fungsi untuk menampilkan Cart
		$output = '';
	    $no = 0;
	    foreach ($this->cart->contents() as $items) 
	    {
	        $no++;
	        $output .='
	            <tr>
	                <td>'.$items['name'].'</td>
	                <td>'.number_format($items['price']).'</td>
	                <td>'.$items['qty'].'</td>
	                <td>'.number_format($items['subtotal']).'</td>
	                <td><button type="button" id="'.$items['rowid'].'" class="remove_cart btn btn-danger btn-sm">Hapus</button></td>
	            </tr>
	        ';
	    }
	    $output .= '
	        <tr>
	            <th colspan="3">Total</th>
	            <th colspan="2" id="total_harga">'.$this->cart->total().'</th>
	        </tr>
	    ';
		    return $output;
	}

	function load_cart(){ //load data cart
		echo $this->show_cart();
	}

	function hapus_cart(){ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
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
        $data['r'] = $this->crud->getSOID('tb_surat_order', ['kode_detail' => $id]);
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		
		// $data['r'] =  array(
  //           'id_surat_order'    => $rows[0]['id_surat_order'],
  //           'no_surat_order'    => $rows[0]['no_surat_order'],
  //           'kode_detail'    	=> $rows[0]['kode_detail'],
  //           'nama_koordinator' 	=> $rows[0]['nama_koordinator'],
  //           'alamat'  			=> $rows[0]['alamat'],
  //           'tgl_so' 			=> $rows[0]['tgl_so'],
		// 	'tgl_survey'   		=> $rows[0]['tgl_survey'],
		// 	'tgl_kirim'    		=> $rows[0]['tgl_kirim'],
		// 	'id_kab'			=> $rows[0]['id_kab'],
		// 	'id_kec'			=> $rows[0]['id_kec'],
		// 	'id_kel'			=> $rows[0]['id_kel'],
		// 	);

		$data['title']="Tambah Survey";
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','content_survey_add',$data);
	}

	public function do_add_survey(){
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
            	$data_konsumen = implode(',',$nama_konsumen);
				$data  = array(
					'id_survey'			=> '',
					'id_surat_order'	=> $id_surat_order,
					'kode_detail'   	=> $kode_detail,
					'no_surat_order'	=> $no_surat_order,
					'tgl_so'			=> $tgl_so,
					'tgl_survey'		=> $tgl_s,
					'tgl_kirim'			=> $tgl_k,
					'nama_koordinator'  => $nama_koordinator,
					'nama_konsumen'  	=> $data_konsumen,
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
					'keterangan_delivery'=> ''
				);

				$this->db->insert($this->table2,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Survey baru berhasil di simpan!'));
					redirect(base_url('penjualan/survey'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di simpan!'));
					redirect(base_url('penjualan/survey'));
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
		$this->template->load('layout_main','content_survey_edit',$data);
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
				redirect(base_url('penjualan/survey'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di ubah!'));
				redirect(base_url('penjualan/edit_survey/'.$kode_detail));
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
		$this->template->load('layout_main','content_survey_view',$data);
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
        redirect(base_url('penjualan/survey'));
     }

    // VERIFIKASI PART

	public function view_verifikasi($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['breadcrumb']= "Detail Verifikasi";
		$data['record_verifikasi']=$this->crud->getSurvey();
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSurveyID('tb_survey', ['kode_detail' => $id]);
		
		// $data['r'] =  array(
  //           	'id_survey'			=> $rows[0]['id_survey'],
  //           	'id_surat_order'	=> $rows[0]['id_surat_order'],
	 //            'no_surat_order'    => $rows[0]['no_surat_order'],
  //           	'kode_detail'    	=> $rows[0]['kode_detail'],
		// 		'no_surat_order'	=> $rows[0]['no_surat_order'],
		// 		'tgl_so'			=> $rows[0]['tgl_so'],
		// 		'tgl_survey'		=> $rows[0]['tgl_survey'],
		// 		'tgl_kirim'			=> $rows[0]['tgl_kirim'],
		// 		'nama_koordinator'  => $rows[0]['nama_koordinator'],
		// 		'nama_konsumen'  	=> $rows[0]['nama_konsumen'],
		// 		'id_kab'			=> $rows[0]['id_kab'],
		// 		'id_kec'			=> $rows[0]['id_kec'],
		// 		'id_kel'			=> $rows[0]['id_kel'],
		// 		'alamat_penagihan'	=> $rows[0]['alamat_penagihan'],
		// 		'tgl_tempo'			=> $rows[0]['tgl_tempo'],
		// 		'bulan_awal'		=> $rows[0]['bulan_awal'],
		// 		'bulan_akhir'		=> $rows[0]['bulan_akhir'],
		// 		'no_telp'			=> $rows[0]['no_telp'],
		// 		'tgl_verifikasi'	=> $rows[0]['tgl_verifikasi'],
		// 		'kode_tolak'		=> $rows[0]['kode_tolak'],
		// 		'status'			=> $rows[0]['status'],
		// 		'keterangan'		=> $rows[0]['keterangan']
		// 	);
		
		$data['title'] = "Detail Verifikasi - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','content_verifikasi_view',$data);
	}

	public function do_verifikasi(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['terima']))
        {
			$hasil = 'Diterima';
		}else if(isset($_POST['tolak'])){
			$hasil = 'Ditolak';
		}else{
			$hasil = 'Batal';
		}
		
		$data  = array(
				'tgl_verifikasi'	=> date('Y-m-d'),
				'kode_tolak'		=> $kode_tolak,
				'status'			=> $hasil,
				'keterangan'		=> $keterangan
			);
		
			$this->crud->update($this->table2,$data, $this->pk2,$id_survey);
			if ($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Survey berhasil di verifikasi!'));
				redirect(base_url('penjualan/survey'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di verifikasi!'));
				redirect(base_url('penjualan/view_verifikasi/'.$kode_detail));
			}			
		
	}

	public function view_verifikasi_hasil($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Survey";
		$data['breadcrumb']= "Detail Verifikasi";
		$data['record_verifikasi']=$this->crud->getSurvey();
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSurveyID('tb_survey', ['kode_detail' => $id]);
		
		// $data['r'] =  array(
  //           	'id_survey'			=> $rows[0]['id_survey'],
  //           	'id_surat_order'	=> $rows[0]['id_surat_order'],
	 //            'no_surat_order'    => $rows[0]['no_surat_order'],
  //           	'kode_detail'    	=> $rows[0]['kode_detail'],
		// 		'no_surat_order'	=> $rows[0]['no_surat_order'],
		// 		'tgl_so'			=> $rows[0]['tgl_so'],
		// 		'tgl_survey'		=> $rows[0]['tgl_survey'],
		// 		'tgl_kirim'			=> $rows[0]['tgl_kirim'],
		// 		'nama_koordinator'  => $rows[0]['nama_koordinator'],
		// 		'nama_konsumen'  	=> $rows[0]['nama_konsumen'],
		// 		'id_kab'			=> $rows[0]['id_kab'],
		// 		'id_kec'			=> $rows[0]['id_kec'],
		// 		'id_kel'			=> $rows[0]['id_kel'],
		// 		'alamat_penagihan'	=> $rows[0]['alamat_penagihan'],
		// 		'tgl_tempo'			=> $rows[0]['tgl_tempo'],
		// 		'bulan_awal'		=> $rows[0]['bulan_awal'],
		// 		'bulan_akhir'		=> $rows[0]['bulan_akhir'],
		// 		'no_telp'			=> $rows[0]['no_telp'],
		// 		'tgl_verifikasi'	=> $rows[0]['tgl_verifikasi'],
		// 		'kode_tolak'		=> $rows[0]['kode_tolak'],
		// 		'status'			=> $rows[0]['status'],
		// 		'keterangan'		=> $rows[0]['keterangan']
		// 	);
		
		$data['title'] = "Detail Verifikasi - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','content_verifikasi_view',$data);
	}

	public function view_delivery($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Verifikasi";
		$data['breadcrumb']= "Detail Delivery";
		$data['record_verifikasi']=$this->crud->getSurvey();
		$rows 	= $this->crud->getByID($this->table2,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSurveyID('tb_survey', ['kode_detail' => $id]);
		
		// $data['r'] =  array(
  //           	'id_survey'			=> $rows[0]['id_survey'],
  //           	'id_surat_order'	=> $rows[0]['id_surat_order'],
	 //            'no_surat_order'    => $rows[0]['no_surat_order'],
  //           	'kode_detail'    	=> $rows[0]['kode_detail'],
		// 		'no_surat_order'	=> $rows[0]['no_surat_order'],
		// 		'tgl_so'			=> $rows[0]['tgl_so'],
		// 		'tgl_survey'		=> $rows[0]['tgl_survey'],
		// 		'tgl_kirim'			=> $rows[0]['tgl_kirim'],
		// 		'nama_koordinator'  => $rows[0]['nama_koordinator'],
		// 		'nama_konsumen'  	=> $rows[0]['nama_konsumen'],
		// 		'id_kab'			=> $rows[0]['id_kab'],
		// 		'id_kec'			=> $rows[0]['id_kec'],
		// 		'id_kel'			=> $rows[0]['id_kel'],
		// 		'alamat_penagihan'	=> $rows[0]['alamat_penagihan'],
		// 		'tgl_tempo'			=> $rows[0]['tgl_tempo'],
		// 		'bulan_awal'		=> $rows[0]['bulan_awal'],
		// 		'bulan_akhir'		=> $rows[0]['bulan_akhir'],
		// 		'no_telp'			=> $rows[0]['no_telp'],
		// 		'tgl_verifikasi'	=> $rows[0]['tgl_verifikasi'],
		// 		'kode_tolak'		=> $rows[0]['kode_tolak'],
		// 		'status'			=> $rows[0]['status'],
		// 		'keterangan'		=> $rows[0]['keterangan']
		// 	);
		
		$data['title'] = "Detail Verifikasi - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','content_delivery_view',$data);
	}

	public function do_delivery(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['yes']))
        {
			$hasil_deliv = 'Yes';
		}else if(isset($_POST['Batal'])){
			$hasil_deliv = 'Batal';
		}else{
			$hasil_deliv = 'Pending';
		}
		
		$data  = array(
				'tgl_verifikasi'	=> date('Y-m-d'),
				'kode_delivery'		=> $kode_delivery,
				'status_delivery'			=> $hasil_deliv,
				'keterangan_delivery'		=> $keterangan_delivery
			);
		
			$this->crud->update($this->table2,$data, $this->pk2,$id_survey);
			if ($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data Survey berhasil di verifikasi!'));
				redirect(base_url('penjualan/verifikasi'));
			}
			else
			{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data Survey gagal di verifikasi!'));
				redirect(base_url('penjualan/view_delivery/'.$kode_detail));
			}			
		
	}

}