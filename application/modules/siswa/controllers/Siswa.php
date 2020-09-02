<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_siswa_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';

        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
        if ($this->session->userdata('nis')) {
            $this->db->where('nis', $this->session->userdata('nis'));
        }
        if ($this->session->userdata('noformulir')) {
            $this->db->where('noformulir', $this->session->userdata('noformulir'));
        }
        $data['user'] = $this->db->get()->row_array();
        $data['berkas'] = $this->db->get('ppdb_berkas')->result_array();
        $this->load->view('themes/siswa/header', $data);
        $this->load->view('themes/siswa/sidebar', $data);
        $this->load->view('themes/siswa/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('themes/siswa/footer');
        $this->load->view('themes/siswa/footerajax');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
        $this->db->where('noformulir', $this->session->userdata('noformulir'));
        $data['user'] = $this->db->get()->row_array();

        $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' =>
        $this->session->userdata('siswa_id')])->row_array();

        $data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
        $data['m_agama'] = $this->db->get('m_agama')->result_array();
        $data['m_statusanak'] = $this->db->get('ppdb_status_anak')->result_array();
        $data['m_statusortu'] = $this->db->get('ppdb_status_ortu')->result_array();
        $data['m_pendidikan'] = $this->db->get('m_pendidikan')->result_array();

        $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('tempatlahirsiswa', 'tempatlahirsiswa', 'required');
        $this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'required');
        $this->form_validation->set_rules('tinggisiswa', 'tinggisiswa', 'required');
        $this->form_validation->set_rules('beratsiswa', 'beratsiswa', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nisn', 'nisn', 'required');
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
        $this->form_validation->set_rules('jarak', 'jarak', 'required');
        $this->form_validation->set_rules('transportasi', 'transportasi', 'required');
        $this->form_validation->set_rules('nikayah', 'nikayah', 'required');
        $this->form_validation->set_rules('namaayah', 'namaayah', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('alamatayah', 'alamatayah', 'required');
        $this->form_validation->set_rules('propinsiayah', 'propinsiayah', 'required');
        $this->form_validation->set_rules('kotaayah', 'kotaayah', 'required');
        $this->form_validation->set_rules('hpayah', 'hpayah', 'required');
        $this->form_validation->set_rules('pekerjaanayah', 'pekerjaanayah', 'required');
        $this->form_validation->set_rules('nikibu', 'nikibu', 'required');
        $this->form_validation->set_rules('namaibu', 'namaibu', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('alamatibu', 'alamatibu', 'required');
        $this->form_validation->set_rules('propinsiibu', 'propinsiibu', 'required');
        $this->form_validation->set_rules('kotaibu', 'kotaibu', 'required');
        $this->form_validation->set_rules('hpibu', 'hpibu', 'required');
        $this->form_validation->set_rules('pekerjaanibu', 'pekerjaanibu', 'required');
        $this->form_validation->set_rules('emailortu', 'emailortu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/siswa/header', $data);
            $this->load->view('themes/siswa/sidebar', $data);
            $this->load->view('themes/siswa/topbar', $data);
            $this->load->view('edit', $data);
            $this->load->view('themes/siswa/footer');
            $this->load->view('themes/siswa/footerajax');
        } else {
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
                    $this->db->set('image', $new_image);
                    //ukuran resize
          $this->load->library('image_lib');

          $config2['image_library'] = 'gd2';
          $config2['source_image'] = './assets/images/siswa/' . $new_image;
          $config['new_image'] = './assets/images/siswa/' . $new_image;
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
            $data = [
                'noformulir' => $this->input->post('noformulir'),
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
                'emailortu' => $this->input->post('emailortu')
            ];

            $this->db->where('id', $this->session->userdata('siswa_id'));
            $this->db->update('ppdb_siswa', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
                Profile has been updated!</div>');
            redirect('siswa');
        }
    }

    public function tagihan()
    {
        $data['title'] = 'Tagihan';

        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');


        if ($this->session->userdata('nis')) {
            $this->db->where('nis', $this->session->userdata('nis'));
        }
        if ($this->session->userdata('noformulir')) {
            $this->db->where('noformulir', $this->session->userdata('noformulir'));
        }
        $data['user'] = $this->db->get()->row_array();
        $data['siswa_id'] = $this->session->userdata('siswa_id');

        $this->db->select('`siswa_keuangan`.*,`m_biaya`.nama as `biaya`');
        $this->db->from('siswa_keuangan');
        $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
        $this->db->order_by('biaya_id', 'ASC');
        $this->db->where('siswa_id', $this->session->userdata('siswa_id'));
        $data['siswa_keuangan'] = $this->db->get()->result_array();
        $data['total'] = 0;
        $data['total2'] = 0;

        $this->load->view('themes/siswa/header', $data);
        $this->load->view('themes/siswa/sidebar', $data);
        $this->load->view('themes/siswa/topbar', $data);
        $this->load->view('tagihan', $data);
        $this->load->view('themes/siswa/footer');
        $this->load->view('themes/siswa/footerajax');
    }

    public function lihatdata()
    {
        $data['title'] = 'My Profile';
        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
        $this->db->where('noformulir', $this->session->userdata('noformulir'));
        $data['user'] = $this->db->get()->row_array();

        $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' =>
        $this->session->userdata('siswa_id')])->row_array();
        $data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
        $data['m_agama'] = $this->db->get('m_agama')->result_array();
        $data['m_statusanak'] = $this->db->get('ppdb_status_anak')->result_array();
        $data['m_statusortu'] = $this->db->get('ppdb_status_ortu')->result_array();
        $data['m_pendidikan'] = $this->db->get('m_pendidikan')->result_array();
        $this->load->view('themes/siswa/header', $data);
        $this->load->view('themes/siswa/sidebar', $data);
        $this->load->view('themes/siswa/topbar', $data);
        $this->load->view('lihatdata', $data);
        $this->load->view('themes/siswa/footer');
        $this->load->view('themes/siswa/footerajax');
    }

    public function cetakprofile($id)
    {
        $data['logoslip'] = $this->db->get_where('m_logoslip', ['id' =>
        '1'])->row_array();

        $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' =>
        $this->session->userdata('siswa_id')])->row_array();
        $data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
        $data['m_agama'] = $this->db->get('m_agama')->result_array();
        $data['m_statusanak'] = $this->db->get('ppdb_status_anak')->result_array();
        $data['m_statusortu'] = $this->db->get('ppdb_status_ortu')->result_array();
        $data['m_pendidikan'] = $this->db->get('m_pendidikan')->result_array();

        $this->load->view('cetakprofile', $data);
    }

    public function view_fullcalendar()
    {
        $data['title'] = 'Kalender Kegiatan';
        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
        $this->db->where('noformulir', $this->session->userdata('noformulir'));
        $data['user'] = $this->db->get()->row_array();

        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['result'] = $this->db->get("akad_kegiatanakademik")->result();
        foreach ($data['result'] as $key => $value) {
            $data['data'][$key]['title'] = $value->judul;
            $data['data'][$key]['start'] = $value->tanggal_awal;
            $data['data'][$key]['end'] = $value->tanggal_akhir;
            $data['data'][$key]['backgroundColor'] = "#3b5998 ";
        }
        $this->load->view('themes/siswa/header', $data);
        $this->load->view('themes/siswa/sidebar', $data);
        $this->load->view('themes/siswa/topbar', $data);
        $this->load->view('view_fullcalendar_onapp', $data);
        $this->load->view('themes/siswa/footer');
        $this->load->view('themes/siswa/footerajax');
    }

    public function pelanggaran()
    {
        $data['title'] = 'Pelanggaran';

        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');


        if ($this->session->userdata('nis')) {
            $this->db->where('nis', $this->session->userdata('nis'));
        }
        if ($this->session->userdata('noformulir')) {
            $this->db->where('noformulir', $this->session->userdata('noformulir'));
        }
        $data['user'] = $this->db->get()->row_array();
        $data['siswa_id'] = $this->session->userdata('siswa_id');
        $siswa_id = $this->session->userdata('siswa_id');

        $this->db->select('`bk_siswapelanggaran`.*,ppdb_siswa.namasiswa,ppdb_siswa.hpayah,m_kelas.nama_kelas,bk_pelanggaran.pelanggaran,bk_kategori_pelanggaran.kategori');
        $this->db->from('bk_siswapelanggaran');
        $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswapelanggaran.siswa_id', 'left');
        $this->db->join('m_kelas', 'm_kelas.id = bk_siswapelanggaran.kelas_id', 'left');
        $this->db->join('bk_pelanggaran', 'bk_pelanggaran.id = bk_siswapelanggaran.pelanggaran_id', 'left');
        $this->db->join('bk_kategori_pelanggaran', 'bk_kategori_pelanggaran.id = bk_pelanggaran.kategori_id', 'left');
        $this->db->where('bk_siswapelanggaran.siswa_id', $siswa_id);
        $data['siswapelanggaran'] = $this->db->get()->result_array();
        $data['total'] = '';
        $this->load->view('themes/siswa/header', $data);
        $this->load->view('themes/siswa/sidebar', $data);
        $this->load->view('themes/siswa/topbar', $data);
        $this->load->view('pelanggaran', $data);
        $this->load->view('themes/siswa/footer');
        $this->load->view('themes/siswa/footerajax');
    }
    public function hapusfoto($id)
    {
      //log activity
      $data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
      //end log
      $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
      $old_image = $data['getsiswa']['image'];
      if ($old_image != 'default.jpg') {
        unlink(FCPATH . './assets/images/siswa/' . $old_image);
      }
      $data = [
        'image' => ''
      ];
      $this->db->where('id', $id); 
      $this->db->update('ppdb_siswa', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
      redirect('siswa');
    }
 
    //siswa berkas add
public function siswa_berkas_add()
{
  $data['title'] = 'My Profile';
  $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
  $this->db->from('ppdb_siswa');
  $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
  $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
  $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
  $this->db->where('noformulir', $this->session->userdata('noformulir'));
  $data['user'] = $this->db->get()->row_array();
  $id  =$data['user']['id'];
  $this->db->select('*');
  $this->db->from('ppdb_berkas');
  $this->db->where('siswa', $id);
  $data['getsiswaberkas'] = $this->db->get()->result_array(); 
  $this->form_validation->set_rules('nama', 'nama', 'required');
  if ($this->form_validation->run() == false) {
    $this->load->view('themes/siswa/header', $data);
    $this->load->view('themes/siswa/sidebar', $data);
    $this->load->view('themes/siswa/topbar', $data);
    $this->load->view('siswa_berkas_add', $data);
    $this->load->view('themes/siswa/footer');
    $this->load->view('themes/siswa/footerajax');
  }else{    
    $upload_image = $_FILES['image']['name'];
  if ($upload_image) {
    $config['allowed_types'] = 'jpg|jpeg';
    $config['upload_path'] = './assets/images/siswa_berkas/';
    $config['file_name'] = date('ymdhis');
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('image')) {
      $new_image = $this->upload->data('file_name');
    } else {
      echo  $this->upload->display_errors();
    }
    //ukuran resize
    $this->load->library('image_lib');

    $config2['image_library'] = 'gd2';
    $config2['source_image'] = './assets/images/siswa_berkas/' . $new_image;
    $config['new_image'] = './assets/images/siswa_berkas/' . $new_image;
    $config2['create_thumb'] = FALSE;
    $config2['maintain_ratio'] = TRUE;
    $config2['width'] = 800;


    $this->image_lib->clear();
    $this->image_lib->initialize($config2);
    $this->image_lib->resize();
    //ukuran resize
  }

  $data = [
    'nama' => $this->input->post('nama'),
    'gambar' => $new_image,
    'siswa' => $id
  ];
  $this->db->insert('ppdb_berkas', $data);
  //log activity
  //$data['table'] = $this->db->get_where('akad_kegiatanakademik', ['id' => $id])->row_array();
  $user = 'siswa';
  $item = $this->input->post('nama');
  activity_log($user, 'Tambah berkas', $item);
  //end log
  $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
  redirect('siswa/siswa_berkas_add');
} 
}
public function hapusberkas($id)
{
  //log activity
  $data['getberkas'] = $this->db->get_where('ppdb_berkas', ['id' => $id])->row_array();
  $old_image = $data['getberkas']['gambar'];
  if ($old_image != 'default.jpg') {
    unlink(FCPATH . './assets/images/siswa_berkas/' . $old_image);
  }
  $this->db->where('id', $id); 
  $this->db->delete('ppdb_berkas');
  $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
  redirect('siswa/siswa_berkas_add/');
}

public function siswa_rapor()
    {
        $data['title'] = 'Edit Profile';
        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
        $this->db->where('noformulir', $this->session->userdata('noformulir'));
        $data['user'] = $this->db->get()->row_array();
        $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' =>
        $this->session->userdata('siswa_id')])->row_array();
        $siswa_id = $this->session->userdata('siswa_id');
        $data['getrapor'] = $this->db->get_where('ppdb_rapor', ['siswa' =>
        $this->session->userdata('siswa_id')])->row_array();
            $this->load->view('themes/siswa/header', $data);
            $this->load->view('themes/siswa/sidebar', $data);
            $this->load->view('themes/siswa/topbar', $data);
            $this->load->view('siswa_rapor_add', $data);
            $this->load->view('themes/siswa/footer');
            $this->load->view('themes/siswa/footerajax');

    }
public function siswa_rapor_add()
    {
        $siswa_id = $this->input->post('user_id');
            $this->db->where('siswa', $siswa_id);
            $this->db->delete('ppdb_rapor');

          $data = [
            'siswa' => $this->input->post('user_id'),
            'mapel1' => $this->input->post('mapel1'),
            'mapel2' => $this->input->post('mapel2'),
            'mapel3' => $this->input->post('mapel3'),
            'mapel4' => $this->input->post('mapel4'),
            'mapel5' => $this->input->post('mapel5'),
            'mapel6' => $this->input->post('mapel6'),
            'mapel7' => $this->input->post('mapel7'),
            'mapel8' => $this->input->post('mapel8'),
            'mapel9' => $this->input->post('mapel9'),
            'mapel10' => $this->input->post('mapel10'),
            'mapel11' => $this->input->post('mapel11'),
            'mapel12' => $this->input->post('mapel12'),
            'mapel13' => $this->input->post('mapel13'),
            'mapel14' => $this->input->post('mapel14'),
            'mapel15' => $this->input->post('mapel15'),
            'mapel16' => $this->input->post('mapel16'),
            'mapel17' => $this->input->post('mapel17'),
            'mapel18' => $this->input->post('mapel18'),
            'mapel19' => $this->input->post('mapel19'),
            'mapel20' => $this->input->post('mapel20'),
        ];
        $this->db->insert('ppdb_rapor', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
            Data has been updated!</div>');
        redirect('siswa/siswa_rapor');
    }
    public function download()
    {
        $data['title'] = 'Download';

        $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
        $this->db->from('ppdb_siswa');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
        $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
        if ($this->session->userdata('nis')) {
            $this->db->where('nis', $this->session->userdata('nis'));
        }
        if ($this->session->userdata('noformulir')) {
            $this->db->where('noformulir', $this->session->userdata('noformulir'));
        }
        $data['user'] = $this->db->get()->row_array();
        $this->load->view('themes/siswa/header', $data);
        $this->load->view('themes/siswa/sidebar', $data);
        $this->load->view('themes/siswa/topbar', $data);
        $this->load->view('download', $data);
        $this->load->view('themes/siswa/footer');
        $this->load->view('themes/siswa/footerajax');
    }

    public function kartupeserta()
    {
      $data['title'] = 'Kartu Peserta';
      $this->db->select('`ppdb_siswa`.*,`m_tahunakademik`.nama as `namatahun`,`m_gelombang`.nama as `namagelombang`,`m_jalur`.nama as `namajalur`');
      $this->db->from('ppdb_siswa');
      $this->db->join('m_tahunakademik', 'm_tahunakademik.id = ppdb_siswa.tahun_ppdb', 'left');
      $this->db->join('m_gelombang', 'm_gelombang.id = ppdb_siswa.gelombang_id', 'left');
      $this->db->join('m_jalur', 'm_jalur.id = ppdb_siswa.jalur_id', 'left');
      if ($this->session->userdata('nis')) {
          $this->db->where('nis', $this->session->userdata('nis'));
      }
      if ($this->session->userdata('noformulir')) {
          $this->db->where('noformulir', $this->session->userdata('noformulir'));
      }
      $data['user'] = $this->db->get()->row_array();
      $data['option'] = $this->db->get_where('m_options', ['name' =>
      'kartu_peserta'])->row_array();
      $data['pengumuman'] = $data['option']['value'];
      $html = $this->load->view('kartupeserta', $data, true);
      // create pdf using dompdf
      $filename = 'kartupeserta' . date('dmY') . '_' . date('His');
      $paper = 'A4';
      $orientation = 'potrait';
      pdf_create($html, $filename, $paper, $orientation);
    }
//end
}
