<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SO extends CI_Controller {

	var $table   = "tb_surat_order";
    var $tables  = "tb_barang_so";
	var $pk 	 = "id_surat_order";


	public function index()
	{
		$data['breadcrumb']= "Data Surat Order";
		$data['title']="Data Surat Order";
		$data['drop']="Penjualan";
		$data['page']="Surat Order";
		$data['record_so']=$this->crud->getSO();
		$this->template->load('layout_main','penjualan/surat_order/index',$data);
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
		$data['breadcrumb']= "Tambah Surat Order";
		$data['title']="Tambah Surat Order";
		$this->template->load('layout_main','penjualan/surat_order/add',$data);
	}

	public function add_so(){
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
            	$data_karyawan = implode(',',$karyawan);
            	var_dump($data_karyawan);
				$data  = array(
					'no_surat_order'	=> $this->session->userdata('lokasi').'-'.$no_surat_order,
					'kode_detail'   	=> $this->generate_code->_Code($this->table,'kode_detail','BSO'),
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
					'id_karyawan_sp'	=> $karyawan_sp,
					'id_karyawan_db'	=> $karyawan_db,
					'id_karyawan_ss'	=> $karyawan_ss
				);

				$this->crud->_moveDetail();
				$this->db->empty_table('tb_temp1');
				$this->cart->destroy();
				$this->db->insert($this->table,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data SO baru berhasil di simpan!'));
					redirect(base_url('so'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data SO gagal di simpan!'));
					redirect(base_url('so'));
				}
			}
	}

	public function view_so($kode_detail){
		$id = encode_php_tags($kode_detail);
		$data['drop']="Penjualan";
		$data['page']="Surat Order";
		$data['breadcrumb']= "Detail Surat Order";
		$data['sp']=$this->crud->get_sp_id('tb_karyawan', ['id_karyawan_sp' => $id]);
		$data['db']=$this->crud->get_db_id('tb_karyawan', ['id_karyawan_db' => $id]);
		$data['ss']=$this->crud->get_ss_id('tb_karyawan', ['id_karyawan_ss' => $id]);
		$rows 	= $this->crud->getByID($this->table,'kode_detail',$kode_detail);
		$data['rd'] 	= $this->crud->getByID($this->tables,'kode_detail',$kode_detail);
		$data['r'] = $this->crud->getSOID('tb_surat_order', ['kode_detail' => $id]);
		$data['title'] = "Detail Surat Order - ".$rows[0]['id_surat_order'];	
		$this->template->load('layout_main','penjualan/surat_order/view',$data);
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
		$data['title'] = "Edit Surat Order - ".$rows[0]['id_surat_order'];	
			
		$data['rd'] 	= $this->m_surat_order->_getBSOUbah($this->tables,'kode_detail',$kode_detail);
		$this->template->load('layout_main','penjualan/surat_order/edit',$data);
	}

	public function del_so($kode_detail){
		$this->crud->delete($this->table,  'kode_detail', $kode_detail );
		$this->crud->delete($this->tables,  'kode_detail', $kode_detail );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Data SO berhasil di hapus!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Data SO gagal di hapus!'));
        }
        redirect(base_url('so'));
     }

    public function add_temp_dtl()
	{
	    foreach ($this->cart->contents() as $items){ 
	    $result[] = array(
	        'id'	 		=> $items['id'],
	        'kode_detail'   => $this->gencode->_Code($this->table,'kode_detail','BSO'),
			'id_barang' 	=> $items['id_barang'],
			'name' 			=> $items['name'],
			'merk'			=> $this->input->post('merk'), 
			'price'			=> $items['price'], 
			'qty' 			=> $items['qty'],
	    	);
	    }
		$this->db->insert_batch('tb_temp1', $result);
	}

	function empty_temp_dtl(){
		$this->db->empty_table('tb_temp1');
	}

     function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id'	 		=> $this->input->post('id_barang'), 
			'name' 			=> $this->input->post('nama_barang'),  
			'merk'			=> $this->input->post('merk'), 
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

}