<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Absensi_model extends CI_Model 
{
    
    public function getAbsensi()
    {
        $this->db->order_by('masuk', 'DESC');
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

    public function getDailyAbsensi($date)
    {
        $this->db->query('CALL makeDailyAbsTemp("%'.date('Y-m-d', strtotime($date)).'%")');
        $this->db->select('abs.id_absen, kar.id_karyawan, abs.masuk, abs.pulang');
        $this->db->from('tb_karyawan as kar');
        $this->db->join('daily_abs_temp as abs', 'kar.id_karyawan = abs.id_karyawan', 'LEFT');
       
        return $this->db->get();
    }

    public function updateAbsensi($id, $data)
    {
        $this->db->where('id_absen', $id);
        $result = $this->db->update('absensi', $data);

        return $result;
    }

    public function checkKaryawanAbsensi($id_karyawan = NULL, $date)
    {
        $result = $this->db->query('SELECT keterangan FROM absensi WHERE id_karyawan = '.$id_karyawan.' AND masuk LIKE "%'.$date.'%" LIMIT 1;')->result_array();

        if( count($result) > 0 ) {
            return (int) $result[0]['keterangan'];
        }

        return 0;
    }

}