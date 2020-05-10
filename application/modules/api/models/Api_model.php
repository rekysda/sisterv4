<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function getpresensisiswabyId($id,$tahunakademikdefault) {
        $this->db->select('*');
        $this->db->from('akad_siswaabsenharian');
        $this->db->where('siswa_id',$id);
        $this->db->where('tahunakademik_id',$tahunakademikdefault);
        $this->db->order_by('id','asc');
      return $this->db->get()->result_array();
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

// end
}