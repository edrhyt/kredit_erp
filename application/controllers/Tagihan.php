<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	public function index()
	{
		$data['breadcrumb']="Data Tagihan";
		$data['title']="Data Tagihan";
		$data['drop']="Collection";
		$data['page']="tagihan";
		$this->template->load('layout_main','collection/tagihan/index',$data);
	}

	public function tagihan_pending()
	{
		$data['breadcrumb']="Data Tagihan Pending";
		$data['title']="Data Tagihan Pending";
		$data['drop']="Collection";
		$data['page']="tagihan_pending";
		$this->template->load('layout_main','content_tagihan_pending',$data);
	}

	public function tagihan_berjalan()
	{
		$data['breadcrumb']="Data Tagihan Berjalan";
		$data['title']="Data Tagihan Berjalan";
		$data['drop']="Collection";
		$data['page']="tagihan_berjalan";
		$this->template->load('layout_main','content_tagihan_berjalan',$data);
	}
}
