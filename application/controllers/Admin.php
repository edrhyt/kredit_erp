<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['breadcrumb']="Dashboard";
		$data['title']="Dashboard";
		$data['drop']="";
		$data['page']="";
		$this->template->load('layout_main','content_default',$data);
	}
}
