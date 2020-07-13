<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bk_model extends CI_Model
{
  public function get_kat_pelanggaran()
  {

    $this->db->select('`bk_kategori_pelanggaran`.*');
    $this->db->from('bk_kategori_pelanggaran');
    $this->db->order_by('bk_kategori_pelanggaran.kategori', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_kat_pelanggaran_byId($id)
  {

    $this->db->select('`bk_kategori_pelanggaran`.*');
    $this->db->from('bk_kategori_pelanggaran');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_pelanggaran()
  {

    $this->db->select('`bk_pelanggaran`.*,bk_kategori_pelanggaran.kategori');
    $this->db->from('bk_pelanggaran');
    $this->db->join('bk_kategori_pelanggaran', 'bk_kategori_pelanggaran.id = bk_pelanggaran.kategori_id','left');
    $this->db->order_by('bk_pelanggaran.pelanggaran', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_pelanggaran_byId($id)
  {

    $this->db->select('`bk_pelanggaran`.*');
    $this->db->from('bk_pelanggaran');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function siswagetDataAll()
  {

    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $where = '(ppdb_siswa.ppdb_status="calon" or ppdb_siswa.ppdb_status = "aktif")';
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_kelas_siswa($siswa_id)
  {

    $this->db->select('`m_kelas_siswa`.*');
    $this->db->from('m_kelas_siswa');
    $this->db->where('siswa_id',$siswa_id);
    $this->db->order_by('m_kelas_siswa.tahun', 'desc');
    $this->db->limit('1');
    return $this->db->get()->row_array();
  }
  public function get_pelanggaran_siswa()
  {

    $this->db->select('`bk_siswapelanggaran`.*,ppdb_siswa.namasiswa,m_kelas.nama_kelas,bk_pelanggaran.pelanggaran');
    $this->db->from('bk_siswapelanggaran');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswapelanggaran.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswapelanggaran.kelas_id','left');
    $this->db->join('bk_pelanggaran', 'bk_pelanggaran.id = bk_siswapelanggaran.pelanggaran_id','left');
    $this->db->order_by('bk_siswapelanggaran.tanggal', 'desc');
    return $this->db->get()->result_array();
  }
  public function get_pelanggaran_siswa_byId($id)
  {

    $this->db->select('`bk_siswapelanggaran`.*,ppdb_siswa.namasiswa,ppdb_siswa.hpayah,ppdb_siswa.emailortu,m_kelas.nama_kelas,bk_pelanggaran.pelanggaran');
    $this->db->from('bk_siswapelanggaran');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswapelanggaran.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswapelanggaran.kelas_id','left');
    $this->db->join('bk_pelanggaran', 'bk_pelanggaran.id = bk_siswapelanggaran.pelanggaran_id','left');
    $this->db->where('bk_siswapelanggaran.id',$id);
    return $this->db->get()->row_array();
  }
  public function get_pelanggaran_siswa_point()
  {

    $this->db->select('`bk_siswapelanggaran`.*,ppdb_siswa.nis,ppdb_siswa.namasiswa,sum(bk_siswapelanggaran.point)as jumlah_point,count(bk_siswapelanggaran.id)as jumlah_pelanggaran');
    $this->db->from('bk_siswapelanggaran');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswapelanggaran.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswapelanggaran.kelas_id','left');
    $this->db->join('bk_pelanggaran', 'bk_pelanggaran.id = bk_siswapelanggaran.pelanggaran_id','left');
    $this->db->group_by('bk_siswapelanggaran.siswa_id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_pelanggaran_siswa_tanggal($daritanggal,$sampaitanggal)
  {

    $this->db->select('`bk_siswapelanggaran`.*,ppdb_siswa.namasiswa,m_kelas.nama_kelas,bk_pelanggaran.pelanggaran,bk_kategori_pelanggaran.kategori');
    $this->db->from('bk_siswapelanggaran');
    $this->db->where('bk_siswapelanggaran.tanggal>=',$daritanggal);
    $this->db->where('bk_siswapelanggaran.tanggal<=',$sampaitanggal);
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswapelanggaran.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswapelanggaran.kelas_id','left');
    $this->db->join('bk_pelanggaran', 'bk_pelanggaran.id = bk_siswapelanggaran.pelanggaran_id','left');
    $this->db->join('bk_kategori_pelanggaran', 'bk_kategori_pelanggaran.id = bk_pelanggaran.kategori_id','left');
    $this->db->order_by('bk_siswapelanggaran.tanggal', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_pelanggaran_siswa_bysiswa($siswa_id)
  {

    $this->db->select('`bk_siswapelanggaran`.*,ppdb_siswa.namasiswa,ppdb_siswa.hpayah,m_kelas.nama_kelas,bk_pelanggaran.pelanggaran,bk_kategori_pelanggaran.kategori');
    $this->db->from('bk_siswapelanggaran');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswapelanggaran.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswapelanggaran.kelas_id','left');
    $this->db->join('bk_pelanggaran', 'bk_pelanggaran.id = bk_siswapelanggaran.pelanggaran_id','left');
    $this->db->join('bk_kategori_pelanggaran', 'bk_kategori_pelanggaran.id = bk_pelanggaran.kategori_id','left');
    $this->db->where('bk_siswapelanggaran.siswa_id',$siswa_id);
    return $this->db->get()->result_array();
  }

  public function siswagetDatabyId($siswa_id)
  {

    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $where = '(ppdb_siswa.id='.$siswa_id.')';
    $this->db->where($where);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function get_tingkat()
  {
    $this->db->select('`bk_tingkat`.*');
    $this->db->from('bk_tingkat');
    $this->db->order_by('bk_tingkat.id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_prestasi_siswa()
  {

    $this->db->select('`bk_siswaprestasi`.*,ppdb_siswa.namasiswa,m_kelas.nama_kelas,bk_tingkat.tingkat');
    $this->db->from('bk_siswaprestasi');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswaprestasi.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswaprestasi.kelas_id','left');
    $this->db->join('bk_tingkat', 'bk_tingkat.id = bk_siswaprestasi.tingkat_id','left');
    $this->db->order_by('bk_siswaprestasi.tanggal', 'desc');
    return $this->db->get()->result_array();
  }
  public function get_prestasi_siswa_byId($id)
  {

    $this->db->select('`bk_siswaprestasi`.*,ppdb_siswa.namasiswa,ppdb_siswa.hpayah,ppdb_siswa.emailortu,m_kelas.nama_kelas,bk_tingkat.tingkat');
    $this->db->from('bk_siswaprestasi');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswaprestasi.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswaprestasi.kelas_id','left');
    $this->db->join('bk_tingkat', 'bk_tingkat.id = bk_siswaprestasi.tingkat_id','left');
    $this->db->where('bk_siswaprestasi.id',$id);
    return $this->db->get()->row_array();
  }
  public function get_prestasi_siswa_bysiswa($siswa_id)
  {

    $this->db->select('`bk_siswaprestasi`.*,ppdb_siswa.namasiswa,ppdb_siswa.hpayah,m_kelas.nama_kelas,bk_tingkat.tingkat');
    $this->db->from('bk_siswaprestasi');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswaprestasi.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswaprestasi.kelas_id','left');
    $this->db->join('bk_tingkat', 'bk_tingkat.id = bk_siswaprestasi.tingkat_id','left');
    $this->db->where('bk_siswaprestasi.siswa_id',$siswa_id);
    return $this->db->get()->result_array();
  }
  public function get_prestasi_siswa_tanggal($daritanggal,$sampaitanggal)
  {
    $this->db->select('`bk_siswaprestasi`.*,ppdb_siswa.namasiswa,ppdb_siswa.hpayah,m_kelas.nama_kelas,bk_tingkat.tingkat');
    $this->db->from('bk_siswaprestasi');
    $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswaprestasi.siswa_id','left');
    $this->db->join('m_kelas', 'm_kelas.id = bk_siswaprestasi.kelas_id','left');
    $this->db->join('bk_tingkat', 'bk_tingkat.id = bk_siswaprestasi.tingkat_id','left');
    $this->db->where('bk_siswaprestasi.tanggal>=',$daritanggal);
    $this->db->where('bk_siswaprestasi.tanggal<=',$sampaitanggal);
    return $this->db->get()->result_array();
  }
  //end
}