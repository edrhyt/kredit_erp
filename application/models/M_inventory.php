<?php
class M_inventory extends CI_Model{

	function get_barang(){
		$hasil=$this->db->get('tb_inventory_barang');
		return $hasil->result();
	}
	
}