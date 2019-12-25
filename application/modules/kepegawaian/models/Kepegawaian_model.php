<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepegawaian_model extends CI_Model
{

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

      public function pegawaiGetGajibyId($id) {
 
        $this->db->select('`hrd_penggajian`.*');
        $this->db->from('hrd_penggajian');
        $this->db->where('hrd_penggajian.id_pegawai',$id);
        $query = $this->db->get();
        return $query->result_array();
      }

      public function pegawaiSlipGajibyId($id) {
 
        $this->db->select('`hrd_penggajian`.*');
        $this->db->from('hrd_penggajian');
        $this->db->where('hrd_penggajian.id',$id);
        $query = $this->db->get();
        return $query->row_array();
      }

      public function getDataGajiAll($tahun='',$bulan='') {
 
        $this->db->select('`hrd_penggajian`.*,m_pegawai.nip,m_pegawai.nama_guru');
        $this->db->from('hrd_penggajian');
        $this->db->join('m_pegawai', 'm_pegawai.id = hrd_penggajian.id_pegawai','left');
        $this->db->where('hrd_penggajian.tahun',$tahun);
        $this->db->where('hrd_penggajian.bulan',$bulan);
        $this->db->order_by('m_pegawai.nama_guru','asc');
        $query = $this->db->get();
        return $query->result_array();
      }
/// Close
}      