<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_berjalan extends CI_Controller {

	public function index()
	{
		$data['breadcrumb']="Data Tagihan Berjalan";
		$data['title']="Data Tagihan Berjalan";
		$data['drop']="Collection";
		$data['page']="tagihan_berjalan";
		$this->template->load('layout_main','collection/tagihan_berjalan/index',$data);
	}
}
