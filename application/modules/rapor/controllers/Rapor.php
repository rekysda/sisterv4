<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Rapor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  // KELOMPOK MAPEL
  public function kelompok_mapel()
  {
    $data['title'] = 'Kelompok Mapel';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['kelompokmapel'] = $this->rapor_model->get_kelompokmapel();

    $this->form_validation->set_rules('jenis', 'jenis', 'required');
    $this->form_validation->set_rules('nama_kelompok', 'nama_kelompok', 'required|is_unique[r_kelompok_mapel.nama_kelompok]');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('kelompok_mapel', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'jenis' => $this->input->post('jenis'),
        'nama_kelompok' => $this->input->post('nama_kelompok'),
        'keterangan' => $this->input->post('keterangan')
      ];
      $this->db->insert('r_kelompok_mapel', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_kelompok');
activity_log($user,'Tambah Kelompok Mapel',$item);
//end log  
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('rapor/kelompok_mapel/' . $id);
    }
  }

  public function edit_kelompok_mapel($id)
  {
    $data['title'] = 'Kelompok Mapel';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['getkelompokmapel'] = $this->rapor_model->get_kelompokmapel_byId($id);

    $this->form_validation->set_rules('jenis', 'jenis', 'required');
    $this->form_validation->set_rules('nama_kelompok', 'nama_kelompok', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('edit_kelompok_mapel', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'jenis' => $this->input->post('jenis'),
        'nama_kelompok' => $this->input->post('nama_kelompok'),
        'keterangan' => $this->input->post('keterangan')
      ];
      $this->db->where('id', $id);
      $this->db->update('r_kelompok_mapel', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_kelompok');
activity_log($user,'Edit Kelompok Mapel',$item);
//end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('rapor/kelompok_mapel');
    }
  }

  public function hapus_kelompok_mapel($id)
  {
//log act
$data['table'] = $this->db->get_where('r_kelompok_mapel', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item= $data['table']['nama_kelompok'];
activity_log($user,'Hapus Kelompok Mapel',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('r_kelompok_mapel');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('rapor/kelompok_mapel');
  }

  //Mapel
  public function mapel()
  {
    $data['title'] = 'Mata Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['mapel'] = $this->rapor_model->get_mapelall();

    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('mapel', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }

  public function mapel_add()
  {
    $data['title'] = 'Mata Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['kelompokmapel'] = $this->rapor_model->get_kelompokmapel();
    $data['jurusanmapel'] = $this->rapor_model->get_jurusanmapel();
    $data['gurumgmp'] = $this->rapor_model->get_guruAll();
    $data['kodemapelauto'] = $this->rapor_model->buat_kode_mapel();

    $this->form_validation->set_rules('kode_mapel', 'kode_mapel', 'required|is_unique[r_mapel.kode_mapel]');
    $this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'required');
    $this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'required');
    $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
    $this->form_validation->set_rules('kelompok_id', 'kelompok', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('mapel_add', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'kode_mapel' => $this->input->post('kode_mapel'),
        'nama_mapel' => $this->input->post('nama_mapel'),
        'sk_mapel' => $this->input->post('sk_mapel'),
        'jurusan_id' => $this->input->post('jurusan_id'),
        'guru_mgmp' => $this->input->post('guru_mgmp'),
        'tingkat' => $this->input->post('tingkat'),
        'urutan' => $this->input->post('urutan'),
        'kelompok_id' => $this->input->post('kelompok_id'),
      ];
      $this->db->insert('r_mapel', $data);
//log act
//$data['table'] = $this->db->get_where('r_kelompok_mapel', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item= $this->input->post('nama_mapel');
activity_log($user,'Tambah Mapel',$item);
//end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('rapor/mapel');
    }
  }

  public function mapel_edit($id)
  {
    $data['title'] = 'Mata Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['getmapel'] = $this->rapor_model->get_mapel_byId($id);
    $data['kelompokmapel'] = $this->rapor_model->get_kelompokmapel();
    $data['jurusanmapel'] = $this->rapor_model->get_jurusanmapel();
    $data['gurumgmp'] = $this->rapor_model->get_guruAll();
    $data['kodemapelauto'] = $this->rapor_model->buat_kode_mapel();

    $this->form_validation->set_rules('kode_mapel', 'kode_mapel', 'required');
    $this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'required');
    $this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'required');
    $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
    $this->form_validation->set_rules('kelompok_id', 'kelompok', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('mapel_edit', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'kode_mapel' => $this->input->post('kode_mapel'),
        'nama_mapel' => $this->input->post('nama_mapel'),
        'sk_mapel' => $this->input->post('sk_mapel'),
        'jurusan_id' => $this->input->post('jurusan_id'),
        'guru_mgmp' => $this->input->post('guru_mgmp'),
        'tingkat' => $this->input->post('tingkat'),
        'urutan' => $this->input->post('urutan'),
        'kelompok_id' => $this->input->post('kelompok_id'),
      ];

      $this->db->where('id', $id);
      $this->db->update('r_mapel', $data);
//log act
//$data['table'] = $this->db->get_where('r_kelompok_mapel', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item= $this->input->post('nama_mapel');
activity_log($user,'Edit Mapel',$item);
//end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('rapor/mapel');
    }
  }

  public function mapel_hapus($id)
  {
//log act
$data['table'] = $this->db->get_where('r_mapel', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item= $data['table']['nama_mapel'];
activity_log($user,'Hapus Mapel',$item);
//end log
    $this->db->where('id', $id);
    $this->db->delete('r_mapel');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('rapor/mapel');
  }

  //jadwal pelajaran
  public function jadwal_pelajaran()
  {
    $data['title'] = 'Jadwal Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('jadwal_pelajaran', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['jadwal_pelajaran'] = $this->rapor_model->get_jadwal_pelajaran($tahunakademik_id, $kelas_id);
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('jadwal_pelajaran', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    }
  }

  public function jadwal_add()
  {
    $data['title'] = 'Jadwal Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['tahun_default'] = $this->db->get_where('m_options', ['name' =>
    'tahun_default'])->row_array();
    $tahun_default = $data['tahun_default']['value'];
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['mapel'] = $this->rapor_model->get_mapelall();
    $data['kelas'] = $this->rapor_model->get_kelasAll_byTahun($tahun_default);
    $data['guru'] = $this->rapor_model->get_guruAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('mapel_id', 'mapel_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    $this->form_validation->set_rules('guru_id', 'guru_id', 'required');
    $this->form_validation->set_rules('hari', 'hari', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('jadwal_add', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'tahunakademik_id' => $this->input->post('tahunakademik_id'),
        'mapel_id' => $this->input->post('mapel_id'),
        'kelas_id' => $this->input->post('kelas_id'),
        'guru_id' => $this->input->post('guru_id'),
        'hari' => $this->input->post('hari'),
        'jam_mulai' => $this->input->post('jam_mulai'),
        'jam_selesai' => $this->input->post('jam_selesai')
      ];
      $this->db->insert('r_jadwal_pelajaran', $data);
//log act
//$data['table'] = $this->db->get_where('r_mapel', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Tambah Jadwal',$item);
//end log
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('rapor/jadwal_pelajaran');
    }
  }

  public function jadwal_edit($id)
  {
    $data['title'] = 'Jadwal Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['tahun_default'] = $this->db->get_where('m_options', ['name' =>
    'tahun_default'])->row_array();
    $tahun_default = $data['tahun_default']['value'];
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['mapel'] = $this->rapor_model->get_mapelall();
    $data['kelas'] = $this->rapor_model->get_kelasAll_byTahun($tahun_default);
    $data['guru'] = $this->rapor_model->get_guruAll();
    $data['getjadwal'] = $this->rapor_model->get_jadwal_byId($id);

    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('mapel_id', 'mapel_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    $this->form_validation->set_rules('guru_id', 'guru_id', 'required');
    $this->form_validation->set_rules('hari', 'hari', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('jadwal_edit', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $data = [
        'tahunakademik_id' => $this->input->post('tahunakademik_id'),
        'mapel_id' => $this->input->post('mapel_id'),
        'kelas_id' => $this->input->post('kelas_id'),
        'guru_id' => $this->input->post('guru_id'),
        'hari' => $this->input->post('hari'),
        'jam_mulai' => $this->input->post('jam_mulai'),
        'jam_selesai' => $this->input->post('jam_selesai')
      ];
      $this->db->where('id', $id);
      $this->db->update('r_jadwal_pelajaran', $data);
//log act
//$data['table'] = $this->db->get_where('r_mapel', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Tambah Jadwal',$item);
//end log      
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
      redirect('rapor/jadwal_pelajaran');
    }
  }
  public function jadwal_hapus($id)
  {
//log act
//$data['table'] = $this->db->get_where('r_mapel', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Hapus Jadwal',$item);
//end log  
    $this->db->where('id', $id);
    $this->db->delete('r_jadwal_pelajaran');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('rapor/jadwal_pelajaran');
  }

  //siswa masuk
  public function siswa_masuk()
  {
    $data['title'] = 'Siswa Masuk';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswa_masuk', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['getlistsiswa'] = $this->rapor_model->getlistsiswa_byIdkelas($kelas_id);
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('siswa_masuk', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    }
  }

  public function tambah_data()
  {
    $siswa_id = $this->input->post('siswa_id');
    $masuk_kelas = $this->input->post('masuk_kelas');
    $masuk_tanggal = $this->input->post('masuk_tanggal');



    foreach ($siswa_id as $key => $n) {
      $datadetail = [
        'siswa_id'     =>  $n,
        'masuk_kelas'     =>  $masuk_kelas[$key],
        'masuk_tanggal'     =>  $masuk_tanggal[$key]
      ];
      $this->db->replace('r_siswa_masuk', $datadetail);
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
    redirect('rapor/siswa_masuk');
  }
  // CAPAIAN BELAJAR
  public function capaian_belajar($tahunakademik_id = '', $kelas_id = '')
  {
    $data['title'] = 'Capaian Belajar';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    $data['getcapaianbelajar'] = '';
    if ($tahunakademik_id <> '') {
      $data['getcapaianbelajar'] = $this->rapor_model->get_capaianbelajar_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['getcapaianbelajar']) {
        $data['getcapaianbelajar'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $data['tahunakademik_id'] = $tahunakademik_id;
      $data['kelas_id'] = $kelas_id;
    }
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('capaian_belajar', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
      $data['kelas_id'] = $this->input->post('kelas_id');
      $data['getcapaianbelajar'] = $this->rapor_model->get_capaianbelajar_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['getcapaianbelajar']) {
        $data['getcapaianbelajar'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('capaian_belajar', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
      redirect('rapor/capaian_belajar/' . $tahunakademik_id . '/' . $kelas_id);
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

    foreach ($siswa_id as $key => $n) {
      $b1 = '';
      $d1 = '';
      if ($a1[$key] == 'A') {
        $b1 = 'Taat melaksanakan ibadah dengan sangat baik, menunjukkan sikap syukur, selalu berdoa sebelum dan sesudah melaksanakan aktifitas';
      }
      if ($a1[$key] == 'B') {
        $b1 = 'Taat melaksanakan ibadah dengan baik, menunjukkan sikap syukur, selalu berdoa sebelum dan sesudah melaksanakan aktifitas';
      }
      if ($c1[$key] == 'A') {
        $d1 = 'Mampu menjaga hubungan sangat baik dengan teman, guru, pegawai, suka menolong sesama, mampu bekerja sama dalam kegiatan positif di sekolah dengan baik.
      ';
      }
      if ($c1[$key] == 'B') {
        $d1 = 'Mampu menjaga hubungan baik dengan teman, guru, pegawai, suka menolong sesama, mampu bekerja sama dalam kegiatan positif di sekolah dengan baik.
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
    redirect('rapor/capaian_belajar/' . $tahunakademik_id . '/' . $kelas_id);
  }
  // CATATAN WALIKELAS
  public function catatan_walikelas($tahunakademik_id = '', $kelas_id = '')
  {
    $data['title'] = 'Catatan WaliKelas';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    $data['getcatatanwalikelas'] = '';
    if ($tahunakademik_id <> '') {
      $data['getcatatanwalikelas'] = $this->rapor_model->get_catatan_walikelas_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['getcatatanwalikelas']) {
        $data['getcatatanwalikelas'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $data['tahunakademik_id'] = $tahunakademik_id;
      $data['kelas_id'] = $kelas_id;
    }
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('catatan_walikelas', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
      $data['kelas_id'] = $this->input->post('kelas_id');
      $data['getcatatanwalikelas'] = $this->rapor_model->get_catatan_walikelas_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['getcatatanwalikelas']) {
        $data['getcatatanwalikelas'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('catatan_walikelas', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
      redirect('rapor/catatan_walikelas/' . $tahunakademik_id . '/' . $kelas_id);
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

    foreach ($siswa_id as $key => $n) {
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
    redirect('rapor/catatan_walikelas/' . $tahunakademik_id . '/' . $kelas_id);
  }

  // extrakulikuler
  public function extrakulikuler($tahunakademik_id = '', $kelas_id = '')
  {
    $data['title'] = 'Extrakulikuler';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($tahunakademik_id <> '') {
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['get_extrakulikuler'] = $this->rapor_model->get_extrakulikuler_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['get_extrakulikuler']) {
        $data['get_extrakulikuler'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $data['tahunakademik_id'] = $tahunakademik_id;
      $data['kelas_id'] = $kelas_id;
    }
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('extrakulikuler', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
      $data['kelas_id'] = $this->input->post('kelas_id');
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['get_extrakulikuler'] = $this->rapor_model->get_extrakulikuler_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['get_extrakulikuler']) {
        $data['get_extrakulikuler'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('extrakulikuler', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
      redirect('rapor/extrakulikuler/' . $tahunakademik_id . '/' . $kelas_id);
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
    redirect('rapor/extrakulikuler/' . $tahunakademik_id . '/' . $kelas_id);
  }

  public function extrakulikuler_edit($tahunakademik_id = '', $kelas_id = '', $extra_id = '')
  {
    $data['title'] = 'Extrakulikuler';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
    $data['get_extrakulikuler'] = $this->rapor_model->get_extrakulikuler_byIdkelas($tahunakademik_id, $kelas_id);
    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
    $data['get_extraedit'] = $this->rapor_model->get_extrakulikuler_byId($extra_id);
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('extrakulikuler_edit', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
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
    redirect('rapor/extrakulikuler/' . $tahunakademik_id . '/' . $kelas_id);
  }

  public function extrakulikuler_hapus($tahunakademik_id = '', $kelas_id = '', $extra_id = '')
  {
    $this->db->where('id', $extra_id);
    $this->db->delete('r_nilai_extrakulikuler');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Data Deleted !</div>');
    redirect('rapor/extrakulikuler/' . $tahunakademik_id . '/' . $kelas_id);
  }

  // prestasi
  public function prestasi($tahunakademik_id = '', $kelas_id = '')
  {
    $data['title'] = 'Prestasi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($tahunakademik_id <> '') {
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['get_prestasi'] = $this->rapor_model->get_prestasi_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['get_prestasi']) {
        $data['get_prestasi'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $data['tahunakademik_id'] = $tahunakademik_id;
      $data['kelas_id'] = $kelas_id;
    }
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('prestasi', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
      $data['kelas_id'] = $this->input->post('kelas_id');
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['get_prestasi'] = $this->rapor_model->get_prestasi_byIdkelas($tahunakademik_id, $kelas_id);
      if (!$data['get_prestasi']) {
        $data['get_prestasi'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      }
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('prestasi', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
      redirect('rapor/prestasi/' . $tahunakademik_id . '/' . $kelas_id);
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
    redirect('rapor/prestasi/' . $tahunakademik_id . '/' . $kelas_id);
  }

  public function prestasi_edit($tahunakademik_id = '', $kelas_id = '', $extra_id = '')
  {
    $data['title'] = 'Prestasi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
    $data['get_prestasi'] = $this->rapor_model->get_prestasi_byIdkelas($tahunakademik_id, $kelas_id);
    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
    $data['get_prestasiedit'] = $this->rapor_model->get_prestasi_byId($extra_id);
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('prestasi_edit', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
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
    redirect('rapor/prestasi/' . $tahunakademik_id . '/' . $kelas_id);
  }

  public function prestasi_hapus($tahunakademik_id = '', $kelas_id = '', $prestasi_id = '')
  {
    $this->db->where('id', $prestasi_id);
    $this->db->delete('r_nilai_prestasi');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Data Deleted !</div>');
    redirect('rapor/prestasi/' . $tahunakademik_id . '/' . $kelas_id);
  }

  //input nilai
  public function input_nilai()
  {
    $data['title'] = 'Input Nilai';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('input_nilai', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['jadwal_pelajaran'] = $this->rapor_model->get_jadwal_pelajaran($tahunakademik_id, $kelas_id);
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('input_nilai', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    }
  }

  public function input_nilai_pengetahuan_edit($jadwal_id)
  {
    $data['title'] = 'Input Nilai';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');


    $data['get_datajadwal'] = $this->rapor_model->get_jadwal_byId($jadwal_id);
    $data['get_nilai_pengetahuan'] = $this->rapor_model->get_nilaipengetahuan_byjadwal($jadwal_id);
    $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
    $kelas_id = $data['get_datajadwal']['kelas_id'];
    $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
    $data['jadwal_id'] = $data['get_datajadwal']['jadwal_id'];
    $data['tahunakademik_id'] = $data['get_datajadwal']['tahunakademik_id'];
    $data['mapel_id'] = $data['get_datajadwal']['mapel_id'];
    $data['kelas_id'] = $data['get_datajadwal']['kelas_id'];
    $data['guru_id'] = $data['get_datajadwal']['guru_id'];
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('input_nilai_pengetahuan_edit', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
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

    foreach ($siswa_id as $key => $n) {
      $rph = '';
      $rpt = '';
      $rata2 = '';
      $grade = '';
      $deskripsi = '';

      //rata penilaian harian
      $arr_ph = array($ph1[$key], $ph2[$key], $ph3[$key], $ph4[$key], $ph5[$key], $ph6[$key]);
      $tot_ph = array_sum($arr_ph);
      $rata_ph = $tot_ph / count(array_filter($arr_ph, 'strlen'));

      //rata penilaian tugas
      $arr_pt = array($pt1[$key], $pt2[$key], $pt3[$key], $pt4[$key], $pt5[$key], $pt6[$key]);
      $tot_pt = array_sum($arr_pt);
      $rata_pt = $tot_pt / count(array_filter($arr_pt, 'strlen'));

      //rph = 60% nilai harian +40% nilai tugas
      $rph = round((0.6 * $rata_ph) + (0.4 * $rata_pt));
      //jika nilai uts uas ada isi
      if (($uts[$key] <> '') and ($uas[$key] <> '')) {
        //RPT =((2*UTS)+rph+UAS)
        $rpt = (((2 * $uts[$key]) + $rph + $uas[$key]));
        //rata2 = rpt/4
        $rata2 = round($rpt / 4);
        if ($rata2 > '0') {
          if ($rata2 < '101') {
            $grade = 'A';
            $deskripsi = 'Sudah  memahami semua kompetensi dengan sangat baik';
          }
          if ($rata2 < '90') {
            $grade = 'B';
            $deskripsi = 'Sudah  memahami semua kompetensi dengan baik';
          }
          if ($rata2 < '82') {
            $grade = 'C';
            $deskripsi = 'Sudah  memahami semua kompetensi dengan cukup';
          }
          if ($rata2 < '74') {
            $grade = 'D';
            $deskripsi = 'Kurang  memahami semua kompetensi';
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
    redirect('rapor/input_nilai_pengetahuan_edit/' . $jadwal_id);
  }
  //input keterampilan
  public function input_nilai_keterampilan_edit($jadwal_id)
  {
    $data['title'] = 'Input Nilai';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');


    $data['get_datajadwal'] = $this->rapor_model->get_jadwal_byId($jadwal_id);
    $data['get_nilai_keterampilan'] = $this->rapor_model->get_nilaiketerampilan_byjadwal($jadwal_id);
    $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
    $kelas_id = $data['get_datajadwal']['kelas_id'];
    $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
    $data['jadwal_id'] = $data['get_datajadwal']['jadwal_id'];
    $data['tahunakademik_id'] = $data['get_datajadwal']['tahunakademik_id'];
    $data['mapel_id'] = $data['get_datajadwal']['mapel_id'];
    $data['kelas_id'] = $data['get_datajadwal']['kelas_id'];
    $data['guru_id'] = $data['get_datajadwal']['guru_id'];
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('input_nilai_keterampilan_edit', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
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

    foreach ($siswa_id as $key => $n) {
      $rata2 = '';
      $grade = '';
      $deskripsi = '';

      //rata penilaian harian
      $arr_nil = array($nil1[$key], $nil2[$key], $nil3[$key], $nil4[$key], $nil5[$key], $nil6[$key], $nil7[$key], $nil8[$key]);
      $tot_nil = array_sum($arr_nil);
      $rata2 = $tot_nil / count(array_filter($arr_nil, 'strlen'));

      if ($rata2 > '0') {
        if ($rata2 < '101') {
          $grade = 'A';
          $deskripsi = 'Sangat baik, terampil dalam  semua kompetensi';
        }
        if ($rata2 < '90') {
          $grade = 'B';
          $deskripsi = 'Baik, terampil dalam  semua kompetensi';
        }
        if ($rata2 < '82') {
          $grade = 'C';
          $deskripsi = 'Cukup, terampil dalam  semua  kompetensi';
        }
        if ($rata2 < '74') {
          $grade = 'D';
          $deskripsi = 'Kurang, terampil dalam  semua  kompetensi';
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
    redirect('rapor/input_nilai_keterampilan_edit/' . $jadwal_id);
  }
  //cetak uts
  public function cetak_uts($tahunakademik_id = '', $kelas_id = '')
  {
    $data['title'] = 'Cetak Raport UTS';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($tahunakademik_id <> '') {
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['tahunakademik_id'] = $tahunakademik_id;
      $data['kelas_id'] = $kelas_id;
    }
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('cetak_uts', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
      $data['kelas_id'] = $this->input->post('kelas_id');
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('cetak_uts', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
      redirect('rapor/cetak_uts/' . $tahunakademik_id . '/' . $kelas_id);
    }
  }

  public function print_raport_uts($tahunakademik_id, $kelas_id, $siswa_id)
  {

    $data['title'] = 'Cetak Raport UTS';
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_siswa'] = $this->rapor_model->get_data_siswa_byId($siswa_id);
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);
    $data['get_tahun_akademik'] = $this->rapor_model->get_tahun_akademik_byId($tahunakademik_id);
    $data['get_nilai_uts'] = $this->rapor_model->get_nilai_uts_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_nilai_keterampilan'] = $this->rapor_model->get_nilai_uts_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_siswa_urut'] = $this->rapor_model->get_siswa_urut_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_kelompok_mapel'] = $this->rapor_model->get_siswa_mapelkat_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
    $data['get_siswasakit'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "S");
    $data['get_siswaijin'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "I");
    $data['get_siswaalpa'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "A");
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('print_raport_uts', $data);
  }
  //cetak rapor
  public function cetak_rapor($tahunakademik_id = '', $kelas_id = '')
  {
    $data['title'] = 'Cetak Raport';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($tahunakademik_id <> '') {
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['tahunakademik_id'] = $tahunakademik_id;
      $data['kelas_id'] = $kelas_id;
    }
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('cetak_rapor', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
      $data['kelas_id'] = $this->input->post('kelas_id');
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('cetak_rapor', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
      redirect('rapor/cetak_rapor/' . $tahunakademik_id . '/' . $kelas_id);
    }
  }
  public function print_cover($tahunakademik_id, $kelas_id, $siswa_id)
  {

    $data['title'] = 'Cetak Raport Cover';
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_siswa'] = $this->rapor_model->get_data_siswa_byId($siswa_id);
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);
    $data['get_tahun_akademik'] = $this->rapor_model->get_tahun_akademik_byId($tahunakademik_id);
    $data['get_nilai_uts'] = $this->rapor_model->get_nilai_uts_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_siswa_urut'] = $this->rapor_model->get_siswa_urut_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_kelompok_mapel'] = $this->rapor_model->get_siswa_mapelkat_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
    $data['get_siswasakit'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "S");
    $data['get_siswaijin'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "I");
    $data['get_siswaalpa'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "A");
    $this->load->view('themes/backend/headerraport', $data);
    $this->load->view('print_cover', $data);
  }
  public function print_hal1($tahunakademik_id, $kelas_id, $siswa_id)
  {

    $data['title'] = 'Cetak Raport Hal 1';
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_siswa'] = $this->rapor_model->get_data_siswa_byId($siswa_id);
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);
    $data['get_tahun_akademik'] = $this->rapor_model->get_tahun_akademik_byId($tahunakademik_id);
    $data['get_nilai_uts'] = $this->rapor_model->get_nilai_uts_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_siswa_urut'] = $this->rapor_model->get_siswa_urut_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_kelompok_mapel'] = $this->rapor_model->get_siswa_mapelkat_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
    $data['get_siswasakit'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "S");
    $data['get_siswaijin'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "I");
    $data['get_siswaalpa'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "A");
    $this->load->view('themes/backend/headerraport', $data);
    $this->load->view('print_hal1', $data);
  }
  public function print_hal2($tahunakademik_id, $kelas_id, $siswa_id)
  {

    $data['title'] = 'Cetak Raport Hal 2';
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_siswa'] = $this->rapor_model->get_data_siswa_byId($siswa_id);
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);
    $data['get_tahun_akademik'] = $this->rapor_model->get_tahun_akademik_byId($tahunakademik_id);
    $data['get_nilai_uts'] = $this->rapor_model->get_nilai_uts_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_siswa_urut'] = $this->rapor_model->get_siswa_urut_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_kelompok_mapel'] = $this->rapor_model->get_siswa_mapelkat_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
    $data['get_siswasakit'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "S");
    $data['get_siswaijin'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "I");
    $data['get_siswaalpa'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "A");
    $this->load->view('themes/backend/headerraport', $data);
    $this->load->view('print_hal2', $data);
  }

  public function print_hal3($tahunakademik_id, $kelas_id, $siswa_id)
  {

    $data['title'] = 'Cetak Raport Hal 3';
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_siswa'] = $this->rapor_model->get_data_siswa_byId($siswa_id);
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);
    $data['get_tahun_akademik'] = $this->rapor_model->get_tahun_akademik_byId($tahunakademik_id);
    $data['get_nilai_uts'] = $this->rapor_model->get_nilai_uts_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_nilai_keterampilan'] = $this->rapor_model->get_nilai_keterampilan_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_nilai_sikap'] = $this->rapor_model->get_nilai_sikap_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_catatan_walikelas'] = $this->rapor_model->get_catatan_walikelas_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_siswa_urut'] = $this->rapor_model->get_siswa_urut_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_kelompok_mapel'] = $this->rapor_model->get_siswa_mapelkat_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_kelompok_mapelket'] = $this->rapor_model->get_siswa_mapelkat_ktr_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['siswa_urut'] = $data['get_siswa_urut']['siswa_urut'];
    $data['get_nilai_extrakulikuler'] = $this->rapor_model->get_nilai_extrakulikuler_byId($tahunakademik_id, $kelas_id, $siswa_id);
    $data['get_siswasakit'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "S");
    $data['get_siswaijin'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "I");
    $data['get_siswaalpa'] = $this->rapor_model->get_absensiswa($siswa_id, $tahunakademik_id, "A");
    $this->load->view('themes/backend/headerraport', $data);
    $this->load->view('print_hal3', $data);
  }
  //cetak dkn
  public function cetak_dkn($tahunakademik_id = '', $kelas_id = '')
  {
    $data['title'] = 'Cetak DKN';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikbytahun();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($tahunakademik_id <> '') {
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['mapel'] = $this->rapor_model->get_mapel_byakademik($tahunakademik_id, $kelas_id);
      $data['tahunakademik_id'] = $tahunakademik_id;
      $data['kelas_id'] = $kelas_id;
    }
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('cetak_dkn', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_id'] = $this->input->post('tahunakademik_id');
      $data['kelas_id'] = $this->input->post('kelas_id');
      $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
      $data['mapel'] = $this->rapor_model->get_mapel_byakademik($tahunakademik_id, $kelas_id);
      $data['tahun_genap'] = $this->rapor_model->get_tahun_genap($tahunakademik_id);
      $tahunganjil = $tahunakademik_id;
      $tahungenap = $data['tahun_genap']['id'];
      $data['nilaipengetahuan_ganjil'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahunganjil, $kelas_id);
      $data['nilaiketerampilan_ganjil'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahunganjil, $kelas_id);
      $data['nilaipengetahuan_genap'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahungenap, $kelas_id);
      $data['nilaiketerampilan_genap'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahungenap, $kelas_id);
      $data['nilaixtra_ganjil'] = $this->rapor_model->get_nilai_extra_bykelas($tahunganjil, $kelas_id);
      $data['jumlahxtra_ganjil'] = $this->rapor_model->get_jumlah_extra_bykelas($tahunganjil, $kelas_id);
      $data['jumlahsakit_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'S');
      $data['jumlahijin_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'I');
      $data['jumlahalpha_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'A');
      $data['nilaixtra_genap'] = $this->rapor_model->get_nilai_extra_bykelas($tahungenap, $kelas_id);
      $data['jumlahxtra_genap'] = $this->rapor_model->get_jumlah_extra_bykelas($tahungenap, $kelas_id);
      $data['jumlahsakit_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'S');
      $data['jumlahijin_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'I');
      $data['jumlahalpha_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'A');
      $data['jumlahsakit'] = '0';
      $data['jumlahijin'] = '0';
      $data['jumlahalpha'] = '0';
      $data['tambahan_kolom'] = '0';
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('cetak_dkn', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    }
  }
  //jadwal pelajaran copy
  public function jadwal_pelajaran_copy()
  {
    $data['title'] = 'Jadwal Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('rapor_model', 'rapor_model');
    $data['tahunakademik'] = $this->rapor_model->get_tahunakademikAll();
    $data['kelas'] = $this->rapor_model->get_kelasAll();
    $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
    $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('jadwal_pelajaran_copy', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    } else {
      $tahunakademik_id = $this->input->post('tahunakademik_id');
      $kelas_id = $this->input->post('kelas_id');
      $data['tahunakademik_asal'] = $this->input->post('tahunakademik_id');
      $data['kelas_tujuan'] = $this->input->post('kelas_id');
      $data['jadwal_pelajaran'] = $this->rapor_model->get_jadwal_pelajaran($tahunakademik_id, $kelas_id);

      $data['tahunakademik_genap'] = $this->rapor_model->get_tahunakademikGenap();
      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('jadwal_pelajaran_copy', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');
    }
  }
  public function jadwal_pelajaran_copy_add()
  {
    $tahunakademik_asal = $this->input->post('tahunakademik_asal');
    $kelas_tujuan = $this->input->post('kelas_tujuan');
    $tahunakademik_tujuan = $this->input->post('tahunakademik_tujuan');
    //
    $this->db->where('tahunakademik_id', $tahunakademik_tujuan);
    $this->db->where('kelas_id', $kelas_tujuan);
    $this->db->delete('r_jadwal_pelajaran');
    //
    $this->load->model('rapor_model', 'rapor_model');
    $jadwal_pelajaran = $this->rapor_model->get_jadwal_pelajaran($tahunakademik_asal, $kelas_tujuan);
    foreach ($jadwal_pelajaran as $row) {
      $data = [
        'tahunakademik_id' => $tahunakademik_tujuan,
        'mapel_id' => $row['mapel_id'],
        'kelas_id' => $kelas_tujuan,
        'guru_id' => $row['guru_id'],
        'hari' => $row['hari'],
        'jam_mulai' => $row['jam_mulai'],
        'jam_selesai' => $row['jam_selesai']
      ];

      $this->db->insert('r_jadwal_pelajaran', $data);
    }

    redirect('rapor/jadwal_pelajaran_copy');
  }
  public function cetak_dkn_print($tahunakademik_id, $kelas_id)
  {
    $data['title'] = 'Cetak DKN';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);

    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
    $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
    $data['mapel'] = $this->rapor_model->get_mapel_byakademik($tahunakademik_id, $kelas_id);
    $data['tahun_genap'] = $this->rapor_model->get_tahun_genap($tahunakademik_id);
    $tahunganjil = $tahunakademik_id;
    $tahungenap = $data['tahun_genap']['id'];
    $data['nilaipengetahuan_ganjil'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahunganjil, $kelas_id);
    $data['nilaiketerampilan_ganjil'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahunganjil, $kelas_id);
    $data['nilaipengetahuan_genap'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahungenap, $kelas_id);
    $data['nilaiketerampilan_genap'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahungenap, $kelas_id);
    $data['nilaixtra_ganjil'] = $this->rapor_model->get_nilai_extra_bykelas($tahunganjil, $kelas_id);
    $data['jumlahxtra_ganjil'] = $this->rapor_model->get_jumlah_extra_bykelas($tahunganjil, $kelas_id);
    $data['jumlahsakit_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'S');
    $data['jumlahijin_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'I');
    $data['jumlahalpha_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'A');
    $data['nilaixtra_genap'] = $this->rapor_model->get_nilai_extra_bykelas($tahungenap, $kelas_id);
    $data['jumlahxtra_genap'] = $this->rapor_model->get_jumlah_extra_bykelas($tahungenap, $kelas_id);
    $data['jumlahsakit_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'S');
    $data['jumlahijin_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'I');
    $data['jumlahalpha_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'A');
    $data['jumlahsakit'] = '0';
    $data['jumlahijin'] = '0';
    $data['jumlahalpha'] = '0';
    $data['tambahan_kolom'] = '0';
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('cetak_dkn_print', $data);
  }
  public function cetak_dkn_pdf($tahunakademik_id, $kelas_id)
  {
    $data['title'] = 'Cetak DKN';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);

    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
    $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
    $data['mapel'] = $this->rapor_model->get_mapel_byakademik($tahunakademik_id, $kelas_id);
    $data['tahun_genap'] = $this->rapor_model->get_tahun_genap($tahunakademik_id);
    $tahunganjil = $tahunakademik_id;
    $tahungenap = $data['tahun_genap']['id'];
    $data['nilaipengetahuan_ganjil'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahunganjil, $kelas_id);
    $data['nilaiketerampilan_ganjil'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahunganjil, $kelas_id);
    $data['nilaipengetahuan_genap'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahungenap, $kelas_id);
    $data['nilaiketerampilan_genap'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahungenap, $kelas_id);
    $data['nilaixtra_ganjil'] = $this->rapor_model->get_nilai_extra_bykelas($tahunganjil, $kelas_id);
    $data['jumlahxtra_ganjil'] = $this->rapor_model->get_jumlah_extra_bykelas($tahunganjil, $kelas_id);
    $data['jumlahsakit_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'S');
    $data['jumlahijin_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'I');
    $data['jumlahalpha_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'A');
    $data['nilaixtra_genap'] = $this->rapor_model->get_nilai_extra_bykelas($tahungenap, $kelas_id);
    $data['jumlahxtra_genap'] = $this->rapor_model->get_jumlah_extra_bykelas($tahungenap, $kelas_id);
    $data['jumlahsakit_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'S');
    $data['jumlahijin_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'I');
    $data['jumlahalpha_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'A');
    $data['jumlahsakit'] = '0';
    $data['jumlahijin'] = '0';
    $data['jumlahalpha'] = '0';
    $data['tambahan_kolom'] = '0';
    // $this->load->view('cetak_dkn_pdf', $data);

    $html = $this->load->view('cetak_dkn_pdf', $data, true);
    // create pdf using dompdf
    $filename = 'cetak_dkn_pdf';
    $paper = 'A4';
    $orientation = 'landscape';
    pdf_create($html, $filename, $paper, $orientation);
  }
  public function cetak_dkn_excel($tahunakademik_id, $kelas_id)
  {
    $data['title'] = 'Cetak DKN';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('rapor_model', 'rapor_model');
    $data['get_data_sekolah'] = $this->rapor_model->get_data_sekolah();
    $data['get_data_kelas'] = $this->rapor_model->get_data_kelas_byId($kelas_id);

    $data['tahunakademik_id'] = $tahunakademik_id;
    $data['kelas_id'] = $kelas_id;
    $data['getlistsiswa'] = $this->rapor_model->get_list_siswa_byIdkelas($tahunakademik_id, $kelas_id);
    $data['mapel'] = $this->rapor_model->get_mapel_byakademik($tahunakademik_id, $kelas_id);
    $data['tahun_genap'] = $this->rapor_model->get_tahun_genap($tahunakademik_id);
    $tahunganjil = $tahunakademik_id;
    $tahungenap = $data['tahun_genap']['id'];
    $data['nilaipengetahuan_ganjil'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahunganjil, $kelas_id);
    $data['nilaiketerampilan_ganjil'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahunganjil, $kelas_id);
    $data['nilaipengetahuan_genap'] = $this->rapor_model->get_nilai_pengetahuan_bykelas($tahungenap, $kelas_id);
    $data['nilaiketerampilan_genap'] = $this->rapor_model->get_nilai_keterampilan_bykelas($tahungenap, $kelas_id);
    $data['nilaixtra_ganjil'] = $this->rapor_model->get_nilai_extra_bykelas($tahunganjil, $kelas_id);
    $data['jumlahxtra_ganjil'] = $this->rapor_model->get_jumlah_extra_bykelas($tahunganjil, $kelas_id);
    $data['jumlahsakit_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'S');
    $data['jumlahijin_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'I');
    $data['jumlahalpha_ganjil'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahunganjil, $kelas_id, 'A');
    $data['nilaixtra_genap'] = $this->rapor_model->get_nilai_extra_bykelas($tahungenap, $kelas_id);
    $data['jumlahxtra_genap'] = $this->rapor_model->get_jumlah_extra_bykelas($tahungenap, $kelas_id);
    $data['jumlahsakit_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'S');
    $data['jumlahijin_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'I');
    $data['jumlahalpha_genap'] = $this->rapor_model->get_jumlah_presensi_bykelas($tahungenap, $kelas_id, 'A');
    $data['jumlahsakit'] = '0';
    $data['jumlahijin'] = '0';
    $data['jumlahalpha'] = '0';
    $data['tambahan_kolom'] = '0';
    // $this->load->view('cetak_dkn_pdf', $data);

    $this->load->view('cetak_dkn_excel', $data);
  }
  //End
}
