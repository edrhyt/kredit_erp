<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {

	public function CodeRandom() { 

	    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
	    srand((double)microtime()*1000000); 
	    $i = 0; 
	    $pass = '' ; 

	    while ($i <= 7) { 
	        $num = rand() % 33; 
	        $tmp = substr($chars, $num, 1); 
	        $pass = $pass . $tmp; 
	        $i++; 
	    } 

	    return $pass; 

	} 

	public function signin($table,$where)
	{		
		return $this->db->get_where($table,$where);
	}

	public function anti_injection($data,$koneksi)
	{
	    $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
	    return $filter;
	}

	function get_mysqli() { 
		$db = (array)get_instance()->db;
		return mysqli_connect('localhost', $db['username'], $db['password'], $db['database']);
	}

	function tanggal_indo($tanggal)
	{
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split = explode('-', $tanggal);
		return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	}


	function hari_ini(){
		$hari = date ("D");
	 
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
	 
		return $hari_ini ;
	 
	}

	function code($jum)
	{
		$alphabet = array (1 =>   'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','X','Y','Z');
		// $split = explode('-', $tanggal);
		// return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		return $alphabet[$jum];
	}

	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,0,".",".");
		return $hasil_rupiah;
	}

}

