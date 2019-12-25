<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Pemutihan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->library('cart');
  }

// SISWA PEMUTIHAN

public function pemutihansiswa()
{
  $data['title'] = 'Pemutihan Siswa';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();

  $data['user_id'] =$this->session->userdata('user_id');

  $siswa_id = $this->session->userdata('siswa_id');
  $this->load->model('pemutihan_model', 'pemutihan_model');
  $data['selectsiswa'] = $this->pemutihan_model->siswagetDataAll();
  $data['siswaresult'] = $this->pemutihan_model->getsiswabyId($siswa_id);
  $data['sk'] = $this->pemutihan_model->getsiswaketbyId($siswa_id);

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
  $this->load->view('pemutihansiswa', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');

  if (isset($_POST['addsiswa'])) {
    $siswa_id = $this->input->post('siswa_id');
    $this->session->set_userdata('siswa_id', $siswa_id);
    redirect('pemutihan/pemutihansiswa');
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

    redirect('pemutihan/pemutihansiswa');
  }

  if (isset($_POST['simpan_transaksi'])) {

    $keterangan = $this->input->post('keterangan');
    $penanggungjawab = $this->input->post('penanggungjawab');
    $totalcart = $this->session->userdata('totalcart');
    $nomor_nota2 = $this->input->post('nomor_nota2');
    $tanggal2 = $this->input->post('tanggal2');
    $user_id = $this->input->post('user_id');
    $siswa_id = $this->session->userdata('siswa_id');
    $this->session->set_userdata('keterangan', $keterangan);
    $this->session->set_userdata('penanggungjawab', $penanggungjawab);
    $keterangan = $this->session->userdata('keterangan');
    $penanggungjawab = $this->session->userdata('penanggungjawab');
    if (($totalcart == '') or ($keterangan == '')or ($penanggungjawab == '') or ($siswa_id == '')) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Silahkan Isi Siswa, Keterangan,penanggungjawab,
       Tidak Boleh Kosong '.$totalcart.' </div>');
      redirect('pemutihan/pemutihansiswa');
    } else {
      // Jika Ada Gambar
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
          $config['image_library'] = 'gd2';
          $config['allowed_types'] = 'gif|jpg|png';
          // $config['max_size'] = '200';
          $config['upload_path'] = './assets/images/lampiran/';
          $config['file_name'] = round(microtime(true) * 1000);
          // $config['file_name'] ='112233';
          // $config['quality'] = '50%';
          // $config['width'] = 200;
          // $config['height'] = 200;
          $this->load->library('upload', $config);


          if ($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
              //ukuran resize
              $this->load->library('image_lib');

              $config2['image_library'] = 'gd2';
              $config2['source_image'] = 'assets/images/lampiran/' . $new_image;
              $config['new_image'] = 'assets/images/lampiran/' . $new_image;
              $config2['create_thumb'] = FALSE;
              $config2['maintain_ratio'] = TRUE;
              $config2['width'] = 200;
              $config2['height'] = 200;

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
        'nomor_nota'     =>  $nomor_nota2,
        'tanggal'     =>  $tanggal2,
        'totalcart'     =>  $totalcart,
        'siswa_id'     =>  $this->session->userdata('siswa_id'),
        'user_id'     =>  $user_id,
        'keterangan'     =>  $this->session->userdata('keterangan'),
        'penanggungjawab'     =>  $this->session->userdata('penanggungjawab'),
        'lampiran'     =>  $new_image
      ];
      $this->db->insert('siswa_pemutihan_master', $data);
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
        $this->db->insert('siswa_pemutihan_detail', $datadetail);
        // update pemutihan
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
      redirect('pemutihan/pemutihan_kembali/' . $id_master);
//        redirect('pemutihan/siswabayar_nota/' . $id_master);
    }
  }
}
public function hapus_item($biaya_id)
  {
    $this->cart->remove($biaya_id);
    redirect('pemutihan/pemutihansiswa');

    //      redirect('keuangan/siswabayar');
  }
public function pemutihan_cancel()
  {
    $this->session->unset_userdata('siswa_id');
    $this->session->unset_userdata('nomor_nota');
    $this->session->unset_userdata('tanggal');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('keterangan');
    $this->cart->destroy();
    redirect('pemutihan/pemutihansiswa');
  }
  public function kosongkancart()
  {
    $this->cart->destroy();
    $this->session->unset_userdata('totalcart');
    redirect('pemutihan/pemutihansiswa');
  }

  public function pemutihan_kembali($id_master = '')
  {
    $data['title'] = 'Pemutihan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    
    if ($this->session->userdata('id_nota') != '') {
      $data['id_nota'] = $this->session->userdata('id_nota');
      $id_nota = $this->session->userdata('id_nota');
    } elseif ($id_master > '0') {
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    } else {
      $this->load->model('pemutihan_model', 'pemutihan_model');
      $id_master = $this->pemutihan_model->getlast_idnota($this->session->userdata('user_id'));
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    }
    $this->load->model('pemutihan_model', 'pemutihan_model');
    $data['siswapemutihanmaster'] = $this->pemutihan_model->pemutihanmaster_allbyId($id_nota);
    $data['nomor_nota']=$data['siswapemutihanmaster']['nomor_nota'];
    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('pemutihan_kembali', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function pemutihan_nota($id_master = '')
  {
    $data['title'] = 'Pemutihan Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    if ($this->session->userdata('id_nota') != '') {
      $data['id_nota'] = $this->session->userdata('id_nota');
      $id_nota = $this->session->userdata('id_nota');
    } elseif ($id_master > '0') {
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    } else {
      $this->load->model('pemutihan_model', 'pemutihan_model');
      $id_master = $this->pemutihan_model->getlast_idnota($this->session->userdata('user_id'));
      $data['id_nota'] = $id_master;
      $id_nota = $id_master;
    }
    $data['logoslip'] = $this->db->get_where('m_logoslip', ['id' =>
    '1'])->row_array();
    $this->load->model('pemutihan_model', 'pemutihan_model');
    $data['siswapemutihanmaster'] = $this->pemutihan_model->pemutihanmaster_allbyId($id_nota);
    $this->db->select('`siswa_pemutihan_detail`.*');
    $this->db->from('siswa_pemutihan_detail');
    $data['siswapemutihandetail'] = $this->db->get()->result_array();
    $this->load->view('siswapemutihan_nota', $data);
  }
  // pemutihan Void

  public function pemutihanvoid()
  {
    $data['title'] = 'Pemutihan Siswa Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('pemutihan_model', 'pemutihan_model');
    $data['pemutihanbatal'] = $this->pemutihan_model->pemutihanmaster_batal();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('pemutihanvoid', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function pemutihanvoid_list()
  {
    $data['title'] = 'Pemutihan Siswa Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('pemutihan_model', 'pemutihan_model');
    $data['pemutihanbatal'] = $this->pemutihan_model->pemutihanmaster_batal();
    $data['pemutihanmaster_all'] = $this->pemutihan_model->pemutihanmaster_all('desc');
    $this->form_validation->set_rules('master_id', 'master_id', 'required');

    // Load view
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('pemutihanvoid_list', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $master_id = $this->input->post('master_id');
      redirect('pemutihan/pemutihanvoid_add/' . $master_id);
    }
  }

  public function pemutihanvoid_add($id_master)
  {
    $data['title'] = 'Pemutihan Siswa Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('pemutihan_model', 'pemutihan_model');
    $data['pemutihanbatal'] = $this->pemutihan_model->pemutihanmaster_batal();
    $data['getpemutihanmaster'] = $this->pemutihan_model->pemutihanmaster_allbyId($id_master);
    $data['getpemutihandetail'] = $this->pemutihan_model->pemutihandetail_allbyId($id_master);
    $this->form_validation->set_rules('keterangan_batal', 'keterangan_batal', 'required');

    // Load view
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('pemutihanvoid_add', $data);
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

      $this->db->insert('siswa_pemutihan_batal', $databatal);

      //update siswa bayar master

      //update siswa keuangan
      $getpemutihandetail = $this->db->get_where('siswa_pemutihan_detail', ['id_master' =>
      $id_master])->result_array();
      foreach ($getpemutihandetail as $dt) :

        $biaya_id = $dt['biaya_id'];
        $this->db->set('is_paid', '0');
        $this->db->where('siswa_id', $siswa_id);
        $this->db->where('biaya_id', $biaya_id);
        $this->db->update('siswa_keuangan');

      endforeach;
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('pemutihan/pemutihanvoid');
    }
  }
//end
}