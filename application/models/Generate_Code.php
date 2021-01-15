<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_Code extends CI_Model {

    public function _Code($tables,$kolom,$str){
       
        // $this->db->select("RIGHT(".$kolom.",3)) AS kode FROM ".$tables." WHERE ".$kolom." LIKE '".$str.$tgl."%'");
        // $this->db->order_by($kolom, 'desc');    
        // $this->db->limit(1);    
        // $query = $this->db->get($tables);  //cek dulu apakah ada sudah ada kode di tabel.    
        // if($query->num_rows() <> 0){      
        //      //cek kode jika telah tersedia    
        //      $data = $query->row();      
        //      $kode = intval($data->kode) + 1; 
        // }
        // else{      
        //      $kode = 1;  //cek jika kode belum terdapat pada table
        // }
        //     $tgl=date('dmY'); 
        //     $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        //     $kodetampil = $str.$tgl.$batas;  //format kode
        //     return $kodetampil;  
        $kode= $str.date('dmy'); 

        $q = $this->db->query("SELECT MAX(RIGHT(".$kolom.",3)) AS kd_max FROM ".$tables." WHERE ".$kolom." LIKE '".$kode."%'");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $str.date('dmy').$kd;
    }
    
   }