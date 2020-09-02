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
   $this->form_validation->set_rules('hp', 'hp', 'required|numeric');
   $this->form_validation->set_rules('asalsekolah', 'asalsekolah', 'required');
   $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[ppdb_preregistrasi.email]');
   if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/auth/header', $data);
   $this->load->view('preregistrasi', $data);
   $this->load->view('themes/backend/auth/footer');
   }else{
     // Jika Ada Gambar
     $upload_image = $_FILES['image']['name'];

     if ($upload_image) {
         $config['allowed_types'] = 'jpg|jpeg';
         $config['upload_path'] = './assets/images/siswa/';
         $config['file_name'] = round(microtime(true) * 1000);
         $this->load->library('upload', $config);
         if ($this->upload->do_upload('image')) {
             $old_image = $data['getsiswa']['image'];
             if ($old_image != 'default.jpg') {
                 if (file_exists('assets/images/siswa/' . $old_image)) {
                     unlink(FCPATH . 'assets/images/siswa/' . $old_image);
                 }
             }
             $new_image = $this->upload->data('file_name');
             //ukuran resize
   $this->load->library('image_lib');

   $config2['image_library'] = 'gd2';
   $config2['source_image'] = './assets/images/siswa/' . $new_image;
   $config['new_image'] = './assets/images/siswa/' . $new_image;
   $config2['create_thumb'] = FALSE;
   $config2['maintain_ratio'] = TRUE;
   $config2['width'] = 800;

   $this->image_lib->clear();
   $this->image_lib->initialize($config2);
   $this->image_lib->resize();
   //ukuran resize
         } else {
             echo  $this->upload->display_errors();
         }
       $data = [
         'tanggal' => $this->input->post('tanggal'),
         'nama' => $this->input->post('nama'),
         'hp' => $this->input->post('hp'),
         'asalsekolah' => $this->input->post('asalsekolah'),
         'email' => $this->input->post('email'),
         'buktibayar' => $new_image,
          ];
          $this->db->insert('ppdb_preregistrasi', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data telah tersimpan, Terima Kasih !</div>');
          redirect('preregistrasi');
        }
  }
 }
 //end
}