<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bukutamu_model extends CI_Model
{
  public function get_bukutamu()
  {

    $this->db->select('`bukutamu`.*,m_pegawai.nama_guru');
    $this->db->from('bukutamu');
    $this->db->join('m_pegawai', 'm_pegawai.id = bukutamu.diterima','left');
    $this->db->order_by('bukutamu.nomor', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_bukutamu_byId($id)
  {

    $this->db->select('`bukutamu`.*,m_pegawai.nama_guru');
    $this->db->from('bukutamu');
    $this->db->join('m_pegawai', 'm_pegawai.id = bukutamu.diterima','left');
    $this->db->where('bukutamu.id',$id);
    return $this->db->get()->row_array();
  }
  public function get_bukutamu_bytgl($tanggal)
  {

    $this->db->select('`bukutamu`.*,m_pegawai.nama_guru');
    $this->db->from('bukutamu');
    $this->db->join('m_pegawai', 'm_pegawai.id = bukutamu.diterima','left');
    $this->db->where('bukutamu.tanggal',$tanggal);
    return $this->db->get()->result_array();
  }
  public function bukutamu_darisampai($daritanggal, $sampaitanggal)
  {
    $this->db->select('`bukutamu`.*,m_pegawai.nama_guru');
    $this->db->from('bukutamu');
    $this->db->join('m_pegawai', 'm_pegawai.id = bukutamu.diterima','left');
    $this->db->where('bukutamu.tanggal >=', $daritanggal);
    $this->db->where('bukutamu.tanggal <=', $sampaitanggal);
    $this->db->order_by('nomor', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function pegawaiGetDataAll() {
 
    $this->db->select('`m_pegawai`.*,m_kelamin.nama as jeniskelamin,m_statuspegawai.nama as statuspegawai,m_jenisptk.nama as jenisptk,m_statuskeaktifan.nama as statuskeaktifan,m_statusnikah.nama as statusnikah,,m_golongan.nama as golongan');
    $this->db->from('m_pegawai');
    $this->db->join('m_kelamin', 'm_kelamin.id = m_pegawai.id_jenis_kelamin','left');
    $this->db->join('m_statuspegawai', 'm_statuspegawai.id = m_pegawai.id_status_kepegawaian','left');
    $this->db->join('m_jenisptk', 'm_jenisptk.id = m_pegawai.id_jenis_ptk','left');
    $this->db->join('m_statuskeaktifan', 'm_statuskeaktifan.id = m_pegawai.id_status_keaktifan','left');
    $this->db->join('m_statusnikah', 'm_statusnikah.id = m_pegawai.id_status_pernikahan','left');
    $this->db->join('m_golongan', 'm_golongan.id = m_pegawai.id_golongan','left');
    $this->db->where('m_pegawai.id_status_keaktifan', '1');
    $this->db->order_by('m_pegawai.nama_guru', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function pegawaiGetDatabyId($id) {

    $this->db->select('`m_pegawai`.*,m_kelamin.nama as jeniskelamin,m_statuspegawai.nama as statuspegawai,m_jenisptk.nama as jenisptk,m_statuskeaktifan.nama as statuskeaktifan,m_statusnikah.nama as statusnikah,m_golongan.nama as golongan,m_agama.nama as agama');
    $this->db->from('m_pegawai');
    $this->db->join('m_kelamin', 'm_kelamin.id = m_pegawai.id_jenis_kelamin','left');
    $this->db->join('m_statuspegawai', 'm_statuspegawai.id = m_pegawai.id_status_kepegawaian','left');
    $this->db->join('m_jenisptk', 'm_jenisptk.id = m_pegawai.id_jenis_ptk','left');
    $this->db->join('m_statuskeaktifan', 'm_statuskeaktifan.id = m_pegawai.id_status_keaktifan','left');
    $this->db->join('m_statusnikah', 'm_statusnikah.id = m_pegawai.id_status_pernikahan','left');
    $this->db->join('m_golongan', 'm_golongan.id = m_pegawai.id_golongan','left');
    $this->db->join('m_agama', 'm_agama.id = m_pegawai.id_agama','left');
    $this->db->where('m_pegawai.id_status_keaktifan', '1');
    $this->db->where('m_pegawai.id',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

  //end
}