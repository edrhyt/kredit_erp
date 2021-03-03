<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_pending extends CI_Controller {

	public function index()
	{
		$data['breadcrumb']="Data Tagihan Pending";
		$data['title']="Data Tagihan Pending";
		$data['drop']="Collection";
		$data['page']="tagihan_pending";
		$this->template->load('layout_main','collection/tagihan_pending/index',$data);
	}

}