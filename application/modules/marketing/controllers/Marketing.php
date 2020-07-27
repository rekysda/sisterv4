<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
 // pengumuman
 public function pengumuman()
 {
     $data['title'] = 'Pengumuman';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();

     $data['pengumuman'] = $this->db->get('m_pengumuman')->result_array();
     $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[m_pengumuman.nama]', [
         'is_unique' => 'has already registered'
     ]);
     if ($this->form_validation->run() == false) {
         $this->load->view('themes/backend/header', $data);
         $this->load->view('themes/backend/sidebar', $data);
         $this->load->view('themes/backend/topbar', $data);
         $this->load->view('pengumuman', $data);
         $this->load->view('themes/backend/footer');
         $this->load->view('themes/backend/footerajax');
     } else {
         $data = [
             'nama' => $this->input->post('nama')
         ];
         $this->db->insert('m_pengumuman', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Tambah pengumuman',$item);
//end log 
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('akademik/pengumuman');
     }
 }

 public function editpengumuman($id)
 {
     $data['title'] = 'Pengumuman';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $data['getpengumuman'] = $this->db->get_where('m_pengumuman', ['id' =>
     $id])->row_array();
     $data['pengumuman'] = $this->db->get('m_pengumuman')->result_array();
     $this->form_validation->set_rules('nama', 'nama', 'required');
     if ($this->form_validation->run() == false) {
         $this->load->view('themes/backend/header', $data);
         $this->load->view('themes/backend/sidebar', $data);
         $this->load->view('themes/backend/topbar', $data);
         $this->load->view('editpengumuman', $data);
         $this->load->view('themes/backend/footer');
         $this->load->view('themes/backend/footerajax');
     } else {
         $data = [
             'nama' => $this->input->post('nama')
         ];
         $this->db->where('id', $id);
         $this->db->update('m_pengumuman', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Edit pengumuman',$item);
//end log 
         $this->session->set_flashdata(
             'message',
             '<div class="alert alert-success" role"alert">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             Data Saved !
             </div>'
         );
         redirect('akademik/pengumuman');
     }
 }

 public function hapuspengumuman($id)
 {
//log act
$data['table'] = $this->db->get_where('m_pengumuman', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama'];
activity_log($user,'Hapus pengumuman',$item);
//end log 
     $this->db->where('id', $id);
     $this->db->delete('m_pengumuman');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
     redirect('akademik/pengumuman');
 }
   
  
//end
}
