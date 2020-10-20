<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_surat_order extends CI_Model {
    // public function _getSMPLUbah($tables,$where)
    // {
    //     $this->db->where($where);
    //     return $this->db->get($tables)->result_array();
    // }

    public  function _getBSOUbah($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables)->result_array();
    }

    // public  function _UpdateSampel($id){
    //     public function _moveDetail() {
    //         return $this->db->query("INSERT INTO tb_sampel (kode_sampel,kode_detail,jenis, kondisi_sampel, jumlah, satuan, keterangan)
    //         SELECT kode_sampel,kode_detail,jenis,kondisi, jum, satuan, ket
    //         FROM   tb_temp1");
    //     }
    // }
}