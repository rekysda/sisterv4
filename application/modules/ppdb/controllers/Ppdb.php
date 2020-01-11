<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $data['tahun_ppdb_default'] = $this->db->get_where('m_options', ['name' =>
    'tahun_ppdb_default'])->row_array();
  }

  // JALUR BIAYA
  public function jalurbiaya()
  {
    $data['title'] = 'Jalur Biaya';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Ppdb_model', 'Ppdb_model');
    $data['gelombangjalur'] = $this->Ppdb_model->getgelombangjalur();

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('jalurbiaya', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function jalurbiaya_add($id)
  {
    $data['title'] = 'Jalur Biaya';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['biayacategories'] = $this->db->get('m_biaya_categories')->result_array();
    $data['biaya'] = $this->db->get_where('m_biaya', ['is_publish' =>
    '1'])->result_array();
    $this->load->model('Ppdb_model', 'Ppdb_model');
    $data['gelombangjalur'] = $this->Ppdb_model->getgelombangjalurbyId($id);
    $data['jalurbiaya'] = $this->Ppdb_model->getjalurbiaya($id);

    $this->form_validation->set_rules('gelombangjalur_id', 'gelombangjalur_id', 'required');
    $this->form_validation->set_rules('biaya_id', 'biaya_id',  'required|callback_check_jalurbiaya', array('check_jalurbiaya' => 'terdapat Biaya pada Jalur yang sama.'));
    $this->form_validation->set_rules('nominal', 'nominal', 'required|numeric');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('jalurbiaya_add', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'gelombangjalur_id' => $this->input->post('gelombangjalur_id'),
        'biaya_id' => $this->input->post('biaya_id'),
        'nominal' => $this->input->post('nominal')
      ];
      $this->db->insert('m_jalur_biaya', $data);
      //log activity
      //$data['table'] = $this->db->get_where('akad_kegiatanakademik', ['id' => $id])->row_array();
      $user = $this->session->userdata('email');
      $item = 'Modul PPDB';
      activity_log($user, 'Tambah Jalur Biaya', $item);
      //end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('ppdb/jalurbiaya_add/' . $id);
    }
  }

  function check_jalurbiaya()
  {
    $gelombangjalur_id = $this->input->post('gelombangjalur_id');
    $biaya_id = $this->input->post('biaya_id');

    $this->db->select('biaya_id');
    $this->db->from('m_jalur_biaya');
    $this->db->where('gelombangjalur_id', $gelombangjalur_id);
    $this->db->where('biaya_id', $biaya_id);
    $query = $this->db->get();
    $num = $query->num_rows();
    if ($num > 0) {
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function hapusjalurbiaya($id, $gelombangjalur_id)
  {
    //log activity
    //$data['table'] = $this->db->get_where('akad_kegiatanakademik', ['id' => $id])->row_array();
    $user = $this->session->userdata('email');
    $item = 'Modul PPDB';
    activity_log($user, 'Hapus Jalur Biaya', $item);
    //end log
    $this->db->where('id', $id);
    $this->db->delete('m_jalur_biaya');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Deleted !</div>');
    redirect('ppdb/jalurbiaya_add/' . $gelombangjalur_id);
  }
  // SISWA

  public function siswa()
  {
    $data['title'] = 'Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('ppdb_model', 'ppdb_model');
    $data['siswa'] = $this->ppdb_model->siswagetDataAll();
    // Search text


    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswa', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function siswa_add()
  {
    $data['title'] = 'Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->db->select('`m_gelombang_jalur`.*,`m_tahunakademik`.nama as `tahun`');
    $this->db->from('m_gelombang_jalur');
    $this->db->join('m_tahunakademik', 'm_tahunakademik.id = m_gelombang_jalur.tahun_id');
    $this->db->group_by('tahun_id');
    $this->db->order_by('tahun_id', 'ASC');
    $data['tahun_ppdb'] = $this->db->get()->result_array();
    $data['sekolah'] = $this->db->get('m_sekolah')->result_array();

    $data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
    $data['m_agama'] = $this->db->get('m_agama')->result_array();
    $data['m_statusanak'] = $this->db->get('ppdb_status_anak')->result_array();
    $data['m_statusortu'] = $this->db->get('ppdb_status_ortu')->result_array();
    $data['m_pendidikan'] = $this->db->get('m_pendidikan')->result_array();

    $this->form_validation->set_rules('sekolah_id', 'sekolah_id', 'required');
    $this->form_validation->set_rules('tahun_ppdb', 'tahun_ppdb', 'required');
    $this->form_validation->set_rules('noformulir', 'noformulir', 'required|is_unique[ppdb_siswa_jalur.noformulir]');
    $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required');
    $this->form_validation->set_rules('tempatlahirsiswa', 'tempatlahirsiswa', 'required');
    $this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'required');
    $this->form_validation->set_rules('tinggisiswa', 'tinggisiswa', 'required');
    $this->form_validation->set_rules('beratsiswa', 'beratsiswa', 'required');
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('emailsiswa', 'emailsiswa', 'required');
    $this->form_validation->set_rules('alamatsiswa', 'alamatsiswa', 'required');
    $this->form_validation->set_rules('propinsisiswa', 'propinsisiswa', 'required');
    $this->form_validation->set_rules('kotasiswa', 'kotasiswa', 'required');
    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
    $this->form_validation->set_rules('hpsiswa', 'hpsiswa', 'required');
    $this->form_validation->set_rules('sekolahasal', 'sekolahasal', 'required');
    $this->form_validation->set_rules('anakke', 'anakke', 'required');
    $this->form_validation->set_rules('jumlahsaudara', 'jumlahsaudara', 'required');
    $this->form_validation->set_rules('nikayah', 'nikayah', 'required');
    $this->form_validation->set_rules('namaayah', 'namaayah', 'required');
    $this->form_validation->set_rules('alamatayah', 'alamatayah', 'required');
    $this->form_validation->set_rules('propinsiayah', 'propinsiayah', 'required');
    $this->form_validation->set_rules('kotaayah', 'kotaayah', 'required');
    $this->form_validation->set_rules('hpayah', 'hpayah', 'required');
    $this->form_validation->set_rules('pekerjaanayah', 'pekerjaanayah', 'required');
    $this->form_validation->set_rules('nikibu', 'nikibu', 'required');
    $this->form_validation->set_rules('namaibu', 'namaibu', 'required');
    $this->form_validation->set_rules('alamatibu', 'alamatibu', 'required');
    $this->form_validation->set_rules('propinsiibu', 'propinsiibu', 'required');
    $this->form_validation->set_rules('kotaibu', 'kotaibu', 'required');
    $this->form_validation->set_rules('hpibu', 'hpibu', 'required');
    $this->form_validation->set_rules('pekerjaanibu', 'pekerjaanibu', 'required');
    $this->form_validation->set_rules('emailortu', 'emailortu', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/javascript', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswa_add', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '100';
        $config['upload_path'] = './assets/images/siswa/';
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $new_image = $this->upload->data('file_name');
        } else {
          echo  $this->upload->display_errors();
        }
        //ukuran resize
        $this->load->library('image_lib');

        $config2['image_library'] = 'gd2';
        $config2['source_image'] = './assets/images/siswa/' . $new_image;
        $config['new_image'] = './assets/images/siswa/' . $new_image;
        $config2['create_thumb'] = FALSE;
        $config2['maintain_ratio'] = TRUE;
        $config2['width'] = 200;
        $config2['height'] = 200;

        $this->image_lib->clear();
        $this->image_lib->initialize($config2);
        $this->image_lib->resize();
        //ukuran resize
      } else {
        $new_image = 'default.jpg';
      }

      $data = [
        'namasiswa' => $this->input->post('namasiswa'),
        'panggilansiswa' => $this->input->post('panggilansiswa'),
        'tempatlahirsiswa' => $this->input->post('tempatlahirsiswa'),
        'tanggallahirsiswa' => $this->input->post('tanggallahirsiswa'),
        'tinggisiswa' => $this->input->post('tinggisiswa'),
        'beratsiswa' => $this->input->post('beratsiswa'),
        'kelaminsiswa' => $this->input->post('kelaminsiswa'),
        'agamasiswa' => $this->input->post('agamasiswa'),
        'warganegarasiswa' => $this->input->post('warganegarasiswa'),
        'nisn' => $this->input->post('nisn'),
        'nik' => $this->input->post('nik'),
        'noakta' => $this->input->post('noakta'),
        'emailsiswa' => $this->input->post('emailsiswa'),
        'alamatsiswa' => $this->input->post('alamatsiswa'),
        'propinsisiswa' => $this->input->post('propinsisiswa'),
        'kotasiswa' => $this->input->post('kotasiswa'),
        'kelurahan' => $this->input->post('kelurahan'),
        'kecamatan' => $this->input->post('kecamatan'),
        'kodepossiswa' => $this->input->post('kodepossiswa'),
        'teleponsiswa' => $this->input->post('teleponsiswa'),
        'hpsiswa' => $this->input->post('hpsiswa'),
        'sekolahasal' => $this->input->post('sekolahasal'),
        'alamatsekolahasal' => $this->input->post('alamatsekolahasal'),
        'ijazah' => $this->input->post('ijazah'),
        'skhun' => $this->input->post('skhun'),
        'nopesertaun' => $this->input->post('nopesertaun'),
        'statusanak' => $this->input->post('statusanak'),
        'anakke' => $this->input->post('anakke'),
        'jumlahsaudara' => $this->input->post('jumlahsaudara'),
        'bahasasiswa' => $this->input->post('bahasasiswa'),
        'jarak' => $this->input->post('jarak'),
        'transportasi' => $this->input->post('transportasi'),
        'jenistinggal' => $this->input->post('jenistinggal'),
        'statusayah' => $this->input->post('statusayah'),
        'nikayah' => $this->input->post('nikayah'),
        'namaayah' => $this->input->post('namaayah'),
        'tempatlahirayah' => $this->input->post('tempatlahirayah'),
        'tanggallahirayah' => $this->input->post('tanggallahirayah'),
        'agamaayah' => $this->input->post('agamaayah'),
        'alamatayah' => $this->input->post('alamatayah'),
        'propinsiayah' => $this->input->post('propinsiayah'),
        'kotaayah' => $this->input->post('kotaayah'),
        'teleponayah' => $this->input->post('teleponayah'),
        'hpayah' => $this->input->post('hpayah'),
        'pendidikanayah' => $this->input->post('pendidikanayah'),
        'pekerjaanayah' => $this->input->post('pekerjaanayah'),
        'gajiayah' => $this->input->post('gajiayah'),
        'statusibu' => $this->input->post('statusibu'),
        'nikibu' => $this->input->post('nikibu'),
        'namaibu' => $this->input->post('namaibu'),
        'tempatlahiribu' => $this->input->post('tempatlahiribu'),
        'tanggalahiribu' => $this->input->post('tanggalahiribu'),
        'agamaibu' => $this->input->post('agamaibu'),
        'alamatibu' => $this->input->post('alamatibu'),
        'propinsiibu' => $this->input->post('propinsiibu'),
        'kotaibu' => $this->input->post('kotaibu'),
        'teleponibu' => $this->input->post('teleponibu'),
        'hpibu' => $this->input->post('hpibu'),
        'pendidikanibu' => $this->input->post('pendidikanibu'),
        'pekerjaanibu' => $this->input->post('pekerjaanibu'),
        'gajiibu' => $this->input->post('gajiibu'),
        'statuswali' => $this->input->post('statuswali'),
        'namawali' => $this->input->post('namawali'),
        'tempatlahirwali' => $this->input->post('tempatlahirwali'),
        'tanggallahirwali' => $this->input->post('tanggallahirwali'),
        'agamawali' => $this->input->post('agamawali'),
        'alamatwali' => $this->input->post('alamatwali'),
        'propinsiwali' => $this->input->post('propinsiwali'),
        'kotawali' => $this->input->post('kotawali'),
        'teleponwali' => $this->input->post('teleponwali'),
        'hpwali' => $this->input->post('hpwali'),
        'pendidikanwali' => $this->input->post('pendidikanwali'),
        'pekerjaanwali' => $this->input->post('pekerjaanwali'),
        'gajiwali' => $this->input->post('gajiwali'),
        'emailortu' => $this->input->post('emailortu'),
        'image' => $new_image
      ];
      $this->db->insert('ppdb_siswa', $data);
      $siswa_id = $this->db->insert_id();
      $data2 = [
        'tahun_ppdb' => $this->input->post('tahun_ppdb'),
        'sekolah_id' => $this->input->post('sekolah_id'),
        'noformulir' => $this->input->post('noformulir'),
        'siswa_id' => $siswa_id
      ];
      $this->db->insert('ppdb_siswa_jalur', $data2);
      //log activity
      //$data['table'] = $this->db->get_where('akad_kegiatanakademik', ['id' => $id])->row_array();
      $user = $this->session->userdata('email');
      $item = $this->input->post('namasiswa');
      activity_log($user, 'Tambah Siswa', $item);
      //end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('ppdb/siswa');
    }
  }
  public function editsiswa($id)
  {
    $data['title'] = 'Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $tahun_ppdb_default=getdefault('tahun_ppdb_default');
    $this->db->select('`ppdb_siswa`.*,`ppdb_siswa_jalur`.tahun_ppdb,`ppdb_siswa_jalur`.sekolah_id,`ppdb_siswa_jalur`.noformulir');
    $this->db->from('ppdb_siswa');
    $this->db->join('ppdb_siswa_jalur', 'ppdb_siswa_jalur.siswa_id = ppdb_siswa.id', 'left');
    $this->db->where('ppdb_siswa_jalur.tahun_ppdb', $tahun_ppdb_default);
    $data['getsiswa'] = $this->db->get()->row_array();

    $data['sekolah'] = $this->db->get('m_sekolah')->result_array();
    $data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
    $data['m_agama'] = $this->db->get('m_agama')->result_array();
    $data['m_statusanak'] = $this->db->get('ppdb_status_anak')->result_array();
    $data['m_statusortu'] = $this->db->get('ppdb_status_ortu')->result_array();
    $data['m_pendidikan'] = $this->db->get('m_pendidikan')->result_array();

    $this->form_validation->set_rules('tahun_ppdb', 'tahun_ppdb', 'required');
    $this->form_validation->set_rules('sekolah_id', 'sekolah_id', 'required');
    $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required');
    $this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'required');

    $this->form_validation->set_rules('tempatlahirsiswa', 'tempatlahirsiswa', 'required');
    $this->form_validation->set_rules('tinggisiswa', 'tinggisiswa', 'required');
    $this->form_validation->set_rules('beratsiswa', 'beratsiswa', 'required');
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('emailsiswa', 'emailsiswa', 'required');
    $this->form_validation->set_rules('alamatsiswa', 'alamatsiswa', 'required');
    $this->form_validation->set_rules('propinsisiswa', 'propinsisiswa', 'required');
    $this->form_validation->set_rules('kotasiswa', 'kotasiswa', 'required');
    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
    $this->form_validation->set_rules('hpsiswa', 'hpsiswa', 'required');
    $this->form_validation->set_rules('sekolahasal', 'sekolahasal', 'required');
    $this->form_validation->set_rules('anakke', 'anakke', 'required');
    $this->form_validation->set_rules('jumlahsaudara', 'jumlahsaudara', 'required');
    $this->form_validation->set_rules('nikayah', 'nikayah', 'required');
    $this->form_validation->set_rules('namaayah', 'namaayah', 'required');
    $this->form_validation->set_rules('alamatayah', 'alamatayah', 'required');
    $this->form_validation->set_rules('propinsiayah', 'propinsiayah', 'required');
    $this->form_validation->set_rules('kotaayah', 'kotaayah', 'required');
    $this->form_validation->set_rules('hpayah', 'hpayah', 'required');
    $this->form_validation->set_rules('pekerjaanayah', 'pekerjaanayah', 'required');
    $this->form_validation->set_rules('nikibu', 'nikibu', 'required');
    $this->form_validation->set_rules('namaibu', 'namaibu', 'required');
    $this->form_validation->set_rules('alamatibu', 'alamatibu', 'required');
    $this->form_validation->set_rules('propinsiibu', 'propinsiibu', 'required');
    $this->form_validation->set_rules('kotaibu', 'kotaibu', 'required');
    $this->form_validation->set_rules('hpibu', 'hpibu', 'required');
    $this->form_validation->set_rules('pekerjaanibu', 'pekerjaanibu', 'required');
    $this->form_validation->set_rules('emailortu', 'emailortu', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('editsiswa', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      // Jika Ada Gambar
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '100';
        $config['upload_path'] = './assets/images/siswa/';
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $old_image = $this->input->post('old_image');
          if ($old_image != 'default.jpg') {
            if (file_exists('assets/images/siswa/' . $old_image)) {
              unlink(FCPATH . 'assets/images/siswa/' . $old_image);
            }
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo  $this->upload->display_errors();
        }
        //ukuran resize
        $this->load->library('image_lib');

        $config2['image_library'] = 'gd2';
        $config2['source_image'] = './assets/images/siswa/' . $new_image;
        $config['new_image'] = './assets/images/siswa/' . $new_image;
        $config2['create_thumb'] = FALSE;
        $config2['maintain_ratio'] = TRUE;
        $config2['width'] = 200;
        $config2['height'] = 200;

        $this->image_lib->clear();
        $this->image_lib->initialize($config2);
        $this->image_lib->resize();
        //ukuran resize
      }
      $id = $this->input->post('id');
      $data = [
        'namasiswa' => $this->input->post('namasiswa'),
        'panggilansiswa' => $this->input->post('panggilansiswa'),
        'tempatlahirsiswa' => $this->input->post('tempatlahirsiswa'),
        'tanggallahirsiswa' => $this->input->post('tanggallahirsiswa'),
        'tinggisiswa' => $this->input->post('tinggisiswa'),
        'beratsiswa' => $this->input->post('beratsiswa'),
        'kelaminsiswa' => $this->input->post('kelaminsiswa'),
        'agamasiswa' => $this->input->post('agamasiswa'),
        'warganegarasiswa' => $this->input->post('warganegarasiswa'),
        'nisn' => $this->input->post('nisn'),
        'nik' => $this->input->post('nik'),
        'noakta' => $this->input->post('noakta'),
        'emailsiswa' => $this->input->post('emailsiswa'),
        'alamatsiswa' => $this->input->post('alamatsiswa'),
        'propinsisiswa' => $this->input->post('propinsisiswa'),
        'kotasiswa' => $this->input->post('kotasiswa'),
        'kelurahan' => $this->input->post('kelurahan'),
        'kecamatan' => $this->input->post('kecamatan'),
        'kodepossiswa' => $this->input->post('kodepossiswa'),
        'teleponsiswa' => $this->input->post('teleponsiswa'),
        'hpsiswa' => $this->input->post('hpsiswa'),
        'sekolahasal' => $this->input->post('sekolahasal'),
        'alamatsekolahasal' => $this->input->post('alamatsekolahasal'),
        'ijazah' => $this->input->post('ijazah'),
        'skhun' => $this->input->post('skhun'),
        'nopesertaun' => $this->input->post('nopesertaun'),
        'statusanak' => $this->input->post('statusanak'),
        'anakke' => $this->input->post('anakke'),
        'jumlahsaudara' => $this->input->post('jumlahsaudara'),
        'bahasasiswa' => $this->input->post('bahasasiswa'),
        'jarak' => $this->input->post('jarak'),
        'transportasi' => $this->input->post('transportasi'),
        'jenistinggal' => $this->input->post('jenistinggal'),
        'statusayah' => $this->input->post('statusayah'),
        'nikayah' => $this->input->post('nikayah'),
        'namaayah' => $this->input->post('namaayah'),
        'tempatlahirayah' => $this->input->post('tempatlahirayah'),
        'tanggallahirayah' => $this->input->post('tanggallahirayah'),
        'agamaayah' => $this->input->post('agamaayah'),
        'alamatayah' => $this->input->post('alamatayah'),
        'propinsiayah' => $this->input->post('propinsiayah'),
        'kotaayah' => $this->input->post('kotaayah'),
        'teleponayah' => $this->input->post('teleponayah'),
        'hpayah' => $this->input->post('hpayah'),
        'pendidikanayah' => $this->input->post('pendidikanayah'),
        'pekerjaanayah' => $this->input->post('pekerjaanayah'),
        'gajiayah' => $this->input->post('gajiayah'),
        'statusibu' => $this->input->post('statusibu'),
        'nikibu' => $this->input->post('nikibu'),
        'namaibu' => $this->input->post('namaibu'),
        'tempatlahiribu' => $this->input->post('tempatlahiribu'),
        'tanggalahiribu' => $this->input->post('tanggalahiribu'),
        'agamaibu' => $this->input->post('agamaibu'),
        'alamatibu' => $this->input->post('alamatibu'),
        'propinsiibu' => $this->input->post('propinsiibu'),
        'kotaibu' => $this->input->post('kotaibu'),
        'teleponibu' => $this->input->post('teleponibu'),
        'hpibu' => $this->input->post('hpibu'),
        'pendidikanibu' => $this->input->post('pendidikanibu'),
        'pekerjaanibu' => $this->input->post('pekerjaanibu'),
        'gajiibu' => $this->input->post('gajiibu'),
        'statuswali' => $this->input->post('statuswali'),
        'namawali' => $this->input->post('namawali'),
        'tempatlahirwali' => $this->input->post('tempatlahirwali'),
        'tanggallahirwali' => $this->input->post('tanggallahirwali'),
        'agamawali' => $this->input->post('agamawali'),
        'alamatwali' => $this->input->post('alamatwali'),
        'propinsiwali' => $this->input->post('propinsiwali'),
        'kotawali' => $this->input->post('kotawali'),
        'teleponwali' => $this->input->post('teleponwali'),
        'hpwali' => $this->input->post('hpwali'),
        'pendidikanwali' => $this->input->post('pendidikanwali'),
        'pekerjaanwali' => $this->input->post('pekerjaanwali'),
        'gajiwali' => $this->input->post('gajiwali'),
        'emailortu' => $this->input->post('emailortu'),
      ];

      $this->db->where('id', $id);
      $this->db->update('ppdb_siswa', $data);

      $tahun_ppdb=$this->input->post('tahun_ppdb');
      $data2 = [
        'sekolah_id' => $this->input->post('sekolah_id'),
        'noformulir' => $this->input->post('noformulir')
      ];
      $this->db->where('siswa_id', $id);
      $this->db->where('tahun_ppdb', $tahun_ppdb);
      $this->db->update('ppdb_siswa_jalur', $data2);
      //log activity
      //$data['table'] = $this->db->get_where('akad_kegiatanakademik', ['id' => $id])->row_array();
      $user = $this->session->userdata('email');
      $item = $this->input->post('namasiswa');
      activity_log($user, 'Edit Siswa', $item);
      //end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
                  Profile has been updated!</div>');
      redirect('ppdb/siswa');
    }
  }
  public function hapussiswa($id)
  {
    //log activity
    $data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
    $user = $this->session->userdata('email');
    $item = $data['table']['namasiswa'];
    activity_log($user, 'Hapus Siswa', $item);
    //end log
    $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
    $old_image = $data['getsiswa']['image'];
    if ($old_image != 'default.jpg') {
      unlink(FCPATH . './assets/images/siswa/' . $old_image);
    }
    $this->db->where('id', $id);
    $this->db->delete('ppdb_siswa');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('ppdb/siswa');
  }
  public function siswa_hapusjalur($id)
  {
    $this->db->where('siswa_id', $id);
    $this->db->delete('ppdb_siswa_jalur');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Gelombang,Jalur Deleted !</div>');
    redirect('ppdb/siswajalur');
  }
  // siswa lama
  public function siswalama_add()
  {
    $data['title'] = 'Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['statussiswa'] = $this->db->get('ppdb_status')->result_array();

    $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required');
    $this->form_validation->set_rules('nis', 'nis', 'required|numeric|is_unique[ppdb_siswa.nis]', ['is_unique' => 'This number has already registered']);
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/javascript', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswalama_add', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '100';
        $config['upload_path'] = './assets/images/siswa/';
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $new_image = $this->upload->data('file_name');
        } else {
          echo  $this->upload->display_errors();
        }
        //ukuran resize
        $this->load->library('image_lib');

        $config2['image_library'] = 'gd2';
        $config2['source_image'] = './assets/images/siswa/' . $new_image;
        $config['new_image'] = './assets/images/siswa/' . $new_image;
        $config2['create_thumb'] = FALSE;
        $config2['maintain_ratio'] = TRUE;
        $config2['width'] = 200;
        $config2['height'] = 200;

        $this->image_lib->clear();
        $this->image_lib->initialize($config2);
        $this->image_lib->resize();
        //ukuran resize
      } else {
        $new_image = 'default.jpg';
      }
      $data = [
        'namasiswa' => $this->input->post('namasiswa'),
        'nis' => $this->input->post('nis'),
        'ppdb_status' => $this->input->post('ppdb_status'),
        'image' => $new_image
      ];
      $this->db->insert('ppdb_siswa', $data);
      //log activity
      //$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
      $user = $this->session->userdata('email');
      $item = $this->input->post('namasiswa');
      activity_log($user, 'Tambah Siswa', $item);
      //end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('ppdb/siswa');
    }
  }

  // FORMULIR
  public function formulir()
  {
    $data['title'] = 'Formulir';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('ppdb_model', 'ppdb_model');
    $data['formulir'] = $this->db->get('ppdb_formulir')->result_array();
    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('formulir', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function formulir_add()
  {
    $data['title'] = 'Formulir';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->db->select('*');
    $this->db->like('nama', 'Ganjil');
    $this->db->from('m_tahunakademik');
    $data['tahun'] = $this->db->get()->result_array();

    $this->form_validation->set_rules('formulirawal', 'formulirawal', 'required|is_unique[user_menu.menu]', ['is_unique' => 'This number has already registered']);
    $this->form_validation->set_rules('formulirakhir', 'formulirakhir', 'required|is_unique[user_menu.menu]', ['is_unique' => 'This number has already registered']);
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('formulir_add', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahun_ppdb = $this->input->post('tahun_ppdb');
      $formulirawal = $this->input->post('formulirawal');
      $formulirakhir = $this->input->post('formulirakhir');
      for ($formulirawal; $formulirawal <= $formulirakhir; $formulirawal++) {
        $noformulir = $formulirawal;
        $password = random_string('nozero', 6);
        $status = 'tersedia';
        $jumlah = $this->db->select('noformulir')->from('ppdb_formulir')
          ->where('noformulir', $noformulir)
          ->get()->num_rows();
        if ($jumlah == '0') {
          $data = [
            'tahun_ppdb' => $this->input->post('tahun_ppdb'),
            'noformulir' => $noformulir,
            'password' => $password,
            'status' => $status
          ];
          $this->db->insert('ppdb_formulir', $data);
        }
      }
      //log activity
      //$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
      $user = $this->session->userdata('email');
      $item = '';
      activity_log($user, 'Tambah Formulir', $item);
      //end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data added !</div>');
      redirect('ppdb/formulir');
    }
  }

  public function hapusformulir()
  {
    $check = $this->input->post('check');
    if ($check <> '') {
      $this->db->where_in('id', $check);
      $this->db->delete('ppdb_formulir');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    }
    //log activity
    //$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
    $user = $this->session->userdata('email');
    $item = '';
    activity_log($user, 'Hapus Formulir', $item);
    //end log
    redirect('ppdb/formulir');
  }
  public function editformulir($id)
  {
    $data['title'] = 'Formulir';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['getformulir'] = $this->db->get_where('ppdb_formulir', ['id' =>
    $id])->row_array();

    $this->db->select('*');
    $this->db->like('nama', 'Ganjil');
    $this->db->from('m_tahunakademik');
    $data['tahun'] = $this->db->get()->result_array();
    $data['getstatus'] = $this->db->get('ppdb_status_formulir')->result_array();


    $this->form_validation->set_rules('tahun_ppdb', 'tahun_ppdb', 'required');
    $this->form_validation->set_rules('noformulir', 'noformulir', 'required|numeric');
    $this->form_validation->set_rules('password', 'password', 'required|numeric');
    $this->form_validation->set_rules('status', 'status', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('editformulir', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'tahun_ppdb' => $this->input->post('tahun_ppdb'),
        'noformulir' => $this->input->post('noformulir'),
        'password' => $this->input->post('password'),
        'status' => $this->input->post('status')
      ];
      $this->db->where('id', $id);
      $this->db->update('ppdb_formulir', $data);
      //log activity
      //$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
      $user = $this->session->userdata('email');
      $item = $this->input->post('noformulir');
      activity_log($user, 'Edit Formulir', $item);
      //end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('ppdb/formulir');
    }
  }

  // SISWA JALUR
  public function formulir_export_csv()
  {
    $data['title'] = 'Formulir';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('formulirawal', 'formulirawal', 'required|numeric');
    $this->form_validation->set_rules('formulirakhir', 'formulirakhir', 'required|numeric');

    if ($this->form_validation->run() == false) {
      // Load view
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/javascript', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('formulir_export_csv', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {

      $formulirawal = $this->input->post('formulirawal');
      $formulirakhir = $this->input->post('formulirakhir');

      $this->load->dbutil();

      $this->load->helper('download');

      $this->db->select('*');
      $this->db->where('noformulir>=', $formulirawal);
      $this->db->where('noformulir<=', $formulirakhir);
      $this->db->from('ppdb_formulir');
      $student_data = $this->db->get();
      $delimiter = ";";
      $newline = "\r\n";
      $enclosure = '"';
      $data = $this->dbutil->csv_from_result($student_data, $delimiter, $newline, $enclosure);
      $namefile = 'Data_Formulir_' . $formulirawal . '_' . $formulirakhir . '.csv';

      force_download($namefile, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported !</div>');
      redirect('ppdb/formulir_export_csv');
    }
  }
  //////////////
  public function siswajalur()
  {
    $data['title'] = 'Siswa Jalur';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('ppdb_model', 'ppdb_model');
    $data['siswaresult'] = $this->ppdb_model->siswagetDataAll();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswajalur', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function siswa_ubahjalur($id)
  {
    $data['title'] = 'Siswa Jalur';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['ket'] = $this->db->get_where('siswa_keterangan', ['siswa_id' =>
    $id])->row_array();
    $data['siswaspp'] = $this->db->get_where('siswa_spp', ['siswa_id' =>
    $id])->row_array();

    $data['siswa_id'] = $id;
    $this->load->model('Ppdb_model', 'Ppdb_model');
    // All records count
    $data['getsiswabyId'] = $this->Ppdb_model->getsiswabyId($id); 
    $data['getsiswajalurbyId'] = $this->Ppdb_model->getsiswajalurbyId($id); 
    $this->db->select('*');
    $this->db->like('nama', 'Ganjil');
    $this->db->from('m_tahunakademik');
    $data['tahun'] = $this->db->get()->result_array();
    $data['sekolah'] = $this->db->get('m_sekolah')->result_array();
    $data['gelombang'] = $this->db->get('m_gelombang')->result_array();
    $data['jalur'] = $this->db->get('m_jalur')->result_array();
    
    $this->db->select('`siswa_keuangan`.*,`m_biaya`.nama as `biaya`');
    $this->db->from('siswa_keuangan');
    $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
    $this->db->order_by('biaya_id', 'ASC');
    $data['siswa_keuangan'] = $this->db->get()->result_array();

    $this->form_validation->set_rules('tahun_ppdb', 'tahun_ppdb', 'required');
    $this->form_validation->set_rules('sekolah_id', 'sekolah_id', 'required');
    $this->form_validation->set_rules('noformulir', 'noformulir', 'required');
    $this->form_validation->set_rules('gelombang_id', 'gelombang_id', 'required');
    $this->form_validation->set_rules('jalur_id', 'jalur_id', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswa_ubahjalur', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $jalurbiaya = $this->db->get_where('m_gelombang_jalur', ['tahun_id' =>
      $this->input->post('tahun_ppdb'),'sekolah_id' =>
      $this->input->post('sekolah_id'), 'gelombang_id' =>
      $this->input->post('gelombang_id'), 'jalur_id' =>
      $this->input->post('jalur_id')])->row_array();
      $jalurbiaya_id = $jalurbiaya['id'];
      $tahunppdb_lama=$data['getsiswajalurbyId']['tahun_ppdb'];
      if($jalurbiaya_id){
        if($tahunppdb_lama=$this->input->post('tahun_ppdb')){
          $this->db->where_in('tahun_ppdb', $tahunppdb_lama);
      $this->db->delete('ppdb_siswa_jalur');
        }
      $data = [
        'tahun_ppdb' => $this->input->post('tahun_ppdb'),
        'sekolah_id' => $this->input->post('sekolah_id'),
        'gelombang_id' => $this->input->post('gelombang_id'),
        'jalur_id' => $this->input->post('jalur_id'),
        'jalurbiaya_id' => $jalurbiaya_id,
        'noformulir' => $this->input->post('noformulir'),
        'siswa_id' => $id,
      ];
      $this->db->insert('ppdb_siswa_jalur', $data);

      ////////////////////////////////////////////
      $siswa_id = $id;
      $jalurbiaya_id = $jalurbiaya_id;
      $user_id = $this->input->post('user_id');
      $this->load->model('Ppdb_model', 'ppdb_model');
        //replace bila tahun ppdb sama
      $this->ppdb_model->insert_biayappdb_bysiswaId($siswa_id, $jalurbiaya_id, $user_id);
    
    
      ////////////// insert unique ///////////////
      $data2 = [
        'siswa_id'      =>  $siswa_id,
        'keterangan' => $this->input->post('keterangan')
      ];
      $this->db->replace('siswa_keterangan', $data2);
      $data3 = [
        'siswa_id'      =>  $siswa_id,
        'nominal' => $this->input->post('nominal')
      ];
      $this->db->replace('siswa_spp', $data3);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Data Failed !</div>');
        }
      redirect('ppdb/siswa_ubahjalur/' . $id);
    }
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
  public function siswa_hapusbiayappdb($id,$siswa_id)
  {
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Deleted!</div>');
    $this->db->where('id', $id);
    $this->db->delete('siswa_keuangan');
    redirect('ppdb/siswa_ubahjalur/' . $siswa_id);
  }
  // SISWA CSV
  public function siswacsv()
  {
    $data['title'] = 'Siswa CSV';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswacsv', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function exportsiswacsv()
  {
    $this->form_validation->set_rules('datasiswa', 'datasiswa', 'required');
    // Load view
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Pilihan Data siswa harus dipilih!</div>');
      redirect('ppdb/siswacsv');
    } else {
      $datasiswa = $this->input->post('datasiswa');
      $this->load->dbutil();
      $this->load->helper('download');
      // get data
      $this->load->model('PPDB_model', 'ppdb_model');
      if ($datasiswa == 'nis') {
        $student_data = $this->ppdb_model->fetch_datasiswanis();
      } else {
        $student_data = $this->ppdb_model->fetch_datasiswaall();
      }
      // file creation
      $delimiter = ";";
      $newline = "\r\n";
      $enclosure = '"';
      $data = $this->dbutil->csv_from_result($student_data, $delimiter, $newline, $enclosure);
      if ($datasiswa == 'nis') {
        $namefile = 'Data_SiswaNIS_' . date('Ymd_His') . '.csv';
      } else {
        $namefile = 'Data_SiswaAll_' . date('Ymd_His') . '.csv';
      }
      force_download($namefile, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported to CSV !</div>');
      redirect('ppdb/siswacsv');
    }
  }

  public function importsiswacsv()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $user_id = $data['user']['id'];

    $file = $_FILES['siswacsv']['tmp_name'];
    $datasiswa = $this->input->post('datasiswa');

    // Medapatkan ekstensi file csv yang akan diimport.
    $ekstensi  = explode('.', $_FILES['siswacsv']['name']);

    // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

    if (empty($file)) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
      redirect('ppdb/siswacsv');
    } else {
      // Validasi apakah file yang diupload benar-benar file csv.
      if (strtolower(end($ekstensi)) == 'csv' && $_FILES["siswacsv"]["size"] > 0) {

        $i = 0;
        $handle = fopen($file, "r");
        $sukses = '0';
        while (($row = fgetcsv($handle, 2048))) {
          $i++;
          if ($i == 1) continue;
          // Data yang akan disimpan ke dalam databse
          //$this->db->where('siswa_id', $siswa_id);
          //$this->db->delete('siswa_spp');
          $dataraw =  $row[0];
          $arr = explode(";", $dataraw);
          $id =  $arr[0];
          $tanggaldaftar =  $arr[1];
          $tahun_ppdb =  $arr[2];
          $gelombang_id =  $arr[3];
          $jalur_id   =  $arr[4];
          $jalurbiaya_id   =  $arr[5];
          $noformulir   =  $arr[6];
          $namasiswa   =  $arr[7];
          $nis   =  $arr[8];
          $nrp =  $arr[9];
          $nisn =  $arr[10];
          $nik =  $arr[11];
          $panggiansiswa =  $arr[12];
          $agamasiswa =  $arr[13];
          $kelaminsiswa =  $arr[14];
          $tempatlahirsiswa =  $arr[15];
          $tanggallahirsiswa =  $arr[16];
          $warganegarasiswa =  $arr[17];
          $beratsiswa =  $arr[18];
          $tinggisiswa =  $arr[19];
          $photosiswa =  $arr[20];
          $alamatsiswa =  $arr[21];
          $propinsisiswa =  $arr[22];
          $kotasiswa =  $arr[23];
          $kodeposiswa =  $arr[24];
          $teleponsiswa =  $arr[25];
          $hpsiswa =  $arr[26];
          $emailsiswa =  $arr[27];
          $sekolahasal =  $arr[28];
          $alamatsekolahasal =  $arr[29];
          $ijazah =  $arr[30];
          $skhun =  $arr[31];
          $statusanak =  $arr[32];
          $anakke =  $arr[33];
          $jumlahsaudara =  $arr[34];
          $bahasasiswa =  $arr[35];
          $statusayah =  $arr[36];
          $namaayah =  $arr[37];
          $tempatlahirayah =  $arr[38];
          $tanggallahirayah =  $arr[39];
          $agamaayah =  $arr[40];
          $alamatayah =  $arr[41];
          $propinsiayah =  $arr[42];
          $kotaayah =  $arr[43];
          $teleponayah =  $arr[44];
          $hpayah =  $arr[45];
          $pendidikanayah =  $arr[46];
          $pekerjaanayah =  $arr[47];
          $statusibu =  $arr[48];
          $namaibu =  $arr[49];
          $tempatlahiribu =  $arr[50];
          $tanggalahiribu =  $arr[51];
          $agamaibu =  $arr[52];
          $alamatibu =  $arr[53];
          $propinsiibu =  $arr[54];
          $kotaibu =  $arr[55];
          $teleponibu =  $arr[56];
          $hpibu =  $arr[57];
          $pendidikanibu =  $arr[58];
          $pekerjaanibu =  $arr[59];
          $statuswali =  $arr[60];
          $namawali =  $arr[61];
          $tempatlahirwali =  $arr[62];
          $tanggallahirwali =  $arr[63];
          $agamawali =  $arr[64];
          $alamatwali =  $arr[65];
          $propinsiwali =  $arr[66];
          $kotawali =  $arr[67];
          $teleponwali =  $arr[68];
          $hpwali =  $arr[69];
          $pendidikanwali =  $arr[70];
          $pekerjaanwali =  $arr[71];
          $ppdb_status =  $arr[72];
          $noakta =  $arr[73];
          $jarak =  $arr[74];
          $transportasi =  $arr[75];
          $nikayah =  $arr[76];
          $gajiayah =  $arr[77];
          $nikibu =  $arr[78];
          $gajiibu =  $arr[79];
          $gajiwali =  $arr[80];
          $jenistinggal =  $arr[81];
          $kelurahan =  $arr[82];
          $kecamatan =  $arr[83];
          $nopesertaun =  $arr[84];
          $image =  $arr[85];
          if ($id <> '') {

            $data = [
              'id' => $id,
              'tanggaldaftar' => strip_quotes($tanggaldaftar),
              'tahun_ppdb' => strip_quotes($tahun_ppdb),
              'gelombang_id' => strip_quotes($gelombang_id),
              'jalur_id' => strip_quotes($jalur_id),
              'jalurbiaya_id' => strip_quotes($jalurbiaya_id),
              'noformulir' => strip_quotes($noformulir),
              'namasiswa' => strip_quotes($namasiswa),
              'nis' => strip_quotes($nis),
              'nrp' => strip_quotes($nrp),
              'nisn' => strip_quotes($nisn),
              'nik' => strip_quotes($nik),
              'panggilansiswa' => strip_quotes($panggilansiswa),
              'agamasiswa' => strip_quotes($agamasiswa),
              'kelaminsiswa' => strip_quotes($kelaminsiswa),
              'tempatlahirsiswa' => strip_quotes($tempatlahirsiswa),
              'tanggallahirsiswa' => strip_quotes($tanggallahirsiswa),
              'warganegarasiswa' => strip_quotes($warganegarasiswa),
              'beratsiswa' => strip_quotes($beratsiswa),
              'tinggisiswa' => strip_quotes($tinggisiswa),
              'photosiswa' => strip_quotes($photosiswa),
              'alamatsiswa' => strip_quotes($alamatsiswa),
              'propinsisiswa' => strip_quotes($propinsisiswa),
              'kotasiswa' => strip_quotes($kotasiswa),
              'kodepossiswa' => strip_quotes($kodepossiswa),
              'teleponsiswa' => strip_quotes($teleponsiswa),
              'hpsiswa' => strip_quotes($hpsiswa),
              'emailsiswa' => strip_quotes($emailsiswa),
              'sekolahasal' => strip_quotes($sekolahasal),
              'alamatsekolahasal' => strip_quotes($alamatsekolahasal),
              'ijazah' => strip_quotes($ijazah),
              'skhun' => strip_quotes($skhun),
              'statusanak' => strip_quotes($statusanak),
              'anakke' => strip_quotes($anakke),
              'jumlahsaudara' => strip_quotes($jumlahsaudara),
              'bahasasiswa' => strip_quotes($bahasasiswa),
              'statusayah' => strip_quotes($statusayah),
              'namaayah' => strip_quotes($namaayah),
              'tempatlahirayah' => strip_quotes($tempatlahirayah),
              'tanggallahirayah' => strip_quotes($tanggallahirayah),
              'agamaayah' => strip_quotes($agamaayah),
              'alamatayah' => strip_quotes($alamatayah),
              'propinsiayah' => strip_quotes($propinsiayah),
              'kotaayah' => strip_quotes($kotaayah),
              'teleponayah' => strip_quotes($teleponayah),
              'hpayah' => strip_quotes($hpayah),
              'pendidikanayah' => strip_quotes($pendidikanayah),
              'pekerjaanayah' => strip_quotes($pekerjaanayah),
              'statusibu' => strip_quotes($statusibu),
              'namaibu' => strip_quotes($namaibu),
              'tempatlahiribu' => strip_quotes($tempatlahiribu),
              'tanggalahiribu' => strip_quotes($tanggalahiribu),
              'agamaibu' => strip_quotes($agamaibu),
              'alamatibu' => strip_quotes($alamatibu),
              'propinsiibu' => strip_quotes($propinsiibu),
              'kotaibu' => strip_quotes($kotaibu),
              'teleponibu' => strip_quotes($teleponibu),
              'hpibu' => strip_quotes($hpibu),
              'pendidikanibu' => strip_quotes($pendidikanibu),
              'pekerjaanibu' => strip_quotes($pekerjaanibu),
              'statuswali' => strip_quotes($statuswali),
              'namawali' => strip_quotes($namawali),
              'tempatlahirwali' => strip_quotes($tempatlahirwali),
              'tanggallahirwali' => strip_quotes($tanggallahirwali),
              'agamawali' => strip_quotes($agamawali),
              'alamatwali' => strip_quotes($alamatwali),
              'propinsiwali' => strip_quotes($propinsiwali),
              'kotawali' => strip_quotes($kotawali),
              'teleponwali' => strip_quotes($teleponwali),
              'hpwali' => strip_quotes($hpwali),
              'pendidikanwali' => strip_quotes($pendidikanwali),
              'pekerjaanwali' => strip_quotes($pekerjaanwali),
              'ppdb_status' => strip_quotes($ppdb_status),
              'noakta' => strip_quotes($noakta),
              'jarak' => strip_quotes($jarak),
              'transportasi' => strip_quotes($transportasi),
              'nikayah' => strip_quotes($nikayah),
              'gajiayah' => strip_quotes($gajiayah),
              'nikibu' => strip_quotes($nikibu),
              'gajiibu' => strip_quotes($gajiibu),
              'gajiwali' => strip_quotes($gajiwali),
              'jenistinggal' => strip_quotes($jenistinggal),
              'kelurahan' => strip_quotes($kelurahan),
              'kecamatan' => strip_quotes($kecamatan),
              'nopesertaun' => strip_quotes($nopesertaun),
              'image' => strip_quotes($image),
            ];

            // Simpan data ke database.
            $this->db->replace('ppdb_siswa', $data);

            $sukses++;
          }
        }
        fclose($handle);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Import Data ' . $sukses . ' Successed !</div>');
        redirect('ppdb/siswacsv');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
        redirect('ppdb/siswacsv');
      }
    }
  }

  // SISWA LOGIN

  public function siswa_login()
  {
    $data['title'] = 'Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $data['siswa'] = $this->db->get_where('ppdb_siswa')->result_array();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswa_login', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function editsiswalogin($id)
  {
    $data['title'] = 'Siswa - LOGIN';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' =>
    $id])->row_array();

    $this->form_validation->set_rules('nis', 'nis', 'required');
    $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required');
    $this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'required');

    // Load view
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('editsiswalogin', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'nis' => $this->input->post('nis'),
        'namasiswa' => $this->input->post('namasiswa'),
        'tanggallahirsiswa' => $this->input->post('tanggallahirsiswa')
      ];
      $this->db->where('id', $id);
      $this->db->update('ppdb_siswa', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('ppdb/siswa_login');
    }
  }

  public function siswacsvlogin()
  {
    $data['title'] = 'Siswa CSV';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswacsvlogin', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function exportsiswacsvlogin()
  {
    $this->form_validation->set_rules('datasiswa', 'datasiswa', 'required');
    // Load view
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Pilihan Data siswa harus dipilih!</div>');
      redirect('ppdb/siswacsvlogin');
    } else {
      $datasiswa = $this->input->post('datasiswa');
      $this->load->dbutil();
      $this->load->helper('download');
      // get data
      $this->load->model('PPDB_model', 'ppdb_model');
      $student_data = $this->ppdb_model->fetch_datasiswanis();

      // file creation
      $delimiter = ";";
      $newline = "\r\n";
      $enclosure = '"';
      $data = $this->dbutil->csv_from_result($student_data, $delimiter, $newline, $enclosure);
      $namefile = 'Data_SiswaNIS_' . date('Ymd_His') . '.csv';
      force_download($namefile, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported to CSV !</div>');
      redirect('ppdb/siswacsvlogin');
    }
  }

  public function importsiswacsvlogin()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $user_id = $data['user']['id'];

    $file = $_FILES['siswacsv']['tmp_name'];
    $datasiswa = $this->input->post('datasiswa');

    // Medapatkan ekstensi file csv yang akan diimport.
    $ekstensi  = explode('.', $_FILES['siswacsv']['name']);

    // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

    if (empty($file)) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
      redirect('ppdb/siswacsvlogin');
    } else {
      // Validasi apakah file yang diupload benar-benar file csv.
      if (strtolower(end($ekstensi)) == 'csv' && $_FILES["siswacsv"]["size"] > 0) {

        $i = 0;
        $handle = fopen($file, "r");
        $sukses = '0';
        while (($row = fgetcsv($handle, 2048))) {
          $i++;
          if ($i == 1) continue;
          // Data yang akan disimpan ke dalam databse
          //$this->db->where('siswa_id', $siswa_id);
          //$this->db->delete('siswa_spp');
          $dataraw =  $row[0];
          $arr = explode(";", $dataraw);
          $id =  $arr[0];
          $nis =  $arr[1];
          $namasiswa =  $arr[2];
          $tanggallahirsiswa =  $arr[3];
          $ppdb_status =  $arr[4];

          if ($id <> '') {

            $data = [
              'id' => $id,
              'nis' => $nis,
              'namasiswa' => $namasiswa,
              'tanggallahirsiswa' => $tanggallahirsiswa,
              'ppdb_status' => $ppdb_status,

            ];

            // Simpan data ke database.
            $this->db->replace('ppdb_siswa', $data);
            $sukses++;
          }
        }
        fclose($handle);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Import Data ' . $sukses . ' Successed !</div>');
        redirect('ppdb/siswacsvlogin');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
        redirect('ppdb/siswacsvlogin');
      }
    }
  }

  public function laporanppdb()
  {
    $data['title'] = 'Laporan PPDB';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->db->select('`m_gelombang_jalur`.*');
    $this->db->from('m_gelombang_jalur');
    $this->db->group_by('tahun_id');
    $this->db->order_by('tahun_id', 'DESC');
    $data['tahun'] = $this->db->get()->result_array();

    $this->db->select('`m_gelombang_jalur`.*,`m_gelombang`.nama as `gelombang`');
    $this->db->from('m_gelombang_jalur');
    $this->db->join('m_gelombang', 'm_gelombang.id = m_gelombang_jalur.gelombang_id');
    $this->db->group_by('gelombang_id');
    $this->db->order_by('gelombang_id', 'ASC');
    $data['gelombang'] = $this->db->get()->result_array();

    $this->db->select('`m_gelombang_jalur`.*,`m_jalur`.nama as `jalur`');
    $this->db->from('m_gelombang_jalur');
    $this->db->join('m_jalur', 'm_jalur.id = m_gelombang_jalur.jalur_id');
    $this->db->group_by('jalur_id');
    $this->db->order_by('jalur_id', 'ASC');
    $data['jalur'] = $this->db->get()->result_array();

    $tahun_ppdb = $this->input->post('tahun_ppdb');
    $gelombang_id = $this->input->post('gelombang_id');
    $jalur_id = $this->input->post('jalur_id');
    $data['tahun_ppdb'] = $tahun_ppdb;
    $data['gelombang_id'] = $gelombang_id;
    $data['jalur_id'] = $jalur_id;

    $this->load->model('ppdb_model', 'ppdb_model');
    $data['siswa'] = $this->ppdb_model->ppdbgetDataAll($tahun_ppdb, $gelombang_id, $jalur_id);
    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporanppdb', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function laporan_print($tahun_ppdb, $gelombang_id, $jalur_id)
  {
    $data['title'] = 'Laporan PPDB';
    $this->load->model('ppdb_model', 'ppdb_model');
    $data['siswa'] = $this->ppdb_model->ppdbgetDataAll($tahun_ppdb, $gelombang_id, $jalur_id);
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_print', $data);
  }
  public function laporan_excel($tahun_ppdb, $gelombang_id, $jalur_id)
  {
    $data['title'] = 'Laporan PPDB';
    $this->load->model('ppdb_model', 'ppdb_model');
    $data['siswa'] = $this->ppdb_model->ppdbgetDataAll($tahun_ppdb, $gelombang_id, $jalur_id);

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_excel', $data);
  }

  public function laporan_pdf($tahun_ppdb, $gelombang_id, $jalur_id)
  {
    $data['title'] = 'Laporan PPDB';
    $this->load->model('ppdb_model', 'ppdb_model');
    $data['siswa'] = $this->ppdb_model->ppdbgetDataAll($tahun_ppdb, $gelombang_id, $jalur_id);
    $html = $this->load->view('laporan_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanppdb_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }

  // FORMULIR
  public function formulir_penjualan()
  {
    $data['title'] = 'Penjualan Formulir';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('ppdb_model', 'ppdb_model');
    $data['formulir'] = $this->ppdb_model->getformulirtersedia();

    $data['id_nota'] = $this->ppdb_model->getlast_idnota();

    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('asalsekolah', 'asalsekolah', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('hp', 'hp', 'required|numeric');
    $this->form_validation->set_rules('jumlah_form', 'jumlah_form', 'required|numeric');
    $this->form_validation->set_rules('harga_form', 'harga_form', 'required|numeric');
    $this->form_validation->set_rules('bayar_form', 'bayar_form', 'required|numeric');
    $this->form_validation->set_rules('no_formulir', 'no_formulir', 'required');
    // Load view
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/javascript', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('formulir_penjualan', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tanggal = $this->input->post('tanggal');
      $nama = $this->input->post('nama');
      $asalsekolah = $this->input->post('asalsekolah');
      $alamat = $this->input->post('alamat');
      $hp = $this->input->post('hp');
      $jumlah_form = $this->input->post('jumlah_form');
      $harga_form = $this->input->post('harga_form');
      $bayar_form = $this->input->post('bayar_form');
      $no_formulir = $this->input->post('no_formulir');
      $user_id = $this->input->post('user_id');
      $data = [
        'tanggal' => $tanggal,
        'nama' => $nama,
        'asalsekolah' => $asalsekolah,
        'alamat' => $alamat,
        'hp' => $hp,
        'jumlah_form' => $jumlah_form,
        'harga_form' => $harga_form,
        'bayar_form' => $bayar_form,
        'no_formulir' => $no_formulir,
        'user_id' => $user_id,

      ];

      // Simpan data ke database.
      $this->db->insert('ppdb_formulir_jual', $data);

      $splittedstring = explode(",", $no_formulir);
      foreach ($splittedstring as $key => $value) {
        $this->db->set('status', 'terjual');
        $this->db->where('noformulir', $value);
        $this->db->update('ppdb_formulir');
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved!</div>');
      redirect('ppdb/formulir_penjualan');
    }
  }

  public function formulir_nota($id_nota = '')
  {
    $this->load->model('ppdb_model', 'ppdb_model');
    $id_nota = $this->ppdb_model->getlast_idnota();
    $data['id_nota'] = $id_nota;
    $data['logoslip'] = $this->db->get_where('m_logoslip', ['id' =>
    '1'])->row_array();
    $this->load->model('ppdb_model', 'ppdb_model');
    $data['datajualformulir'] = $this->ppdb_model->penjualanformulir_byId($id_nota);
    $this->load->view('formulir_nota', $data);
  }

  // SISWA Bayar Void

  public function formulir_penjualan_void()
  {
    $data['title'] = 'Penjualan Formulir Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('ppdb_model', 'ppdb_model');
    $data['formulir_penjualan_list'] = $this->ppdb_model->formulir_penjualan_list();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('formulir_penjualan_void', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function formulir_void_tambah()
  {
    $data['title'] = 'Penjualan Formulir Batal';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();


    $this->load->model('ppdb_model', 'ppdb_model');
    $data['formulir_penjualan_list'] = $this->ppdb_model->formulir_penjualan_list();

    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('formulir_void_tambah', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function batalformulir($id_nota)
  {
    $this->db->set('bayar_form', '0');
    $this->db->where('id_nota', $id_nota);
    $this->db->update('ppdb_formulir_jual');

    $data['formulir'] = $this->db->get_where('ppdb_formulir_jual', ['id_nota' =>
    $id_nota])->row_array();
    $no_formulir = $data['formulir']['no_formulir'];
    $splittedstring = explode(",", $no_formulir);
    foreach ($splittedstring as $key => $value) {
      $this->db->set('status', 'tersedia');
      $this->db->where('noformulir', $value);
      $this->db->update('ppdb_formulir');
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Deleted !</div>');
    redirect('ppdb/formulir_penjualan_void');
  }

  public function laporan_penjualan()
  {
    $data['title'] = 'Laporan Penjualan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('ppdb_model', 'ppdb_model');
    $data['penjualanresult'] = $this->ppdb_model->formulir_penjualan_list();

    $daritanggal = date('Y-m-01');
    $sampaitanggal = date('Y-m-d');

    if (isset($_POST['submit'])) {
      $daritanggal = $this->input->post('daritanggal');
      $sampaitanggal = $this->input->post('sampaitanggal');
      $data['penjualanresult'] = $this->ppdb_model->penjualanformulir_darisampai($daritanggal, $sampaitanggal);
    }
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_penjualan', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function laporan_jual_print($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Penjualan Formulir';
    $this->load->model('ppdb_model', 'ppdb_model');
    $data['penjualanresult'] = $this->ppdb_model->penjualanformulir_darisampai($daritanggal, $sampaitanggal);
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_jual_print', $data);
  }
  public function laporan_jual_excel($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Penjualan Formulir';
    $this->load->model('ppdb_model', 'ppdb_model');
    $data['penjualanresult'] = $this->ppdb_model->penjualanformulir_darisampai($daritanggal, $sampaitanggal);

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_jual_excel', $data);
  }

  public function laporan_jual_pdf($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Penjualan Formulir';
    $this->load->model('ppdb_model', 'ppdb_model');
    $data['penjualanresult'] = $this->ppdb_model->penjualanformulir_darisampai($daritanggal, $sampaitanggal);
    $html = $this->load->view('laporan_jual_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporanjualformulir_pdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
  //
  public function siswastatus()
  {
    $data['title'] = 'Siswa Status';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('ppdb_model', 'ppdb_model');
    $calonaktif = array('calon', 'aktif');
    $data['getsiswaaktif'] = $this->ppdb_model->getsiswa_byStatus($calonaktif);

    if ($this->session->userdata('status_tujuan')) {
      $data['status_tujuan'] = $this->session->userdata('status_tujuan');
      $data['listsiswatujuan'] = $this->ppdb_model->getsiswa_byStatus($this->session->userdata('status_tujuan'));
    } else {
      $data['status_tujuan'] = '';
    }
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('siswa_status', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function list_statustujuan($status)
  {
    $this->session->set_userdata('status_tujuan', $status);
    redirect('ppdb/siswastatus');
  }
  public function status_ubah($id, $status)
  {
    if ($status) {
      $this->db->set('ppdb_status', $status);
      $this->db->where('id', $id);
      $this->db->update('ppdb_siswa');
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert"Status Updated !</div>');
      redirect('ppdb/siswastatusok');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">harus ada Status Tujuan !</div>');
      redirect('ppdb/siswastatusok');
    }
  }
  public function status_aktif($id)
  {
    $this->db->set('ppdb_status', 'aktif');
    $this->db->where('id', $id);
    $this->db->update('ppdb_siswa');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert"Status Updated !</div>');
    redirect('ppdb/siswastatusok');
  }

  public function siswastatusok()
  {
    redirect('ppdb/siswastatus');
  }

  public function print_siswa_detail($id)
  {
    $data['title'] = 'Cetak Siswa Detail';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('Ppdb_model', 'Ppdb_model');
    $data['getsiswa'] = $this->Ppdb_model->siswa_GetAll_DatabyId($id);
    $this->load->view('themes/backend/headerraport', $data);
    $this->load->view('print_siswa_detail', $data);
    $this->load->view('themes/backend/footer_print', $data);
  }

  public function analisa_ppdb()
  {
    $data['title'] = 'Analisa PPDB';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $this->db->group_by('tahun_ppdb');
    $this->db->order_by('tahun_ppdb', 'DESC');
    $data['tahun'] = $this->db->get()->result_array();


    $this->load->model('Ppdb_model', 'Ppdb_model');
    $data['tahun_ppdb'] = $this->input->post('tahun_ppdb');
    $tahun_ppdb = $this->input->post('tahun_ppdb');
    $data['group_gelombang'] = $this->Ppdb_model->get_analisappdb_gelombang($tahun_ppdb);
    $data['group_kelamin'] = $this->Ppdb_model->get_analisappdb_kelamin($tahun_ppdb);
    $data['asal_sekolah'] = $this->Ppdb_model->get_analisappdb_asalsekolah($tahun_ppdb);
    // Load view
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('analisa_ppdb', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function analisa_ppdb_print($tahun_ppdb)
  {
    $data['title'] = 'Analisa PPDB';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $this->db->group_by('tahun_ppdb');
    $this->db->order_by('tahun_ppdb', 'DESC');
    $data['tahun'] = $this->db->get()->result_array();


    $this->load->model('Ppdb_model', 'Ppdb_model');
    $data['group_gelombang'] = $this->Ppdb_model->get_analisappdb_gelombang($tahun_ppdb);
    $data['group_kelamin'] = $this->Ppdb_model->get_analisappdb_kelamin($tahun_ppdb);
    $data['asal_sekolah'] = $this->Ppdb_model->get_analisappdb_asalsekolah($tahun_ppdb);
    $data['tahun_ppdb'] = $tahun_ppdb;
    // Load view

    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('analisa_ppdb_print', $data);
  }
  public function analisa_ppdb_excel($tahun_ppdb)
  {
    $data['title'] = 'Analisa PPDB';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $this->db->group_by('tahun_ppdb');
    $this->db->order_by('tahun_ppdb', 'DESC');
    $data['tahun'] = $this->db->get()->result_array();


    $this->load->model('Ppdb_model', 'Ppdb_model');
    $data['group_gelombang'] = $this->Ppdb_model->get_analisappdb_gelombang($tahun_ppdb);
    $data['group_kelamin'] = $this->Ppdb_model->get_analisappdb_kelamin($tahun_ppdb);
    $data['asal_sekolah'] = $this->Ppdb_model->get_analisappdb_asalsekolah($tahun_ppdb);
    $data['tahun_ppdb'] = $tahun_ppdb;
    // Load view
    $this->load->view('analisa_ppdb_excel', $data);
  }

  public function analisa_ppdb_pdf($tahun_ppdb)
  {
    $data['title'] = 'Analisa PPDB';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->db->select('`ppdb_siswa`.*');
    $this->db->from('ppdb_siswa');
    $this->db->group_by('tahun_ppdb');
    $this->db->order_by('tahun_ppdb', 'DESC');
    $data['tahun'] = $this->db->get()->result_array();

    $this->load->model('Ppdb_model', 'Ppdb_model');
    $data['group_gelombang'] = $this->Ppdb_model->get_analisappdb_gelombang($tahun_ppdb);
    $data['group_kelamin'] = $this->Ppdb_model->get_analisappdb_kelamin($tahun_ppdb);
    $data['asal_sekolah'] = $this->Ppdb_model->get_analisappdb_asalsekolah($tahun_ppdb);
    $data['tahun_ppdb'] = $tahun_ppdb;
    // Load view
    $html = $this->load->view('analisa_ppdb_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'analisa_ppdb_pdf' . $tahun_ppdb;
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
  //end

}
