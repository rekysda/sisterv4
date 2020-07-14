<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
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
      public function get_kelasAllbyWali($guru_id)
      {
    
        $this->db->select('`m_kelas`.*');
        $this->db->from('m_kelas');
        $this->db->order_by('m_kelas.tahun', 'desc');
        $this->db->order_by('m_kelas.nama_kelas', 'asc');
        $this->db->where('m_kelas.wali_kelas',$guru_id);
        return $this->db->get()->result_array();
      }
      public function get_jadwal_pelajaran($tahunakademik_id,$kelas_id)
      {
    
        $this->db->select('`r_jadwal_pelajaran`.*,r_mapel.nama_mapel,m_kelas.nama_kelas,m_pegawai.nama_guru,m_pegawai.id as guru_pengajar');
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

        public function get_tahunakademikaktif()
        {
          
          $this->db->select('`m_options`.*,m_tahunakademik.id as tahunakademik_aktif,m_tahunakademik.nama as namaakademik_aktif,m_tahunakademik.semester as semester_aktif');
          $this->db->from('m_options');
          $this->db->join('m_tahunakademik', 'm_tahunakademik.id = m_options.value', 'left'); 
          $this->db->where('m_options.name', 'tahun_akademik_default');
          $query = $this->db->get();
          return $query->row_array();
        }

        public function get_tahunakademikaktif_select()
        {
          
          $this->db->select('m_tahunakademik.*');
          $this->db->from('m_tahunakademik');
          $this->db->join('m_options', 'm_options.value = m_tahunakademik.id', 'left'); 
          $this->db->where('m_options.name', 'tahun_akademik_default');
          $query = $this->db->get();
          return $query->result_array();
        }

        public function get_journal_byjadwal($jadwal_id)
  {

    $this->db->select('`akad_journalkbm`.*');
    $this->db->from('akad_journalkbm');
    $this->db->where('akad_journalkbm.jadwal_id',$jadwal_id);
    $this->db->order_by('akad_journalkbm.tanggal','asc');
    return $this->db->get()->result_array();
  }
  public function get_journalkbm_byId($id)
  {
    $this->db->select('`akad_journalkbm`.*');
    $this->db->from('akad_journalkbm');
    $this->db->where('akad_journalkbm.id',$id);
    return $this->db->get()->row_array();
  }
      //end

}