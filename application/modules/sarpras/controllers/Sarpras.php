<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Sarpras extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
 // GEDUNG
 public function gedung()
 {
   $data['title'] = 'Gedung';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('sarpras_model', 'sarpras_model');
   $data['gedung'] = $this->sarpras_model->get_gedung();

   $this->form_validation->set_rules('kode_gedung', 'kode_gedung', 'required|is_unique[sar_gedung.kode_gedung]');
   $this->form_validation->set_rules('nama_gedung', 'nama_gedung', 'required');
   $this->form_validation->set_rules('lantai', 'lantai', 'required');

   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('gedung', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kode_gedung' => $this->input->post('kode_gedung'),
         'nama_gedung' => $this->input->post('nama_gedung'),
         'lantai' => $this->input->post('lantai'),
         'panjang' => $this->input->post('panjang'),
         'lebar' => $this->input->post('lebar'),
         'tinggi' => $this->input->post('tinggi')
          ];
          $this->db->insert('sar_gedung', $data);
 //log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_gedung');
activity_log($user,'Tambah Gedung',$item);
//end log           
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/gedung');
   }
 }
 public function editgedung($id)
  {
    $data['title'] = 'Gedung';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['getgedung'] = $this->sarpras_model->get_gedung_byId($id);


    $this->form_validation->set_rules('kode_gedung', 'kode_gedung', 'required');
    $this->form_validation->set_rules('nama_gedung', 'nama_gedung', 'required');
    $this->form_validation->set_rules('lantai', 'lantai', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('editgedung', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'kode_gedung' => $this->input->post('kode_gedung'),
        'nama_gedung' => $this->input->post('nama_gedung'),
        'lantai' => $this->input->post('lantai'),
        'panjang' => $this->input->post('panjang'),
        'lebar' => $this->input->post('lebar'),
        'tinggi' => $this->input->post('tinggi')
         ];
          $this->db->where('id', $id);
          $this->db->update('sar_gedung', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_gedung');
activity_log($user,'Edit Gedung',$item);
//end log 
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/gedung');
    }
  }
  public function hapusgedung($id)
  {
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Gedung',$item);
//end log     
    $this->db->where('id', $id);
    $this->db->delete('sar_gedung');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('sarpras/gedung');
  }
  //Ruangan
  public function ruangan()
  {
    $data['title'] = 'Ruangan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['gedung'] = $this->sarpras_model->get_gedung();
    $data['ruangan'] = $this->sarpras_model->get_ruangan();
    $data['sekolah'] =  $this->db->get('m_sekolah')->result_array();
    
    $this->form_validation->set_rules('gedung_id', 'gedung_id', 'required');
    $this->form_validation->set_rules('sekolah_id', 'sekolah_id', 'required');
    $this->form_validation->set_rules('kode_ruangan', 'kode_ruangan', 'required|is_unique[sar_ruangan.kode_ruangan]');
    $this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'required');
 
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('ruangan', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|jpeg';
        $config['upload_path'] = './assets/images/sarpras/';
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
      /*
            $old_image = $data['getnamabarang']['image'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/images/profile/' . $old_image);
            }
            */
            $new_image = $this->upload->data('file_name');
          //  $this->db->set('image', $new_image);
                //ukuran resize
                $this->load->library('image_lib'); 

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './assets/images/sarpras/' . $new_image;
                $config['new_image'] = './assets/images/sarpras/' . $new_image;
                $config2['create_thumb'] = FALSE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 400;
        
                $this->image_lib->clear();
                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                //ukuran resize
        } else {
            echo  $this->upload->display_errors();
        }
    }else{
      $new_image='default.jpg';
    }
        $data = [
          'gedung_id' => $this->input->post('gedung_id'),
          'sekolah_id' => $this->input->post('sekolah_id'),
          'kode_ruangan' => $this->input->post('kode_ruangan'),
          'nama_ruangan' => $this->input->post('nama_ruangan'),
          'image' => $new_image
           ];
           $this->db->insert('sar_ruangan', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_ruangan');
activity_log($user,'Tambah Ruangan',$item);
//end log   
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('sarpras/ruangan');
    }
  }
  public function editruangan($id)
  {
    $data['title'] = 'Ruangan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['gedung'] = $this->sarpras_model->get_gedung();
    $data['getruangan'] = $this->sarpras_model->get_ruangan_byId($id);    
    $data['sekolah'] =  $this->db->get('m_sekolah')->result_array();


    $this->form_validation->set_rules('gedung_id', 'gedung_id', 'required');
    $this->form_validation->set_rules('sekolah_id', 'sekolah_id', 'required');
    $this->form_validation->set_rules('kode_ruangan', 'kode_ruangan', 'required');
    $this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('editruangan', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|jpeg';
        $config['upload_path'] = './assets/images/sarpras/';
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $old_image = $data['getruangan']['image'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/images/sarpras/' . $old_image);
            }
            $new_image = $this->upload->data('file_name');
            $this->db->set('image', $new_image);
                            //ukuran resize
                            $this->load->library('image_lib');

                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = './assets/images/sarpras/' . $new_image;
                            $config['new_image'] = './assets/images/sarpras/' . $new_image;
                            $config2['create_thumb'] = FALSE;
                            $config2['maintain_ratio'] = TRUE;
                            $config2['width'] = 400;

                            $this->image_lib->clear();
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                            //ukuran resize
        } else {
            echo  $this->upload->display_errors();
        }
    }
      $data = [
        'gedung_id' => $this->input->post('gedung_id'),
        'sekolah_id' => $this->input->post('sekolah_id'),
        'kode_ruangan' => $this->input->post('kode_ruangan'),
        'nama_ruangan' => $this->input->post('nama_ruangan')
         ];
          $this->db->where('id', $id);
          $this->db->update('sar_ruangan', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_ruangan');
activity_log($user,'Edit Ruangan',$item);
//end log 
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/ruangan');
    }
  }

  public function hapusruangan($id)
  {
 //log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Ruangan',$item);
//end log    
    $this->db->where('id', $id);
    $this->db->delete('sar_ruangan');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('sarpras/ruangan');
  }

  //sumberdana
  public function sumberdana()
  {
    $data['title'] = 'Sumber Dana';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['sumberdana'] = $this->sarpras_model->get_sumberdana();
    
    $this->form_validation->set_rules('sumber_dana', 'sumber_dana', 'required|is_unique[sar_sumberdana.sumber_dana]');
 
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('sumberdana', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $data = [
          'sumber_dana' => $this->input->post('sumber_dana')
           ];
           $this->db->insert('sar_sumberdana', $data);
 //log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('sumber_dana');
activity_log($user,'Tambah Sumber Dana',$item);
//end log            
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('sarpras/sumberdana');
    }
  }
  public function editsumberdana($id)
  {
    $data['title'] = 'Sumber Dana';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['getsumberdana'] = $this->sarpras_model->get_sumberdana_byId($id);


    $this->form_validation->set_rules('sumber_dana', 'sumber_dana', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('editsumberdana', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'sumber_dana' => $this->input->post('sumber_dana'),
         ];
          $this->db->where('id', $id);
          $this->db->update('sar_sumberdana', $data);
 //log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('sumber_dana');
activity_log($user,'Edit Sumber Dana',$item);
//end log          
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/sumberdana');
    }
  }

  public function hapussumberdana($id)
  {
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Sumber Dana',$item);
//end log    
    $this->db->where('id', $id);
    $this->db->delete('sar_sumberdana');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('sarpras/sumberdana');
  }
 //kondisi
 public function kondisi()
 {
   $data['title'] = 'Kondisi Barang';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('sarpras_model', 'sarpras_model');
   $data['kondisi'] = $this->sarpras_model->get_kondisi();
   
   $this->form_validation->set_rules('kondisi', 'kondisi', 'required|is_unique[sar_kondisi.kondisi]');

   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('kondisi', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kondisi' => $this->input->post('kondisi')
          ];
          $this->db->insert('sar_kondisi', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('kondisi');
activity_log($user,'Tambah Kondisi',$item);
//end log            
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/kondisi');
   }
 }
 public function editkondisi($id)
 {
   $data['title'] = 'Kondisi Barang';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   
   $this->load->model('sarpras_model', 'sarpras_model');
   $data['getkondisi'] = $this->sarpras_model->get_kondisi_byId($id);


   $this->form_validation->set_rules('kondisi', 'kondisi', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('editkondisi', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
     $data = [
       'kondisi' => $this->input->post('kondisi'),
        ];
         $this->db->where('id', $id);
         $this->db->update('sar_kondisi', $data);
 //log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('kondisi');
activity_log($user,'Edit Kondisi',$item);
//end log
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('sarpras/kondisi');
   }
 }

 public function hapuskondisi($id)
 {
 //log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Kondisi',$item);
//end log
   $this->db->where('id', $id);
   $this->db->delete('sar_kondisi');
   $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
   redirect('sarpras/kondisi');
 }
  //namabarang
  public function namabarang()
  {
    $data['title'] = 'Nama Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['namabarang'] = $this->sarpras_model->get_namabarang();
    
    $this->form_validation->set_rules('namabarang', 'namabarang', 'required|is_unique[sar_namabarang.namabarang]');
 
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('namabarang', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|jpeg';
        $config['upload_path'] = './assets/images/sarpras/';
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
      /*
            $old_image = $data['getnamabarang']['image'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/images/profile/' . $old_image);
            }
            */
            $new_image = $this->upload->data('file_name');
          //  $this->db->set('image', $new_image);
                //ukuran resize
                $this->load->library('image_lib');

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './assets/images/sarpras/' . $new_image;
                $config['new_image'] = './assets/images/sarpras/' . $new_image;
                $config2['create_thumb'] = FALSE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 200;
        
                $this->image_lib->clear();
                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                //ukuran resize
        } else {
            echo  $this->upload->display_errors();
        }
    }else{
      $new_image='default.jpg';
    }

        $data = [
          'namabarang' => $this->input->post('namabarang'),
          'image' => $new_image
           ];
           $this->db->insert('sar_namabarang', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('namabarang');
activity_log($user,'Tambah Barang',$item);
//end log
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('sarpras/namabarang');
    }
  }
  public function editnamabarang($id)
  {
    $data['title'] = 'Nama Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['getnamabarang'] = $this->sarpras_model->get_namabarang_byId($id);


    $this->form_validation->set_rules('namabarang', 'namabarang', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('editnamabarang', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $namabarang = $this->input->post('namabarang');
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|jpeg';
        $config['upload_path'] = './assets/images/sarpras/';
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $old_image = $data['getnamabarang']['image'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/images/sarpras/' . $old_image);
            }
            $new_image = $this->upload->data('file_name');
            $this->db->set('image', $new_image);
                            //ukuran resize
                            $this->load->library('image_lib');

                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = './assets/images/sarpras/' . $new_image;
                            $config['new_image'] = './assets/images/sarpras/' . $new_image;
                            $config2['create_thumb'] = FALSE;
                            $config2['maintain_ratio'] = TRUE;
                            $config2['width'] = 200;
                    
                            $this->image_lib->clear();
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                            //ukuran resize
        } else {
            echo  $this->upload->display_errors();
        }
    }
    $this->db->set('namabarang', $namabarang);
    $this->db->where('id', $id);
    $this->db->update('sar_namabarang');
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('namabarang');
activity_log($user,'Edit Barang',$item);
//end log
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/namabarang');
    }
  }

  public function hapusnamabarang($id)
  {
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Barang',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('sar_namabarang');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('sarpras/namabarang');
  }
  // supplier
 public function supplier()
 {
   $data['title'] = 'Supplier';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('sarpras_model', 'sarpras_model');
   $data['supplier'] = $this->sarpras_model->get_supplier();

   $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[sar_supplier.kode]');
   $this->form_validation->set_rules('nama', 'nama', 'required');
   $this->form_validation->set_rules('alamat', 'alamat', 'required');
   $this->form_validation->set_rules('telepon', 'telepon', 'required');

   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('supplier', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kode' => $this->input->post('kode'),
         'nama' => $this->input->post('nama'),
         'alamat' => $this->input->post('alamat'),
         'telepon' => $this->input->post('telepon')
          ];
          $this->db->insert('sar_supplier', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Tambah Supplier',$item);
//end log
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/supplier');
   }
 }
 public function editsupplier($id)
  {
    $data['title'] = 'Supplier';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['getsupplier'] = $this->sarpras_model->get_supplier_byId($id);

    $this->form_validation->set_rules('kode', 'kode', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('telepon', 'telepon', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('editsupplier', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'kode' => $this->input->post('kode'),
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'telepon' => $this->input->post('telepon')
         ];
          $this->db->where('id', $id);
          $this->db->update('sar_supplier', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Edit Supplier',$item);
//end log
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('sarpras/supplier');
    }
  }
  public function hapussupplier($id)
  {
//log act
$data['table'] = $this->db->get_where('sar_supplier', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama'];
activity_log($user,'Hapus Supplier',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('sar_supplier');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('sarpras/supplier');
  }
   //inventaris
   public function inventaris()
   {
     $data['title'] = 'Inventaris';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('sarpras_model', 'sarpras_model');
     $data['namabarang'] = $this->sarpras_model->get_namabarang();
     $data['kondisibarang'] = $this->sarpras_model->get_kondisi();
     $data['sumberdana'] = $this->sarpras_model->get_sumberdana();
     $data['supplier'] = $this->sarpras_model->get_supplier();
     $data['tanggal'] = date('Y-m-d');
     $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
     $this->form_validation->set_rules('kode_inv', 'kode_inv', 'required');
     $this->form_validation->set_rules('barang_id', 'barang_id', 'required');
     $this->form_validation->set_rules('kondisi_id', 'kondisi_id', 'required');
     $this->form_validation->set_rules('sumber_id', 'sumber_id', 'required');
     $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
     $this->form_validation->set_rules('harga', 'harga', 'required');
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('inventaris', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
     }else{
            $data = [
           'tanggal' => $this->input->post('tanggal'),
           'kode_inv' => $this->input->post('kode_inv'),
           'barang_id' => $this->input->post('barang_id'),
           'kondisi_id' => $this->input->post('kondisi_id'),
           'sumber_id' => $this->input->post('sumber_id'),
            'supplier_id' => $this->input->post('supplier_id'),
           'jumlah' => $this->input->post('jumlah'),
           'harga' => $this->input->post('harga'),
           'umur_bulan' => $this->input->post('umur_bulan'),
            ];
            $this->db->insert('sar_inventaris', $data);
//log act
//$data['table'] = $this->db->get_where('sar_supplier', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Tambah Inventaris',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('sarpras/inventaris');
     }
   }

   public function detail_inventaris($barang_id)
   {
     $data['title'] = 'Inventaris';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('sarpras_model', 'sarpras_model');
     $data['namabarang'] = $this->sarpras_model->get_namabarang_byId($barang_id);
     $data['kondisibarang'] = $this->sarpras_model->get_kondisi();
     $data['sumberdana'] = $this->sarpras_model->get_sumberdana();
     $data['supplier'] = $this->sarpras_model->get_supplier();
     $data['tanggal'] = date('Y-m-d');
     $data['get_inventaris_barang'] = $this->sarpras_model->get_inventaris_barang($barang_id);
     $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
     $this->form_validation->set_rules('kode_inv', 'kode_inv', 'required');
     $this->form_validation->set_rules('barang_id', 'barang_id', 'required');
     $this->form_validation->set_rules('kondisi_id', 'kondisi_id', 'required');
     $this->form_validation->set_rules('sumber_id', 'sumber_id', 'required');
     $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
     $this->form_validation->set_rules('harga', 'harga', 'required');
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('detail_inventaris', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
     }
     else{
        $data = [
        'tanggal' => $this->input->post('tanggal'),
        'kode_inv' => $this->input->post('kode_inv'),
        'barang_id' => $this->input->post('barang_id'),
        'kondisi_id' => $this->input->post('kondisi_id'),
        'sumber_id' => $this->input->post('sumber_id'),
        'supplier_id' => $this->input->post('supplier_id'),
        'jumlah' => $this->input->post('jumlah'),
        'harga' => $this->input->post('harga'),
        'umur_bulan' => $this->input->post('umur_bulan'),
         ];
         $this->db->insert('sar_inventaris', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('sarpras/detail_inventaris/'.$barang_id);
  }
   }
   public function editinventaris($barang_id,$id)
   {
     $data['title'] = 'Inventaris';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('sarpras_model', 'sarpras_model');
     $data['namabarang'] = $this->sarpras_model->get_namabarang_byId($barang_id);
     $data['kondisibarang'] = $this->sarpras_model->get_kondisi();
     $data['sumberdana'] = $this->sarpras_model->get_sumberdana();
     $data['supplier'] = $this->sarpras_model->get_supplier();
     $data['tanggal'] = date('Y-m-d');
     $data['get_inventaris_barang'] = $this->sarpras_model->get_inventaris_barang_byId($id);
     $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
     $this->form_validation->set_rules('kode_inv', 'kode_inv', 'required');
     $this->form_validation->set_rules('barang_id', 'barang_id', 'required');
     $this->form_validation->set_rules('kondisi_id', 'kondisi_id', 'required');
     $this->form_validation->set_rules('sumber_id', 'sumber_id', 'required');
     $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
     $this->form_validation->set_rules('harga', 'harga', 'required');
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('edit_inventaris', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
     }
     else{
         $data = [
        'tanggal' => $this->input->post('tanggal'),
        'kode_inv' => $this->input->post('kode_inv'),
        'barang_id' => $this->input->post('barang_id'),
        'kondisi_id' => $this->input->post('kondisi_id'),
        'sumber_id' => $this->input->post('sumber_id'),
        'supplier_id' => $this->input->post('supplier_id'),
        'jumlah' => $this->input->post('jumlah'),
        'harga' => $this->input->post('harga'),
        'umur_bulan' => $this->input->post('umur_bulan'),
         ];
         $this->db->where('id', $id);
         $this->db->update('sar_inventaris', $data);
//log act
//$data['table'] = $this->db->get_where('sar_supplier', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Edit Inventaris',$item);
//end log
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('sarpras/detail_inventaris/'.$barang_id);
  }
   }
   public function hapusinventaris($barang_id,$id)
  {
//log act
//$data['table'] = $this->db->get_where('sar_supplier', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Inventaris',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('sar_inventaris');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('sarpras/detail_inventaris/'.$barang_id);
  }
  public function mutasi_masuk()
  {
    $data['title'] = 'Mutasi Masuk';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_namabarang();
    $data['get_ruangan'] = $this->sarpras_model->get_ruangan();
    $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[sar_mutasi_barang.kode]');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_rules('ruangan_id', 'ruangan_id', 'required');
     if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('mutasi_masuk', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
     }else{

       if ($this->cart->contents()){
       foreach ($this->cart->contents() as $item) {
        $data=array(
          'kode' => $this->input->post('kode'),
          'tanggal' => $this->input->post('tanggal'),
          'barang_id' => $item['id'],
          'ruangan_id' => $this->input->post('ruangan_id'),
          'jumlah' => $item['qty']
          );
      $this->db->insert('sar_mutasi_barang',$data);
     }
     $this->cart->destroy();  
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Error Harus ada Barang Mutasi !</div>');
    }
     redirect('sarpras/mutasi_masuk');
  }
}
  function add_to_cart(){ //fungsi Add To Cart
    $barang_id=$this->input->post('barang_id');
    $jumlah=$this->input->post('jumlah');
    $sisastok = get_jumlahinventaris($barang_id)-get_jumlahmutasi($barang_id);
    if($jumlah>$sisastok){
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Error Jumlah Lebih Besar !</div>');
    }else{
    $data = array(
        'id' => $this->input->post('barang_id'), 
        'name' => $this->input->post('nama_barang'),
        'price' => $this->input->post('harga'),
        'qty' => $this->input->post('jumlah')
    );
 $this->cart->insert($data);
//tampilkan cart setelah added
  }
    redirect('sarpras/mutasi_masuk');
}

function hapus_cart($rowid){ //fungsi untuk menghapus item cart
  $data = array(
      'rowid' => $rowid, 
      'qty' => 0, 
  );
  $this->cart->update($data);
  redirect('sarpras/mutasi_masuk');
}
public function mutasi_keluar()
  {
    $data['title'] = 'Mutasi Keluar';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_ruangan'] = $this->sarpras_model->get_ruangan();
    if($this->session->userdata('mutasi_asal')){
      $data['get_namabarang'] = $this->sarpras_model->get_barang_by_ruangan($this->session->userdata('mutasi_asal'));
      $data['getruangan'] = $this->sarpras_model->get_ruangan_byId($this->session->userdata('mutasi_asal'));
      }

    $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[sar_mutasi_barang.kode]');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
     if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('mutasi_keluar', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
     }else{

       if ($this->cart->contents()){
       foreach ($this->cart->contents() as $item) {
        $data=array(
          'kode' => $this->input->post('kode'),
          'tanggal' => $this->input->post('tanggal'),
          'barang_id' => $item['id'],
          'ruangan_id' => $this->input->post('ruangan_id'),
          'jumlah' => ($item['qty']*(-1))

          );
      $this->db->insert('sar_mutasi_barang',$data);
     }
     $this->cart->destroy();  
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
     $this->session->unset_userdata('mutasi_asal');
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Error Harus ada Barang Mutasi !</div>');
    }
     redirect('sarpras/mutasi_keluar');
  }
}
function add_to_cart2(){ //fungsi Add To Cart

  $barang_id = $this->input->post('barang_id');
  $ruangan_id = $this->input->post('ruangan_id');
  $jumlah = $this->input->post('jumlah');
  $this->load->model('sarpras_model', 'sarpras_model');
  $getstok = $this->sarpras_model-> cekstokbarangruangan($barang_id,$ruangan_id);
  if($getstok['stok'] < $jumlah){
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Error Item Mutasi harus lebih kecil dari Stok!</div>');
    redirect('sarpras/mutasi_keluar');

  }else{
  $data = array(
      'id' => $this->input->post('barang_id'), 
      'name' => $this->input->post('nama_barang'),
      'price' => '1',
      'qty' => $this->input->post('jumlah')
  );
$this->cart->insert($data);
//tampilkan cart setelah added
redirect('sarpras/mutasi_keluar');
  }

}

function hapus_cart2($rowid){ //fungsi untuk menghapus item cart
$data = array(
    'rowid' => $rowid, 
    'qty' => 0, 
);
$this->cart->update($data);
redirect('sarpras/mutasi_keluar');
}
public function mutasi_asal($id)
 {
  $this->cart->destroy();
    $this->session->set_userdata('mutasi_asal',$id);
    redirect('sarpras/mutasi_keluar');
 }

public function laporan_mutasi()
  {
    $data['title'] = 'Laporan Mutasi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $daritanggal = date('Y-m-01');
    $sampaitanggal = date('Y-m-d');
    if (isset($_POST['submit'])) {
      $daritanggal = $this->input->post('daritanggal');
      $sampaitanggal = $this->input->post('sampaitanggal');
      $data['jumlah']='';
      $data['keterangan']='';
      $data['mutasibarang'] = $this->sarpras_model->mutasibarang_darisampai($daritanggal, $sampaitanggal);
    }
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_mutasi', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanmutasi_print($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Mutasi';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['mutasibarang'] = $this->sarpras_model->mutasibarang_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanmutasi_print', $data);
  }
  public function laporanmutasi_excel($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Mutasi';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['mutasibarang'] = $this->sarpras_model->mutasibarang_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanmutasi_excel', $data);
  }

  public function laporanmutasi_pdf($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Mutasi';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['mutasibarang'] = $this->sarpras_model->mutasibarang_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $html = $this->load->view('laporanmutasi_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanmutasi_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }

  public function laporan_barang($ruangan_id='')
  {
    $data['title'] = 'Laporan Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_ruangan'] = $this->sarpras_model->get_ruangan();

      $data['get_namabarang'] = $this->sarpras_model->get_barang_by_ruangan($ruangan_id);
      $data['getruangan'] = $this->sarpras_model->get_ruangan_byId($ruangan_id);
      $data['ruangan_id']=$ruangan_id;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_barang', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanbarang_print($ruangan_id)
  {
    $data['title'] = 'Laporan Barang';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_barang_by_ruangan($ruangan_id);
    $data['getruangan'] = $this->sarpras_model->get_ruangan_byId($ruangan_id);
    $data['ruangan_id']=$ruangan_id;

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanbarang_print', $data);
  }
  public function laporanbarang_excel($ruangan_id)
  {
    $data['title'] = 'Laporan Barang';
    $this->load->model('sarpras_model', 'sarpras_model');
      $data['get_namabarang'] = $this->sarpras_model->get_barang_by_ruangan($ruangan_id);
      $data['getruangan'] = $this->sarpras_model->get_ruangan_byId($ruangan_id);
      $data['ruangan_id']=$ruangan_id;

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanbarang_excel', $data);
  }

  public function laporanbarang_pdf($ruangan_id)
  {
    $data['title'] = 'Laporan Barang';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_barang_by_ruangan($ruangan_id);
    $data['getruangan'] = $this->sarpras_model->get_ruangan_byId($ruangan_id);
    $data['ruangan_id']=$ruangan_id;

    $html = $this->load->view('laporanbarang_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanbarang_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
  public function rekap_barang()
  {
    $data['title'] = 'Rekap Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');

    $data['get_namabarang'] = $this->sarpras_model->get_namabarang();

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('rekap_barang', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanrekapbarang_print()
  {
    $data['title'] = 'Rekap Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_namabarang();


    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanrekapbarang_print', $data);
  }
  public function laporanrekapbarang_excel($barang_id)
  {
    $data['title'] = 'Rekap Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_namabarang();

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanrekapbarang_excel', $data);
  }

  public function laporanrekapbarang_pdf($barang_id)
  {
    $data['title'] = 'Rekap Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_namabarang();

    $html = $this->load->view('laporanrekapbarang_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanrekapbarang_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
  public function rekap_lokasi_barang($barang_id)
  {
    $data['title'] = 'Rekap Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_barang_by_mutasi($barang_id);

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('rekap_lokasi_barang', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanlokasibarang_print($barang_id)
  {
    $data['title'] = 'Rekap Lokasi Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_barang_by_mutasi($barang_id);


    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanlokasibarang_print', $data);
  }
  public function laporanlokasibarang_excel($barang_id)
  {
    $data['title'] = 'Rekap Lokasi Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_barang_by_mutasi($barang_id);

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanlokasibarang_excel', $data);
  }

  public function laporanlokasibarang_pdf($barang_id)
  {
    $data['title'] = 'Rekap Lokasi Barang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_barang_by_mutasi($barang_id);

    $html = $this->load->view('laporanlokasibarang_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanlokasibarang_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }

  public function mutasi_rusak()
  {
    $data['title'] = 'Mutasi Rusak';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['get_namabarang'] = $this->sarpras_model->get_inventaris_all_group();
    $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[sar_mutasi_rusak.kode]');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
     if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('mutasi_rusak', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
     }else{

       if ($this->cart->contents()){
   //     $this->cart->destroy();  
       foreach ($this->cart->contents() as $item) {
        $data=array(
          'kode' => $this->input->post('kode'),
          'tanggal' => $this->input->post('tanggal'),
          'kode_inv' => $item['id'],
          'barang_id' => $item['price'],
          'keterangan' => $this->input->post('keterangan'),
          'jumlah' => $item['qty']
          );
      $this->db->insert('sar_mutasi_rusak',$data);
     }
     foreach ($this->cart->contents() as $item) {
      $datainv=array(
        'kode_inv' => $item['id'],
        'barang_id' => $item['price'],
        'jumlah' => $item['qty']*(-1),
        'kondisi_id' => $item['kondisi_id'],
        'supplier_id' => $item['supplier_id'],
        'sumber_id' => $item['sumber_id'],
        'harga' => $item['harga'],
        'umur_bulan' => $item['umur_bulan']
        );
    $this->db->insert('sar_inventaris',$datainv);
   }
   
   $this->cart->destroy(); 
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Error Harus ada Barang Mutasi !</div>');
    }
     redirect('sarpras/mutasi_rusak');
  }
}
  function add_to_cart_rusak(){ //fungsi Add To Cart
    $kode_inv=$this->input->post('kode_inv');
    $namabarang=$this->input->post('namabarang');
    $barang_id=$this->input->post('barang_id');
    $jumlah=$this->input->post('jumlah');
    $kondisi_id=$this->input->post('kondisi_id');
    $supplier_id=$this->input->post('supplier_id');
    $sumber_id=$this->input->post('sumber_id');
    $harga=$this->input->post('harga');
    $umur_bulan=$this->input->post('umur_bulan');
    $data = array(
        'id' => $this->input->post('kode_inv'), 
        'name' => $this->input->post('namabarang'),
        'price' => $this->input->post('barang_id'),
        'qty' => $this->input->post('jumlah'),
        'kondisi_id' => $this->input->post('kondisi_id'),
        'supplier_id' => $this->input->post('supplier_id'),
        'sumber_id' => $this->input->post('sumber_id'),
        'harga' => $this->input->post('harga'),
        'umur_bulan' => $this->input->post('umur_bulan')
    );
 $this->cart->insert($data);
//tampilkan cart setelah added
    redirect('sarpras/mutasi_rusak');
}

function hapus_cart_rusak($rowid){ //fungsi untuk menghapus item cart
  $data = array(
      'rowid' => $rowid, 
      'qty' => 0, 
  );
  $this->cart->update($data);
  redirect('sarpras/mutasi_rusak');
}

public function laporan_mutasi_rusak()
  {
    $data['title'] = 'Laporan Mutasi Rusak';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('sarpras_model', 'sarpras_model');
    $daritanggal = date('Y-m-01');
    $sampaitanggal = date('Y-m-d');
    if (isset($_POST['submit'])) {
      $daritanggal = $this->input->post('daritanggal');
      $sampaitanggal = $this->input->post('sampaitanggal');
      $data['jumlah']='';
      $data['keterangan']='';
      $data['mutasibarang'] = $this->sarpras_model->mutasibarangrusak_darisampai($daritanggal, $sampaitanggal);
    }
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_mutasi_rusak', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanmutasirusak_print($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Mutasi Rusak';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['mutasibarang'] = $this->sarpras_model->mutasibarangrusak_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanmutasirusak_print', $data);
  }
  public function laporanmutasirusak_excel($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Mutasi Rusak';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['mutasibarang'] = $this->sarpras_model->mutasibarangrusak_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanmutasirusak_excel', $data);
  }

  public function laporanmutasirusak_pdf($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Mutasi Rusak';
    $this->load->model('sarpras_model', 'sarpras_model');
    $data['mutasibarang'] = $this->sarpras_model->mutasibarangrusak_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $html = $this->load->view('laporanmutasirusak_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanmutasirusak_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
//cetak_label
public function cetak_label()
{
  $data['title'] = 'Cetak Label';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('sarpras_model', 'sarpras_model');
  $data['namabarang'] = $this->sarpras_model->get_namabarang();

  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('cetak_label', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
}

public function detail_cetak_label($barang_id)
{
  $data['title'] = 'Cetak Label';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('sarpras_model', 'sarpras_model');
  $data['get_inventaris_barang'] = $this->sarpras_model->get_inventaris_barang_sum($barang_id);
  $this->form_validation->set_rules('jumlah_cetak', 'jumlah_cetak', 'required');
  if ($this->form_validation->run() == false) {
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('detail_cetak_label', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
  }else{
    $barang_id = $this->input->post('barang_id');
    $kode_inv = $this->input->post('kode_inv');
    $jumlah_cetak = $this->input->post('jumlah_cetak');
    redirect('sarpras/cetak_label_qr/'.$barang_id.'/'.$kode_inv.'/'.$jumlah_cetak);
  }
}

public function cetak_label_qr($barang_id,$kode_inv,$jumlah_cetak)
{
  $data['title'] = 'Cetak Label';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();

  $this->load->model('sarpras_model', 'sarpras_model');

  $data['get_inventaris_barang'] = $this->sarpras_model->get_inventaris_barang_bykode($kode_inv);

$data['kode_inv']=$kode_inv;
$data['jumlah_cetak']=$jumlah_cetak;
$namabarang=$data['get_inventaris_barang']['namabarang'];
$nama_supplier=$data['get_inventaris_barang']['nama_supplier'];
$tanggal=$data['get_inventaris_barang']['tanggal'];
$harga=$data['get_inventaris_barang']['harga'];
$exp=$data['get_inventaris_barang']['umur_bulan'];
$kondisi=$data['get_inventaris_barang']['kondisi'];
$data['tahuninv']=date('Y',strtotime($tanggal));
$data['barang_id']=$barang_id;
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$kode_inv.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = "
        KODE : $kode_inv
        NAMA : $namabarang
        SUPP : $nama_supplier
        TGL : $tanggal
        PRC : ".nominal($harga)."
        STA : ".($kondisi)."
        "; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
      $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 

//load yang ada di folder Zend
$this->zend->load('Zend/Barcode');
$imagedir     = './assets/images/barcode/'; //direktori penyimpanan barcode
// we can save it with image
$file = Zend_Barcode::draw('code128', 'image', array('text' => $kode_inv,'barHeight'=> 70,'factor'=>1,), array());
imagepng($file, "$imagedir/$kode_inv.png");
      

   $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('cetak_label_qr', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');

}

public function cetak_label_print($barang_id,$kode_inv,$jumlah_cetak)
{
  $data['title'] = 'Cetak Label';

  $this->load->model('sarpras_model', 'sarpras_model');
  $data['barang_id']=$barang_id;
  $data['kode_inv']=$kode_inv;
$data['jumlah_cetak']=$jumlah_cetak;
$data['cetak_awal']='0';
$data['get_inventaris_barang'] = $this->sarpras_model->get_inventaris_barang_bykode($kode_inv);
$tanggal=$data['get_inventaris_barang']['tanggal'];
$data['tahuninv']=date('Y',strtotime($tanggal));
  $this->load->view('cetak_label_print', $data);
}


public function cetak_labelbarcode_print($barang_id,$kode_inv,$jumlah_cetak)
{
  $data['title'] = 'Cetak Label';

  $this->load->model('sarpras_model', 'sarpras_model');
  $data['barang_id']=$barang_id;
  $data['kode_inv']=$kode_inv;
$data['jumlah_cetak']=$jumlah_cetak;
$data['cetak_awal']='0';
$data['get_inventaris_barang'] = $this->sarpras_model->get_inventaris_barang_bykode($kode_inv);
$tanggal=$data['get_inventaris_barang']['tanggal'];
$data['tahuninv']=date('Y',strtotime($tanggal));
  $this->load->view('cetak_labelbarcode_print', $data);
}
    //end
}