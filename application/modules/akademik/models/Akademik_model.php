<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akademik_model extends CI_Model
{
    public function getbiaya()
    {
            $query = "SELECT `m_biaya`.*,`m_biaya_categories`.`name`as category
            FROM `m_biaya` LEFT JOIN `m_biaya_categories`
            ON `m_biaya`.`category_id`=`m_biaya_categories`.`id`
            order by `m_biaya`.`nama` asc
    ";
            return $this->db->query($query)->result_array();
    }
    public function getTahunById($id)
    {
        $this->db->where('id', $id);
        $this->db->select('tahun');
        return $this->db->get('m_tahunakademik');
    }
 
    public function getkelasAll() {
 
        $this->db->select('`m_kelas`.*,`m_jurusan`.nama_jurusan as jurusan,`m_pegawai`.nama_guru');
        $this->db->from('m_kelas');
        $this->db->join('m_pegawai', 'm_pegawai.id = m_kelas.wali_kelas','left');
        $this->db->join('m_jurusan', 'm_jurusan.id = m_kelas.jurusan','left');
        $this->db->order_by('m_kelas.tahun','desc');
        $this->db->order_by('m_kelas.nama_kelas','asc');
        $query = $this->db->get();
        return $query->result_array();
      }
    public function getkelasbyId($id) {
 
        $this->db->select('`m_kelas`.*,`m_pegawai`.nama_guru');
        $this->db->from('m_kelas');
        $this->db->join('m_pegawai', 'm_pegawai.id = m_kelas.wali_kelas','left');
        $this->db->where('m_kelas.id',$id);
        $this->db->order_by('m_kelas.tahun','desc');
        $this->db->order_by('m_kelas.nama_kelas','asc');
        $query = $this->db->get();
        return $query->row_array();
      }
      public function getlistsiswa_byIdkelas($kelas_id) {
 
        $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
        $this->db->where('m_kelas_siswa.kelas_id',$kelas_id);
        $this->db->order_by('ppdb_siswa.nis','asc');
        $this->db->order_by('ppdb_siswa.namasiswa','asc');
        $query = $this->db->get();
        return $query->result_array();
      }
      public function getabsensisiswa_bytanggal($tanggal) {
 
        $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,akad_siswaabsenharian.status');
        $this->db->from('ppdb_siswa');
        $this->db->join('akad_siswaabsenharian', 'ppdb_siswa.id = akad_siswaabsenharian.siswa_id','left');
        $this->db->where('akad_siswaabsenharian.tanggal',$tanggal);
        $this->db->order_by('ppdb_siswa.nis','asc');
        $this->db->order_by('ppdb_siswa.namasiswa','asc');
        $query = $this->db->get();
        return $query->result_array();
      }
      public function getabsensisiswa_bytanggalandkelas($tanggal,$kelas_id) {
 
        $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,akad_siswaabsenharian.status');
        $this->db->from('ppdb_siswa');
        $this->db->join('akad_siswaabsenharian', 'ppdb_siswa.id = akad_siswaabsenharian.siswa_id','left');
        $this->db->where('akad_siswaabsenharian.tanggal',$tanggal);
        $this->db->where('akad_siswaabsenharian.kelas_id',$kelas_id);
        $this->db->order_by('ppdb_siswa.nis','asc');
        $this->db->order_by('ppdb_siswa.namasiswa','asc');
        $query = $this->db->get();
        return $query->result_array();
      }
      public function getsiswaaktif() {
 
        $this->db->select('`ppdb_siswa`.*');
        $this->db->from('ppdb_siswa');
        $this->db->where('ppdb_status','aktif');
        $this->db->order_by('ppdb_siswa.nis','asc');
        $this->db->order_by('ppdb_siswa.namasiswa','asc');
        $query = $this->db->get();
        return $query->result_array();
      }
      public function getabsensisiswaAll($kelas_id,$tahun,$bulan) {
 
        $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,akad_siswaabsenharian.status,akad_siswaabsenharian.tahunakademik_id');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_kelas_siswa', 'ppdb_siswa.id = m_kelas_siswa.siswa_id','left');
        $this->db->join('akad_siswaabsenharian', 'ppdb_siswa.id = akad_siswaabsenharian.siswa_id','left');
        $this->db->where('akad_siswaabsenharian.kelas_id',$kelas_id);
        $this->db->where('akad_siswaabsenharian.tahun',$tahun);
        $this->db->where('akad_siswaabsenharian.bulan',$bulan);
        $query = $this->db->get();
        return $query->result_array();
      }
      public function gettglabsensi($kelas_id,$tahun,$bulan) {
  
        $query = $this->db->query("SELECT * FROM akad_siswaabsenharian where tahun = $tahun and bulan = $bulan and kelas_id= $kelas_id  group by tanggal asc");
        return $query->result_array();
      }
      public function getsiswabyId($id) {
        $this->db->select('*');
        $this->db->from('ppdb_siswa');
        $this->db->where('id',$id);
      return $this->db->get()->row_array();
        }
        public function getkelassiswabyId($id,$angkatan) {
          $this->db->select('ppdb_siswa.*,m_kelas_siswa.kelas_id');
          $this->db->from('ppdb_siswa');
          $this->db->join('m_kelas_siswa', 'm_kelas_siswa.siswa_id = ppdb_siswa.id','left');
          $this->db->where('ppdb_siswa.id',$id);
          $this->db->where('m_kelas_siswa.tahun',$angkatan);
        return $this->db->get()->row_array();
          }
      public function getsiswaketbyId($siswa_id) {
        $this->db->select('*');
        $this->db->from('siswa_keterangan');
        $this->db->where('siswa_id',$siswa_id);
      return $this->db->get()->row_array();
        }
    
          public function siswagetDataAll() {
     
            $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `tahun`,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`,m_kelas_siswa.kelas_id,akad_siswaabsenharian.tahunakademik_id');
            $this->db->from('ppdb_siswa');
            $where = '(ppdb_siswa.ppdb_status="calon" or ppdb_siswa.ppdb_status = "aktif")';
            $this->db->where($where);
            $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb','left');
            $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id','left');
            $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id','left');
            $this->db->join('m_kelas_siswa', 'm_kelas_siswa.siswa_id = ppdb_siswa.id');
            $this->db->join('akad_siswaabsenharian', 'akad_siswaabsenharian.siswa_id = ppdb_siswa.id');
            $this->db->group_by('ppdb_siswa.namasiswa','asc');
            $query = $this->db->get();
            return $query->result_array();
          }
          public function getpresensisiswabyId($id,$tahunakademikdefault) {
            $this->db->select('*');
            $this->db->from('akad_siswaabsenharian');
            $this->db->where('siswa_id',$id);
            $this->db->where('tahunakademik_id',$tahunakademikdefault);
            $this->db->order_by('id','asc');
          return $this->db->get()->result_array();
            }
            public function getjurusanAll() {
 
              $this->db->select('`m_jurusan`.*');
              $this->db->from('m_jurusan');
              $this->db->order_by('m_jurusan.nama_jurusan','asc');
              $query = $this->db->get();
              return $query->result_array();
            }
          public function getjurusanbyId($id) {
            $this->db->select('`m_jurusan`.*');
            $this->db->from('m_jurusan');
            $this->db->where('m_jurusan.id',$id);
            $this->db->order_by('m_jurusan.nama_jurusan','asc');
              $query = $this->db->get();
              return $query->row_array();
            }
            public function get_absensiswa($id,$tahunakademikdefault,$status) {
              $this->db->select('count(*) as jumlah');
              $this->db->from('akad_siswaabsenharian');
              $this->db->where('akad_siswaabsenharian.siswa_id',$id);
              $this->db->where('akad_siswaabsenharian.status',$status);
              $this->db->where('akad_siswaabsenharian.tahunakademik_id',$tahunakademikdefault);
              $query = $this->db->get();
              return $query->row_array();
            }
            public function get_pegawai_all() {
              
              $this->db->select('`m_pegawai`.*');
              $this->db->from('m_pegawai');
              $this->db->where('m_pegawai.id_status_keaktifan','1');
              $this->db->order_by('m_pegawai.nama_guru','asc');
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
  public function get_guru_pelajaran($tahunakademik_id)
  {

    $this->db->select('`r_jadwal_pelajaran`.*,r_mapel.nama_mapel,m_kelas.nama_kelas,m_pegawai.nama_guru');
    $this->db->from('r_jadwal_pelajaran');
    $this->db->where('r_jadwal_pelajaran.tahunakademik_id',$tahunakademik_id);  
    $this->db->join('r_mapel', 'r_mapel.id = r_jadwal_pelajaran.mapel_id', 'left');  
    $this->db->join('m_kelas', 'm_kelas.id = r_jadwal_pelajaran.kelas_id', 'left');  
    $this->db->join('m_pegawai', 'm_pegawai.id = r_jadwal_pelajaran.guru_id', 'left');  
    $this->db->group_by('m_pegawai.nama_guru', 'asc');
    $this->db->group_by('r_mapel.nama_mapel', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_datagurukbm($tahunakademik_id,$mapel_id,$guru_id)
  {

    $this->db->select('`r_jadwal_pelajaran`.*,r_mapel.nama_mapel,m_kelas.nama_kelas,m_pegawai.nama_guru');
    $this->db->from('r_jadwal_pelajaran');
    $this->db->where('r_jadwal_pelajaran.tahunakademik_id',$tahunakademik_id); 
    $this->db->where('r_jadwal_pelajaran.mapel_id',$mapel_id); 
    $this->db->where('r_jadwal_pelajaran.guru_id',$guru_id); 
    $this->db->join('r_mapel', 'r_mapel.id = r_jadwal_pelajaran.mapel_id', 'left');  
    $this->db->join('m_kelas', 'm_kelas.id = r_jadwal_pelajaran.kelas_id', 'left');  
    $this->db->join('m_pegawai', 'm_pegawai.id = r_jadwal_pelajaran.guru_id', 'left');  
    return $this->db->get()->row_array();
  }
  public function get_journal_byguru($tahunakademik_id,$mapel_id,$guru_id,$bulan)
  {

    $this->db->select('`akad_journalkbm`.*,m_kelas.nama_kelas');
    $this->db->from('akad_journalkbm');
    $this->db->where('akad_journalkbm.tahunakademik_id',$tahunakademik_id);
    $this->db->where('akad_journalkbm.mapel_id',$mapel_id);
    $this->db->where('akad_journalkbm.guru_id',$guru_id);
    $this->db->join('m_kelas', 'm_kelas.id = akad_journalkbm.kelas_id', 'left');
    $this->db->order_by('akad_journalkbm.kelas_id','asc');
    $this->db->order_by('akad_journalkbm.tanggal','asc');
    return $this->db->get()->result_array();
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
  public function siswagetDataAllbyAngkatan($angkatan) {
     
    $this->db->select('`ppdb_siswa`.*,m_kelas.nama_kelas,m_kelas_siswa.tahun');
    $this->db->from('ppdb_siswa');
    $where = '(ppdb_siswa.ppdb_status = "aktif" and m_kelas_siswa.tahun="'.$angkatan.'" )';
    $this->db->where($where);
    $this->db->join('m_kelas_siswa', 'm_kelas_siswa.siswa_id = ppdb_siswa.id');
    $this->db->join('m_kelas', 'm_kelas_siswa.kelas_id = m_kelas.id');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getabsensisiswa_byjournal($journal_id,$tanggal) {
 
    $this->db->select('`ppdb_siswa`.*,ppdb_siswa.id as siswa_id,akad_siswaabsenjournal.status');
    $this->db->from('ppdb_siswa');
    $this->db->join('akad_siswaabsenjournal', 'ppdb_siswa.id = akad_siswaabsenjournal.siswa_id','left');
    $this->db->where('akad_siswaabsenjournal.journal_id',$journal_id);
    $this->db->where('akad_siswaabsenjournal.tanggal',$tanggal);
    $this->db->order_by('ppdb_siswa.nis','asc');
    $this->db->order_by('ppdb_siswa.namasiswa','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_absensiswajournal($journal_id,$tanggal,$status) {
    $this->db->select('tanggal,status,count(status) as jumlah');
    $this->db->from('akad_siswaabsenjournal');
    $this->db->where('akad_siswaabsenjournal.status',$status);
    $this->db->where('akad_siswaabsenjournal.journal_id',$journal_id);
    $this->db->where('akad_siswaabsenjournal.tanggal',$tanggal);
    $this->db->group_by('akad_siswaabsenjournal.tanggal','asc');
    $this->db->group_by('akad_siswaabsenjournal.status','asc');
    return $this->db->get()->row_array();
  }
  //end
}
