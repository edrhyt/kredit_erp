<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {

    var $table = "tb_survey";

    public function _Code($tables,$kolom,$str){
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

    public function _moveDetail() {
        return $this->db->query("INSERT INTO tb_barang_so (id_brg_so, kode_detail, nama_brg, harga_brg, jumlah)
        SELECT id, kode_detail, name, price, qty
        FROM   tb_temp1");
    }

    public  function _cekSurvey($id){
        return $this->db->get_where($this->table, array('kode_detail' => $id))->num_rows();
    }

    public  function _cekSO($id){
        return $this->db->get_where($this->table, array('kode_detail' => $id))->num_rows();
    }

    public function _KondisiSMPL($kondisi){
        if ($kondisi == 'H') {
            return "Hidup";
        }elseif ($kondisi == 'M') {
            return "Mati";
        }elseif ($kondisi == 'B') {
            return "Beku";
        }else {
            return "Kering";
        }

    }
  
    public function countAll($tables){
        return $this->db->get($tables)->num_rows();
    }
    
    public function countQuery($query){
        return $this->db->get($query)->num_rows();
    }
    
    //enampilkan satu record brdasarkan parameter.
    public function kondisi($tables,$where)
    {
        $this->db->where($where);
        return $this->db->get($tables);
    }

    function get_data_by($kode_detail){
        $query = $this->db->get_where('tb_survey', array('kode_detail' =>  $kode_detail));
        return $query;
    }

    function get_data_nik($nik){
        $query = $this->db->get_where('tb_karyawan', array('nik' =>  $nik));
        return $query;
    }
    
    //menampilkan satu record brdasarkan parameter.
    public  function getByID($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables)->result_array();
    }

    public function get_sp_id($id)
    {
        $this->db->join('tb_karyawan k1', 's.id_karyawan_sp = k1.id_karyawan');
        return $this->db->get_where('tb_surat_order s')->row_array();
    }

    public function get_db_id($id)
    {
        $this->db->join('tb_karyawan k2', 's.id_karyawan_db = k2.id_karyawan');
        return $this->db->get_where('tb_surat_order s')->row_array();
    }

    public function get_ss_id($id)
    {
        $this->db->join('tb_karyawan k3', 's.id_karyawan_ss = k3.id_karyawan');
        return $this->db->get_where('tb_surat_order s')->row_array();
    }    

    public function get_surveyor_id($id)
    {
        $this->db->join('tb_karyawan k', 's.id_surveyor = k.id_karyawan');
        return $this->db->get_where('tb_survey s')->row_array();
    }

    public function get_driver_id($id)
    {
        $this->db->join('tb_karyawan k', 'd.id_driver = k.id_karyawan');
        return $this->db->get_where('tb_delivery d')->row_array();
    }

    public function get_helper_id($id)
    {
        $this->db->join('tb_karyawan k', 'd.id_helper = k.id_karyawan');
        return $this->db->get_where('tb_delivery d')->row_array();
    }

    public  function getSOID($table, $data = null, $where = null){
        $this->db->join('kabupaten kb', 's.id_kab = kb.id_kab');
        $this->db->join('kecamatan kc', 's.id_kec = kc.id_kec');
        $this->db->join('kelurahan kl', 's.id_kel = kl.id_kel');
        $this->db->join('tb_karyawan k1', 's.id_karyawan_sp = k1.id_karyawan');
        $this->db->join('tb_karyawan k2', 's.id_karyawan_db = k2.id_karyawan');
        $this->db->join('tb_karyawan k3', 's.id_karyawan_ss = k3.id_karyawan');
        return $this->db->get_where('tb_surat_order s', $data)->row_array();
    }

    public  function getSurveyID($table, $data = null, $where = null){
        $this->db->join('kabupaten kb', 's.id_kab = kb.id_kab');
        $this->db->join('kecamatan kc', 's.id_kec = kc.id_kec');
        $this->db->join('kelurahan kl', 's.id_kel = kl.id_kel');
        $this->db->join('tb_karyawan k', 's.id_surveyor = k.id_karyawan');
        // $this->db->join('tb_surat_order so', 's.id_surat_order = so.id_surat_order');
        return $this->db->get_where('tb_survey s', $data)->row_array();
    }

    public  function getByIDObj($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables)->result();
    }

    public function insert($tables,$data){
        $this->db->insert($tables,$data);
    }

    public function update($tables,$data,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->update($tables,$data);
    }

    public function updatewhere($tables,$data,$where){
        $this->db->where($where);
        $this->db->update($tables,$data);
    }
    

    public function delete($tables,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->delete($tables);
    }

    public function msg_berhasil($pesan)
    {
        $msg ='<div class="alert alert-success alert-dismissible show fade berhasil">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    '.$pesan.'
                </div>
                </div>';
        return $msg;
    }

    public function msg_gagal($pesan)
    {
        $msg ='<div class="alert alert-danger alert-dismissible show fade gagal">
                    <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    '.$pesan.'
                    </div>
                </div>';
        return $msg;
    }


    private function uploadImage($nama)
    {
        $config['upload_path']          = './upload/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
       

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.png";
    }
    
    public function deleteImage($id)
    {
        $r = $this->getByID('tb_login','id_user',$id);
        if ($r[0]['img'] != "default.jpg") {
            $filename = explode(".", $r[0]['img'])[0];
            return array_map('unlink', glob(FCPATH."upload/img/$filename.*"));
        }
    }

    public function getSO()
    {
        $this->db->join('kabupaten kb', 's.id_kab = kb.id_kab');
        $this->db->join('kecamatan kc', 's.id_kec = kc.id_kec');
        $this->db->join('kelurahan kl', 's.id_kel = kl.id_kel');
        $this->db->join('tb_karyawan k1', 's.id_karyawan_sp = k1.id_karyawan');
        $this->db->join('tb_karyawan k2', 's.id_karyawan_db = k2.id_karyawan');
        $this->db->join('tb_karyawan k3', 's.id_karyawan_ss = k3.id_karyawan');
        $this->db->order_by('id_surat_order');
        return $this->db->get('tb_surat_order s')->result_array();
    }

     public function getSurvey()
    {
        $this->db->join('kabupaten kb', 's.id_kab = kb.id_kab');
        $this->db->join('kecamatan kc', 's.id_kec = kc.id_kec');
        $this->db->join('kelurahan kl', 's.id_kel = kl.id_kel');
        $this->db->join('tb_surat_order so', 's.id_surat_order = so.id_surat_order');
        $this->db->order_by('id_survey');
        return $this->db->get('tb_survey s')->result_array();
    }

    public function getDelivery()
    {
        // $this->db->join('kabupaten kb', 'd.id_kab = kb.id_kab');
        // $this->db->join('kecamatan kc', 'd.id_kec = kc.id_kec');
        // $this->db->join('kelurahan kl', 'd.id_kel = kl.id_kel');
        $this->db->join('tb_surat_order so', 'd.id_surat_order = so.id_surat_order');
        $this->db->join('tb_survey s', 'd.id_survey = s.id_survey');
        $this->db->join('tb_karyawan k1', 'd.id_driver = k1.id_karyawan');
        $this->db->join('tb_karyawan k2', 'd.id_helper = k2.id_karyawan');
        $this->db->order_by('id_delivery');
        return $this->db->get('tb_delivery d')->result_array();
    }

    function get_karyawan_sales(){
        $hasil=$this->db->query("SELECT * FROM tb_karyawan WHERE id_jabatan = '004'");
        return $hasil;
    }

    function get_karyawan_demo(){
        $hasil=$this->db->query("SELECT * FROM tb_karyawan WHERE id_jabatan = '003'");
        return $hasil;
    }

    function get_karyawan_ss(){
        $hasil=$this->db->query("SELECT * FROM tb_karyawan WHERE id_jabatan = '002'");
        return $hasil;
    }

    function get_karyawan_surveyor(){
        $hasil=$this->db->query("SELECT * FROM tb_karyawan WHERE id_jabatan = '007'");
        return $hasil;
    }

    function get_karyawan_driver(){
        $hasil=$this->db->query("SELECT * FROM tb_karyawan WHERE id_jabatan = '011'");
        return $hasil;
    }

    function get_karyawan_helper(){
        $hasil=$this->db->query("SELECT * FROM tb_karyawan WHERE id_jabatan = '012'");
        return $hasil;
    }
}

