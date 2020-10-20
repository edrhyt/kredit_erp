<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	var $table   = "tb_surat_order";
    var $tables  = "tb_barang_so";
	var $pk 	 = "id_surat_order";

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
		$sql  = "SELECT * from tb_surat_order ORDER BY `id_surat_order` ASC ";
		$data['record_so'] = $this->db->query($sql)->result();
		$this->template->load('layout_main','content_so',$data);
	}

	public function survey()
	{
		$data['breadcrumb']= "Survey";
		$data['title']="Survey";
		$this->template->load('layout_main','content_survey',$data);
	}

	public function verifikasi()
	{
		$data['breadcrumb']= "Verifikasi";
		$data['title']="Verifikasi";
		$this->template->load('layout_main','content_verifikasi',$data);
	}

	//SURAT ORDER PART

	function add_new()
	{
		$data['data']=$this->m_daerah->get_kabupaten();
		$data['inv']=$this->m_inventory->get_barang();
		// $sql  = "SELECT * from tb_inventory_barang ORDER BY `id_barang` ASC ";
		// $inv['inv'] = $this->db->query($sql)->result();
		$data['breadcrumb']= "Tambah Surat Order";
		$data['title']="Tambah Surat Order";
		$this->template->load('layout_main','content_so_add',$data);
	}

	function get_kecamatan(){
		$id=$this->input->post('id');
		$data=$this->m_daerah->get_kecamatan($id);
		echo json_encode($data);
	}

	function get_kelurahan(){
		$id=$this->input->post('id');
		$data=$this->m_daerah->get_kelurahan($id);
		echo json_encode($data);
	}

	public function add_so()
	{
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
				$data  = array(
					'id_surat_order'	=> $this->crud->_Code($this->table,$this->pk,'SO'),
					'id_kab'			=> $id_kab,
					'id_kec'			=> $id_kec,
					'id_kel'			=> $id_kel,
					'no_surat_order'	=> $no_surat_order,
					'kode_detail'   	=> $this->crud->_Code($this->table,'kode_detail','BSO'),
					'tgl_so'			=> $tgl_so,
					'tgl_survey'		=> $tgl_survey,
					'tgl_kirim'			=> $tgl_kirim,
					'nama_koordinator'  => $nama_koordinator,
					'alamat'			=> $alamat,
					'diskon_koordinator'=> $diskon_koordinator,
					'diskon_dp' 		=> $diskon_dp,
					'total'     		=> $total,
				);

				$this->crud->_moveDetail();
				$this->db->empty_table('tb_temp1');
				// echo "<pre>";
				// echo print_r($data);
				// echo"</pre>";
				$this->db->insert($this->table,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data FPPL baru berhasil di simpan!'));
					redirect(base_url('penjualan/surat_order'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data FPPL gagal di simpan!'));
					redirect(base_url('penjualan/surat_order'));
				}
			}
	}

	public function add_temp_dtl()
	{
		$nama_brg = $this->input->post('nama_brg');
		$result = array();
		$i = 1;
		foreach($nama_brg AS $key => $val){
			if($_POST['nama_brg'][$key] != ""){
				$result[] = array(  
					'id_brg_so'		=>$this->crud->_Code($this->table,'kode_detail','BSO'),
					'kode_detail'   =>$this->crud->_Code($this->table,'kode_detail','BSO'),
					'nama_brg'	 	=>$_POST['nama_brg'][$key],
					'merk_brg'	 	=>$_POST['merk_brg'][$key],             
					'type_brg'		=>$_POST['type_brg'][$key],  
					'jml_brg'		=>$_POST['jml_brg'][$key],
					'harga_brg'		=>$_POST['harga_brg'][$key],
					'jum'			=>$_POST['jum'][$key]
				);
			}
		$i++;
		}  
		$this->db->insert_batch('tb_temp1', $result);
	}

	public function view_so($kode_detail){
		$data['breadcrumb']= "Detail Surat Order";
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		
		
		$data['r'] =  array(
            'id_surat_order'    => $rows[0]['id_surat_order'],
            'no_surat_order'    => $rows[0]['no_surat_order'],
            'kode_detail'    	=> $rows[0]['kode_detail'],
            'nama_koordinator' 	=> $rows[0]['nama_koordinator'],
            'alamat'  			=> $rows[0]['alamat'],
            'tgl_so' 			=> $rows[0]['tgl_so'],
			'tgl_survey'   		=> $rows[0]['tgl_survey'],
			'tgl_kirim'    		=> $rows[0]['tgl_kirim'],
			);
		
		$data['title'] = "Detail Surat Order - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','content_so_view',$data);
	}

	public function edit_so($kode_detail){
		$data['breadcrumb']= "Edit Surat Order";
	
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		
		$data['r'] =  array(
            'id_surat_order'    => $rows[0]['id_surat_order'],
            'no_surat_order'    => $rows[0]['no_surat_order'],
            'kode_detail'    	=> $rows[0]['kode_detail'],
            'nama_koordinator' 	=> $rows[0]['nama_koordinator'],
            'alamat'  			=> $rows[0]['alamat'],
            'tgl_so' 			=> $rows[0]['tgl_so'],
			'tgl_survey'   		=> $rows[0]['tgl_survey'],
			'tgl_kirim'    		=> $rows[0]['tgl_kirim'],
			'diskon_koordinator'=> $rows[0]['diskon_koordinator'],
			'diskon_dp'    		=> $rows[0]['diskon_dp'],
			'total'    			=> $rows[0]['total'],
			);

		$data['title'] = "Edit Surat Order - ".$rows[0]['id_surat_order'];	
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','content_so_edit',$data);
	}

	public function del_so($kode_detail){
		$this->crud->delete($this->table,  'kode_detail', $kode_detail );
		$this->crud->delete($this->tables,  'kode_detail', $kode_detail );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('FPPL berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('FPPL gagal di hapus!'));
        }
        redirect(base_url('penjualan/surat_order'));
     }

     function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id_barang'	 	=> $this->input->post('id_barang'), 
			'nama_barang' 	=> $this->input->post('nama_barang'),  
			'harga'			=> $this->input->post('harga'), 
			'qty' 			=> $this->input->post('quantity'),
		);
		$this->penjualan->insert($data);
		echo $this->show_cart(); //tampilkan cart setelah added
	}

	function show_cart(){ //Fungsi untuk menampilkan Cart
		$output = '';
		$no = 0;
		foreach ($this->penjualan->contents() as $items) {
			$no++;
			$output .='
				<tr>
					<td>'.$items['nama_barang'].'</td>
					<td>'.number_format($items['harga']).'</td>
					<td>'.$items['qty'].'</td>
					<td>'.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2">'.'Rp '.number_format($this->penjualan->total()).'</th>
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
		$this->penjualan->update($data);
		echo $this->show_cart();
	}

	// SURVEY PART

	function add_survey($kode_detail)
	{
		$data['breadcrumb']= "Tambah Survey";
		$data['title']="Tambah Survey".$rows[0]['id_surat_order'];	;
		// $data['breadcrumb']= "Edit Surat Order";
	
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		
		$data['r'] =  array(
            'id_surat_order'    => $rows[0]['id_surat_order'],
            'no_surat_order'    => $rows[0]['no_surat_order'],
            'kode_detail'    	=> $rows[0]['kode_detail'],
            'nama_koordinator' 	=> $rows[0]['nama_koordinator'],
            'alamat'  			=> $rows[0]['alamat'],
            'tgl_so' 			=> $rows[0]['tgl_so'],
			'tgl_survey'   		=> $rows[0]['tgl_survey'],
			'tgl_kirim'    		=> $rows[0]['tgl_kirim'],
			'diskon_koordinator'=> $rows[0]['diskon_koordinator'],
			'diskon_dp'    		=> $rows[0]['diskon_dp'],
			'total'    			=> $rows[0]['total'],
			);

		// $data['title'] = "Edit Surat Order - ".$rows[0]['id_surat_order'];	
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		// $this->template->load('layout_main','content_so_edit',$data);
		$this->template->load('layout_main','content_survey_add',$data);
	}

	public function add_survey1($kode_detail){
		$data['breadcrumb']= "Form Survey";
	
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		
		$data['r'] =  array(
            'id_surat_order'    => $rows[0]['id_surat_order'],
            'no_surat_order'    => $rows[0]['no_surat_order'],
            'kode_detail'    	=> $rows[0]['kode_detail'],
            'nama_koordinator' 	=> $rows[0]['nama_koordinator'],
            'alamat'  			=> $rows[0]['alamat'],
            'tgl_so' 			=> $rows[0]['tgl_so'],
			'tgl_survey'   		=> $rows[0]['tgl_survey'],
			'tgl_kirim'    		=> $rows[0]['tgl_kirim'],
			'diskon_koordinator'=> $rows[0]['diskon_koordinator'],
			'diskon_dp'    		=> $rows[0]['diskon_dp'],
			'total'    			=> $rows[0]['total'],
			);

		$data['title'] = "Buat Form Survey - ".$rows[0]['no_surat_order'];	
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','content_survey_add1',$data);
	}
}
