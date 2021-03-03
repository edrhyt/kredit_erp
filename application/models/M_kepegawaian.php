<?php
class M_kepegawaian extends CI_Model{

	function get_divisi(){
		$hasil=$this->db->query("SELECT * FROM divisi");
		return $hasil;
	}

	function get_jabatan($id){
		$hasil=$this->db->query("SELECT * FROM jabatan WHERE id_divisi='$id'");
		return $hasil->result();
	}

}