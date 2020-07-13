<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Bk extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // kategori_pelanggaran
 public function kategori_pelanggaran()
 {
   $data['title'] = 'Kategori Pelanggaran';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('bk_model', 'bk_model');
   $data['kat_pelanggaran'] = $this->bk_model->get_kat_pelanggaran();
   $this->form_validation->set_rules('kategori', 'kategori','required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('kategori_pelanggaran', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kategori' => $this->input->post('kategori')
          ];
          $this->db->insert('bk_kategori_pelanggaran', $data);
//log act
//$data['table'] = $this->db->get_where('sar_supplier', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('kategori');
activity_log($user,'Tambah Kategori Pelanggaran',$item);
//end log
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bk/kategori_pelanggaran');
   }
 }
 public function edit_kategori_pelanggaran($id)
  {
    $data['title'] = 'Kategori Pelanggaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Bk_model', 'Bk_model');
    $data['kat_pelanggaran'] = $this->Bk_model->get_kat_pelanggaran();
    $data['get_kat_pelanggaran'] = $this->Bk_model->get_kat_pelanggaran_byId($id);

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_kategori_pelanggaran', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
   
  }
  public function hapus_kategori_pelanggaran($id)
  {
//log act
$data['table'] = $this->db->get_where('bk_kategori_pelanggaran', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['kategori'];
activity_log($user,'Hapus Kategori Pelanggaran',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('bk_kategori_pelanggaran');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('bk/kategori_pelanggaran');
  }
 // pelanggaran
 public function pelanggaran()
 {
   $data['title'] = 'Pelanggaran';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('bk_model', 'bk_model');
   $data['kat_pelanggaran'] = $this->bk_model->get_kat_pelanggaran();
   $data['datapelanggaran'] = $this->bk_model->get_pelanggaran();
   $this->form_validation->set_rules('kategori_id', 'kategori_id','required');
   $this->form_validation->set_rules('pelanggaran', 'pelanggaran','required');
   $this->form_validation->set_rules('point', 'point','required');
   $this->form_validation->set_rules('sanksi', 'sanksi','required');
   if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('pelanggaran', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
   
   }else{
       $data = [
         'kategori_id' => $this->input->post('kategori_id'),
         'pelanggaran' => $this->input->post('pelanggaran'),
         'point' => $this->input->post('point'),
         'sanksi' => $this->input->post('sanksi')
          ];
          $this->db->insert('bk_pelanggaran', $data);
//log act
//$data['table'] = $this->db->get_where('bk_kategori_pelanggaran', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('pelanggaran');
activity_log($user,'Tambah Pelanggaran',$item);
//end log
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bk/pelanggaran');
   }
 }
 public function edit_pelanggaran($id)
  {
    $data['title'] = 'Pelanggaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('bk_model', 'bk_model');
    $data['kat_pelanggaran'] = $this->bk_model->get_kat_pelanggaran();
   $data['datapelanggaran'] = $this->bk_model->get_pelanggaran();
    $data['get_pelanggaran'] = $this->bk_model->get_pelanggaran_byId($id);
    $data['kategori_id']='';
    $this->form_validation->set_rules('kategori_id', 'kategori_id','required');
    $this->form_validation->set_rules('pelanggaran', 'pelanggaran','required');
    $this->form_validation->set_rules('point', 'point','required');
    $this->form_validation->set_rules('sanksi', 'sanksi','required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_pelanggaran', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'kategori_id' => $this->input->post('kategori_id'),
        'pelanggaran' => $this->input->post('pelanggaran'),
        'point' => $this->input->post('point'),
        'sanksi' => $this->input->post('sanksi')
         ];
          $this->db->where('id', $id);
          $this->db->update('bk_pelanggaran', $data);
//log act
//$data['table'] = $this->db->get_where('bk_kategori_pelanggaran', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('pelanggaran');
activity_log($user,'Edit Pelanggaran',$item);
//end log
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bk/pelanggaran');
    }
  }
  public function hapus_pelanggaran($id)
  {
//log act
$data['table'] = $this->db->get_where('bk_pelanggaran', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['pelanggaran'];
activity_log($user,'Hapus Pelanggaran',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('bk_pelanggaran');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('bk/pelanggaran');
  }

  public function bk_pelanggaran_siswa()
  {
    $data['title'] = 'Pelanggaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('bk_model', 'bk_model');
    $data['datapelanggaran'] = $this->bk_model->get_pelanggaran();
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();
  }

  public function pelanggaran_siswa()
  {
    $data['title'] = 'Pelanggaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bk_model', 'bk_model');
    $data['datapelanggaran'] = $this->bk_model->get_pelanggaran();
    $data['selectsiswa'] = $this->bk_model->siswagetDataAll();
    $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
    $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
    $data['tahun_akademik_default']['value']])->row_array();
    $data['tahunakademikdefault']=$data['m_tahunakademik']['id'];
    $data['semesterdefault']=$data['m_tahunakademik']['semester'];
    $data['tgldefault'] = date('Y-m-d');
    $data['datapelanggaransiswa'] = $this->bk_model->get_pelanggaran_siswa();
    $this->form_validation->set_rules('tanggal', 'tanggal','required');
    if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('pelanggaran_siswa', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
    
    }else{
      $this->load->model('bk_model', 'bk_model');
      $data['datapelanggaran']=$this->bk_model->get_pelanggaran_byId($this->input->post('pelanggaran_id'));
      $point = $data['datapelanggaran']['point'];
      $data['kelas_siswa']=$this->bk_model->get_kelas_siswa($this->input->post('siswa_id'));
      $kelas_id = $data['kelas_siswa']['kelas_id'];
        $data = [
          'tahunakademik_id' => $this->input->post('tahunakademik_id'),
          'semester' => $this->input->post('semester'),
          'tanggal' => $this->input->post('tanggal'),
          'siswa_id' => $this->input->post('siswa_id'),
          'kelas_id' =>  $kelas_id,
          'pelanggaran_id' => $this->input->post('pelanggaran_id'),
          'point' => $point
           ];
           $this->db->insert('bk_siswapelanggaran', $data);
//log act
//$data['table'] = $this->db->get_where('bk_pelanggaran', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Tambah Pelanggaran Siswa',$item);
//end log
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('bk/pelanggaran_siswa');
    }
  }
  public function edit_pelanggaran_siswa($id)
  {
    $data['title'] = 'Pelanggaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bk_model', 'bk_model');
    $data['datapelanggaran'] = $this->bk_model->get_pelanggaran();
    $data['selectsiswa'] = $this->bk_model->siswagetDataAll();
    $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
    $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
    $data['tahun_akademik_default']['value']])->row_array();
    $data['tahunakademikdefault']=$data['m_tahunakademik']['id'];
    $data['semesterdefault']=$data['m_tahunakademik']['semester'];
    $data['tgldefault'] = date('Y-m-d');
    $data['datapelanggaransiswa'] = $this->bk_model->get_pelanggaran_siswa();
    $data['getpelanggaransiswa'] = $this->bk_model->get_pelanggaran_siswa_byId($id);
    $this->form_validation->set_rules('tanggal', 'tanggal','required');
    if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('edit_pelanggaran_siswa', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
    
    }else{
      $this->load->model('bk_model', 'bk_model');
      $data['datapelanggaran']=$this->bk_model->get_pelanggaran_byId($this->input->post('pelanggaran_id'));
      $point = $data['datapelanggaran']['point'];
      $data['kelas_siswa']=$this->bk_model->get_kelas_siswa($this->input->post('siswa_id'));
      $kelas_id = $data['kelas_siswa']['kelas_id'];
        $data = [
          'tahunakademik_id' => $this->input->post('tahunakademik_id'),
          'semester' => $this->input->post('semester'),
          'tanggal' => $this->input->post('tanggal'),
          'siswa_id' => $this->input->post('siswa_id'),
          'kelas_id' =>  $kelas_id,
          'pelanggaran_id' => $this->input->post('pelanggaran_id'),
          'point' => $point
           ];
           $this->db->where('id', $id);
          $this->db->update('bk_siswapelanggaran', $data);
//log act
//$data['table'] = $this->db->get_where('bk_pelanggaran', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Edit Pelanggaran Siswa',$item);
//end log
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('bk/pelanggaran_siswa');
    }
  }
  public function hapus_pelanggaran_siswa($id)
  {
//log act
//$data['table'] = $this->db->get_where('bk_pelanggaran', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Pelanggaran Siswa',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('bk_siswapelanggaran');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('bk/pelanggaran_siswa');
  }
  public function kirimsms($id)
  {
    $this->db->set('status','1');
    $this->db->where('id', $id);
    $this->db->update('bk_siswapelanggaran');

    $this->load->model('bk_model', 'bk_model');
    $data['get_pelanggaran'] = $this->bk_model->get_pelanggaran_siswa_byId($id);
    $hpayah = $data['get_pelanggaran']['hpayah'];
    $namasiswa = $data['get_pelanggaran']['namasiswa'];
    $nama_kelas = $data['get_pelanggaran']['nama_kelas'];
    $pelanggaran = $data['get_pelanggaran']['pelanggaran'];
    $pesan = "Info Pelanggaran hari ini : $namasiswa,$nama_kelas,Pelanggaran:$pelanggaran";
    $this->cismsapi->sendsms($hpayah, "$pesan",apisms('user_api_sms'),apisms('user_key_sms'));
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">'.$pesan.'</div>');
    redirect('bk/pelanggaran_siswa');
  }
  public function kirimemail($id)
  {
    $this->db->set('status','1');
    $this->db->where('id', $id);
    $this->db->update('bk_siswapelanggaran');

    $this->load->model('bk_model', 'bk_model');
    $data['get_pelanggaran'] = $this->bk_model->get_pelanggaran_siswa_byId($id);
    $hpayah = $data['get_pelanggaran']['hpayah'];
    $namasiswa = $data['get_pelanggaran']['namasiswa'];
    $nama_kelas = $data['get_pelanggaran']['nama_kelas'];
    $pelanggaran = $data['get_pelanggaran']['pelanggaran'];
    $emailortu = $data['get_pelanggaran']['emailortu'];
////////////
$sekolah = $this->db->get_where('m_sekolah', ['id' =>
'1'])->row_array();
 $namasekolah=$sekolah['sekolah'];
$smtp_user = $this->db->get_where('options', ['name' =>
'smtp_user'])->row_array();
$smtp_user = $smtp_user['value'];
$smtp_pass = $this->db->get_where('options', ['name' =>
'smtp_pass'])->row_array();
$smtp_pass = $smtp_pass['value'];
$smtp_port = $this->db->get_where('options', ['name' =>
'smtp_port'])->row_array();
$smtp_port = $smtp_port['value'];
$email_sekolah = $this->db->get_where('apiemail', ['name' =>
'email_sekolah'])->row_array();
$email_sekolah = $email_sekolah['value'];
///////////
$config = [
  'protocol'  => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_user' => $smtp_user,
  'smtp_pass' => $smtp_pass,
  'smtp_port' => $smtp_port,
  'mailtype'  => 'html',
  'charset'   => 'utf-8',
  'newline'   => "\r\n"
];
$this->load->library('email');
$this->email->initialize($config);
$this->email->from($email_sekolah, $namasekolah);
$this->email->to($emailortu);
$this->email->subject('Pelanggaran Siswa '.$namasiswa.'!');
$this->email->message("$namasekolah.Info Pelanggaran hari ini : $namasiswa,$nama_kelas,Pelanggaran:$pelanggaran,<br><i>catatan: ini merupakan email pemberitahuan secara otomatis, tidak perlu dibalas/reply</i>");

if ($this->email->send()) {
  $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Alert Email Send !</div>');
  redirect('bk/pelanggaran_siswa');
} else {
  echo $this->email->print_debugger();
  die;
}

  }

  public function laporan_pelanggaran_siswa()
  {
    $data['title'] = 'Laporan Pelanggaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bk_model', 'bk_model');
    $data['datasiswapoint'] = $this->bk_model->get_pelanggaran_siswa_point();

     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('laporan_pelanggaran_siswa', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
    
    }
    public function laporan_pelanggaran_siswa_print()
  {
    $data['title'] = 'Laporan Pelanggaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bk_model', 'bk_model');
    $data['datasiswapoint'] = $this->bk_model->get_pelanggaran_siswa_point();

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_pelanggaran_siswa_print', $data);    
    }
    public function laporan_pelanggaran_siswa_pdf()
  {
    $data['title'] = 'Laporan Pelanggaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bk_model', 'bk_model');
    $data['datasiswapoint'] = $this->bk_model->get_pelanggaran_siswa_point();
    $html = $this->load->view('laporan_pelanggaran_siswa_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporan_pelanggaran_siswa_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
    
    }

    public function laporan_pelanggaran_tanggal()
  {
    $data['title'] = 'Laporan Pelanggaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bk_model', 'bk_model');
    $daritanggal = date('Y-m-01');
    $sampaitanggal = date('Y-m-d');
    if (isset($_POST['submit'])) {
      $daritanggal = $this->input->post('daritanggal');
      $sampaitanggal = $this->input->post('sampaitanggal');
      $data['datapelanggaransiswa'] = $this->bk_model->get_pelanggaran_siswa_tanggal($daritanggal,$sampaitanggal);
    }
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_pelanggaran_tanggal', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanpelanggarantanggal_print($daritanggal,$sampaitanggal)
  {
    $data['title'] = 'Laporan Pelanggaran Tanggal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->model('bk_model', 'bk_model');
    $data['datapelanggaransiswa'] = $this->bk_model->get_pelanggaran_siswa_tanggal($daritanggal,$sampaitanggal);

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporanpelanggarantanggal_print', $data);    
    }

    public function laporanpelanggarantanggal_pdf($daritanggal,$sampaitanggal)
  {
    $data['title'] = 'Laporan Pelanggaran Tanggal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->model('bk_model', 'bk_model');
    $data['datapelanggaransiswa'] = $this->bk_model->get_pelanggaran_siswa_tanggal($daritanggal,$sampaitanggal);
    $html = $this->load->view('laporanpelanggarantanggal_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanpelanggarantanggal_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
    
    }
    public function detail_pelanggaran_siswa($siswa_id)
  {
    $data['title'] = 'Laporan Pelanggaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bk_model', 'bk_model');
    $data['datapelanggaranbysiswa'] = $this->bk_model->get_pelanggaran_siswa_bysiswa($siswa_id);
    $data['datadetailsiswa'] = $this->bk_model->siswagetDatabyId($siswa_id);
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('detail_pelanggaran_siswa', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
    
    }
    public function detail_pelanggaran_siswa_print($siswa_id)
    {
      $data['title'] = 'Laporan Pelanggaran Siswa';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
  
      $this->load->model('bk_model', 'bk_model');
      $data['datapelanggaranbysiswa'] = $this->bk_model->get_pelanggaran_siswa_bysiswa($siswa_id);
      $data['datadetailsiswa'] = $this->bk_model->siswagetDatabyId($siswa_id);
      $this->load->view('themes/backend/headerprint', $data);
      $this->load->view('detail_pelanggaran_siswa_print', $data);  
      
      }
      public function detail_pelanggaran_siswa_pdf($siswa_id)
      {
        $data['title'] = 'Laporan Pelanggaran Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
        $this->load->model('bk_model', 'bk_model');
        $data['datapelanggaranbysiswa'] = $this->bk_model->get_pelanggaran_siswa_bysiswa($siswa_id);
        $data['datadetailsiswa'] = $this->bk_model->siswagetDatabyId($siswa_id);
        $this->load->view('themes/backend/headerprint', $data);
        $html = $this->load->view('detail_pelanggaran_siswa_pdf', $data, true);
        // create pdf using dompdf
        $filename = 'detail_pelanggaran_siswa_pdf' . date('dmY') . '_' . date('His');
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
        
        }

        public function prestasi_siswa()
        {
          $data['title'] = 'Prestasi Siswa';
          $data['user'] = $this->db->get_where('user', ['email' =>
          $this->session->userdata('email')])->row_array();
      
          $this->load->model('bk_model', 'bk_model');
          $data['datatingkat'] = $this->bk_model->get_tingkat();
          $data['selectsiswa'] = $this->bk_model->siswagetDataAll();
          $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
          $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
          $data['tahun_akademik_default']['value']])->row_array();
          $data['tahunakademikdefault']=$data['m_tahunakademik']['id'];
          $data['semesterdefault']=$data['m_tahunakademik']['semester'];
          $data['tgldefault'] = date('Y-m-d');
          $data['dataprestasisiswa'] = $this->bk_model->get_prestasi_siswa();
          $this->form_validation->set_rules('tanggal', 'tanggal','required');
          if ($this->form_validation->run() == false) {
           $this->load->view('themes/backend/header', $data);
           $this->load->view('themes/backend/sidebar', $data);
           $this->load->view('themes/backend/topbar', $data);
           $this->load->view('prestasi_siswa', $data);
           $this->load->view('themes/backend/footer');
           $this->load->view('themes/backend/footerajax');
          
          }else{
            $this->load->model('bk_model', 'bk_model');
            $data['kelas_siswa']=$this->bk_model->get_kelas_siswa($this->input->post('siswa_id'));
            $kelas_id = $data['kelas_siswa']['kelas_id'];
              $data = [
                'tahunakademik_id' => $this->input->post('tahunakademik_id'),
                'semester' => $this->input->post('semester'),
                'tanggal' => $this->input->post('tanggal'),
                'siswa_id' => $this->input->post('siswa_id'),
                'kelas_id' =>  $kelas_id,
                'tingkat_id' => $this->input->post('tingkat_id'),
                'lomba' => $this->input->post('lomba'),
                'instansi' => $this->input->post('instansi'),
                'prestasi' => $this->input->post('prestasi')
                 ];
                 $this->db->insert('bk_siswaprestasi', $data);
      //log act
      //$data['table'] = $this->db->get_where('bk_pelanggaran', ['id' => $id])->row_array();
      $user=$this->session->userdata('email');
      $item='';
      activity_log($user,'Tambah Prestasi Siswa',$item);
      //end log
                 $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
                 redirect('bk/prestasi_siswa');
          }
        }
        public function edit_prestasi_siswa($id)
        {
          $data['title'] = 'Prestasi Siswa';
          $data['user'] = $this->db->get_where('user', ['email' =>
          $this->session->userdata('email')])->row_array();
      
          $this->load->model('bk_model', 'bk_model');
          $data['datatingkat'] = $this->bk_model->get_tingkat();
          $data['selectsiswa'] = $this->bk_model->siswagetDataAll();
          $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
          $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
          $data['tahun_akademik_default']['value']])->row_array();
          $data['tahunakademikdefault']=$data['m_tahunakademik']['id'];
          $data['semesterdefault']=$data['m_tahunakademik']['semester'];
          $data['tgldefault'] = date('Y-m-d');
          $data['dataprestasisiswa'] = $this->bk_model->get_prestasi_siswa();
          $data['getprestasisiswa'] = $this->bk_model->get_prestasi_siswa_byId($id);
          $this->form_validation->set_rules('tanggal', 'tanggal','required');
          if ($this->form_validation->run() == false) {
           $this->load->view('themes/backend/header', $data);
           $this->load->view('themes/backend/sidebar', $data);
           $this->load->view('themes/backend/topbar', $data);
           $this->load->view('edit_prestasi_siswa', $data);
           $this->load->view('themes/backend/footer');
           $this->load->view('themes/backend/footerajax');
          
          }else{
            $this->load->model('bk_model', 'bk_model');
            $data['kelas_siswa']=$this->bk_model->get_kelas_siswa($this->input->post('siswa_id'));
            $kelas_id = $data['kelas_siswa']['kelas_id'];
              $data = [
                'tahunakademik_id' => $this->input->post('tahunakademik_id'),
                'semester' => $this->input->post('semester'),
                'tanggal' => $this->input->post('tanggal'),
                'siswa_id' => $this->input->post('siswa_id'),
                'kelas_id' =>  $kelas_id,
                'tingkat_id' => $this->input->post('tingkat_id'),
                'lomba' => $this->input->post('lomba'),
                'instansi' => $this->input->post('instansi'),
                'prestasi' => $this->input->post('prestasi')
                  ];
          $this->db->where('id', $id);
          $this->db->update('bk_siswaprestasi', $data);
      //log act
      //$data['table'] = $this->db->get_where('bk_pelanggaran', ['id' => $id])->row_array();
      $user=$this->session->userdata('email');
      $item='';
      activity_log($user,'Edit Prestasi Siswa',$item);
      //end log
                 $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
                 redirect('bk/prestasi_siswa');
          }
        }
        public function hapus_prestasi_siswa($id)
        {
      //log act
      //$data['table'] = $this->db->get_where('bk_pelanggaran', ['id' => $id])->row_array();
      $user=$this->session->userdata('email');
      $item='';
      activity_log($user,'Hapus prestasi Siswa',$item);
      //end log
          $this->db->where('id', $id);
          $this->db->delete('bk_siswaprestasi');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
          redirect('bk/prestasi_siswa');
        }
        public function detail_prestasi_siswa($siswa_id)
        {
          $data['title'] = 'Laporan Prestasi Siswa';
          $data['user'] = $this->db->get_where('user', ['email' =>
          $this->session->userdata('email')])->row_array();
      
          $this->load->model('bk_model', 'bk_model');
          $data['dataprestasibysiswa'] = $this->bk_model->get_prestasi_siswa_bysiswa($siswa_id);
          $data['datadetailsiswa'] = $this->bk_model->siswagetDatabyId($siswa_id);
           $this->load->view('themes/backend/header', $data);
           $this->load->view('themes/backend/sidebar', $data);
           $this->load->view('themes/backend/topbar', $data);
           $this->load->view('detail_prestasi_siswa', $data);
           $this->load->view('themes/backend/footer');
           $this->load->view('themes/backend/footerajax');
          
          }
          public function detail_prestasi_siswa_print($siswa_id)
          {
            $data['title'] = 'Laporan Prestasi Siswa';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
        
            $this->load->model('bk_model', 'bk_model');
            $data['dataprestasibysiswa'] = $this->bk_model->get_prestasi_siswa_bysiswa($siswa_id);
            $data['datadetailsiswa'] = $this->bk_model->siswagetDatabyId($siswa_id);
            $this->load->view('themes/backend/headerprint', $data);
            $this->load->view('detail_prestasi_siswa_print', $data);  
            
            }
            public function detail_prestasi_siswa_pdf($siswa_id)
            {
              $data['title'] = 'Laporan Prestasi Siswa';
              $data['user'] = $this->db->get_where('user', ['email' =>
              $this->session->userdata('email')])->row_array();
          
              $this->load->model('bk_model', 'bk_model');
              $data['dataprestasibysiswa'] = $this->bk_model->get_prestasi_siswa_bysiswa($siswa_id);
              $data['datadetailsiswa'] = $this->bk_model->siswagetDatabyId($siswa_id);
              $this->load->view('themes/backend/headerprint', $data);
              $html = $this->load->view('detail_prestasi_siswa_pdf', $data, true);
              // create pdf using dompdf
              $filename = 'detail_prestasi_siswa_pdf' . date('dmY') . '_' . date('His');
              $paper = 'A4';
              $orientation = 'potrait';
              pdf_create($html, $filename, $paper, $orientation);
              
              }       
              
              public function laporan_prestasi_tanggal()
              {
                $data['title'] = 'Laporan Prestasi';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
            
                $this->load->model('bk_model', 'bk_model');
                $daritanggal = date('Y-m-01');
                $sampaitanggal = date('Y-m-d');
                if (isset($_POST['submit'])) {
                  $daritanggal = $this->input->post('daritanggal');
                  $sampaitanggal = $this->input->post('sampaitanggal');
                  $data['dataprestasisiswa'] = $this->bk_model->get_prestasi_siswa_tanggal($daritanggal,$sampaitanggal);
                }
                $data['daritanggal'] = $daritanggal;
                $data['sampaitanggal'] = $sampaitanggal;
                $this->load->view('themes/backend/header', $data);
                $this->load->view('themes/backend/sidebar', $data);
                $this->load->view('themes/backend/topbar', $data);
                $this->load->view('laporan_prestasi_tanggal', $data);
                $this->load->view('themes/backend/footer');
                $this->load->view('themes/backend/footerajax');
              }
              public function laporanprestasitanggal_print($daritanggal,$sampaitanggal)
              {
                $data['title'] = 'Laporan Prestasi';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $data['daritanggal'] = $daritanggal;
                $data['sampaitanggal'] = $sampaitanggal;
                $this->load->model('bk_model', 'bk_model');
                $data['dataprestasisiswa'] = $this->bk_model->get_prestasi_siswa_tanggal($daritanggal,$sampaitanggal);
            
                $this->load->view('themes/backend/headerprint', $data);
                $this->load->view('laporanprestasitanggal_print', $data);    
                }
            
                public function laporanprestasitanggal_pdf($daritanggal,$sampaitanggal)
              {
                $data['title'] = 'Laporan Prestasi';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $data['daritanggal'] = $daritanggal;
                $data['sampaitanggal'] = $sampaitanggal;
                $this->load->model('bk_model', 'bk_model');
                $data['dataprestasisiswa'] = $this->bk_model->get_prestasi_siswa_tanggal($daritanggal,$sampaitanggal);
                $html = $this->load->view('laporanprestasitanggal_pdf', $data, true);
                // create pdf using dompdf
                $filename = 'laporanprestasitanggal_pdf' . date('dmY') . '_' . date('His');
                $paper = 'A4';
                $orientation = 'potrait';
                pdf_create($html, $filename, $paper, $orientation);
                
                }
  //end
}