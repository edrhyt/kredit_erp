<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {

	public function index()
	{
		$data['breadcrumb']="Collection";
		$data['title']="Collection";
		$this->template->load('layout_main','content_collection',$data);
	}

	public function pelanggan()
	{
		$data['breadcrumb']="Pelanggan";
		$data['title']="Pelanggan";
		$this->template->load('layout_main','content_pelanggan',$data);
	}

	public function return_barang()
	{
		$data['breadcrumb']="Return Barang";
		$data['title']="Return Barang";
		$this->template->load('layout_main','content_return_barang',$data);
	}
}
