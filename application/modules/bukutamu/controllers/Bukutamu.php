<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Bukutamu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // surat_masuk
 public function index()
 {
   $data['title'] = 'BukuTamu';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('bukutamu_model', 'bukutamu_model');
   $data['tahunskrg']=date('Y');
   $data['tanggalskrg']=date('Y-m-d');
   $tanggalskrg=date('Y-m-d');
   $data['bukutamuskrg'] = $this->bukutamu_model->get_bukutamu_bytgl($tanggalskrg);
   $data['selectpegawai'] = $this->bukutamu_model->pegawaiGetDataAll();
   $this->form_validation->set_rules('tahun', 'tahun', 'required');
   $this->form_validation->set_rules('nomor', 'nomor', 'required');
   $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
   $this->form_validation->set_rules('nama', 'nama', 'required');
   $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
   $this->form_validation->set_rules('hp', 'hp', 'required');
   $this->form_validation->set_rules('maksud', 'maksud', 'required');
   $this->form_validation->set_rules('diterima', 'diterima', 'required');
   $this->form_validation->set_rules('catatan', 'catatan', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('bukutamu', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
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
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bukutamu');
   }
 }
 public function edit_bukutamu($id)
  {
    $data['title'] = 'BukuTamu';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['tahunskrg']=date('Y');
    $data['tanggalskrg']=date('Y-m-d');
    $tanggalskrg=date('Y-m-d');
    $data['bukutamuskrg'] = $this->bukutamu_model->get_bukutamu_bytgl($tanggalskrg);

    $data['get_bukutamu'] = $this->bukutamu_model->get_bukutamu_byId($id);
    $data['selectpegawai'] = $this->bukutamu_model->pegawaiGetDataAll();
    $data['diterima']='';
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    $this->form_validation->set_rules('nomor', 'nomor', 'required');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
    $this->form_validation->set_rules('hp', 'hp', 'required');
    $this->form_validation->set_rules('maksud', 'maksud', 'required');
    $this->form_validation->set_rules('diterima', 'diterima', 'required');
    $this->form_validation->set_rules('catatan', 'catatan', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_bukutamu', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
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
          $this->db->where('id', $id);
          $this->db->update('bukutamu', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bukutamu');
    }
  }
  public function hapus_bukutamu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('bukutamu');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('bukutamu');
  }

  public function kirimsms($id)
  {
    $this->db->set('status','1');
    $this->db->where('id', $id);
    $this->db->update('bukutamu');
    $hp_kepsek=apisms('hp_kepsek');
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['get_bukutamu'] = $this->bukutamu_model->get_bukutamu_byId($id);
    $tanggal = $data['get_bukutamu']['tanggal'];
    $nama = $data['get_bukutamu']['nama'];
    $jabatan = $data['get_bukutamu']['jabatan'];
    $maksud = $data['get_bukutamu']['maksud'];
    $diterima = $data['get_bukutamu']['diterima'];
    $catatan = $data['get_bukutamu']['catatan'];
    $pesan = "Info Buku Tamu hari ini : $nama, $jabatan, Maksud:$maksud, Diterima:$diterima, Catatan:$catatan";
    $this->cismsapi->sendsms($hp_kepsek, "$pesan",apisms('user_api_sms'),apisms('user_key_sms'));
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">'.$pesan.'</div>');
    redirect('bukutamu');
  }
  public function kirimemail($id)
  {
    $this->db->set('status','1');
    $this->db->where('id', $id);
    $this->db->update('bukutamu');
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['get_bukutamu'] = $this->bukutamu_model->get_bukutamu_byId($id);
    $tanggal = $data['get_bukutamu']['tanggal'];
    $nama = $data['get_bukutamu']['nama'];
    $jabatan = $data['get_bukutamu']['jabatan'];
    $maksud = $data['get_bukutamu']['maksud'];
    $diterima = $data['get_bukutamu']['nama_guru'];
    $notifemail = $data['get_bukutamu']['notifemail'];
    $catatan = $data['get_bukutamu']['catatan'];
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
$this->email->to($notifemail);
$this->email->subject(' Pemberitahuan Tamu pada'.$tanggal.'!');

$pesan = "Info Buku Tamu hari ini : $nama, $jabatan, Maksud:$maksud, Diterima:$diterima, Catatan:$catatan";

$this->email->message("$namasekolah. $pesan,<br><i>catatan: ini merupakan email pemberitahuan secara otomatis, tidak perlu dibalas/reply</i>");

if ($this->email->send()) {
  $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Alert Email Send !</div>');
  redirect('bukutamu');
} else {
  echo $this->email->print_debugger();
  die;
}
  }

  //end
  public function laporan_bukutamu()
  {
    $data['title'] = 'Laporan BukuTamu';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bukutamu_model', 'bukutamu_model');
    $daritanggal = date('Y-m-01');
    $sampaitanggal = date('Y-m-d');
    if (isset($_POST['submit'])) {
      $daritanggal = $this->input->post('daritanggal');
      $sampaitanggal = $this->input->post('sampaitanggal');
      $data['bukutamu'] = $this->bukutamu_model->bukutamu_darisampai($daritanggal, $sampaitanggal);
    }
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_bukutamu', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanbukutamu_print($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan BukuTamu';
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['bukutamu'] = $this->bukutamu_model->bukutamu_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_bukutamuprint', $data);
  }
  public function laporanbukutamu_pdf($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan BukuTamu';
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['bukutamu'] = $this->bukutamu_model->bukutamu_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $html = $this->load->view('laporan_bukutamupdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporan_bukutamupdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
  public function cetakqrcode()
  {
    $data['title'] = 'Cetak QR Code';
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/images/qrcode/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $url_bukutamupengunjung= base_url('bukutamupengunjung');
    $image_name='qrcode_bukutamu.png';
    $params['data'] = $url_bukutamupengunjung; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name; 
    $this->ciqrcode->generate($params);

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('cetakqrcode', $data);
  }
  //end
}