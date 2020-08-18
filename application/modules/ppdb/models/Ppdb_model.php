<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb_model extends CI_Model
{


  public function getgelombangjalur()
  {

    $this->db->select('`m_gelombang_jalur`.*,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`');
    $this->db->from('m_gelombang_jalur');
    $this->db->join('m_gelombang', 'm_gelombang.id = m_gelombang_jalur.gelombang_id', 'left');
    $this->db->join('m_jalur', 'm_jalur.id = m_gelombang_jalur.jalur_id', 'left');
    $this->db->order_by('m_gelombang_jalur.tahun_id', 'desc');
    $this->db->order_by('m_gelombang_jalur.gelombang_id', 'asc');
    $this->db->order_by('m_gelombang_jalur.jalur_id', 'asc');
    return $this->db->get()->result_array();
  }
  public function getgelombangjalurbyId($id)
  { 
    $this->db->select('`m_gelombang_jalur`.sekolah_id,`m_gelombang_jalur`.tahun_id,`m_gelombang_jalur`.id as gelombangjalur_id,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`');
    $this->db->from('m_gelombang_jalur');
    $this->db->join('m_gelombang', 'm_gelombang.id = m_gelombang_jalur.gelombang_id', 'left');
    $this->db->join('m_jalur', 'm_jalur.id = m_gelombang_jalur.jalur_id', 'left');
    $this->db->where('`m_gelombang_jalur`.id', $id);
    return  $this->db->get()->row_array();
  }

  public function getjalurbiaya($id)
  {
    $this->db->select('`m_jalur_biaya`.*,`m_biaya`.nama as `biaya`');
    $this->db->from('m_jalur_biaya');
    $this->db->join('m_biaya', 'm_biaya.id = m_jalur_biaya.biaya_id', 'left');
    $this->db->where('`m_jalur_biaya`.gelombangjalur_id', $id);
    return $this->db->get()->result_array();
  }
  public function getsiswabyId($id)
  {
    $this->db->select('*');
    $this->db->from('ppdb_siswa');
    $this->db->where('id', $id);
    return $this->db->get()->row_array();
  }
  public function getberkasbysiswa($idsiswa)
  {
    $this->db->select('*');
    $this->db->from('ppdb_berkas');
    $this->db->where('siswa', $idsiswa);
    return $this->db->get()->result_array(); 
  }
  public function insert_biayappdb_bysiswaId($siswa_id, $jalurbiaya_id, $user_id)
  {
    $jalurbiaya = $this->db->get_where('m_jalur_biaya', ['gelombangjalur_id' => $jalurbiaya_id])->result_array();
    foreach ($jalurbiaya as $dt) {
      $biaya_id = $dt['biaya_id'];
      $nominal = $dt['nominal'];
      $data = [
        'siswa_id' => $siswa_id,
        'user_id' => $user_id,
        'biaya_id' => $biaya_id
      ];
      $this->db->delete('siswa_keuangan', $data);
    }
    ////////////////////////
    $jalurbiaya = $this->db->get_where('m_jalur_biaya', ['gelombangjalur_id' => $jalurbiaya_id])->result_array();
    foreach ($jalurbiaya as $dt) {
      $biaya_id = $dt['biaya_id'];
      $nominal = $dt['nominal'];
      $data = [
        'siswa_id' => $siswa_id,
        'user_id' => $user_id,
        'biaya_id' => $biaya_id,
        'nominal' => $nominal,
        'jenis' => 'ppdb'
      ];
      $this->db->insert('siswa_keuangan', $data);
    }
  }

  public function siswagetDataAll()
  {

    $this->db->select('*');
    $this->db->select('`ppdb_siswa`.*,`m_sekolah`.sekolah as `sekolah`,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
    $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
    $this->db->join('m_sekolah', 'm_sekolah.id = ppdb_siswa.sekolah_id', 'left');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function fetch_datasiswanis()
  {

    $this->db->select('id,nis,namasiswa,tanggallahirsiswa,ppdb_status');
    $this->db->from('ppdb_siswa');
    $this->db->or_where('ppdb_status', 'aktif');
    return $this->db->get();
  }
  public function fetch_datasiswaall()
  {

    $this->db->select('*');
    $this->db->from('ppdb_siswa');
    $this->db->where('ppdb_status', 'calon');
    $this->db->or_where('ppdb_status', 'aktif');
    return $this->db->get();
  }

  public function ppdbgetDataAll($sekolah_id,$tahun_ppdb, $gelombang_id, $jalur_id)
  {

    $this->db->select('`ppdb_siswa`.*,`m_sekolah`.sekolah as `sekolah`,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_sekolah', 'm_sekolah.id = ppdb_siswa.sekolah_id', 'left');
    $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
    $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
    if ($sekolah_id) {
      $this->db->where('ppdb_siswa.sekolah_id', $sekolah_id);
    }
    if ($tahun_ppdb) {
      $this->db->where('ppdb_siswa.tahun_ppdb', $tahun_ppdb);
    }
    if ($gelombang_id) {
      $this->db->where('ppdb_siswa.gelombang_id', $gelombang_id);
    }
    if ($jalur_id) {
      $this->db->where('ppdb_siswa.jalur_id', $jalur_id);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getformulirtersedia()
  {

    $this->db->select('`ppdb_formulir`.*');
    $this->db->from('ppdb_formulir');
    $this->db->or_where('ppdb_formulir.status', 'tersedia');

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getlast_idnota()
  {
    $this->db->select("id_nota");
    $this->db->from("ppdb_formulir_jual");
    $this->db->limit(1);
    $this->db->order_by('id_nota', "DESC");
    $query = $this->db->get();
    $result = $query->row_array();
    return $result['id_nota'];
  }
  public function penjualanformulir_byId($id_nota)
  {

    $this->db->select('*');
    $this->db->from('ppdb_formulir_jual');
    $this->db->where('id_nota', $id_nota);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function formulir_penjualan_list()
  {

    $this->db->select('*');
    $this->db->from('ppdb_formulir_jual');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function penjualanformulir_darisampai($daritanggal, $sampaitanggal)
  {

    $this->db->select('*');
    $this->db->from('ppdb_formulir_jual');
    $this->db->where('tanggal>=', $daritanggal);
    $this->db->where('tanggal<=', $sampaitanggal);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getsiswa_byStatus($status='') {
 
    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $this->db->where_in('ppdb_status',$status);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function siswa_GetAll_DatabyId($id)
  {
    $this->db->select('ppdb_siswa.*,m_kelamin.nama as kelaminsiswa,m_agama.nama as agamasiswa,ppdb_status_anak.nama as statusanak');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_kelamin', 'm_kelamin.id = ppdb_siswa.kelaminsiswa', 'left');
    $this->db->join('m_agama', 'm_agama.id = ppdb_siswa.agamasiswa', 'left');
    $this->db->join('ppdb_status_anak', 'ppdb_status_anak.id = ppdb_siswa.statusanak', 'left');
    $this->db->where('ppdb_siswa.id', $id);
    return $this->db->get()->row_array();
  }
  public function get_analisappdb_gelombang($sekolah_id,$tahun_ppdb) {
 
    $this->db->select('`ppdb_siswa`.*,count(ppdb_siswa.id)as jumlah,m_gelombang.nama as gelombang');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
    $this->db->where('ppdb_siswa.sekolah_id',$sekolah_id);
    $this->db->where('ppdb_siswa.tahun_ppdb',$tahun_ppdb);
    $this->db->where('ppdb_siswa.ppdb_status<>','ditolak');
    $this->db->group_by('gelombang','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_analisappdb_kelamin($sekolah_id,$tahun_ppdb) {
 
    $this->db->select('`ppdb_siswa`.*,count(ppdb_siswa.id)as jumlah,ppdb_siswa.kelaminsiswa');
    $this->db->from('ppdb_siswa');
    $this->db->where('ppdb_siswa.sekolah_id',$sekolah_id);
    $this->db->where('ppdb_siswa.tahun_ppdb',$tahun_ppdb);
    $this->db->where('ppdb_siswa.ppdb_status<>','ditolak');
    $this->db->group_by('kelaminsiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_analisappdb_asalsekolah($sekolah_id,$tahun_ppdb) {
 
    $this->db->select('`ppdb_siswa`.*,count(ppdb_siswa.id)as jumlah,ppdb_siswa.sekolahasal');
    $this->db->from('ppdb_siswa');
    $this->db->where('ppdb_siswa.sekolah_id',$sekolah_id);
    $this->db->where('ppdb_siswa.tahun_ppdb',$tahun_ppdb);
    $this->db->where('ppdb_siswa.ppdb_status<>','ditolak');
    $this->db->group_by('sekolahasal','asc');
    $this->db->order_by('jumlah','desc');
    $this->db->limit('10');

    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_tahunakademikAll()
  {

    $this->db->select('`m_tahunakademik`.*');
    $this->db->from('m_tahunakademik');
    $this->db->order_by('m_tahunakademik.tahun', 'desc');
    $this->db->order_by('m_tahunakademik.semester', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_kelasAll()
  {

    $this->db->select('`m_kelas`.*');
    $this->db->from('m_kelas');
    $this->db->order_by('m_kelas.tahun', 'desc');
    $this->db->order_by('m_kelas.nama_kelas', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_kelasAll_byTahun($tahun)
  {

    $this->db->select('`m_kelas`.*');
    $this->db->from('m_kelas');
    $this->db->where('m_kelas.tahun', $tahun);
    $this->db->order_by('m_kelas.nama_kelas', 'asc');
    return $this->db->get()->result_array();
  }
  public function getlistsiswa_byIdkelas($kelas_id) {
 
    $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,r_siswa_masuk.masuk_kelas,r_siswa_masuk.masuk_tanggal');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
    $this->db->join('r_siswa_masuk', 'ppdb_siswa.id = r_siswa_masuk.siswa_id','left');
    $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getsiswaaktifsibling($niksibling='ayah') {
 
    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $this->db->order_by('ppdb_siswa.nis','asc');
    if($niksibling=='ayah'){
    $this->db->group_by('ppdb_siswa.nikayah','asc');
    $this->db->where('ppdb_siswa.nikayah<>','');
    $this->db->having('COUNT(`nikayah`)>','1');
  }else{
    $this->db->group_by('ppdb_siswa.nikibu','asc');
    $this->db->where('ppdb_siswa.nikibu<>','');
    $this->db->having('COUNT(`nikibu`)>','1');
    }
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getsiswaaktifsiblingnik($nik=null) {
 
    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->where('ppdb_siswa.nikayah',$nik);
    $this->db->or_where('ppdb_siswa.nikibu',$nik);
    $query = $this->db->get();
    return $query->result_array();
  }
  //end
}
