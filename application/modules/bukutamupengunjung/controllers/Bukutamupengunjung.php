<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Bukutamupengunjung extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }
  // surat_masuk
 public function index()
 {
   $data['title'] = 'Isi Buku Tamu';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $data['tahunskrg']=date('Y');
   $data['tanggalskrg']=date('Y-m-d');
   $data['selectpegawai'] = $this->db->get('m_pegawai')->result_array();
   $this->form_validation->set_rules('nama', 'nama', 'required');
   $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
   $this->form_validation->set_rules('hp', 'hp', 'required');
   $this->form_validation->set_rules('maksud', 'maksud', 'required');
   $this->form_validation->set_rules('diterima', 'diterima', 'required');
   if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/auth/header', $data);
   $this->load->view('bukutamupengunjung', $data);
   $this->load->view('themes/backend/auth/footer');
   }else{
    $data['pegawai'] = $this->db->get_where('m_pegawai', ['id' =>
    $this->input->post('diterima')])->row_array();
     $email = $data['pegawai']['email']; 
       $data = [
         'tahun' => $this->input->post('tahun'),
         'nomor' => $this->input->post('nomor'),
         'tanggal' => $this->input->post('tanggal'),
         'nama' => $this->input->post('nama'),
         'jabatan' => $this->input->post('jabatan'),
         'hp' => $this->input->post('hp'),
         'maksud' => $this->input->post('maksud'),
         'diterima' => $this->input->post('diterima'),
         'notifemail' => $email,
         'catatan' => $this->input->post('catatan')
          ];
          $this->db->insert('bukutamu', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data telah tersimpan, Terima Kasih !</div>');
          redirect('bukutamupengunjung');
   
  }
 }
 //end
}