<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bukutamu_model extends CI_Model
{
  public function get_bukutamu()
  {

    $this->db->select('`bukutamu`.*');
    $this->db->from('bukutamu');
    $this->db->order_by('bukutamu.nomor', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_bukutamu_byId($id)
  {

    $this->db->select('`bukutamu`.*');
    $this->db->from('bukutamu');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_bukutamu_bytgl($tanggal)
  {

    $this->db->select('`bukutamu`.*');
    $this->db->from('bukutamu');
    $this->db->where('bukutamu.tanggal',$tanggal);
    return $this->db->get()->result_array();
  }
  public function bukutamu_darisampai($daritanggal, $sampaitanggal)
  {
    $this->db->select('`bukutamu`.*');
    $this->db->from('bukutamu');
    $this->db->where('bukutamu.tanggal >=', $daritanggal);
    $this->db->where('bukutamu.tanggal <=', $sampaitanggal);
    $this->db->order_by('nomor', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  //end
}