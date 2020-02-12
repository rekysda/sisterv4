<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pages'] = $this->db->get('pages')->result_array();
        $this->load->model('dashboard_model', 'dashboard_model');  
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $tahun=$data['tahun_default']['value'];
        $data['tahun_ppdb_default'] = $this->db->get_where('m_options', ['name' => 'tahun_ppdb_default'])->row_array();
        $tahun_ppdb_default=$data['tahun_ppdb_default']['value'];
        $data['list_siswa'] = $this->dashboard_model->siswagetDataAll($tahun);
        $data['list_pegawai'] = $this->dashboard_model->pegawaiGetDataAll();
        $data['bulansekarang']=date('m');
        $data['bulansekarangshort']=date('n');
        $data['row']='0';
        if ($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Data user gagal di dapatkan';
		}
        $data['agent']=$agent;
        $data['sistemoperasi']=$this->agent->platform();
        $data['alamatip']=$this->input->ip_address();
        $query = $this->db->query("select * from m_pegawai");
        $jumlah = $query->num_rows();
        $data['jumlahpegawai']=$jumlah;
        $query = $this->db->query("select * from ppdb_siswa where ppdb_status='aktif'");
        $jumlah = $query->num_rows();
        $data['jumlahsiswa']=$jumlah;
        $query = $this->db->query("select * from sar_inventaris");
        $jumlah = $query->num_rows();
        $data['jumlahinventaris']=$jumlah;
        $query = $this->db->query("select * from ppdb_siswa where ppdb_status='calon'");
        $jumlahppdb = $query->num_rows();
        $data['jumlahppdb']=$jumlahppdb;

/*
      $dataaccount = $this->db->get('account')->result_array();
      $data['dataaccount'] = json_encode($dataaccount);
      $query = $this->db->query("select year,profit from account group by year");
      $datadataaccount2 = $query->result_array();
      $data['dataaccount2'] = json_encode($datadataaccount2);
 */
      $query = $this->db->query("SELECT tahun_ppdb, count(IF(kelaminsiswa = 'laki-laki', 1, NULL))'laki-laki', count(IF(kelaminsiswa = 'perempuan', 1, NULL))'perempuan', count(IF(ppdb_status = 'calon', 1, NULL))'calon', count(IF(ppdb_status = 'aktif', 1, NULL))'aktif' FROM `ppdb_siswa` group BY `tahun_ppdb`");
      $dataaccount = $query->result_array();
      $data['dataaccount'] = json_encode($dataaccount);

      $query = $this->db->query("SELECT count(IF(id_jenis_kelamin = '1', 1, NULL))'laki-laki', count(IF(id_jenis_kelamin = '2', 1, NULL))'perempuan' FROM `m_pegawai`");
      $pegawaikelamin = $query->result_array();
      $data['pegawaikelamin'] = json_encode($pegawaikelamin);

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('themes/backend/footer');
    }
}
