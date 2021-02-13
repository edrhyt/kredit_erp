<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Absensi_model extends CI_Model 
{
    
    public function getAbsensi()
    {
        return $this->db->get('absensi')->result_array();
    }

    public function getTodayAbsensi($id)
    {
        $this->db->select('absensi.*');
        $this->db->from('absensi');
        $this->db->join('tb_karyawan', 'absensi.id_karyawan = tb_karyawan.id_karyawan', 'INNER');
        $this->db->where('absensi.id_karyawan', $id);
        $this->db->like( 'absensi.masuk',  date('Y-m-d') );

        return $this->db->get();
    }
    
    public function addAbsensi($data)
    {
        $result = $this->db->insert('absensi', $data);
        return $result;
    }

    public function updateAbsensi($id, $data)
    {
        $this->db->where('id_absen', $id);
        $result = $this->db->update('absensi', $data);

        return $result;
    }

}