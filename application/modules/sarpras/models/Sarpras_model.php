<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarpras_model extends CI_Model
{
  public function get_gedung()
  {

    $this->db->select('`sar_gedung`.*');
    $this->db->from('sar_gedung');
    $this->db->order_by('sar_gedung.kode_gedung', 'asc');
    $this->db->order_by('sar_gedung.nama_gedung', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_gedung_byId($id)
  {

    $this->db->select('`sar_gedung`.*');
    $this->db->from('sar_gedung');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_supplier()
  {

    $this->db->select('`sar_supplier`.*');
    $this->db->from('sar_supplier');
    $this->db->order_by('sar_supplier.kode', 'asc');
    $this->db->order_by('sar_supplier.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_supplier_byId($id)
  {

    $this->db->select('`sar_supplier`.*');
    $this->db->from('sar_supplier');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_ruangan()
  {

    $this->db->select('`sar_ruangan`.*,sar_gedung.nama_gedung,m_sekolah.sekolah');
    $this->db->from('sar_ruangan');
    $this->db->join('sar_gedung', 'sar_gedung.id = sar_ruangan.gedung_id', 'left');
    $this->db->join('m_sekolah', 'm_sekolah.id = sar_ruangan.sekolah_id', 'left');
    $this->db->order_by('sar_ruangan.kode_ruangan', 'asc');
    $this->db->order_by('sar_ruangan.nama_ruangan', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_ruangan_byId($id)
  {

    $this->db->select('`sar_ruangan`.*,sar_gedung.nama_gedung,m_sekolah.sekolah');
    $this->db->from('sar_ruangan');
    $this->db->join('sar_gedung', 'sar_gedung.id = sar_ruangan.gedung_id', 'left');    
    $this->db->join('m_sekolah', 'm_sekolah.id = sar_ruangan.sekolah_id', 'left');
    $this->db->where('sar_ruangan.id',$id);
    return $this->db->get()->row_array();
  }
  public function get_ruangan_bymutasi($barang_id)
  {

    $this->db->select('`sar_mutasi_barang`.*');
    $this->db->from('sar_mutasi_barang');
    $this->db->where('sar_mutasi_barang.barang_id',$barang_id);
    $this->db->group_by('sar_mutasi_barang.ruangan_id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_sumberdana()
  {

    $this->db->select('`sar_sumberdana`.*');
    $this->db->from('sar_sumberdana');
    $this->db->order_by('sar_sumberdana.id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_sumberdana_byId($id)
  {

    $this->db->select('`sar_sumberdana`.*');
    $this->db->from('sar_sumberdana');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_kondisi()
  {

    $this->db->select('`sar_kondisi`.*');
    $this->db->from('sar_kondisi');
    $this->db->order_by('sar_kondisi.id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_kondisi_byId($id)
  {

    $this->db->select('`sar_kondisi`.*');
    $this->db->from('sar_kondisi');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_namabarang()
  {

    $this->db->select('`sar_namabarang`.*');
    $this->db->from('sar_namabarang');
    $this->db->order_by('sar_namabarang.namabarang', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_namabarang_byId($id)
  {

    $this->db->select('`sar_namabarang`.*');
    $this->db->from('sar_namabarang');
    $this->db->where('id',$id);
    $this->db->order_by('sar_namabarang.namabarang','asc');
    return $this->db->get()->row_array();
  }
  public function get_inventaris_all()
  {

    $this->db->select('`sar_inventaris`.*,sar_namabarang.namabarang,sar_kondisi.kondisi,sar_sumberdana.sumber_dana,sar_supplier.nama as nama_supplier,sar_namabarang.image');
    $this->db->from('sar_inventaris');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_inventaris.barang_id', 'left');
    $this->db->join('sar_kondisi', 'sar_kondisi.id = sar_inventaris.kondisi_id', 'left');
    $this->db->join('sar_sumberdana', 'sar_sumberdana.id = sar_inventaris.sumber_id', 'left');
    $this->db->join('sar_supplier', 'sar_supplier.id = sar_inventaris.supplier_id', 'left');
    $this->db->order_by('sar_inventaris.kode_inv','asc');
    return $this->db->get()->result_array();
  }
  public function get_inventaris_all_group()
  {

    $this->db->select('`sar_inventaris`.*,sar_namabarang.namabarang,sar_kondisi.kondisi,sar_sumberdana.sumber_dana,sar_supplier.nama as nama_supplier,sar_namabarang.image');
    $this->db->from('sar_inventaris');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_inventaris.barang_id', 'left');
    $this->db->join('sar_kondisi', 'sar_kondisi.id = sar_inventaris.kondisi_id', 'left');
    $this->db->join('sar_sumberdana', 'sar_sumberdana.id = sar_inventaris.sumber_id', 'left');
    $this->db->join('sar_supplier', 'sar_supplier.id = sar_inventaris.supplier_id', 'left');
    $this->db->group_by('sar_inventaris.kode_inv','asc');
    return $this->db->get()->result_array();
  }
  public function get_inventaris_barang($barang_id)
  {

    $this->db->select('`sar_inventaris`.*,sar_namabarang.namabarang,sar_kondisi.kondisi,sar_sumberdana.sumber_dana,sar_supplier.nama as nama_supplier');
    $this->db->from('sar_inventaris');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_inventaris.barang_id', 'left');
    $this->db->join('sar_kondisi', 'sar_kondisi.id = sar_inventaris.kondisi_id', 'left');
    $this->db->join('sar_sumberdana', 'sar_sumberdana.id = sar_inventaris.sumber_id', 'left');
    $this->db->join('sar_supplier', 'sar_supplier.id = sar_inventaris.supplier_id', 'left');
    $this->db->where('barang_id',$barang_id);
    $this->db->order_by('sar_inventaris.kode_inv','asc');
    return $this->db->get()->result_array();
  }

  public function get_inventaris_barang_byId($id)
  {

    $this->db->select('`sar_inventaris`.*');
    $this->db->from('sar_inventaris');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_inventaris_barang_bykode($kode_inv)
  {
    $this->db->select('sar_inventaris.kode_inv,sum(sar_inventaris.jumlah)as jumlah,sar_inventaris.kondisi_id,sar_inventaris.barang_id,sar_inventaris.sumber_id,sar_inventaris.supplier_id,sar_inventaris.harga,sar_inventaris.tanggal,sar_inventaris.umur_bulan,sar_namabarang.namabarang,sar_kondisi.kondisi,sar_sumberdana.sumber_dana,sar_supplier.nama as nama_supplier');
    $this->db->from('sar_inventaris');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_inventaris.barang_id', 'left');
    $this->db->join('sar_kondisi', 'sar_kondisi.id = sar_inventaris.kondisi_id', 'left');
    $this->db->join('sar_sumberdana', 'sar_sumberdana.id = sar_inventaris.sumber_id', 'left');
    $this->db->join('sar_supplier', 'sar_supplier.id = sar_inventaris.supplier_id', 'left');
    $this->db->where('sar_inventaris.kode_inv',$kode_inv);
    return $this->db->get()->row_array();
  }
  public function get_inventaris_barang_sum($barang_id)
  {

    $this->db->select('sar_inventaris.kode_inv,sum(sar_inventaris.jumlah)as jumlah,sar_inventaris.kondisi_id,sar_inventaris.barang_id,sar_inventaris.sumber_id,sar_inventaris.supplier_id,sar_inventaris.harga,sar_namabarang.namabarang,sar_kondisi.kondisi,sar_sumberdana.sumber_dana,sar_supplier.nama as nama_supplier');
    $this->db->from('sar_inventaris');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_inventaris.barang_id', 'left');
    $this->db->join('sar_kondisi', 'sar_kondisi.id = sar_inventaris.kondisi_id', 'left');
    $this->db->join('sar_sumberdana', 'sar_sumberdana.id = sar_inventaris.sumber_id', 'left');
    $this->db->join('sar_supplier', 'sar_supplier.id = sar_inventaris.supplier_id', 'left');
    $this->db->where('sar_inventaris.barang_id',$barang_id);
    $this->db->where('sar_inventaris.harga>','0');
    $this->db->group_by('sar_inventaris.kode_inv','asc');
    return $this->db->get()->result_array();
  }
  public function get_namabarang_keluar()
  {

    $this->db->select('sum(sar_mutasi_barang.jumlah)as stok,sar_mutasi_barang.barang_id,sar_mutasi_barang.ruangan_id,sar_namabarang.namabarang,sar_namabarang.image,sar_ruangan.nama_ruangan');
    $this->db->from('sar_mutasi_barang');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_mutasi_barang.barang_id', 'left');
    $this->db->join('sar_ruangan', 'sar_ruangan.id = sar_mutasi_barang.ruangan_id', 'left');
    $this->db->group_by('sar_ruangan.nama_ruangan', 'asc');
    $this->db->group_by('sar_namabarang.namabarang', 'asc');
    return $this->db->get()->result_array();
  }

  public function get_barang_by_ruangan($ruangan_id)
  {

    $this->db->select('sum(sar_mutasi_barang.jumlah)as stok,sar_mutasi_barang.barang_id,sar_mutasi_barang.ruangan_id,sar_namabarang.namabarang,sar_namabarang.image,sar_ruangan.nama_ruangan');
    $this->db->from('sar_mutasi_barang');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_mutasi_barang.barang_id', 'left');
    $this->db->join('sar_ruangan', 'sar_ruangan.id = sar_mutasi_barang.ruangan_id', 'left');
    $this->db->group_by('sar_ruangan.nama_ruangan', 'asc');
    $this->db->group_by('sar_namabarang.namabarang', 'asc');
    $this->db->where('sar_mutasi_barang.ruangan_id',$ruangan_id);
    return $this->db->get()->result_array();
  }

  public function cekstokbarangruangan($barang_id,$ruangan_id)
  {

    $this->db->select('sum(sar_mutasi_barang.jumlah)as stok');
    $this->db->from('sar_mutasi_barang');
    $this->db->where('sar_mutasi_barang.ruangan_id',$ruangan_id);
    $this->db->where('sar_mutasi_barang.barang_id',$barang_id);
    return $this->db->get()->row_array();
  }
  public function mutasibarang_darisampai($daritanggal, $sampaitanggal)
  {
    $this->db->select('`sar_mutasi_barang`.*,sar_namabarang.namabarang,sar_ruangan.nama_ruangan,m_sekolah.sekolah');
    $this->db->from('sar_mutasi_barang');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_mutasi_barang.barang_id');
    $this->db->join('sar_ruangan', 'sar_ruangan.id = sar_mutasi_barang.ruangan_id');
    $this->db->join('m_sekolah', 'm_sekolah.id = sar_ruangan.sekolah_id');
    $this->db->where('sar_mutasi_barang.tanggal >=', $daritanggal);
    $this->db->where('sar_mutasi_barang.tanggal <=', $sampaitanggal);
    $this->db->order_by('tanggal', 'asc');
    $this->db->order_by('kode', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_barang_by_mutasi($barang_id)
  {

    $this->db->select('sum(sar_mutasi_barang.jumlah)as stok,sar_mutasi_barang.barang_id,sar_mutasi_barang.ruangan_id,sar_namabarang.namabarang,sar_namabarang.image,sar_ruangan.nama_ruangan,m_sekolah.sekolah');
    $this->db->from('sar_mutasi_barang');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_mutasi_barang.barang_id', 'left');
    $this->db->join('sar_ruangan', 'sar_ruangan.id = sar_mutasi_barang.ruangan_id', 'left');
    $this->db->join('m_sekolah', 'm_sekolah.id = sar_ruangan.sekolah_id','left');
    $this->db->where('sar_mutasi_barang.barang_id', $barang_id);
    $this->db->group_by('sar_ruangan.nama_ruangan', 'asc');
    return $this->db->get()->result_array();
  }
  public function mutasibarangrusak_darisampai($daritanggal, $sampaitanggal)
  {
    $this->db->select('`sar_mutasi_rusak`.*,sar_namabarang.namabarang');
    $this->db->from('sar_mutasi_rusak');
    $this->db->join('sar_namabarang', 'sar_namabarang.id = sar_mutasi_rusak.barang_id');
    $this->db->where('sar_mutasi_rusak.tanggal >=', $daritanggal);
    $this->db->where('sar_mutasi_rusak.tanggal <=', $sampaitanggal);
    $this->db->order_by('tanggal', 'asc');
    $this->db->order_by('kode', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  //end
}