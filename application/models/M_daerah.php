<?php
class M_daerah extends CI_Model{

	function get_kabupaten(){
		$hasil=$this->db->query("SELECT * FROM kabupaten");
		return $hasil;
	}

	function get_kecamatan($id){
		$hasil=$this->db->query("SELECT * FROM kecamatan WHERE id_kab='$id'");
		return $hasil->result();
	}

	function get_kelurahan($id){
		$hasil=$this->db->query("SELECT * FROM kelurahan WHERE id_kec='$id'");
		return $hasil->result();
	}
}