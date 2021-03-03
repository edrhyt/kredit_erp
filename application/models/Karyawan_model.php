<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Karyawan_model extends CI_Model
{
    public function get_all( array $fields = NULL )
    {
        if($fields){
            $this->db->select($fields);
        }
        return $this->db->get('tb_karyawan')->result_array();
    }

    public function getKaryawan($field, $value) {
        return $this->db->get_where('tb_karyawan', array( $field => $value ));
    }

    public function find($id)
    {
        $this->db->join('divisi', 'users.divisi = divisi.id_divisi', 'LEFT');
        $this->db->where('id_user', $id);
        $result = $this->db->get('users');
        return $result->result_array();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('users', $data);
        return $result;
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->update('users', $data);
        return $result;
    }

    public function delete_data($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->delete('users');
        return $result;
    }

    public function cekNik($id)
    {
        return $this->db->get_where('tb_karyawan k', ['id_karyawan' => $id])->row_array();
    }

    public function getFieldsKaryawan( array $fields = ['id_karyawan', 'nik', 'nama_lengkap'] )
    {
        $this->db->select($fields);
        $results = $this->db->get('tb_karyawan')->result_array();
        
        return $results;
    }
}


/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Karyawan_model.php */