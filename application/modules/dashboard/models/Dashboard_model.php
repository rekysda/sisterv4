<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function siswagetDataAll($tahun) {
     
        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `tahun`,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`,m_kelas_siswa.kelas_id,akad_siswaabsenharian.tahunakademik_id');
        $this->db->from('ppdb_siswa');
        $this->db->where('ppdb_siswa.ppdb_status','aktif');
        $this->db->or_where('ppdb_siswa.ppdb_status','calon');
        $this->db->where('m_kelas_siswa.tahun',$tahun);

        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb','left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id','left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id','left');
        $this->db->join('m_kelas_siswa', 'm_kelas_siswa.siswa_id = ppdb_siswa.id');
        $this->db->join('akad_siswaabsenharian', 'akad_siswaabsenharian.siswa_id = ppdb_siswa.id');
        $this->db->group_by('ppdb_siswa.namasiswa','asc');
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
        $query = $this->db->get();
        return $query->result_array();
      }


    //end
}