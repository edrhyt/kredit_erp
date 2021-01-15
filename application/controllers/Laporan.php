<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	// var $table = "tb_karyawan";
	// var $pk = "id_karyawan";

	public function index()
	{
		$data['breadcrumb']="Laporan";
		$data['title']="Laporan";
		$data['drop']="";
		$data['page']="laporan";
		$this->template->load('layout_main','laporan/index',$data);
	}
}
