<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Absensi_model extends CI_Model 
{
    public function get_absen($id_karyawan, $bulan, $tahun)
    {
        $this->db->select("DATE_FORMAT(a.tgl, '%d-%m-%Y') AS tgl, a.waktu AS jam_masuk, (SELECT waktu FROM absensi al WHERE al.tgl = a.tgl AND id_karyawan = '6' AND al.keterangan != a.keterangan) AS jam_pulang");
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where("DATE_FORMAT(tgl, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tgl, '%Y') = ", $tahun);
        $this->db->group_by("tgl");
        $result = $this->db->get('absensi a');
        return $result->result_array();
    }

    public function getAbsensi()
    {
        return $this->db->get('absensi');
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

    public function updateAbsensi($id, $data)
    {
        $this->db->where('id_absen', $id);
        $result = $this->db->update('absensi', $data);

        return $result;
    }

    public function absen_harian_karyawan($id_karyawan)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('id_karyawan', $id_karyawan);
        $data = $this->db->get('absensi');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('absensi', $data);
        return $result;
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('start', $time, '<=');
        $this->db->or_where('finish', $time, '>=');
        $data = $this->db->get('jam');
        return $data->row();
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Absensi_model.php */