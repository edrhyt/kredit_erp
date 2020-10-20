<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['breadcrumb']="Kelola User";
		$data['title']="Kelola User";
		$this->template->load('layout_main','content_user',$data);
	}
}
