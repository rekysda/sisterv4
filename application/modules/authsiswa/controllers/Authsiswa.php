<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authsiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('nis')) {
			redirect('siswa');
		}
		$this->form_validation->set_rules('nis', 'nis', 'trim|required');
		$this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Siswa Login';
			$data['body_class'] = 'login-page';
			$this->load->view('themes/siswa/auth/header', $data);
			$this->load->view('login', $data);
			$this->load->view('themes/siswa/auth/footer');
			$this->load->view('themes/siswa/footerajax');
		} else {
			//validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$nis = $this->input->post('nis');
		$tanggallahirsiswa = $this->input->post('tanggallahirsiswa');
		$user = $this->db->get_where('ppdb_siswa', ['nis' => $nis])->row_array();
		if ($user) {
			//usernya ada
			//cek status			
			if($user['ppdb_status']=='ditolak'){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Status Failed!</div>');
				redirect('loginsiswa');
			}else{
				//cek password
				if ($tanggallahirsiswa==$user['tanggallahirsiswa']) {
					$datasiswa = $this->db->get_where('ppdb_siswa', ['nis' => $nis])->row_array();
						$data = [
							'nis' => $datasiswa['nis'],
							'role_id' => '4',
							'siswa_id'=> $datasiswa['id'],
						];
						$this->session->set_userdata($data);
					redirect('loginsiswa');	
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Wrong password!</div>');
					redirect('loginsiswa');
						}
				}
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Wrong NIS!</div>');
			redirect('loginsiswa');

		}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('noformulir');
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('tahun_ppdb');
		$this->session->unset_userdata('siswa_id');
		$this->session->unset_userdata('gelombang_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
		You have been logout!</div>');
		redirect('loginsiswa');
	}

	public function blocked()
	{
		$data['title'] = '404';
		$data['body_class'] = 'register-page';

		$this->load->view('themes/siswa/auth/header', $data);
		$this->load->view('blocked', $data);
		$this->load->view('themes/siswa/auth/footer');
	}


	//end class
}
