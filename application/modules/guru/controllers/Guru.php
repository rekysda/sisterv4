<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    //     is_guru_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Profile';

        $this->db->select('`m_pegawai`.*');
        $this->db->from('m_pegawai');
        $this->db->where('nip', $this->session->userdata('nip'));
        $data['user'] = $this->db->get()->row_array();


        $this->load->model('guru_model','guru_model');
        $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif();

        $this->load->view('themes/guru/header', $data);
        $this->load->view('themes/guru/sidebar', $data);
        $this->load->view('themes/guru/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('themes/guru/footer');
        $this->load->view('themes/guru/footerajax');
    }



    public function lihatdata()
    {
        $data['title'] = 'My Profile';
        $this->db->select('`m_pegawai`.*');
        $this->db->from('m_pegawai');
        $this->db->where('nip', $this->session->userdata('nip'));
        $data['user'] = $this->db->get()->row_array();
        $this->load->model('guru_model','guru_model');
        $data['s'] = $this->guru_model->pegawaiGetDatabyId($this->session->userdata('guru_id'));
        $this->load->view('themes/guru/header', $data);
        $this->load->view('themes/guru/sidebar', $data);
        $this->load->view('themes/guru/topbar', $data);
        $this->load->view('lihatdata', $data);
        $this->load->view('themes/guru/footer');
        $this->load->view('themes/guru/footerajax');
    }

    public function cetakprofile($id)
    {
        $data['logoslip'] = $this->db->get_where('m_logoslip', ['id' =>
        '1'])->row_array();
        $this->load->model('guru_model','guru_model');
        $data['s'] = $this->guru_model->pegawaiGetDatabyId($this->session->userdata('guru_id'));
        $this->load->view('cetakprofile', $data);
    }
// CAPAIAN BELAJAR
public function capaian_belajar($tahunakademik_id='',$kelas_id='')
{
  $data['title'] = 'Capaian Belajar';

  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $data['guru_id'] = $this->session->userdata('guru_id');
  $this->load->model('guru_model', 'guru_model');

  $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();

  $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));
  $data['getcapaianbelajar']='';
  $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
  $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
  if($tahunakademik_id<>''){
    $data['getcapaianbelajar'] = $this->guru_model->get_capaianbelajar_byIdkelas($tahunakademik_id,$kelas_id);
    if(!$data['getcapaianbelajar']){
    $data['getcapaianbelajar'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    }
    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
  }
  if ($this->form_validation->run() == false) {
    $this->load->view('themes/guru/header', $data);
    $this->load->view('themes/guru/sidebar', $data);
    $this->load->view('themes/guru/topbar', $data);
    $this->load->view('capaian_belajar', $data);
    $this->load->view('themes/guru/footer');
    $this->load->view('themes/guru/footerajax');
  }else{
    $tahunakademik_id = $this->input->post('tahunakademik_id');
    $kelas_id = $this->input->post('kelas_id');
    $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
    $data['kelas_id'] = $this->input->post('kelas_id');
    $data['getcapaianbelajar'] = $this->guru_model->get_capaianbelajar_byIdkelas($tahunakademik_id,$kelas_id);
    if(!$data['getcapaianbelajar']){
    $data['getcapaianbelajar'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
  }
    $this->load->view('themes/guru/header', $data);
    $this->load->view('themes/guru/sidebar', $data);
    $this->load->view('themes/guru/topbar', $data);
    $this->load->view('capaian_belajar', $data);
    $this->load->view('themes/guru/footer');
    $this->load->view('themes/guru/footerajax');
    redirect('guru/capaian_belajar/'.$tahunakademik_id.'/'.$kelas_id);
  }
}

public function capaian_belajar_add()
{
  $tahunakademik_id = $this->input->post('tahunakademik_id');
  $kelas_id = $this->input->post('kelas_id');
  $siswa_id = $this->input->post('siswa_id');
  $a1 = $this->input->post('a1');
  $c1 = $this->input->post('c1');
  $user_id = $this->input->post('user_id');
  $this->db->where('tahunakademik_id', $tahunakademik_id);
  $this->db->where('kelas_id', $kelas_id);
  $this->db->delete('r_nilai_sikap_semester');

 foreach($siswa_id as $key => $n){
  $b1='';
  $d1='';
   if($a1[$key]=='A'){
    $b1='Taat melaksanakan ibadah dengan sangat baik, menunjukkan sikap syukur, selalu berdoa sebelum dan sesudah melaksanakan aktifitas';
   }
   if($a1[$key]=='B'){
    $b1='Taat melaksanakan ibadah dengan baik, menunjukkan sikap syukur, selalu berdoa sebelum dan sesudah melaksanakan aktifitas';
   }
   if($c1[$key]=='A'){
    $d1='Mampu menjaga hubungan sangat baik dengan teman, guru, pegawai, suka menolong sesama, mampu bekerja sama dalam kegiatan positif di sekolah dengan baik.
    ';
   }
   if($c1[$key]=='B'){
    $d1='Mampu menjaga hubungan baik dengan teman, guru, pegawai, suka menolong sesama, mampu bekerja sama dalam kegiatan positif di sekolah dengan baik.
    ';
   }
 $datadetail = [
  'tahunakademik_id'     =>  $tahunakademik_id,
  'kelas_id'     =>  $kelas_id,
     'siswa_id'     =>  $n,
     'spiritual_predikat'     =>  $a1[$key],
     'spiritual_deskripsi'     =>  $b1,
     'sosial_predikat'     =>  $c1[$key],
     'sosial_deskripsi'     =>  $d1,
     'user_id'     =>  $user_id
];
 $this->db->insert('r_nilai_sikap_semester', $datadetail);
}
$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
redirect('guru/capaian_belajar/'.$tahunakademik_id.'/'.$kelas_id);

}

// CATATAN WALIKELAS
public function catatan_walikelas($tahunakademik_id='',$kelas_id='')
{
  $data['title'] = 'Catatan WaliKelas';
  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $data['guru_id'] = $this->session->userdata('guru_id');
  $this->load->model('guru_model', 'guru_model');
  $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
  $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));
  $data['getcatatanwalikelas']='';
  $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
  $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
  if($tahunakademik_id<>''){
    $data['getcatatanwalikelas'] = $this->guru_model->get_catatan_walikelas_byIdkelas($tahunakademik_id,$kelas_id);
    if(!$data['getcatatanwalikelas']){
      $data['getcatatanwalikelas'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    }
    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
  }
  if ($this->form_validation->run() == false) {
  $this->load->view('themes/guru/header', $data);
  $this->load->view('themes/guru/sidebar', $data);
  $this->load->view('themes/guru/topbar', $data);
  $this->load->view('catatan_walikelas', $data);
  $this->load->view('themes/guru/footer');
  $this->load->view('themes/guru/footerajax');
  }else{
    $tahunakademik_id = $this->input->post('tahunakademik_id');
    $kelas_id = $this->input->post('kelas_id');
    $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
    $data['kelas_id'] = $this->input->post('kelas_id');
    $data['getcatatanwalikelas'] = $this->guru_model->get_catatan_walikelas_byIdkelas($tahunakademik_id,$kelas_id);
    if(!$data['getcatatanwalikelas']){
      $data['getcatatanwalikelas'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    }
    $this->load->view('themes/guru/header', $data);
    $this->load->view('themes/guru/sidebar', $data);
    $this->load->view('themes/guru/topbar', $data);
    $this->load->view('catatan_walikelas', $data);
    $this->load->view('themes/guru/footer');
    $this->load->view('themes/guru/footerajax');
    redirect('guru/catatan_walikelas/'.$tahunakademik_id.'/'.$kelas_id);
  }
}

public function catatan_walikelas_add()
{
  $tahunakademik_id = $this->input->post('tahunakademik_id');
  $kelas_id = $this->input->post('kelas_id');
  $siswa_id = $this->input->post('siswa_id');
  $deskripsi = $this->input->post('deskripsi');
  $user_id = $this->input->post('user_id');
  $this->db->where('tahunakademik_id', $tahunakademik_id);
  $this->db->where('kelas_id', $kelas_id);
  $this->db->delete('r_catatan_walikelas');

 foreach($siswa_id as $key => $n){
 $datadetail = [
  'tahunakademik_id'     =>  $tahunakademik_id,
  'kelas_id'     =>  $kelas_id,
     'siswa_id'     =>  $n,
     'deskripsi'     =>  $deskripsi[$key],
     'user_id'     =>  $user_id
];
 $this->db->insert('r_catatan_walikelas', $datadetail);
}
$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
redirect('guru/catatan_walikelas/'.$tahunakademik_id.'/'.$kelas_id);

}

// extrakulikuler
public function extrakulikuler($tahunakademik_id='',$kelas_id='')
{
  $data['title'] = 'Extrakulikuler';
  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $data['guru_id'] = $this->session->userdata('guru_id');
  $this->load->model('guru_model', 'guru_model');
  $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
  $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));
  $data['get_extrakulikuler'] ='';
  $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
  $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
  if($tahunakademik_id<>''){
    $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    $data['get_extrakulikuler'] = $this->guru_model->get_extrakulikuler_byIdkelas($tahunakademik_id,$kelas_id);
    if(!$data['get_extrakulikuler']){
      $data['get_extrakulikuler'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    }
    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
  }
  if ($this->form_validation->run() == false) {
  $this->load->view('themes/guru/header', $data);
  $this->load->view('themes/guru/sidebar', $data);
  $this->load->view('themes/guru/topbar', $data);
  $this->load->view('extrakulikuler', $data);
  $this->load->view('themes/guru/footer');
  $this->load->view('themes/guru/footerajax');
  }else{
    $tahunakademik_id = $this->input->post('tahunakademik_id');
    $kelas_id = $this->input->post('kelas_id');
    $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
    $data['kelas_id'] = $this->input->post('kelas_id');
    $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    $data['get_extrakulikuler'] = $this->guru_model->get_extrakulikuler_byIdkelas($tahunakademik_id,$kelas_id);
    if(!$data['get_extrakulikuler']){
      $data['get_extrakulikuler'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    }
    $this->load->view('themes/guru/header', $data);
    $this->load->view('themes/guru/sidebar', $data);
    $this->load->view('themes/guru/topbar', $data);
    $this->load->view('extrakulikuler', $data);
    $this->load->view('themes/guru/footer');
    $this->load->view('themes/guru/footerajax');
    redirect('guru/extrakulikuler/'.$tahunakademik_id.'/'.$kelas_id);
  }
}
public function extrakulikuler_add()
{
$tahunakademik_id = $this->input->post('tahunakademik_id');
$kelas_id = $this->input->post('kelas_id');
$siswa_id = $this->input->post('siswa_id');
$a1 = $this->input->post('a1');
$b1 = $this->input->post('b1');
$c1 = $this->input->post('c1');
$user_id = $this->input->post('user_id');

$datadetail = [
'tahunakademik_id'     =>  $tahunakademik_id,
'kelas_id'     =>  $kelas_id,
   'siswa_id'     =>  $siswa_id,
   'kegiatan'     =>  $a1,
   'nilai'     =>  $b1,
   'deskripsi'     =>  $c1,
   'user_id'     =>  $user_id
];
$this->db->insert('r_nilai_extrakulikuler', $datadetail);
$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
redirect('guru/extrakulikuler/'.$tahunakademik_id.'/'.$kelas_id);

}

public function extrakulikuler_edit($tahunakademik_id='',$kelas_id='',$extra_id='')
{
  $data['title'] = 'Extrakulikuler';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('guru_model', 'guru_model');
  $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
  $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));
    $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
    $data['get_extrakulikuler'] = $this->guru_model->get_extrakulikuler_byIdkelas($tahunakademik_id,$kelas_id);
    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
    $data['get_extraedit'] = $this->guru_model->get_extrakulikuler_byId($extra_id);
  if ($this->form_validation->run() == false) {
  $this->load->view('themes/guru/header', $data);
  $this->load->view('themes/guru/sidebar', $data);
  $this->load->view('themes/guru/topbar', $data);
  $this->load->view('extrakulikuler_edit', $data);
  $this->load->view('themes/guru/footer');
  $this->load->view('themes/guru/footerajax');
  }
}
public function extrakulikuler_update($extra_id)
{
$tahunakademik_id = $this->input->post('tahunakademik_id');
$kelas_id = $this->input->post('kelas_id');
$siswa_id = $this->input->post('siswa_id');
$a1 = $this->input->post('a1');
$b1 = $this->input->post('b1');
$c1 = $this->input->post('c1');
$user_id = $this->input->post('user_id');

$datadetail = [
'tahunakademik_id'     =>  $tahunakademik_id,
'kelas_id'     =>  $kelas_id,
   'siswa_id'     =>  $siswa_id,
   'kegiatan'     =>  $a1,
   'nilai'     =>  $b1,
   'deskripsi'     =>  $c1,
   'user_id'     =>  $user_id
];
$this->db->where('id', $extra_id);
$this->db->update('r_nilai_extrakulikuler', $datadetail);
$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
redirect('guru/extrakulikuler/'.$tahunakademik_id.'/'.$kelas_id);

}

public function extrakulikuler_hapus($tahunakademik_id='',$kelas_id='',$extra_id='')
{
$this->db->where('id', $extra_id);
$this->db->delete('r_nilai_extrakulikuler');
$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Data Deleted !</div>');
redirect('guru/extrakulikuler/'.$tahunakademik_id.'/'.$kelas_id);
}

 // prestasi
 public function prestasi($tahunakademik_id='',$kelas_id='')
 {
   $data['title'] = 'Prestasi';
   $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $data['guru_id'] = $this->session->userdata('guru_id');
  $this->load->model('guru_model', 'guru_model');
  $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
  $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));

   $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
   $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
   if($tahunakademik_id<>''){
     $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     $data['get_prestasi'] = $this->guru_model->get_prestasi_byIdkelas($tahunakademik_id,$kelas_id);
     if(!$data['get_prestasi']){
      $data['get_prestasi'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     }
     $data['tahunakademik_id'] = $tahunakademik_id;
     $data['kelas_id'] = $kelas_id;
   }
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/guru/header', $data);
   $this->load->view('themes/guru/sidebar', $data);
   $this->load->view('themes/guru/topbar', $data);
   $this->load->view('prestasi', $data);
   $this->load->view('themes/guru/footer');
   $this->load->view('themes/guru/footerajax');
   }else{
     $tahunakademik_id = $this->input->post('tahunakademik_id');
     $kelas_id = $this->input->post('kelas_id');
     $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
     $data['kelas_id'] = $this->input->post('kelas_id');
     $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     $data['get_prestasi'] = $this->guru_model->get_prestasi_byIdkelas($tahunakademik_id,$kelas_id);
     $this->load->view('themes/guru/header', $data);
     $this->load->view('themes/guru/sidebar', $data);
     $this->load->view('themes/guru/topbar', $data);
     $this->load->view('prestasi', $data);
     $this->load->view('themes/guru/footer');
     $this->load->view('themes/guru/footerajax');
     redirect('guru/prestasi/'.$tahunakademik_id.'/'.$kelas_id);
   }
 }
 public function prestasi_add()
{
 $tahunakademik_id = $this->input->post('tahunakademik_id');
 $kelas_id = $this->input->post('kelas_id');
 $siswa_id = $this->input->post('siswa_id');
 $a1 = $this->input->post('a1');
 $b1 = $this->input->post('b1');
 $user_id = $this->input->post('user_id');

$datadetail = [
 'tahunakademik_id'     =>  $tahunakademik_id,
 'kelas_id'     =>  $kelas_id,
    'siswa_id'     =>  $siswa_id,
    'jenis_kegiatan'     =>  $a1,
    'keterangan'     =>  $b1,
    'user_id'     =>  $user_id
];
$this->db->insert('r_nilai_prestasi', $datadetail);
$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
redirect('guru/prestasi/'.$tahunakademik_id.'/'.$kelas_id);

}

public function prestasi_edit($tahunakademik_id='',$kelas_id='',$extra_id='')
 {
   $data['title'] = 'Prestasi';
   $this->db->select('`m_pegawai`.*');
   $this->db->from('m_pegawai');
   $this->db->where('nip', $this->session->userdata('nip'));
   $data['user'] = $this->db->get()->row_array();
   $data['guru_id'] = $this->session->userdata('guru_id');
   $this->load->model('guru_model', 'guru_model');
   $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
   $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));

     $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     $data['get_prestasi'] = $this->guru_model->get_prestasi_byIdkelas($tahunakademik_id,$kelas_id);
     $data['tahunakademik_id'] = $tahunakademik_id;
     $data['kelas_id'] = $kelas_id;
     $data['get_prestasiedit'] = $this->guru_model->get_prestasi_byId($extra_id);
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/guru/header', $data);
   $this->load->view('themes/guru/sidebar', $data);
   $this->load->view('themes/guru/topbar', $data);
   $this->load->view('prestasi_edit', $data);
   $this->load->view('themes/guru/footer');
   $this->load->view('themes/guru/footerajax');
   }
 }
 public function prestasi_update($prestasi_id)
{
 $tahunakademik_id = $this->input->post('tahunakademik_id');
 $kelas_id = $this->input->post('kelas_id');
 $siswa_id = $this->input->post('siswa_id');
 $a1 = $this->input->post('a1');
 $b1 = $this->input->post('b1');
 $user_id = $this->input->post('user_id');

$datadetail = [
 'tahunakademik_id'     =>  $tahunakademik_id,
 'kelas_id'     =>  $kelas_id,
    'siswa_id'     =>  $siswa_id,
    'jenis_kegiatan'     =>  $a1,
    'keterangan'     =>  $b1,
    'user_id'     =>  $user_id
];
$this->db->where('id', $prestasi_id);
$this->db->update('r_nilai_prestasi', $datadetail);
$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
redirect('guru/prestasi/'.$tahunakademik_id.'/'.$kelas_id);

}

public function prestasi_hapus($tahunakademik_id='',$kelas_id='',$prestasi_id='')
{
 $this->db->where('id', $prestasi_id);
$this->db->delete('r_nilai_prestasi');
 $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Data Deleted !</div>');
 redirect('guru/prestasi/'.$tahunakademik_id.'/'.$kelas_id);
}

//input nilai
public function input_nilai()
{
  $data['title'] = 'Input Nilai';
  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $data['guru_id'] = $this->session->userdata('guru_id');
  $this->load->model('guru_model', 'guru_model');

  $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
   $data['kelas'] = $this->guru_model->get_kelasAll();

  $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
  $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
  if ($this->form_validation->run() == false) {
  $this->load->view('themes/guru/header', $data);
  $this->load->view('themes/guru/sidebar', $data);
  $this->load->view('themes/guru/topbar', $data);
  $this->load->view('input_nilai', $data);
  $this->load->view('themes/guru/footer');
  $this->load->view('themes/guru/footerajax');
  }else{
   $tahunakademik_id = $this->input->post('tahunakademik_id');
   $kelas_id = $this->input->post('kelas_id');
   $data['jadwal_pelajaran'] = $this->guru_model->get_jadwal_pelajaran($tahunakademik_id,$kelas_id);
   $this->load->view('themes/guru/header', $data);
   $this->load->view('themes/guru/sidebar', $data);
   $this->load->view('themes/guru/topbar', $data);
   $this->load->view('input_nilai', $data);
   $this->load->view('themes/guru/footer');
   $this->load->view('themes/guru/footerajax');

  }
}

public function input_nilai_pengetahuan_edit($jadwal_id)
 {
   $data['title'] = 'Input Nilai';
  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $this->load->model('guru_model', 'guru_model');

     $data['get_datajadwal'] = $this->guru_model->get_jadwal_byId($jadwal_id);
     $data['get_nilai_pengetahuan'] = $this->guru_model->get_nilaipengetahuan_byjadwal($jadwal_id);
     $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
     $kelas_id = $data['get_datajadwal']['kelas_id'];
     $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     $data['jadwal_id']=$data['get_datajadwal']['jadwal_id'];
     $data['tahunakademik_id']=$data['get_datajadwal']['tahunakademik_id'];
     $data['mapel_id']=$data['get_datajadwal']['mapel_id'];
     $data['kelas_id']=$data['get_datajadwal']['kelas_id'];
     $data['guru_id']=$data['get_datajadwal']['guru_id'];
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/guru/header', $data);
     $this->load->view('themes/guru/sidebar', $data);
     $this->load->view('themes/guru/topbar', $data);
     $this->load->view('input_nilai_pengetahuan_edit', $data);
     $this->load->view('themes/guru/footer');
     $this->load->view('themes/guru/footerajax');
     }
 }
 public function input_pengetahuan_add($jadwal_id)
 {
   $tahunakademik_id = $this->input->post('tahunakademik_id');
   $mapel_id = $this->input->post('mapel_id');
   $kelas_id = $this->input->post('kelas_id');
   $guru_id = $this->input->post('guru_id');
   $siswa_id = $this->input->post('siswa_id');
   $siswa_urut = $this->input->post('siswa_urut');
   $ph1 = $this->input->post('ph1');
   $ph2 = $this->input->post('ph2');
   $ph3 = $this->input->post('ph3');
   $ph4 = $this->input->post('ph4');
   $ph5 = $this->input->post('ph5');
   $ph6 = $this->input->post('ph6');
   $pt1 = $this->input->post('pt1');
   $pt2 = $this->input->post('pt2');
   $pt3 = $this->input->post('pt3');
   $pt4 = $this->input->post('pt4');
   $pt5 = $this->input->post('pt5');
   $pt6 = $this->input->post('pt6');    
   $uts = $this->input->post('uts');    
   $uas = $this->input->post('uas');    
   $this->db->where('jadwal_id', $jadwal_id);
   $this->db->delete('r_nilai_pengetahuan');

  foreach($siswa_id as $key => $n){
   $rph='';
   $rpt='';
  $rata2='';
  $grade='';
  $deskripsi='';
   
   //rata penilaian harian
   $arr_ph=array($ph1[$key],$ph2[$key],$ph3[$key],$ph4[$key],$ph5[$key],$ph6[$key]);
   $tot_ph= array_sum($arr_ph);
   $rata_ph= $tot_ph/count(array_filter($arr_ph,'strlen'));
   
   //rata penilaian tugas
   $arr_pt=array($pt1[$key],$pt2[$key],$pt3[$key],$pt4[$key],$pt5[$key],$pt6[$key]);
   $tot_pt= array_sum($arr_pt);
   $rata_pt= $tot_pt/count(array_filter($arr_pt,'strlen'));
   
   //rph = 60% nilai harian +40% nilai tugas
   $rph=round((0.6* $rata_ph)+(0.4*$rata_pt));
   //jika nilai uts uas ada isi
   if(($uts[$key]<>'')and($uas[$key]<>'')){
     //RPT =((2*UTS)+rph+UAS)
$rpt=(((2* $uts[$key])+$rph+$uas[$key]));
//rata2 = rpt/4
$rata2=round($rpt/4);
if($rata2>'0'){
if($rata2<'101'){
 $grade='A';
 $deskripsi='Sudah  memahami semua kompetensi dengan sangat baik';
}
if($rata2<'90'){
$grade='B';
$deskripsi='Sudah  memahami semua kompetensi dengan baik';
}
if($rata2<'82'){
$grade='C';
$deskripsi='Sudah  memahami semua kompetensi dengan cukup';
}
if($rata2<'74'){
$grade='D';
$deskripsi='Kurang  memahami semua kompetensi';
}
}
}
  $datadetail = [
   'jadwal_id'     =>  $jadwal_id,
   'tahunakademik_id'     =>  $tahunakademik_id,
   'mapel_id'     =>  $mapel_id,
   'kelas_id'     =>  $kelas_id,
   'guru_id'     =>  $guru_id,
      'siswa_id'     =>  $n,
      'siswa_urut'     =>  $siswa_urut[$key],
      'ph1'     =>  $ph1[$key],
      'ph2'     =>  $ph2[$key],
      'ph3'     =>  $ph3[$key],
      'ph4'     =>  $ph4[$key],
      'ph5'     =>  $ph5[$key],
      'ph6'     =>  $ph6[$key],
      'pt1'     =>  $pt1[$key],
      'pt2'     =>  $pt2[$key],
      'pt3'     =>  $pt3[$key],
      'pt4'     =>  $pt4[$key],
      'pt5'     =>  $pt5[$key],
      'pt6'     =>  $pt6[$key],
      'uts'     =>  $uts[$key],
      'uas'     =>  $uas[$key],
      'rph'     =>  $rph,
      'rpt'     =>  $rpt,
      'rata2'     =>  $rata2,
      'grade'     =>  $grade,
      'deskripsi'     =>  $deskripsi
 ];
  $this->db->insert('r_nilai_pengetahuan', $datadetail);
 }
 $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved ! ,</div>');
 redirect('guru/input_nilai_pengetahuan_edit/'.$jadwal_id);

 }
 //input keterampilan
 public function input_nilai_keterampilan_edit($jadwal_id)
 {
   $data['title'] = 'Input Nilai';
   $this->db->select('`m_pegawai`.*');
   $this->db->from('m_pegawai');
   $this->db->where('nip', $this->session->userdata('nip'));
   $data['user'] = $this->db->get()->row_array();
   $data['guru_id'] = $this->session->userdata('guru_id');
   $this->load->model('guru_model', 'guru_model');

     $data['get_datajadwal'] = $this->guru_model->get_jadwal_byId($jadwal_id);
     $data['get_nilai_keterampilan'] = $this->guru_model->get_nilaiketerampilan_byjadwal($jadwal_id);
     $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
     $kelas_id = $data['get_datajadwal']['kelas_id'];
     $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     $data['jadwal_id']=$data['get_datajadwal']['jadwal_id'];
     $data['tahunakademik_id']=$data['get_datajadwal']['tahunakademik_id'];
     $data['mapel_id']=$data['get_datajadwal']['mapel_id'];
     $data['kelas_id']=$data['get_datajadwal']['kelas_id'];
     $data['guru_id']=$data['get_datajadwal']['guru_id'];
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/guru/header', $data);
     $this->load->view('themes/guru/sidebar', $data);
     $this->load->view('themes/guru/topbar', $data);
     $this->load->view('input_nilai_keterampilan_edit', $data);
     $this->load->view('themes/guru/footer');
     $this->load->view('themes/guru/footerajax');
     }
 }
 public function input_keterampilan_add($jadwal_id)
 {
   $tahunakademik_id = $this->input->post('tahunakademik_id');
   $mapel_id = $this->input->post('mapel_id');
   $kelas_id = $this->input->post('kelas_id');
   $guru_id = $this->input->post('guru_id');
   $siswa_id = $this->input->post('siswa_id');
   $siswa_urut = $this->input->post('siswa_urut');
   $nil1 = $this->input->post('nil1');
   $nil2 = $this->input->post('nil2');
   $nil3 = $this->input->post('nil3');
   $nil4 = $this->input->post('nil4');
   $nil5 = $this->input->post('nil5');
   $nil6 = $this->input->post('nil6');
   $nil7 = $this->input->post('nil7');
   $nil8 = $this->input->post('nil8');
   $this->db->where('jadwal_id', $jadwal_id);
   $this->db->delete('r_nilai_keterampilan');

  foreach($siswa_id as $key => $n){
   $rata2='';
   $grade='';
   $deskripsi='';

    //rata penilaian harian
    $arr_nil=array($nil1[$key],$nil2[$key],$nil3[$key],$nil4[$key],$nil5[$key],$nil6[$key],$nil7[$key],$nil8[$key]);
    $tot_nil= array_sum($arr_nil);
    $rata2= $tot_nil/count(array_filter($arr_nil,'strlen'));
    
if($rata2>'0'){
if($rata2<'101'){
 $grade='A';
 $deskripsi='Sangat baik, terampil dalam  semua kompetensi';
}
if($rata2<'90'){
$grade='B';
$deskripsi='Baik, terampil dalam  semua kompetensi';
}
if($rata2<'82'){
$grade='C';
$deskripsi='Cukup, terampil dalam  semua  kompetensi';
}
if($rata2<'74'){
$grade='D';
$deskripsi='Kurang, terampil dalam  semua  kompetensi';
}
}
  $datadetail = [
   'jadwal_id'     =>  $jadwal_id,
   'tahunakademik_id'     =>  $tahunakademik_id,
   'mapel_id'     =>  $mapel_id,
   'kelas_id'     =>  $kelas_id,
   'guru_id'     =>  $guru_id,
      'siswa_id'     =>  $n,
      'siswa_urut'     =>  $siswa_urut[$key],
      'nil1'     =>  $nil1[$key],
      'nil2'     =>  $nil2[$key],
      'nil3'     =>  $nil3[$key],
      'nil4'     =>  $nil4[$key],
      'nil5'     =>  $nil5[$key],
      'nil6'     =>  $nil6[$key],
      'nil7'     =>  $nil7[$key],
      'nil8'     =>  $nil8[$key],
      'rata2'     =>  $rata2,
      'grade'     =>  $grade,
      'deskripsi'     =>  $deskripsi
 ];
  $this->db->insert('r_nilai_keterampilan', $datadetail);
 }
 $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !
 </div>');
 redirect('guru/input_nilai_keterampilan_edit/'.$jadwal_id);

 }
 //cetak uts
public function cetak_uts($tahunakademik_id='',$kelas_id='')
{
 $data['title'] = 'Cetak Raport UTS';
 $this->db->select('`m_pegawai`.*');
 $this->db->from('m_pegawai');
 $this->db->where('nip', $this->session->userdata('nip'));
 $data['user'] = $this->db->get()->row_array();
 $data['guru_id'] = $this->session->userdata('guru_id');
 $this->load->model('guru_model', 'guru_model');

 $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
  $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));

 $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
 $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
 if($tahunakademik_id<>''){
   $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
   $data['tahunakademik_id'] = $tahunakademik_id;
   $data['kelas_id'] = $kelas_id;
 }
 if ($this->form_validation->run() == false) {
 $this->load->view('themes/guru/header', $data);
 $this->load->view('themes/guru/sidebar', $data);
 $this->load->view('themes/guru/topbar', $data);
 $this->load->view('cetak_uts', $data);
 $this->load->view('themes/guru/footer');
 $this->load->view('themes/guru/footerajax');
 }else{
   $tahunakademik_id = $this->input->post('tahunakademik_id');
   $kelas_id = $this->input->post('kelas_id');
   $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
   $data['kelas_id'] = $this->input->post('kelas_id');
   $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
   $this->load->view('themes/guru/header', $data);
   $this->load->view('themes/guru/sidebar', $data);
   $this->load->view('themes/guru/topbar', $data);
   $this->load->view('cetak_uts', $data);
   $this->load->view('themes/guru/footer');
   $this->load->view('themes/guru/footerajax');
   redirect('guru/cetak_uts/'.$tahunakademik_id.'/'.$kelas_id);
 }
}
public function print_raport_uts($tahunakademik_id,$kelas_id,$siswa_id)
 {
   
  $data['title'] = 'Cetak Raport UTS';
  $this->load->model('guru_model', 'guru_model');
  $data['get_data_sekolah'] = $this->guru_model->get_data_sekolah();
  $data['get_data_siswa'] = $this->guru_model->get_data_siswa_byId($siswa_id);
  $data['get_data_kelas'] = $this->guru_model->get_data_kelas_byId($kelas_id);
  $data['get_tahun_akademik'] = $this->guru_model->get_tahun_akademik_byId($tahunakademik_id);
  $data['get_nilai_uts'] = $this->guru_model->get_nilai_uts_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_nilai_keterampilan'] = $this->guru_model->get_nilai_uts_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_siswa_urut'] = $this->guru_model->get_siswa_urut_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_kelompok_mapel'] = $this->guru_model->get_siswa_mapelkat_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
  $data['get_siswasakit']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"S");
  $data['get_siswaijin']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"I");
  $data['get_siswaalpa']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"A");
  $this->load->view('themes/guru/headerprint', $data);
    $this->load->view('print_raport_uts', $data);
 }
 //cetak rapor
 public function cetak_rapor($tahunakademik_id='',$kelas_id='')
 {
   $data['title'] = 'Cetak Raport';
   $this->db->select('`m_pegawai`.*');
   $this->db->from('m_pegawai');
   $this->db->where('nip', $this->session->userdata('nip'));
   $data['user'] = $this->db->get()->row_array();
   $data['guru_id'] = $this->session->userdata('guru_id');

   $this->load->model('guru_model', 'guru_model');
   $data['tahunakademik'] = $this->guru_model->get_tahunakademikaktif_select();
  $data['kelas'] = $this->guru_model->get_kelasAllbyWali($this->session->userdata('guru_id'));
   $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
   $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
   if($tahunakademik_id<>''){
     $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     $data['tahunakademik_id'] = $tahunakademik_id;
     $data['kelas_id'] = $kelas_id;
   }
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/guru/header', $data);
   $this->load->view('themes/guru/sidebar', $data);
   $this->load->view('themes/guru/topbar', $data);
   $this->load->view('cetak_rapor', $data);
   $this->load->view('themes/guru/footer');
   $this->load->view('themes/guru/footerajax');
   }else{
     $tahunakademik_id = $this->input->post('tahunakademik_id');
     $kelas_id = $this->input->post('kelas_id');
     $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
     $data['kelas_id'] = $this->input->post('kelas_id');
     $data['getlistsiswa'] = $this->guru_model->get_list_siswa_byIdkelas($tahunakademik_id,$kelas_id);
     $this->load->view('themes/guru/header', $data);
     $this->load->view('themes/guru/sidebar', $data);
     $this->load->view('themes/guru/topbar', $data);
     $this->load->view('cetak_rapor', $data);
     $this->load->view('themes/guru/footer');
     $this->load->view('themes/guru/footerajax');
     redirect('guru/cetak_rapor/'.$tahunakademik_id.'/'.$kelas_id);
   }
 }
 public function print_cover($tahunakademik_id,$kelas_id,$siswa_id)
 {
   
  $data['title'] = 'Cetak Raport Cover';
  $this->load->model('guru_model', 'guru_model');
  $data['get_data_sekolah'] = $this->guru_model->get_data_sekolah();
  $data['get_data_siswa'] = $this->guru_model->get_data_siswa_byId($siswa_id);
  $data['get_data_kelas'] = $this->guru_model->get_data_kelas_byId($kelas_id);
  $data['get_tahun_akademik'] = $this->guru_model->get_tahun_akademik_byId($tahunakademik_id);
  $data['get_nilai_uts'] = $this->guru_model->get_nilai_uts_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_siswa_urut'] = $this->guru_model->get_siswa_urut_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_kelompok_mapel'] = $this->guru_model->get_siswa_mapelkat_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
  $data['get_siswasakit']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"S");
  $data['get_siswaijin']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"I");
  $data['get_siswaalpa']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"A");
  $this->load->view('themes/guru/headerraport', $data);
    $this->load->view('print_cover', $data);
 }
 public function print_hal1($tahunakademik_id,$kelas_id,$siswa_id)
 {
   
   $data['title'] = 'Cetak Raport Hal 1';
   $this->load->model('guru_model', 'guru_model');
  $data['get_data_sekolah'] = $this->guru_model->get_data_sekolah();
  $data['get_data_siswa'] = $this->guru_model->get_data_siswa_byId($siswa_id);
  $data['get_data_kelas'] = $this->guru_model->get_data_kelas_byId($kelas_id);
  $data['get_tahun_akademik'] = $this->guru_model->get_tahun_akademik_byId($tahunakademik_id);
  $data['get_nilai_uts'] = $this->guru_model->get_nilai_uts_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_siswa_urut'] = $this->guru_model->get_siswa_urut_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_kelompok_mapel'] = $this->guru_model->get_siswa_mapelkat_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
  $data['get_siswasakit']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"S");
  $data['get_siswaijin']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"I");
  $data['get_siswaalpa']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"A");
  $this->load->view('themes/guru/headerraport', $data);
    $this->load->view('print_hal1', $data);
  }
  public function print_hal2($tahunakademik_id,$kelas_id,$siswa_id)
 {
   
  $data['title'] = 'Cetak Raport Hal 2';
  $this->load->model('guru_model', 'guru_model');
  $data['get_data_sekolah'] = $this->guru_model->get_data_sekolah();
  $data['get_data_siswa'] = $this->guru_model->get_data_siswa_byId($siswa_id);
  $data['get_data_kelas'] = $this->guru_model->get_data_kelas_byId($kelas_id);
  $data['get_tahun_akademik'] = $this->guru_model->get_tahun_akademik_byId($tahunakademik_id);
  $data['get_nilai_uts'] = $this->guru_model->get_nilai_uts_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_siswa_urut'] = $this->guru_model->get_siswa_urut_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_kelompok_mapel'] = $this->guru_model->get_siswa_mapelkat_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
  $data['get_siswasakit']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"S");
  $data['get_siswaijin']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"I");
  $data['get_siswaalpa']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"A");
  $this->load->view('themes/guru/headerraport', $data);
    $this->load->view('print_hal2', $data);
 }

 public function print_hal3($tahunakademik_id,$kelas_id,$siswa_id)
 {
   
  $data['title'] = 'Cetak Raport Hal 3';
  $this->load->model('guru_model', 'guru_model');
  $data['get_data_sekolah'] = $this->guru_model->get_data_sekolah();
  $data['get_data_siswa'] = $this->guru_model->get_data_siswa_byId($siswa_id);
  $data['get_data_kelas'] = $this->guru_model->get_data_kelas_byId($kelas_id);
  $data['get_tahun_akademik'] = $this->guru_model->get_tahun_akademik_byId($tahunakademik_id);
  $data['get_nilai_uts'] = $this->guru_model->get_nilai_uts_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_nilai_keterampilan'] = $this->guru_model->get_nilai_keterampilan_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_nilai_sikap'] = $this->guru_model->get_nilai_sikap_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_catatan_walikelas'] = $this->guru_model->get_catatan_walikelas_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_kelompok_mapel'] = $this->guru_model->get_siswa_mapelkat_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_kelompok_mapelket'] = $this->guru_model->get_siswa_mapelkat_ktr_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_siswa_urut'] = $this->guru_model->get_siswa_urut_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
  $data['get_nilai_extrakulikuler'] = $this->guru_model->get_nilai_extrakulikuler_byId($tahunakademik_id,$kelas_id,$siswa_id);
  $data['get_siswasakit']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"S");
  $data['get_siswaijin']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"I");
  $data['get_siswaalpa']=$this->guru_model->get_absensiswa($siswa_id,$tahunakademik_id,"A");
  $this->load->view('themes/guru/headerraport', $data);
    $this->load->view('print_hal3', $data);
 }

 public function view_fullcalendar()
 {
   
  $data['title'] = 'Kalender Kegiatan';
  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $data['guru_id'] = $this->session->userdata('guru_id');

    $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
    $data['result'] = $this->db->get("akad_kegiatanakademik")->result();
    foreach ($data['result'] as $key => $value) {
        $data['data'][$key]['title'] = $value->judul;
        $data['data'][$key]['start'] = $value->tanggal_awal;
        $data['data'][$key]['end'] = $value->tanggal_akhir;
        $data['data'][$key]['backgroundColor'] = "#3b5998 ";
    }
    $this->load->view('themes/guru/header', $data);
    $this->load->view('themes/guru/sidebar', $data);
    $this->load->view('themes/guru/topbar', $data);
    $this->load->view('view_fullcalendar_onapp', $data);
    $this->load->view('themes/guru/footer');
    $this->load->view('themes/guru/footerajax');
 }
     //journalkbm
     public function journalkbm()
     {
       $data['title'] = 'Journal KBM';
       $this->db->select('`m_pegawai`.*');
       $this->db->from('m_pegawai');
       $this->db->where('nip', $this->session->userdata('nip'));
       $data['user'] = $this->db->get()->row_array();
       $data['guru_id'] = $this->session->userdata('guru_id');
  
       $this->load->model('guru_model', 'guru_model');
       $data['tahunakademik'] = $this->guru_model->get_tahunakademikAll();
       $data['kelas'] = $this->guru_model->get_kelasAll();
       $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
       $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
       if ($this->form_validation->run() == false) {
       $this->load->view('themes/guru/header', $data);
       $this->load->view('themes/guru/sidebar', $data);
       $this->load->view('themes/guru/topbar', $data);
       $this->load->view('journalkbm', $data);
       $this->load->view('themes/guru/footer');
       $this->load->view('themes/guru/footerajax');
       }else{
        $tahunakademik_id = $this->input->post('tahunakademik_id');
        $kelas_id = $this->input->post('kelas_id');
        $data['jadwal_pelajaran'] = $this->guru_model->get_jadwal_pelajaran($tahunakademik_id,$kelas_id);
        $this->load->view('themes/guru/header', $data);
        $this->load->view('themes/guru/sidebar', $data);
        $this->load->view('themes/guru/topbar', $data);
        $this->load->view('journalkbm', $data);
        $this->load->view('themes/guru/footer');
        $this->load->view('themes/guru/footerajax');
  
       }
     }
     public function journalkbm_list($jadwal_id)
     {
      $data['title'] = 'Journal KBM';
      $this->db->select('`m_pegawai`.*');
      $this->db->from('m_pegawai');
      $this->db->where('nip', $this->session->userdata('nip'));
      $data['user'] = $this->db->get()->row_array();
      $data['guru_id'] = $this->session->userdata('guru_id');
         $this->load->model('guru_model', 'guru_model');
  
  
         $data['get_datajadwal'] = $this->guru_model->get_jadwal_byId($jadwal_id);
         $data['get_journal'] = $this->guru_model->get_journal_byjadwal($jadwal_id);
         $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
         $kelas_id = $data['get_datajadwal']['kelas_id'];
  
         $data['jadwal_id']=$data['get_datajadwal']['jadwal_id'];
         $data['tahunakademik_id']=$data['get_datajadwal']['tahunakademik_id'];
         $data['mapel_id']=$data['get_datajadwal']['mapel_id'];
         $data['kelas_id']=$data['get_datajadwal']['kelas_id'];
         $data['guru_id']=$data['get_datajadwal']['guru_id'];
         if ($this->form_validation->run() == false) {
         $this->load->view('themes/guru/header', $data);
         $this->load->view('themes/guru/sidebar', $data);
         $this->load->view('themes/guru/topbar', $data);
         $this->load->view('journalkbm_list', $data);
         $this->load->view('themes/guru/footer');
         $this->load->view('themes/guru/footerajax');
         }
     }
 public function addjournalkbm($jadwal_id)
   {
    $data['title'] = 'Journal KBM';
    $this->db->select('`m_pegawai`.*');
    $this->db->from('m_pegawai');
    $this->db->where('nip', $this->session->userdata('nip'));
    $data['user'] = $this->db->get()->row_array();
    $data['guru_id'] = $this->session->userdata('guru_id');

       $this->load->model('guru_model', 'guru_model');


       $data['get_datajadwal'] = $this->guru_model->get_jadwal_byId($jadwal_id);
       $data['get_journal'] = $this->guru_model->get_journal_byjadwal($jadwal_id);
       $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
       $kelas_id = $data['get_datajadwal']['kelas_id'];

       $data['jadwal_id']=$jadwal_id;
       $data['tahunakademik_id']=$data['get_datajadwal']['tahunakademik_id'];
       $data['mapel_id']=$data['get_datajadwal']['mapel_id'];
       $data['kelas_id']=$data['get_datajadwal']['kelas_id'];
       $data['guru_id']=$data['get_datajadwal']['guru_id'];
       $data['tanggalskrg']=date('Y-m-d');
       $this->form_validation->set_rules('hari', 'hari', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('jamke', 'jamke', 'required');
        $this->form_validation->set_rules('materi', 'materi', 'required');

       if ($this->form_validation->run() == false) {
       $this->load->view('themes/guru/header', $data);
       $this->load->view('themes/guru/sidebar', $data);
       $this->load->view('themes/guru/topbar', $data);
       $this->load->view('addjournalkbm', $data);
       $this->load->view('themes/guru/footer');
       $this->load->view('themes/guru/footerajax');
       }else{
        $data = [
            'jadwal_id' => $this->input->post('jadwal_id'),
            'tahunakademik_id' => $this->input->post('tahunakademik_id'),
            'mapel_id' => $this->input->post('mapel_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'guru_id' => $this->input->post('guru_id'),
            'hari' => $this->input->post('hari'),
            'tanggal' => $this->input->post('tanggal'),
            'jamke' => $this->input->post('jamke'),
            'materi' => $this->input->post('materi'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->insert('akad_journalkbm', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
        redirect('guru/journalkbm_list/'.$jadwal_id);

       }
   }
   public function editjournalkbm($jadwal_id,$id)
   {
    $data['title'] = 'Journal KBM';
  $this->db->select('`m_pegawai`.*');
  $this->db->from('m_pegawai');
  $this->db->where('nip', $this->session->userdata('nip'));
  $data['user'] = $this->db->get()->row_array();
  $data['guru_id'] = $this->session->userdata('guru_id');

       $this->load->model('guru_model', 'guru_model');


       $data['get_datajadwal'] = $this->guru_model->get_jadwal_byId($jadwal_id);
       $data['get_journal'] = $this->guru_model->get_journal_byjadwal($jadwal_id);
       $data['get_datajurnal'] = $this->guru_model->get_journalkbm_byId($id);
       $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
       $kelas_id = $data['get_datajadwal']['kelas_id'];

       $data['jadwal_id']=$jadwal_id;
       $data['tahunakademik_id']=$data['get_datajadwal']['tahunakademik_id'];
       $data['mapel_id']=$data['get_datajadwal']['mapel_id'];
       $data['kelas_id']=$data['get_datajadwal']['kelas_id'];
       $data['guru_id']=$data['get_datajadwal']['guru_id'];
       $data['tanggalskrg']=date('Y-m-d');
       $this->form_validation->set_rules('hari', 'hari', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('jamke', 'jamke', 'required');
        $this->form_validation->set_rules('materi', 'materi', 'required');

       if ($this->form_validation->run() == false) {
       $this->load->view('themes/guru/header', $data);
       $this->load->view('themes/guru/sidebar', $data);
       $this->load->view('themes/guru/topbar', $data);
       $this->load->view('editjournalkbm', $data);
       $this->load->view('themes/guru/footer');
       $this->load->view('themes/guru/footerajax');
       }else{
        $data = [
            'jadwal_id' => $this->input->post('jadwal_id'),
            'tahunakademik_id' => $this->input->post('tahunakademik_id'),
            'mapel_id' => $this->input->post('mapel_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'guru_id' => $this->input->post('guru_id'),
            'hari' => $this->input->post('hari'),
            'tanggal' => $this->input->post('tanggal'),
            'jamke' => $this->input->post('jamke'),
            'materi' => $this->input->post('materi'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('id', $id);
        $this->db->update('akad_journalkbm', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
        redirect('guru/journalkbm_list/'.$jadwal_id);

       }
   }
   public function hapusjurnalkbm($jadwal_id,$id)
     {
         $this->db->where('id', $id);
         $this->db->delete('akad_journalkbm');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
         redirect('guru/journalkbm_list/'.$jadwal_id);
     }
     //cetak journal
 public function cetak_journalkbm($jadwal_id){
    $data['title'] = 'Cetak Journal KBM';
    $this->load->model('guru_model', 'guru_model');
    $data['get_datajadwal'] = $this->guru_model->get_jadwal_byId($jadwal_id);
    $data['get_journal'] = $this->guru_model->get_journal_byjadwal($jadwal_id);
    $this->load->view('themes/guru/headerprint', $data);
    $this->load->view('cetak_journalkbm',$data);

  }
//end
}
