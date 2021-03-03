<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {

	var $table = "tb_karyawan";
	var $pk = "id_karyawan";

	public function index()
	{
		$data['breadcrumb']="Laporan Penjualan";
		$data['title']="Laporan Penjualan";
		$data['drop']="laporan";
		$data['page']="lap_penjualan";
		$data['record_sp'] = $this->crud->get_karyawan_sales()->result_array();
		$data['record_db'] = $this->crud->get_karyawan_demo()->result_array();
		$data['record_ss'] = $this->crud->get_karyawan_ss()->result_array();
		$this->template->load('layout_main','laporan_penjualan/index',$data);
	}
}
