<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Log_model extends CI_Model
{
        public function log_list()
        {
      
          $this->db->select('*');
          $this->db->from('tb_log');
          $this->db->limit('20');
          $this->db->order_by('tanggal','asc');
          $query = $this->db->get();
          return $query->result_array();
        }
        public function log_darisampai($daritanggal, $sampaitanggal)
        {
          
          $this->db->select('*');
          $this->db->from('tb_log');
          $this->db->where('tanggal>=', $daritanggal);
          $this->db->where('tanggal<=', $sampaitanggal);
          $this->db->order_by('tanggal','asc');
          $query = $this->db->get();
          return $query->result_array();
        }
      

}


