<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Preregistrasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

 public function index()
 {
   $data['title'] = 'Isi PPDB';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $data['tahunskrg']=date('Y');
   $data['tanggalskrg']=date('Y-m-d');
   $this->form_validation->set_rules('nama', 'nama', 'required');
   $this->form_validation->set_rules('hp', 'hp', 'required');
   $this->form_validation->set_rules('asalsekolah', 'asalsekolah', 'required');
   if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/auth/header', $data);
   $this->load->view('preregistrasi', $data);
   $this->load->view('themes/backend/auth/footer');
   }else{
       $data = [
         'tanggal' => $this->input->post('tanggal'),
         'nama' => $this->input->post('nama'),
         'hp' => $this->input->post('hp'),
         'asalsekolah' => $this->input->post('asalsekolah')
          ];
          $this->db->insert('ppdb_preregistrasi', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data telah tersimpan, Terima Kasih !</div>');
          redirect('preregistrasi');
   
  }
 }
 //end
}