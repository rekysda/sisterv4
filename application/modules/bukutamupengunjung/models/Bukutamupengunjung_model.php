<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bukutamupengunjung_model extends CI_Model
{
  public function cekbukutamuskrg($hp,$tanggal)
  {

    $this->db->select('`bukutamu`.*');
    $this->db->from('bukutamu');
    $this->db->where('hp',$hp);
    $this->db->where('tanggal',$tanggal);
    return $this->db->get()->num_rows()();
  }

}