<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->library('cart');
  }

  // SISWA KEUANGAN
 
  public function siswakeuangan()
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswakeuangan', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function siswakeuangan_tidakaktif()
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll_tidakaktif();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswakeuangan_tidakaktif', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function siswa_tambahbiaya($id)
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['biayacategories'] = $this->db->get('m_biaya_categories')->result_array();
    $data['biaya'] = $this->db->get_where('m_biaya', ['is_publish' =>
    '1'])->result_array();
    $data['siswa_id'] = $id;
    $this->load->model('Keuangan_model', 'keu_model');
    // All records count
    $data['getsiswabyId'] = $this->keu_model->getsiswabyId($id);
    $this->db->select('`siswa_keuangan`.*,`m_biaya`.nama as `biaya`');
    $this->db->from('siswa_keuangan');
    $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
    $this->db->order_by('biaya_id', 'ASC');
    $data['siswa_keuangan'] = $this->db->get()->result_array();

    $this->form_validation->set_rules('biaya_id', 'biaya_id',  'required|callback_check_siswabiaya', array('check_siswabiaya' => 'terdapat Biaya pada Siswa yang sama.'));
    $this->form_validation->set_rules('nominal', 'nominal', 'required|numeric');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswa_tambahbiaya', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $biaya_id = $this->input->post('biaya_id');
      $mbiaya = $this->db->get_where('m_biaya', ['id' =>
      $biaya_id])->row_array();
      $category_id = $mbiaya['category_id'];
      $catbiaya = $this->db->get_where('m_biaya_categories', ['id' =>
      $category_id])->row_array();
      $jenis = $catbiaya['nama'];
      $data = [
        'biaya_id' => $this->input->post('biaya_id'),
        'nominal' => $this->input->post('nominal'),
        'siswa_id' => $id,
        'user_id' => $this->input->post('user_id'),
        'jenis' => $jenis
      ];
      $this->db->insert('siswa_keuangan', $data);

      ////////////////////////////////////////////
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('keuangan/siswa_tambahbiaya/' . $id);
    }
  }
  function check_siswabiaya()
  {
    $siswa_id = $this->input->post('siswa_id');
    $biaya_id = $this->input->post('biaya_id');

    $this->db->select('biaya_id');
    $this->db->from('siswa_keuangan');
    $this->db->where('siswa_id', $siswa_id);
    $this->db->where('biaya_id', $biaya_id);
    $query = $this->db->get();
    $num = $query->num_rows();
    if ($num > 0) {
      return FALSE;
    } else {
      return TRUE;
    }
  }
  public function hapusbiayasiswa($id, $siswa_id)
  {
    $this->db->where('id', $id);
    $this->db->delete('siswa_keuangan');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('keuangan/siswa_tambahbiaya/' . $siswa_id);
  }

  public function siswa_ubahjalurbiaya()
  {
    $id = $this->input->post('id');
    $nominal = $this->input->post('nominal');

    $this->db->set('nominal', $nominal);

    $this->db->where('id', $id);
    $this->db->update('siswa_keuangan');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Changed!</div>');
  }
  // SISWA BAYAR

  public function siswabayar()
  {
    $data['title'] = 'Pembayaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['user_id'] =$this->session->userdata('user_id');

    $siswa_id = $this->session->userdata('siswa_id');
    $this->load->model('keuangan_model', 'keu_model');
    $data['selectsiswa'] = $this->keu_model->siswagetDataAll();
    $data['siswaresult'] = $this->keu_model->getsiswabyId($siswa_id);
    $data['sk'] = $this->keu_model->getsiswaketbyId($siswa_id);

    $this->db->select('`siswa_keuangan`.*,`m_biaya`.nama as `biaya`');
    $this->db->from('siswa_keuangan');
    $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
    $this->db->where('siswa_id', $siswa_id);
    $this->db->where('is_paid', '0');
    $data['selectbiayasiswa'] = $this->db->get()->result_array();
    $data['carabayar'] = $this->db->get('m_carabayar')->result_array();
    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswabayar', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');

    if (isset($_POST['addsiswa'])) {
      $siswa_id = $this->input->post('siswa_id');
      $this->session->set_userdata('siswa_id', $siswa_id);
      redirect('keuangan/siswabayar');
    }
    if (isset($_POST['addbiaya'])) {
      $biaya_id = $this->input->post('biaya_id');
      $this->db->select('`siswa_keuangan`.*,`m_biaya`.nama as `biaya`');
      $this->db->from('siswa_keuangan');
      $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
      $this->db->where('biaya_id', $biaya_id);
      $this->db->where('siswa_id', $siswa_id);
      $siswabiaya = $this->db->get()->row_array();
      $biaya_id = $siswabiaya['biaya_id'];
      $biaya = $siswabiaya['biaya'];
      $jenis = $siswabiaya['jenis'];
      $nominal = $siswabiaya['nominal'];
      $jenis = $siswabiaya['jenis'];
      $data = array(
        'id'     => $biaya_id,
        'qty'     => '1',
        'price'     => $nominal,
        'name'     => $biaya,
        'harga'     => $nominal,
        'jenis'     => $jenis
      );
      $this->cart->insert($data);

      redirect('keuangan/siswabayar');
    }

    if (isset($_POST['simpan_transaksi'])) {

      $carabayar = $this->input->post('carabayar');
      $keterangan = $this->input->post('keterangan');
      $totalcart = $this->input->post('totalcart');
      $bayar = $this->input->post('bayar');
      $bayar2 = $this->input->post('bayar2');
      $kembali = $this->input->post('kembali');
      $nomor_nota2 = $this->input->post('nomor_nota2');
      $tanggal2 = $this->input->post('tanggal2');
      $user_id = $this->input->post('user_id');
      $this->session->set_userdata('keterangan', $keterangan);
      $siswa_id = $this->session->userdata('siswa_id');
      if (($kembali == '') or ($kembali < '0') or ($bayar <= '0') or ($bayar == '') or ($totalcart == '') or ($totalcart == '0') or ($siswa_id == '')) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Silahkan Isi Siswa, Biaya, Bayar Tidak Boleh Kosong</div>');
        redirect('keuangan/siswabayar');
      } else {
        $data = [
          'nomor_nota'     =>  $nomor_nota2,
          'tanggal'     =>  $tanggal2,
          'totalcart'     =>  $totalcart,
          'bayar'     =>  $bayar2,
          'siswa_id'     =>  $this->session->userdata('siswa_id'),
          'user_id'     =>  $user_id,
          'keterangan'     =>  $this->session->userdata('keterangan'),
          'carabayar'     =>  $carabayar
        ];
        $this->db->insert('siswa_bayar_master', $data);
        $id_master = $this->db->insert_id();
        $cart = $this->cart->contents();
        foreach ($cart as $item) :
          $biaya_id = $item['id'];
          $jenis = $item['jenis'];
          $biaya = $item['name'];
          $nominal = $item['harga'];
          $datadetail = [
            'id_master'     =>  $id_master,
            'biaya_id'     =>  $biaya_id,
            'jenis'     =>  $jenis,
            'biaya'     =>  $biaya,
            'nominal'     =>  $nominal
          ];
          $this->db->insert('siswa_bayar_detail', $datadetail);
          // update tunggakan terbayar
          $this->db->set('is_paid', '1');
          $this->db->where('biaya_id', $biaya_id);
          $this->db->where('siswa_id', $siswa_id);
          $this->db->update('siswa_keuangan');
        endforeach;
        $this->session->unset_userdata('siswa_id');
        $this->session->unset_userdata('nomor_nota');
        $this->session->unset_userdata('tanggal');
        $this->session->unset_userdata('keterangan');
        $this->cart->destroy();
        ////////////////////////////////////////////
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
        $this->session->set_userdata('id_nota', $id_master);
        redirect('keuangan/siswabayar_kembali/' . $id_master);
//        redirect('keuangan/siswabayar_nota/' . $id_master);
      }
    }
  }

  public function siswabayar_hapusitem($biaya_id)
  {
    $this->cart->remove($biaya_id);
    redirect('keuangan/siswabayar');

    //      redirect('keuangan/siswabayar');
  }
  public function siswabayar_kembali($id_master = '')
  {
    $data['title'] = 'Pembayaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    
    if ($this->session->userdata('id_nota') != '') {
      $data['id_nota'] = $this->session->userdata('id_nota');
      $id_nota = $this->session->userdata('id_nota');
    } elseif ($id_master > '0') {
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    } else {
      $this->load->model('keuangan_model', 'keu_model');
      $id_master = $this->keu_model->getlast_idnota($this->session->userdata('user_id'));
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    }
    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayarmaster'] = $this->keu_model->siswabayarmaster_allbyId($id_nota);
    $data['kembali']=$data['siswabayarmaster']['bayar']-$data['siswabayarmaster']['totalcart'];
    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswabayar_kembali', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function siswabayar_nota($id_master = '')
  {
    $data['title'] = 'Pembayaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    if ($this->session->userdata('id_nota') != '') {
      $data['id_nota'] = $this->session->userdata('id_nota');
      $id_nota = $this->session->userdata('id_nota');
    } elseif ($id_master > '0') {
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    } else {
      $this->load->model('keuangan_model', 'keu_model');
      $id_master = $this->keu_model->getlast_idnota($this->session->userdata('user_id'));
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    }
    $data['logoslip'] = $this->db->get_where('m_logoslip', ['id' =>
    '1'])->row_array();
    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayarmaster'] = $this->keu_model->siswabayarmaster_allbyId($id_nota);
    $this->db->select('`siswa_bayar_detail`.*');
    $this->db->from('siswa_bayar_detail');
    $data['siswabayardetail'] = $this->db->get()->result_array();
    $this->load->view('siswabayar_nota', $data);
  }
  public function api_kirimsms($id_master = '')
  {
    $data['title'] = 'Pembayaran Siswa Kirim SMS';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $sekolah = $this->db->get_where('m_sekolah', ['id' =>
    '1'])->row_array();
     $namasekolah=$sekolah['sekolah'];
    if ($this->session->userdata('id_nota') != '') {
      $data['id_nota'] = $this->session->userdata('id_nota');
      $id_nota = $this->session->userdata('id_nota');
    } elseif ($id_master > '0') {
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    } else {
      $this->load->model('keuangan_model', 'keu_model');
      $id_master = $this->keu_model->getlast_idnota($this->session->userdata('user_id'));
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    }
    $this->load->model('keuangan_model', 'keu_model');
  $data['siswabayarmaster'] = $this->keu_model->siswabayarmaster_allbyId($id_nota);
  $hpayah = $data['siswabayarmaster']['hpayah'];
  $bayar = $data['siswabayarmaster']['bayar'];
  $namasiswa = $data['siswabayarmaster']['namasiswa'];
  $tanggal = $data['siswabayarmaster']['tanggal'];
  $nomor_nota = $data['siswabayarmaster']['nomor_nota'];
  $nominalbayar = nominal($bayar);
  $tanggal=date('d/m/Y',strtotime($tanggal));
  $this->cismsapi->sendsms($hpayah, "$namasekolah.Terima kasih telah melakukan pembayaran Rp $nominalbayar,A/n $namasiswa, $tanggal,",apisms('user_api_sms'),apisms('user_key_sms'));
 //  $data['sentsms']='<div class="alert alert-success" role"alert">'.$hpayah.' Terima kasih telah melakukan pembayaran sekolah Rp '.nominal($bayar).', atas nama '.$namasiswa.', tgl '.$tanggal.' Nota '.$nomor_nota.'. Rincian pembayaran hub Tata Usaha</div>';
   redirect('keuangan/siswabayar_kirimsms');
}
public function siswabayar_kirimsms($id_master = '')
{ 
  $data['title'] = 'Pembayaran Siswa Kirim SMS';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $sekolah = $this->db->get_where('m_sekolah', ['id' =>
 '1'])->row_array();
  $namasekolah=$sekolah['sekolah'];
  if ($this->session->userdata('id_nota') != '') {
    $data['id_nota'] = $this->session->userdata('id_nota');
    $id_nota = $this->session->userdata('id_nota');
  } elseif ($id_master > '0') {
    $data['id_nota'] = $id_master;
    $id_nota = $id_master;
  } else {
    $this->load->model('keuangan_model', 'keu_model');
    $id_master = $this->keu_model->getlast_idnota($this->session->userdata('user_id'));
    $data['id_nota'] = $id_master;
    $id_nota = $id_master;
  }
  $this->load->model('keuangan_model', 'keu_model');
$data['siswabayarmaster'] = $this->keu_model->siswabayarmaster_allbyId($id_nota);
$hpayah = $data['siswabayarmaster']['hpayah'];
$bayar = $data['siswabayarmaster']['bayar'];
$namasiswa = $data['siswabayarmaster']['namasiswa'];
$tanggal = $data['siswabayarmaster']['tanggal'];
$nomor_nota = $data['siswabayarmaster']['nomor_nota'];
$tanggal=date('d/m/Y',strtotime($tanggal));
$cekkredit = $this->cismsapi->cekkredit(apisms('user_api_sms'),apisms('user_key_sms'));
$data['sentsms']='<div class="alert alert-success" role"alert">'.$hpayah.','.$namasekolah.'. Terima kasih telah melakukan pembayaran Rp '.nominal($bayar).', A/n'.$namasiswa.', pada '.$tanggal.'</div>';
$data['cekkredit'] = $cekkredit;
  $this->load->view('siswabayar_kirimsms', $data);
}

public function api_kirimemail($id_master = '')
{
  $data['title'] = 'Pembayaran Siswa Kirim Email';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $sekolah = $this->db->get_where('m_sekolah', ['id' =>
  '1'])->row_array();
   $namasekolah=$sekolah['sekolah'];
  if ($this->session->userdata('id_nota') != '') {
    $data['id_nota'] = $this->session->userdata('id_nota');
    $id_nota = $this->session->userdata('id_nota');
  } elseif ($id_master > '0') {
    $data['id_nota'] = $id_master;
    $id_nota = $id_master;
  } else {
    $this->load->model('keuangan_model', 'keu_model');
    $id_master = $this->keu_model->getlast_idnota($this->session->userdata('user_id'));
    $data['id_nota'] = $id_master;
    $id_nota = $id_master;
  }
  $this->load->model('keuangan_model', 'keu_model');
$data['siswabayarmaster'] = $this->keu_model->siswabayarmaster_allbyId($id_nota);
$emailortu = $data['siswabayarmaster']['emailortu'];
$bayar = $data['siswabayarmaster']['bayar'];
$namasiswa = $data['siswabayarmaster']['namasiswa'];
$tanggal = $data['siswabayarmaster']['tanggal'];
$nomor_nota = $data['siswabayarmaster']['nomor_nota'];
$nominalbayar = nominal($bayar);
$tanggal=date('d/m/Y',strtotime($tanggal));
////////////
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
$this->email->subject('Pembayaran Siswa '.$namasiswa.'!');
$this->email->message("$namasekolah.Terima kasih telah melakukan pembayaran Rp $nominalbayar,A/n $namasiswa, $tanggal ,<br><i>catatan: ini merupakan email pemberitahuan secara otomatis, tidak perlu dibalas/reply</i>");

if ($this->email->send()) {
  return true;
} else {
  echo $this->email->print_debugger();
  die;
}
$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Alert Email Send !</div>');
 redirect('keuangan/api_kirimemail/'.$id_master);
}
  public function siswabayar_cancel()
  {
    $this->session->unset_userdata('siswa_id');
    $this->session->unset_userdata('nomor_nota');
    $this->session->unset_userdata('tanggal');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('keterangan');
    $this->cart->destroy();
    redirect('keuangan/siswabayar');
  }

  public function kosongkancart()
  {
    $this->cart->destroy();
    $this->session->unset_userdata('totalcart');
    redirect('keuangan/siswabayar');
  }
  public function laporan_keuangan()
  {
    $data['title'] = 'Laporan Keuangan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();
    $data['mpetugas'] = $this->keu_model->getpetugas();
    $data['mcarabayar'] = $this->db->get('m_carabayar')->result_array();

    $daritanggal = date('Y-m-01');
    $sampaitanggal = date('Y-m-d');
    $carabayar = 'semua';
    $petugas = 'semua';



    if (isset($_POST['submit'])) {
      $daritanggal = $this->input->post('daritanggal');
      $sampaitanggal = $this->input->post('sampaitanggal');
      $carabayar = $this->input->post('carabayar');
      $petugas = $this->input->post('petugas');
      $data['siswabayar'] = $this->keu_model->siswabayarmaster_darisampai($daritanggal, $sampaitanggal, $carabayar, $petugas);
    }
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $data['carabayar'] = $carabayar;
    $data['petugas'] = $petugas;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_keuangan', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function laporan_print($daritanggal, $sampaitanggal, $carabayar, $petugas)
  {
    $data['title'] = 'Laporan Keuangan';
    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayar'] = $this->keu_model->siswabayarmaster_darisampai($daritanggal, $sampaitanggal, $carabayar, $petugas);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $data['carabayar'] = $carabayar;
    $data['petugas'] = $petugas;
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_print', $data);
  }
  public function laporan_excel($daritanggal, $sampaitanggal, $carabayar, $petugas)
  {
    $data['title'] = 'Laporan Keuangan';
    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayar'] = $this->keu_model->siswabayarmaster_darisampai($daritanggal, $sampaitanggal, $carabayar, $petugas);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $data['carabayar'] = $carabayar;
    $data['petugas'] = $petugas;
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_excel', $data);
  }

  public function laporan_pdf($daritanggal, $sampaitanggal, $carabayar, $petugas)
  {
    $data['title'] = 'Laporan Keuangan';
    //load content html
    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayar'] = $this->keu_model->siswabayarmaster_darisampai($daritanggal, $sampaitanggal, $carabayar, $petugas);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $data['carabayar'] = $carabayar;
    $data['petugas'] = $petugas;
    $html = $this->load->view('laporan_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporankeuangan_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
  // SISWA Bayar Void

  public function siswabayarvoid()
  {
    $data['title'] = 'Pembayaran Siswa Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayarbatal'] = $this->keu_model->siswabayarmaster_batal();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswabayarvoid', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function siswabayarvoid_list()
  {
    $data['title'] = 'Pembayaran Siswa Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayarbatal'] = $this->keu_model->siswabayarmaster_batal();
    $data['siswabayarmaster_all'] = $this->keu_model->siswabayarmaster_all('desc');
    $this->form_validation->set_rules('master_id', 'master_id', 'required');

    // Load view
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswabayarvoid_list', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $master_id = $this->input->post('master_id');
      redirect('keuangan/siswabayarvoid_add/' . $master_id);
    }
  }

  public function siswabayarvoid_add($id_master)
  {
    $data['title'] = 'Pembayaran Siswa Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswabayarbatal'] = $this->keu_model->siswabayarmaster_batal();
    $data['getsiswabayarmaster'] = $this->keu_model->siswabayarmaster_allbyId($id_master);
    $data['getsiswabayardetail'] = $this->keu_model->siswabayardetail_allbyId($id_master);
    $this->form_validation->set_rules('keterangan_batal', 'keterangan_batal', 'required');

    // Load view
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswabayarvoid_add', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $nomor_nota = $this->input->post('nomor_nota');
      $tanggal = $this->input->post('tanggal');
      $keterangan_batal = $this->input->post('keterangan_batal');
      $siswa_id = $this->input->post('siswa_id');
      $user_batal = $this->input->post('user_batal');

      $databatal = [
        'id_master'     =>  $id_master,
        'nomor_nota'     =>  $nomor_nota,
        'tanggal'     =>  $tanggal,
        'keterangan_batal'     =>  $keterangan_batal,
        'siswa_id'     =>  $siswa_id,
        'user_batal'     =>  $user_batal
      ];

      $this->db->insert('siswa_bayar_batal', $databatal);

      //update siswa bayar master

      $this->db->set('bayar', '0');
      $this->db->where('id_master', $id_master);
      $this->db->update('siswa_bayar_master');

      //update siswa keuangan
      $getsiswabayardetail = $this->db->get_where('siswa_bayar_detail', ['id_master' =>
      $id_master])->result_array();
      foreach ($getsiswabayardetail as $dt) :

        $biaya_id = $dt['biaya_id'];
        $this->db->set('is_paid', '0');
        $this->db->where('siswa_id', $siswa_id);
        $this->db->where('biaya_id', $biaya_id);
        $this->db->update('siswa_keuangan');

      endforeach;
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('keuangan/siswabayarvoid');
    }
  }

  public function siswabayar_list($rowno = 0)
  {
    $data['title'] = 'Cetak Pembayaran Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Keuangan_model');
    // Search text
    $search_text = "";
    if ($this->input->post('submit') != NULL) {
      $search_text = $this->input->post('search');
      $this->session->set_userdata(array("search" => $search_text));
    } else {
      if ($this->session->userdata('search') != NULL) {
        $search_text = $this->session->userdata('search');
      }
    }

    // Row per page
    $rowperpage = 5;

    // Row position
    if ($rowno != 0) {
      $rowno = ($rowno - 1) * $rowperpage;
    }

    // All records count
    $allcount = $this->Keuangan_model->getrecordCount($search_text);

    // Get records
    $users_record = $this->Keuangan_model->getData($rowno, $rowperpage, $search_text);

    // Pagination Configuration
    $config['base_url'] = base_url('keuangan/siswabayar_list');
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    // Initialize
    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswabayar_list', $data);
    $this->load->view('themes/backend/footer');
  }


  public function siswatagihan()
  {
    $data['title'] = 'Tagihan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswatagihan', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function siswatagihan_cetak($id)
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['logoslip'] = $this->db->get_where('m_logoslip', ['id' =>
    '1'])->row_array();
    $this->load->model('keuangan_model', 'keu_model');
    // All records count
    $data['getsiswabyId'] = $this->keu_model->getsiswabyId($id);
    $this->db->select('`siswa_keuangan`.*,`m_biaya`.nama as `biaya`');
    $this->db->from('siswa_keuangan');
    $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
    $this->db->order_by('biaya_id', 'ASC');
    $data['siswa_keuangan'] = $this->db->get()->result_array();

    // Load view

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('siswatagihan_cetak', $data);
  }

  public function siswaspp($id = 'all')
  {
    $data['title'] = 'Keuangan SPP';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    $data['getsppsiswa'] = $this->keu_model->siswagetDataspp($id);

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswaspp', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function editspp($id)
  {
    $data['title'] = 'Keuangan SPP';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    $data['getsppsiswa'] = $this->keu_model->siswagetDataspp($id);
    $this->form_validation->set_rules('nominal', 'nominal', 'required|numeric');

    // Load view
    if ($this->form_validation->run() == false) {
      // Load view
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('editspp', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $siswa_id = $this->input->post('siswa_id');
      $nominal = $this->input->post('nominal');
      if ($siswa_id <> '') {
        $this->db->set('nominal', $nominal);
        $this->db->where('siswa_id', $siswa_id);
        $this->db->update('siswa_spp');
      } else {
        $data = [
          'siswa_id' => $id,
          'nominal' =>  $nominal
        ];
        $this->db->insert('siswa_spp', $data);
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('keuangan/siswaspp');
    }
  }

  public function settingspp_global()
  {
    $data['title'] = 'Keuangan SPP';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();



    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('settingspp_global', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function exportsppcsv()
  {
    $this->load->dbutil();
    $this->load->helper('download');
    // get data
    $this->load->model('Keuangan_model', 'keu_model');
    $student_data = $this->keu_model->fetch_data();

    // file creation
    $delimiter = ";";
    $newline = "\r\n";
    $enclosure = '';
    $data = $this->dbutil->csv_from_result($student_data, $delimiter, $newline, $enclosure);
    $namefile = 'Setting_SPP_Siswa_' . date('Ymd_His') . '.csv';
    force_download($namefile, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported to CSV !</div>');

    redirect('keuangan/settingspp_global');
  }

  public function importsppcsv()
  {
    $file = $_FILES['siswaspp']['tmp_name'];

    // Medapatkan ekstensi file csv yang akan diimport.
    $ekstensi  = explode('.', $_FILES['siswaspp']['name']);

    // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

    if (empty($file)) {
      $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
      redirect('keuangan/settingspp_global');
    } else {
      // Validasi apakah file yang diupload benar-benar file csv.
      if (strtolower(end($ekstensi)) == 'csv' && $_FILES["siswaspp"]["size"] > 0) {

        $i = 0;
        $handle = fopen($file, "r");
        while (($row = fgetcsv($handle, 2048))) {
          $i++;
          if ($i == 1) continue;
          // Data yang akan disimpan ke dalam databse
          //$this->db->where('siswa_id', $siswa_id);
          //$this->db->delete('siswa_spp');
          $dataraw =  $row[0];
          $arr = explode(";", $dataraw);
          $siswa_id =  $arr[0];
          $nominal =  $arr[4];

          $data = [
            'siswa_id' => $siswa_id,
            'nominal' => $nominal,
          ];

          // Simpan data ke database.
          $this->db->replace('siswa_spp', $data);
          $this->session->set_flashdata('messageimport', '<div class="alert alert-primary" role"alert">siswa_id : ' . $siswa_id . '<br></div>');
        }
        fclose($handle);

        $this->session->set_flashdata('messageimport', '<div class="alert alert-success" role"alert">Import Data Successed !</div>');
        redirect('keuangan/settingspp_global');
      } else {
        $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
        redirect('keuangan/settingspp_global');
      }
    }
  }

  public function siswasppdata($id = 'all')
  {
    $data['title'] = 'Keuangan SPP';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    $data['getsppsiswa'] = $this->keu_model->siswagetDataspp($id);


    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswasppdata', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function tambahbiaya_global()
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['biayacategories'] = $this->db->get('m_biaya_categories')->result_array();
    $data['biaya'] = $this->db->get_where('m_biaya', ['is_publish' =>
    '1'])->result_array();

    $query = "SELECT `m_biaya`.*,`m_biaya_categories`.`nama`as category
        FROM `m_biaya` LEFT JOIN `m_biaya_categories`
        ON `m_biaya`.`category_id`=`m_biaya_categories`.`id`";
    $data['listbiaya'] = $this->db->query($query)->result_array();

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('tambahbiaya_global', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function exportbiayacsv()
  {
    $this->form_validation->set_rules('biaya_id', 'biaya_id', 'required');
    // Load view
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Biaya harus dipilih!</div>');
      redirect('keuangan/tambahbiaya_global');
    } else {
      $biaya_id = $this->input->post('biaya_id');
      $this->load->dbutil();
      $this->load->helper('download');
      // get data
      $this->load->model('Keuangan_model', 'keu_model');
      $databiaya = $this->keu_model->getbiayabyId($biaya_id);
      $namabiaya=$databiaya["namabiaya"];
      $jenis=$databiaya["jenis"];
      $student_data = $this->keu_model->fetch_databiayasiswa($biaya_id,$namabiaya,$jenis);

      // file creation
      $delimiter = ";";
      $newline = "\r\n";
      $enclosure = '';
      $data = $this->dbutil->csv_from_result($student_data, $delimiter, $newline, $enclosure);
      $namefile = 'Keuangan_Siswa_' . date('Ymd_His') . '.csv';
      force_download($namefile, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported to CSV !</div>');
      redirect('keuangan/tambahbiaya_global');
    }
  }

  public function importbiayacsv()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $user_id = $data['user']['id'];

    $file = $_FILES['siswabiaya']['tmp_name'];

    // Medapatkan ekstensi file csv yang akan diimport.
    $ekstensi  = explode('.', $_FILES['siswabiaya']['name']);

    // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

    if (empty($file)) {
      $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
      redirect('keuangan/tambahbiaya_global');
    } else {
      // Validasi apakah file yang diupload benar-benar file csv.
      if (strtolower(end($ekstensi)) == 'csv' && $_FILES["siswabiaya"]["size"] > 0) {

        $i = 0;
        $handle = fopen($file, "r");
        while (($row = fgetcsv($handle, 2048))) {
          $i++;
          if ($i == 1) continue;
          // Data yang akan disimpan ke dalam databse
          //$this->db->where('siswa_id', $siswa_id);
          //$this->db->delete('siswa_spp');
          $dataraw =  $row[0];
          $arr = explode(";", $dataraw);
          $siswa_id =  $arr[0];
          $biaya_id =  $arr[4];
          $nominal =  $arr[6];
          $is_paid =  $arr[7];
          $jenis =  $arr[8];

          $data = [
            'siswa_id' => $siswa_id,
            'biaya_id' => $biaya_id,
            'is_paid' => $is_paid,
            'nominal' => $nominal,
            'jenis' => $jenis,
            'user_id' => $user_id,
          ];
          if ($siswa_id <> '' && $biaya_id <> '' && $is_paid <> '' && $nominal <> '' && $jenis <> '') {
            $this->db->where('biaya_id', $biaya_id);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->delete('siswa_keuangan');
            // Simpan data ke database.
            $this->db->insert('siswa_keuangan', $data);
          }
        }
        fclose($handle);

        $this->session->set_flashdata('messageimport', '<div class="alert alert-success" role"alert">Import Data Successed !</div>');
        redirect('keuangan/tambahbiaya_global');
      } else {
        $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
        redirect('keuangan/tambahbiaya_global');
      }
    }
  }

  public function tambahbiayaspp_global()
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['biayacategories'] = $this->db->get('m_biaya_categories')->result_array();
    $data['biaya'] = $this->db->get_where('m_biaya', ['is_publish' =>
    '1'])->result_array();

    $query = "SELECT `m_biaya`.*,`m_biaya_categories`.`nama`as category
        FROM `m_biaya` LEFT JOIN `m_biaya_categories`
        ON `m_biaya`.`category_id`=`m_biaya_categories`.`id`";
    $data['listbiaya'] = $this->db->query($query)->result_array();

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('tambahbiayaspp_global', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
 
  public function exportbiayasppcsv()
  {
    $this->form_validation->set_rules('biaya_id', 'biaya_id', 'required');
    // Load view
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Biaya harus dipilih!</div>');
      redirect('keuangan/tambahbiayaspp_global');
    } else {
      $biaya_id = $this->input->post('biaya_id');
      $this->load->dbutil();
      $this->load->helper('download');
      // get data
      $this->load->model('Keuangan_model', 'keu_model');
      $databiaya = $this->keu_model->getbiayabyId($biaya_id);
      $namabiaya=$databiaya["namabiaya"];
      $jenis=$databiaya["jenis"];
      $student_data = $this->keu_model->fetch_databiayasiswaspp($biaya_id,$namabiaya,$jenis);

      // file creation
      $delimiter = ";";
      $newline = "\r\n";
      $enclosure = '';
      $data = $this->dbutil->csv_from_result($student_data, $delimiter, $newline, $enclosure);
      $namefile = 'Keuangan_SiswaSPP_' . date('Ymd_His') . '.csv';
      force_download($namefile, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported to CSV !</div>');
      redirect('keuangan/tambahbiayaspp_global');
    }
  }

  public function importbiayasppcsv()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $user_id = $data['user']['id'];

    $file = $_FILES['siswabiaya']['tmp_name'];

    // Medapatkan ekstensi file csv yang akan diimport.
    $ekstensi  = explode('.', $_FILES['siswabiaya']['name']);

    // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

    if (empty($file)) {
      $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
      redirect('keuangan/tambahbiayaspp_global');
    } else {
      // Validasi apakah file yang diupload benar-benar file csv.
      if (strtolower(end($ekstensi)) == 'csv' && $_FILES["siswabiaya"]["size"] > 0) {

        $i = 0;
        $handle = fopen($file, "r");
        while (($row = fgetcsv($handle, 2048))) {
          $i++;
          if ($i == 1) continue;
          // Data yang akan disimpan ke dalam databse
          //$this->db->where('siswa_id', $siswa_id);
          //$this->db->delete('siswa_spp');
          $dataraw =  $row[0];
          $arr = explode(";", $dataraw);
          $siswa_id =  $arr[0];
          $biaya_id =  $arr[4];
          $nominal =  $arr[6];
          $is_paid =  $arr[7];
          $jenis =  $arr[8];

          $data = [
            'siswa_id' => $siswa_id,
            'biaya_id' => $biaya_id,
            'is_paid' => $is_paid,
            'nominal' => $nominal,
            'jenis' => $jenis,
            'user_id' => $user_id,
          ];
          if ($siswa_id <> '' && $biaya_id <> '' && $is_paid <> '' && $nominal <> '' && $jenis <> '') {
            $this->db->where('biaya_id', $biaya_id);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->delete('siswa_keuangan');
            // Simpan data ke database.
            $this->db->insert('siswa_keuangan', $data);
          }
        }
        fclose($handle);

        $this->session->set_flashdata('messageimport', '<div class="alert alert-success" role"alert">Import Data Successed !</div>');
        redirect('keuangan/tambahbiayaspp_global');
      } else {
        $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
        redirect('keuangan/tambahbiayaspp_global');
      }
    }
  }

  public function laporantagihan_print()
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    // Load view
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporantagihan_print', $data);
  }

  public function laporantagihan_excel()
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    // Load view
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporantagihan_excel', $data);
  }

  public function laporantagihan_pdf()
  {
    $data['title'] = 'Keuangan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('keuangan_model', 'keu_model');
    $data['siswaresult'] = $this->keu_model->siswagetDataAll();

    // Load view
    $html = $this->load->view('laporantagihan_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporantagihan_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }

   // pengumuman
 public function pengumuman()
 {
     $data['title'] = 'Pengumuman';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();

     $data['pengumuman'] = $this->db->get('keu_pengumuman')->result_array();
     $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[keu_pengumuman.nama]', [
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
         $this->db->insert('keu_pengumuman', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Tambah Keuangan Notif',$item);
//end log 
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('keuangan/pengumuman');
     }
 }

 public function editpengumuman($id)
 {
     $data['title'] = 'Pengumuman';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $data['getpengumuman'] = $this->db->get_where('keu_pengumuman', ['id' =>
     $id])->row_array();
     $data['pengumuman'] = $this->db->get('keu_pengumuman')->result_array();
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
         $this->db->update('keu_pengumuman', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Edit Notif Keuangan',$item);
//end log 
         $this->session->set_flashdata(
             'message',
             '<div class="alert alert-success" role"alert">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             Data Saved !
             </div>'
         );
         redirect('keuangan/pengumuman');
     }
 }

 public function hapuspengumuman($id)
 {
//log act
$data['table'] = $this->db->get_where('keu_pengumuman', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama'];
activity_log($user,'Hapus Notif Keuangan',$item);
//end log 
     $this->db->where('id', $id);
     $this->db->delete('keu_pengumuman');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
     redirect('keuangan/pengumuman');
 }
   
 public function notifpengumuman($id)
 {
    $data['table'] = $this->db->get_where('keu_pengumuman', ['id' => $id])->row_array();
    $message =$data['table']['nama'];
    $url = "https://fcm.googleapis.com/fcm/send";
    $data['deviceid'] = $this->db->get('siswa_deviceid')->result_array();
    foreach($data['deviceid'] as $item)
    { 
        $token = $item['deviceid'];  
//    $token = "edcs_rAfBaI:APA91bEHYHOgadt9FZFE43CLnp0g-3utumIVB27j3CV804Hz5lhIuDeOiJUy3c-ecrxR9ZoW03FUoNKlFzJWwz7I4lW9uGuOYp_pFtO_x0IMJOYltXdCiKTc6uHPnJmi97bbFKoI6Ye2";
    $serverKey = 'AAAAqS-JvbM:APA91bHq9pQ-7zHa-CU7OUY2ujOxlfqKS9TttE7KnteFapQHfDNGUuchakQCH3FNwmZd4nf69w2GWMkANp5G39C5qoPh-sGYSbl2ODZT7DPb1ZHpwDJ8I0eelxvKiYfuuXctUA565RIw';
    $title = "Pengumuman";
    $body = "$message";
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }    
    curl_close($ch);
    }
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">'.$message.'<br>Notif Send !</div>');
     redirect('keuangan/pengumuman');
 }
 
 public function importbiayasppcsvbayar()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $user_id = $data['user']['id'];

    $file = $_FILES['siswabiaya']['tmp_name'];

    // Medapatkan ekstensi file csv yang akan diimport.
    $ekstensi  = explode('.', $_FILES['siswabiaya']['name']);

    // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

    if (empty($file)) {
      $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
      redirect('keuangan/tambahbiayaspp_global');
    } else {
      // Validasi apakah file yang diupload benar-benar file csv.
      if (strtolower(end($ekstensi)) == 'csv' && $_FILES["siswabiaya"]["size"] > 0) {

        $i = 0;
        $handle = fopen($file, "r");
        while (($row = fgetcsv($handle, 2048))) {
          $i++;
          if ($i == 1) continue;
          // Data yang akan disimpan ke dalam databse
          //$this->db->where('siswa_id', $siswa_id);
          //$this->db->delete('siswa_spp');
          $dataraw =  $row[0];
          $arr = explode(";", $dataraw);
          $siswa_id =  $arr[0];
          $biaya_id =  $arr[4];
          $nominal =  $arr[6];
          $is_paid =  $arr[7];
          $jenis =  $arr[8];

          $data = [
            'siswa_id' => $siswa_id,
            'biaya_id' => $biaya_id,
            'is_paid' => $is_paid,
            'nominal' => $nominal,
            'jenis' => $jenis,
            'user_id' => $user_id,
          ];
          if ($siswa_id <> '' && $biaya_id <> '' && $is_paid <> '' && $nominal <> '' && $jenis <> '') {
            $this->db->where('biaya_id', $biaya_id);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->delete('siswa_keuangan');
            // Simpan data ke database.
            $this->db->insert('siswa_keuangan', $data);
          }
        }
        fclose($handle);

        $this->session->set_flashdata('messageimport', '<div class="alert alert-success" role"alert">Import Data Successed !</div>');
        redirect('keuangan/tambahbiayaspp_global');
      } else {
        $this->session->set_flashdata('messageimport', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
        redirect('keuangan/tambahbiayaspp_global');
      }
    }
  }
  // pembayaranspp
  public function pembayaranspp()
  {
    $data['title'] = 'Pembayaran SPP';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('keuangan_model', 'keu_model');
    $data['biaya_id'] = '';
    $data['listbiaya'] = $this->db->get('m_biaya')->result_array();
    $data['biaya'] = $this->db->get_where('m_biaya', ['id' =>
    $this->session->userdata('biaya_id')])->row_array();
    
    if ($this->session->userdata('biaya_id')) {
      $data['biaya_id'] = $this->session->userdata('biaya_id');
      $data['biayasiswa'] = $this->keu_model->getbiayasiswa($this->session->userdata('biaya_id'));
    }
    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('pembayaranspp', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
    // pembayaranspp
    public function pembayaranspplunas()
    {
      $data['title'] = 'Pembayaran SPP';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      $this->load->model('keuangan_model', 'keu_model');
      $data['biaya_id'] = '';
      $data['listbiaya'] = $this->db->get('m_biaya')->result_array();
      $data['biaya'] = $this->db->get_where('m_biaya', ['id' =>
      $this->session->userdata('biaya_id')])->row_array();
      
      if ($this->session->userdata('biaya_id')) {
        $data['biaya_id'] = $this->session->userdata('biaya_id');
        $data['biayasiswa'] = $this->keu_model->getbiayasiswa($this->session->userdata('biaya_id'));
      }
      // Load view
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/javascript', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('pembayaranspplunas', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    }
  public function biaya_tujuan($id)
  {
      $this->session->set_userdata('biaya_id', $id);
      redirect('keuangan/pembayaranspp');
  }

  public function bayarbiaya()
  {
    $check = $this->input->post('check');
    if ($check <> '') {
      $this->db->where_in('id', $check);
      $this->db->set('is_paid','1');
      $this->db->update('siswa_keuangan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
    }
    //log activity
    //$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
    $user = $this->session->userdata('email');
    $item = '';
    activity_log($user, 'Pembayaran Biaya', $item);
    //end log
    redirect('keuangan/pembayaranspp');
  }
  public function bayarbiayagagal()
  {
    $check = $this->input->post('check');
    if ($check <> '') {
      $this->db->where_in('id', $check);
      $this->db->set('is_paid','0');
      $this->db->update('siswa_keuangan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
    }
    //log activity
    //$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
    $user = $this->session->userdata('email');
    $item = '';
    activity_log($user, 'Pembayaran Biaya Batal', $item);
    //end log
    redirect('keuangan/pembayaranspplunas');
  }
//end
}
