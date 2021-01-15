<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

	public function index()
	{
		$data['breadcrumb']="Finance";
		$data['title']="Finance";
		$data['drop']="";
		$data['page']="finance";
		$this->template->load('layout_main','finance/index',$data);
	}
}
