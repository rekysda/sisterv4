<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_model extends CI_Model
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

    $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `tahun`,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`,`m_sekolah`.sekolah as `sekolah`');
    $this->db->from('ppdb_siswa');
    $where = '(ppdb_siswa.ppdb_status="calon" or ppdb_siswa.ppdb_status = "aktif")';
    $this->db->where($where);
    $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
    $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
    $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
    $this->db->join('m_sekolah', 'm_sekolah.id = ppdb_siswa.sekolah_id', 'left');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function siswagetDataAll_tidakaktif()
  {

    $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `tahun`,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`,`m_sekolah`.sekolah as `sekolah`');
    $this->db->from('ppdb_siswa');
    $where = '(ppdb_siswa.ppdb_status="alumni" or ppdb_siswa.ppdb_status = "keluar" or ppdb_siswa.ppdb_status = "ditolak")';
    $this->db->where($where);
    $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
    $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
    $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');    
    $this->db->join('m_sekolah', 'm_sekolah.id = ppdb_siswa.sekolah_id', 'left');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getpetugas()
  {
    $this->db->select('`siswa_bayar_master`.*,`ppdb_siswa`.`namasiswa`,`user`.`name`');
    $this->db->from('siswa_bayar_master');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_bayar_master.siswa_id');
    $this->db->join('user', 'user.id = siswa_bayar_master.user_id');
    $this->db->where('siswa_bayar_master.bayar >', '0');
    $this->db->group_by('user.name', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function siswabayarmaster_darisampai($daritanggal, $sampaitanggal, $carabayar = 'semua', $petugas = 'semua')
  {
    $this->db->select('`siswa_bayar_master`.*,`ppdb_siswa`.`namasiswa`,`user`.`name`,`ppdb_siswa`.`nis`,`ppdb_siswa`.`noformulir`');
    $this->db->from('siswa_bayar_master');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_bayar_master.siswa_id');
    $this->db->join('user', 'user.id = siswa_bayar_master.user_id');
    $this->db->where('siswa_bayar_master.tanggal >=', $daritanggal);
    $this->db->where('siswa_bayar_master.tanggal <=', $sampaitanggal);
    $this->db->where('siswa_bayar_master.bayar >', '0');
    if ($carabayar != 'semua') {
      $this->db->where('siswa_bayar_master.carabayar', $carabayar);
    }
    if ($petugas != 'semua') {
      $this->db->where('siswa_bayar_master.user_id', $petugas);
    }
    $this->db->order_by('tanggal', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function siswabayarmaster_all($orderby = 'asc')
  {
    $this->db->select('`siswa_bayar_master`.*,`ppdb_siswa`.`namasiswa`,`user`.`name`');
    $this->db->from('siswa_bayar_master');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_bayar_master.siswa_id');
    $this->db->join('user', 'user.id = siswa_bayar_master.user_id');
    $this->db->where('siswa_bayar_master.bayar >', '0');
    $this->db->order_by('nomor_nota', $orderby);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function siswabayarmaster_allbyId($id_master)
  {
    $this->db->select('`siswa_bayar_master`.*,`ppdb_siswa`.`namasiswa`,`user`.`name`,`ppdb_siswa`.`hpayah`,`ppdb_siswa`.`emailortu`');
    $this->db->from('siswa_bayar_master');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_bayar_master.siswa_id');
    $this->db->join('user', 'user.id = siswa_bayar_master.user_id');
    $this->db->where('siswa_bayar_master.bayar >', '0');
    $this->db->where('siswa_bayar_master.id_master', $id_master);
    $this->db->order_by('nomor_nota', 'asc');
    $query = $this->db->get();
    return $query->row_array();
  }

  public function siswabayarmaster_batal()
  {
    $this->db->select('`siswa_bayar_batal`.*,`user`.`name`');
    $this->db->from('siswa_bayar_batal');
    $this->db->join('siswa_bayar_master', 'siswa_bayar_master.id_master = siswa_bayar_batal.id_master');
    $this->db->join('user', 'user.id = siswa_bayar_batal.user_batal');
    $this->db->order_by('tanggal', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function siswabayardetail_allbyId($id_master)
  {

    $this->db->select('`siswa_bayar_detail`.*');
    $this->db->from('siswa_bayar_detail');
    $this->db->where('siswa_bayar_detail.id_master', $id_master);
    $query = $this->db->get();
    return $query->result_array();
  }
  // Fetch records
  public function getData($rowno, $rowperpage, $search = "")
  {

    $this->db->select('`siswa_bayar_master`.*,`ppdb_siswa`.`namasiswa`,`user`.`name`');
    $this->db->from('siswa_bayar_master');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_bayar_master.siswa_id');
    $this->db->join('user', 'user.id = siswa_bayar_master.user_id');
    $this->db->where('siswa_bayar_master.bayar !=', '0');
    if ($search != '') {
      $this->db->like('nomor_nota', $search);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();

    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '')
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('siswa_bayar_master');
    $this->db->where('bayar !=', '0');
    if ($search != '') {
      $this->db->like('nomor_nota', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();

    return $result[0]['allcount'];
  }
  public function getlast_idnota($user_id)
  {
    $this->db->select("id_master");
    $this->db->from("siswa_bayar_master");
    $this->db->where('siswa_bayar_master.user_id', $user_id);
    $this->db->limit(1);
    $this->db->order_by('id_master', "DESC");
    $query = $this->db->get();
    $result = $query->row_array();
    return $result['id_master'];
  }

  public function siswagetDataspp($id)
  {
    $this->db->select('`ppdb_siswa`.*,`siswa_spp`.`nominal`,`siswa_spp`.`siswa_id`');
    $this->db->from('ppdb_siswa');
    $this->db->join('siswa_spp', 'ppdb_siswa.id = siswa_spp.siswa_id', left);
    $this->db->where('ppdb_siswa.id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function siswagetDatasppAll()
  {
    $this->db->select('`ppdb_siswa`.`id` as idsiswa,`ppdb_siswa`.`noformulir`,`ppdb_siswa`.`nis`,`ppdb_siswa`.`namasiswa`,`siswa_spp`.`nominal`');
    $this->db->from('ppdb_siswa');
    $this->db->join('siswa_spp', 'ppdb_siswa.idsiswa = siswa_spp.siswa_id', left);
    $this->db->where('ppdb_siswa.ppdb_status', 'calon');
    $this->db->or_where('ppdb_siswa.ppdb_status', 'aktif');
    $query = $this->db->get();
    return $query->row_array();
  }

  function fetch_data()
  {
    $this->db->select("ppdb_siswa.id,ppdb_siswa.noformulir,ppdb_siswa.nis,ppdb_siswa.namasiswa,siswa_spp.nominal");
    $this->db->from('ppdb_siswa');
    $this->db->join('siswa_spp', 'ppdb_siswa.id = siswa_spp.siswa_id', left);
    $this->db->where('ppdb_siswa.ppdb_status', 'aktif');
    $this->db->or_where('ppdb_siswa.ppdb_status', 'calon');
    return $this->db->get();
  }
  function fetch_databiayasiswa($biaya_id,$namabiaya,$jenis)
  {
    $this->db->select("ppdb_siswa.id,ppdb_siswa.noformulir,ppdb_siswa.nis,ppdb_siswa.namasiswa,'".$biaya_id."' as biaya_id,'".$namabiaya."' as namabiaya,'0','0' as is_paid,'".$jenis."'as jenis");
    $this->db->from('ppdb_siswa');
    $this->db->join('siswa_keuangan', 'ppdb_siswa.id = siswa_keuangan.siswa_id', left);
    $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id', left);
    $this->db->where('ppdb_siswa.ppdb_status', 'calon');
    $this->db->or_where('ppdb_siswa.ppdb_status', 'aktif');
    $this->db->group_by('ppdb_siswa.namasiswa', 'asc');
    
    return $this->db->get();
  }

  function fetch_databiayasiswaspp($biaya_id,$namabiaya,$jenis)
  {
    $this->db->select("ppdb_siswa.id,ppdb_siswa.noformulir,ppdb_siswa.nis,ppdb_siswa.namasiswa,'".$biaya_id."' as biaya_id,'".$namabiaya."' as namabiaya,siswa_spp.nominal,'0' as is_paid,'".$jenis."'as jenis");
    $this->db->from('ppdb_siswa');
    $this->db->join('siswa_keuangan', 'ppdb_siswa.id = siswa_keuangan.siswa_id', left);
    $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id', left);
    $this->db->join('siswa_spp', 'siswa_spp.siswa_id = ppdb_siswa.id', left);
    $this->db->where('ppdb_siswa.ppdb_status', 'aktif');    
    $this->db->or_where('siswa_keuangan.biaya_id', $biaya_id);
    $this->db->group_by('ppdb_siswa.namasiswa', 'asc');
    return $this->db->get();
  }
  public function getbiayabyId($id)
  {
    $this->db->select('m_biaya.id,m_biaya.nama as namabiaya,m_biaya_categories.nama as jenis');
    $this->db->from('m_biaya');
    $this->db->join('m_biaya_categories', 'm_biaya.category_id = m_biaya_categories.id', left);
    $this->db->where('m_biaya.id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }

  function getbiayasiswa($biaya_id='')
  {
    $this->db->select("siswa_keuangan.*,ppdb_siswa.nis,ppdb_siswa.namasiswa,m_biaya.nama as namabiaya");
    $this->db->from('siswa_keuangan');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_keuangan.siswa_id', left);
    $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id', left);
   $this->db->where('siswa_keuangan.biaya_id', $biaya_id);
   $this->db->order_by('siswa_keuangan.siswa_id', 'asc');
 $query = $this->db->get();
 return $query->result_array();
  }
}
