<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemutihan_model extends CI_Model
{
    public function getsiswabyId($id)
  {
    $this->db->select('*');
    $this->db->from('ppdb_siswa');
    $this->db->where('id', $id);
    return $this->db->get()->row_array();
  }
  public function getsiswaketbyId($siswa_id)
  {
    $this->db->select('*');
    $this->db->from('siswa_keterangan');
    $this->db->where('siswa_id', $siswa_id);
    return $this->db->get()->row_array();
  }
public function siswagetDataAll()
  {

    $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `tahun`,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`');
    $this->db->from('ppdb_siswa');
    $where = '(ppdb_siswa.ppdb_status="calon" or ppdb_siswa.ppdb_status = "aktif")';
    $this->db->where($where);
    $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
    $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
    $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getlast_idnota($user_id)
  {
    $this->db->select("id_master");
    $this->db->from("siswa_pemutihan_master");
    $this->db->where('siswa_pemutihan_master.user_id', $user_id);
    $this->db->limit(1);
    $this->db->order_by('id_master', "DESC");
    $query = $this->db->get();
    $result = $query->row_array();
    return $result['id_master'];
  }
  public function pemutihanmaster_allbyId($id_master)
  {
    $this->db->select('`siswa_pemutihan_master`.*,`ppdb_siswa`.`namasiswa`,`user`.`name`,`ppdb_siswa`.`hpayah`');
    $this->db->from('siswa_pemutihan_master');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_pemutihan_master.siswa_id');
    $this->db->join('user', 'user.id = siswa_pemutihan_master.user_id');
    $this->db->where('siswa_pemutihan_master.id_master', $id_master);
    $this->db->order_by('nomor_nota', 'asc');
    $query = $this->db->get();
    return $query->row_array();
  }
  public function pemutihanmaster_batal()
  {
    $this->db->select('`siswa_pemutihan_batal`.*,`user`.`name`');
    $this->db->from('siswa_pemutihan_batal');
    $this->db->join('siswa_pemutihan_master', 'siswa_pemutihan_master.id_master = siswa_pemutihan_batal.id_master');
    $this->db->join('user', 'user.id = siswa_pemutihan_batal.user_batal');
    $this->db->order_by('tanggal', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function pemutihanmaster_all($orderby = 'asc')
  {
    $this->db->select('`siswa_pemutihan_master`.*,`ppdb_siswa`.`namasiswa`,`user`.`name`');
    $this->db->from('siswa_pemutihan_master');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_pemutihan_master.siswa_id');
    $this->db->join('user', 'user.id = siswa_pemutihan_master.user_id');
    $this->db->order_by('nomor_nota', $orderby);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function pemutihandetail_allbyId($id_master)
  {

    $this->db->select('`siswa_pemutihan_detail`.*');
    $this->db->from('siswa_pemutihan_detail');
    $this->db->where('siswa_pemutihan_detail.id_master', $id_master);
    $query = $this->db->get();
    return $query->result_array();
  }
  //end
}