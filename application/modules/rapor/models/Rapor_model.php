<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapor_model extends CI_Model
{


  public function get_kelompokmapel()
  {

    $this->db->select('`r_kelompok_mapel`.*');
    $this->db->from('r_kelompok_mapel');
    $this->db->order_by('r_kelompok_mapel.jenis', 'asc');
    $this->db->order_by('r_kelompok_mapel.nama_kelompok', 'asc');
    return $this->db->get()->result_array();
  }

  public function get_kelompokmapel_byId($id)
  {

    $this->db->select('`r_kelompok_mapel`.*');
    $this->db->from('r_kelompok_mapel');
    $this->db->where('id',$id);
    $this->db->order_by('r_kelompok_mapel.jenis', 'asc');
    $this->db->order_by('r_kelompok_mapel.nama_kelompok', 'asc');
    return $this->db->get()->row_array();
  }
  public function get_mapelall()
  {

    $this->db->select('`r_mapel`.*,r_kelompok_mapel.nama_kelompok,m_jurusan.nama_jurusan,m_pegawai.nama_guru');
    $this->db->from('r_mapel');
    $this->db->join('r_kelompok_mapel', 'r_kelompok_mapel.id = r_mapel.kelompok_id', 'left');
    $this->db->join('m_jurusan', 'm_jurusan.id = r_mapel.jurusan_id', 'left');
    $this->db->join('m_pegawai', 'm_pegawai.id = r_mapel.guru_mgmp', 'left');
    $this->db->order_by('r_mapel.kode_mapel', 'asc');
    $this->db->order_by('r_mapel.urutan', 'asc');
    return $this->db->get()->result_array();
  }
  public function buat_kode_mapel()   {
    $this->db->select('RIGHT(r_mapel.kode_mapel,2) as kode', FALSE);
    $this->db->order_by('kode_mapel','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('r_mapel');      //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
     //jika kode ternyata sudah ada.      
     $data = $query->row();      
     $kode = intval($data->kode) + 1;    
    }
    else {      
     //jika kode belum ada      
     $kode = 1;    
    }
    $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
    $kodejadi = "MK".$kodemax;    // hasilnya ODJ-9921-0001 dst.
    return $kodejadi;  
}
public function get_jurusanmapel()
{

  $this->db->select('`m_jurusan`.*');
  $this->db->from('m_jurusan');
  $this->db->order_by('m_jurusan.nama_jurusan', 'asc');
  return $this->db->get()->result_array();
}
public function get_guruAll()
{

  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->order_by('m_pegawai.nama_guru', 'asc');
  return $this->db->get()->result_array();
}
public function get_mapel_byId($id)
  {

    $this->db->select('`r_mapel`.*,r_kelompok_mapel.nama_kelompok,m_jurusan.nama_jurusan,m_pegawai.nama_guru');
    $this->db->from('r_mapel');
    $this->db->where('r_mapel.id',$id);
    $this->db->join('r_kelompok_mapel', 'r_kelompok_mapel.id = r_mapel.kelompok_id', 'left');
    $this->db->join('m_jurusan', 'm_jurusan.id = r_mapel.jurusan_id', 'left');
    $this->db->join('m_pegawai', 'm_pegawai.id = r_mapel.guru_mgmp', 'left');
    $this->db->order_by('r_mapel.kode_mapel', 'asc');
    $this->db->order_by('r_mapel.urutan', 'asc');
    return $this->db->get()->row_array();
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

  public function get_jadwal_pelajaran($tahunakademik_id,$kelas_id)
  {

    $this->db->select('`r_jadwal_pelajaran`.*,r_mapel.nama_mapel,m_kelas.nama_kelas,m_pegawai.nama_guru');
    $this->db->from('r_jadwal_pelajaran');
    $this->db->where('r_jadwal_pelajaran.tahunakademik_id',$tahunakademik_id);    
    $this->db->where('r_jadwal_pelajaran.kelas_id',$kelas_id);  
    $this->db->join('r_mapel', 'r_mapel.id = r_jadwal_pelajaran.mapel_id', 'left');  
    $this->db->join('m_kelas', 'm_kelas.id = r_jadwal_pelajaran.kelas_id', 'left');  
    $this->db->join('m_pegawai', 'm_pegawai.id = r_jadwal_pelajaran.guru_id', 'left');  
    $this->db->order_by('r_mapel.nama_mapel', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_jadwal_byId($id)
  {

    $this->db->select('`r_jadwal_pelajaran`.*,r_mapel.nama_mapel,m_kelas.nama_kelas');
    $this->db->from('r_jadwal_pelajaran');
    $this->db->where('r_jadwal_pelajaran.id',$id);
    $this->db->join('r_mapel', 'r_mapel.id = r_jadwal_pelajaran.mapel_id', 'left'); 
    $this->db->join('m_kelas', 'm_kelas.id = r_jadwal_pelajaran.kelas_id', 'left'); 
    return $this->db->get()->row_array();
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

  public function get_capaianbelajar_byIdkelas($tahunakademik_id,$kelas_id) {
 
    $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,m_kelas_siswa.kelas_id,r_nilai_sikap_semester.spiritual_predikat,r_nilai_sikap_semester.spiritual_deskripsi,r_nilai_sikap_semester.sosial_predikat,r_nilai_sikap_semester.sosial_deskripsi');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
    $this->db->join('r_nilai_sikap_semester', 'ppdb_siswa.id = r_nilai_sikap_semester.siswa_id','left');
    $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
    $this->db->where('r_nilai_sikap_semester.tahunakademik_id',$tahunakademik_id);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_catatan_walikelas_byIdkelas($tahunakademik_id,$kelas_id) {
 
    $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,m_kelas_siswa.kelas_id,r_catatan_walikelas.deskripsi');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
    $this->db->join('r_catatan_walikelas', 'ppdb_siswa.id = r_catatan_walikelas.siswa_id','left');
    $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
    $this->db->where('r_catatan_walikelas.tahunakademik_id',$tahunakademik_id);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id) {
 
    $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,m_kelas_siswa.kelas_id');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
    $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_extrakulikuler_byIdkelas($tahunakademik_id,$kelas_id) {
 
    $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,m_kelas_siswa.kelas_id,r_nilai_extrakulikuler.id as extra_id,r_nilai_extrakulikuler.kegiatan,r_nilai_extrakulikuler.nilai,r_nilai_extrakulikuler.deskripsi');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
    $this->db->join('r_nilai_extrakulikuler', 'ppdb_siswa.id = r_nilai_extrakulikuler.siswa_id');
    $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);    
    $this->db->where('r_nilai_extrakulikuler.tahunakademik_id',$tahunakademik_id);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $this->db->order_by('r_nilai_extrakulikuler.id','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_extrakulikuler_byId($id) {
    
    $this->db->select('`r_nilai_extrakulikuler`.*');
    $this->db->from('r_nilai_extrakulikuler');
    $this->db->where('r_nilai_extrakulikuler.id',$id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function get_prestasi_byIdkelas($tahunakademik_id,$kelas_id) {
 
    $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,m_kelas_siswa.kelas_id,r_nilai_prestasi.id as prestasi_id,r_nilai_prestasi.jenis_kegiatan,r_nilai_prestasi.keterangan');
    $this->db->from('ppdb_siswa');
    $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
    $this->db->join('r_nilai_prestasi', 'ppdb_siswa.id = r_nilai_prestasi.siswa_id');
    $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
    $this->db->where('r_nilai_prestasi.tahunakademik_id',$tahunakademik_id);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_prestasi_byId($id) {
    
    $this->db->select('`r_nilai_prestasi`.*');
    $this->db->from('r_nilai_prestasi');
    $this->db->where('r_nilai_prestasi.id',$id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function get_nilaipengetahuan_byjadwal($jadwal_id) {
    
    $this->db->select('`r_nilai_pengetahuan`.*,ppdb_siswa.namasiswa');
    $this->db->from('r_nilai_pengetahuan');
    $this->db->where('r_nilai_pengetahuan.jadwal_id',$jadwal_id);
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = r_nilai_pengetahuan.siswa_id', 'left'); 
    $this->db->order_by('r_nilai_pengetahuan.siswa_urut','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_nilaiketerampilan_byjadwal($jadwal_id) {
    
    $this->db->select('`r_nilai_keterampilan`.*,ppdb_siswa.namasiswa');
    $this->db->from('r_nilai_keterampilan');
    $this->db->where('r_nilai_keterampilan.jadwal_id',$jadwal_id);
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = r_nilai_keterampilan.siswa_id', 'left'); 
    $this->db->order_by('r_nilai_keterampilan.siswa_urut','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
 //cetak_uts
 public function get_data_sekolah() {
    
  $this->db->select('`m_sekolah`.*');
  $this->db->from('m_sekolah');
  $query = $this->db->get();
  return $query->row_array();
}
public function get_data_siswa_byId($siswa_id) {
    
  $this->db->select('`ppdb_siswa`.*,r_siswa_masuk.masuk_kelas,r_siswa_masuk.masuk_tanggal,m_agama.nama as nama_agama,ppdb_status_anak.nama as status_anak');
  $this->db->from('ppdb_siswa');
  $this->db->where('ppdb_siswa.id',$siswa_id);
  $this->db->join('r_siswa_masuk', 'r_siswa_masuk.siswa_id = ppdb_siswa.id', 'left'); 
  $this->db->join('m_agama', 'm_agama.id = ppdb_siswa.agamasiswa', 'left'); 
  $this->db->join('ppdb_status_anak', 'ppdb_status_anak.id = ppdb_siswa.statusanak', 'left'); 
  $query = $this->db->get();
  return $query->row_array();
}
public function get_data_kelas_byId($kelas_id) {
    
  $this->db->select('`m_kelas`.*,m_pegawai.nama_guru,m_pegawai.nip');
  $this->db->from('m_kelas');
  $this->db->join('m_pegawai', 'm_pegawai.id = m_kelas.wali_kelas', 'left'); 
  $this->db->where('m_kelas.id',$kelas_id);
  $query = $this->db->get();
  return $query->row_array();
}
public function get_tahun_akademik_byId($id) {
    
  $this->db->select('`m_tahunakademik`.*');
  $this->db->from('m_tahunakademik');
  $this->db->where('m_tahunakademik.id',$id);
  $query = $this->db->get();
  return $query->row_array();
}
  public function get_nilai_uts_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
    $this->db->select('`r_nilai_pengetahuan`.*,r_mapel.nama_mapel,r_mapel.kelompok_id');
    $this->db->from('r_nilai_pengetahuan');
  $this->db->join('r_mapel', 'r_mapel.id = r_nilai_pengetahuan.mapel_id', 'left'); 
    $this->db->where('r_nilai_pengetahuan.tahunakademik_id',$tahunakademik_id);
    $this->db->where('r_nilai_pengetahuan.kelas_id',$kelas_id);
    $this->db->where('r_nilai_pengetahuan.siswa_id',$siswa_id);
    $this->db->order_by('r_mapel.kode_mapel','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_siswa_urut_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
    $this->db->select('`r_nilai_pengetahuan`.*');
    $this->db->from('r_nilai_pengetahuan');
    $this->db->where('r_nilai_pengetahuan.tahunakademik_id',$tahunakademik_id);
    $this->db->where('r_nilai_pengetahuan.kelas_id',$kelas_id);
    $this->db->where('r_nilai_pengetahuan.siswa_id',$siswa_id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function get_siswa_mapelkat_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
    $this->db->select('`r_nilai_pengetahuan`.*,r_kelompok_mapel.nama_kelompok,r_kelompok_mapel.id as idmapelkat');
    $this->db->from('r_nilai_pengetahuan');
  $this->db->join('r_mapel', 'r_mapel.id = r_nilai_pengetahuan.mapel_id', 'left'); 
  $this->db->join('r_kelompok_mapel', 'r_kelompok_mapel.id = r_mapel.kelompok_id', 'left'); 
    $this->db->where('r_nilai_pengetahuan.tahunakademik_id',$tahunakademik_id);
    $this->db->where('r_nilai_pengetahuan.kelas_id',$kelas_id);
    $this->db->where('r_nilai_pengetahuan.siswa_id',$siswa_id);
    $this->db->group_by('r_kelompok_mapel.nama_kelompok','asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_absensiswa($siswa_id,$tahunakademik_id,$status) {
    $this->db->select('count(*) as jumlah');
    $this->db->from('akad_siswaabsenharian');
    $this->db->where('akad_siswaabsenharian.siswa_id',$siswa_id);
    $this->db->where('akad_siswaabsenharian.status',$status);
    $this->db->where('akad_siswaabsenharian.tahunakademik_id',$tahunakademik_id);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function get_nilai_sikap_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
      $this->db->select('`r_nilai_sikap_semester`.*');
      $this->db->from('r_nilai_sikap_semester'); 
      $this->db->where('r_nilai_sikap_semester.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_sikap_semester.kelas_id',$kelas_id);
      $this->db->where('r_nilai_sikap_semester.siswa_id',$siswa_id);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function get_catatan_walikelas_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
      $this->db->select('`r_catatan_walikelas`.*');
      $this->db->from('r_catatan_walikelas'); 
      $this->db->where('r_catatan_walikelas.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_catatan_walikelas.kelas_id',$kelas_id);
      $this->db->where('r_catatan_walikelas.siswa_id',$siswa_id);
      $query = $this->db->get();
      return $query->row_array();
    }
    //nilaiketerampilan
    public function get_nilai_keterampilan_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
      $this->db->select('`r_nilai_keterampilan`.*,r_mapel.nama_mapel,r_mapel.kelompok_id');
      $this->db->from('r_nilai_keterampilan');
    $this->db->join('r_mapel', 'r_mapel.id = r_nilai_keterampilan.mapel_id', 'left'); 
      $this->db->where('r_nilai_keterampilan.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_keterampilan.kelas_id',$kelas_id);
      $this->db->where('r_nilai_keterampilan.siswa_id',$siswa_id);
      $this->db->order_by('r_mapel.kode_mapel','asc');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_siswa_mapelkat_ktr_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
      $this->db->select('`r_nilai_keterampilan`.*,r_kelompok_mapel.nama_kelompok,r_kelompok_mapel.id as idmapelkat');
      $this->db->from('r_nilai_keterampilan');
    $this->db->join('r_mapel', 'r_mapel.id = r_nilai_keterampilan.mapel_id', 'left'); 
    $this->db->join('r_kelompok_mapel', 'r_kelompok_mapel.id = r_mapel.kelompok_id', 'left'); 
      $this->db->where('r_nilai_keterampilan.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_keterampilan.kelas_id',$kelas_id);
      $this->db->where('r_nilai_keterampilan.siswa_id',$siswa_id);
      $this->db->group_by('r_kelompok_mapel.nama_kelompok','asc');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_nilai_extrakulikuler_byId($tahunakademik_id,$kelas_id,$siswa_id) {
    
      $this->db->select('`r_nilai_extrakulikuler`.*');
      $this->db->from('r_nilai_extrakulikuler'); 
      $this->db->where('r_nilai_extrakulikuler.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_extrakulikuler.kelas_id',$kelas_id);
      $this->db->where('r_nilai_extrakulikuler.siswa_id',$siswa_id);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_tahunakademikbytahun()
    {
  
      $this->db->select('`m_tahunakademik`.*');
      $this->db->from('m_tahunakademik');
      $this->db->group_by('m_tahunakademik.tahun', 'desc');
      $this->db->order_by('m_tahunakademik.semester', 'asc');
      return $this->db->get()->result_array();
    }

    public function get_mapel_byakademik($tahunakademik_id,$kelas_id) {
    
      $this->db->select('`r_nilai_pengetahuan`.*,r_mapel.nama_mapel,r_mapel.sk_mapel');
      $this->db->from('r_nilai_pengetahuan');
    $this->db->join('r_mapel', 'r_mapel.id = r_nilai_pengetahuan.mapel_id', 'left'); 
      $this->db->where('r_nilai_pengetahuan.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_pengetahuan.kelas_id',$kelas_id);
      $this->db->group_by('r_mapel.kode_mapel','asc');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_tahun_genap($tahunakademik_id) {
    
      $this->db->select('`m_tahunakademik`.*');
      $this->db->from('m_tahunakademik'); 
      $this->db->where('m_tahunakademik.semester','2');
      $query = $this->db->get();
      return $query->row_array();
    }
    //dkn pengetahuan
    public function get_nilai_pengetahuan_bykelas($tahunakademik_id,$kelas_id) {
    
      $this->db->select('`r_nilai_pengetahuan`.*');
      $this->db->from('r_nilai_pengetahuan');
    $this->db->join('r_mapel', 'r_mapel.id = r_nilai_pengetahuan.mapel_id', 'left'); 
      $this->db->where('r_nilai_pengetahuan.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_pengetahuan.kelas_id',$kelas_id);
      $this->db->order_by('r_mapel.kode_mapel','asc');
      $query = $this->db->get();
      return $query->result_array();
    }
    //dkn keterampilan
    public function get_nilai_keterampilan_bykelas($tahunakademik_id,$kelas_id) {
      
      $this->db->select('`r_nilai_keterampilan`.*');
      $this->db->from('r_nilai_keterampilan');
      $this->db->join('r_mapel', 'r_mapel.id = r_nilai_keterampilan.mapel_id', 'left'); 
      $this->db->where('r_nilai_keterampilan.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_keterampilan.kelas_id',$kelas_id);
      $this->db->order_by('r_mapel.kode_mapel','asc');
          $query = $this->db->get();
          return $query->result_array();
        }
        //dkn extra1
    public function get_nilai_extra_bykelas($tahunakademik_id,$kelas_id) {
    
      $this->db->select('`r_nilai_extrakulikuler`.*');
      $this->db->from('r_nilai_extrakulikuler');
      $this->db->where('r_nilai_extrakulikuler.tahunakademik_id',$tahunakademik_id);
      $this->db->where('r_nilai_extrakulikuler.kelas_id',$kelas_id);
      $this->db->order_by('r_nilai_extrakulikuler.id','asc');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_jumlah_extra_bykelas($tahunakademik_id,$kelas_id) {
    
      $this->db->select('`m_kelas_siswa`.siswa_id,count(`r_nilai_extrakulikuler`.id)as jumlah');
      $this->db->from('m_kelas_siswa');
      $this->db->join('r_nilai_extrakulikuler', 'r_nilai_extrakulikuler.siswa_id = m_kelas_siswa.siswa_id','left');
      $this->db->where('r_nilai_extrakulikuler.tahunakademik_id',$tahunakademik_id);
      $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
      $this->db->group_by('m_kelas_siswa.siswa_id','asc');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_jumlah_presensi_bykelas($tahunakademik_id,$kelas_id,$statussiswa) {
    
      $this->db->select('`m_kelas_siswa`.siswa_id,count(`akad_siswaabsenharian`.id)as jumlah');
      $this->db->from('m_kelas_siswa');
      $this->db->join('akad_siswaabsenharian', 'akad_siswaabsenharian.siswa_id = m_kelas_siswa.siswa_id','left');
      $this->db->where('akad_siswaabsenharian.tahunakademik_id',$tahunakademik_id);
      $this->db->where('akad_siswaabsenharian.status',$statussiswa);
      $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
      $this->db->group_by('m_kelas_siswa.siswa_id','asc');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_tahunakademikGenap()
  {

    $this->db->select('`m_tahunakademik`.*');
    $this->db->from('m_tahunakademik');
    $this->db->where('m_tahunakademik.semester','2');
    $this->db->order_by('m_tahunakademik.tahun', 'desc');
    $this->db->order_by('m_tahunakademik.semester', 'asc');
    return $this->db->get()->result_array();
  }
  //end
}
