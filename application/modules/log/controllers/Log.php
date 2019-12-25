<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function aktifitas()
    {
        $data['title'] = 'Aktifitas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('log_model', 'log_model');
        $data['logresult'] = $this->log_model->log_list();
    
        $daritanggal = date('Y-m-01');
        $sampaitanggal = date('Y-m-d');
    
        if (isset($_POST['submit'])) {
          $daritanggal = $this->input->post('daritanggal');
          $sampaitanggal = $this->input->post('sampaitanggal');
          $data['logresult'] = $this->log_model->log_darisampai($daritanggal, $sampaitanggal);
        }
        $data['daritanggal'] = $daritanggal;
        $data['sampaitanggal'] = $sampaitanggal;
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }
    public function laporan_log_print($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan Log Aktifitas';
    $this->load->model('log_model', 'log_model');
    $data['logresult'] = $this->log_model->log_darisampai($daritanggal, $sampaitanggal);
    $this->load->view('themes/backend/headerprint', $data);
    $this->load->view('laporan_log_print', $data);
  }
//end
}
