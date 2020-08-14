<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authppdb extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('noformulir')) {
			redirect('siswa');
		}
		$this->form_validation->set_rules('noformulir', 'noformulir', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'PPDB Login';
			$data['body_class'] = 'login-page';
			$this->load->view('themes/siswa/auth/header', $data);
			$this->load->view('login', $data);
			$this->load->view('themes/siswa/auth/footer');
		} else {
			//validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$noformulir = $this->input->post('noformulir');
		$password = $this->input->post('password');
		$user = $this->db->get_where('ppdb_formulir', ['noformulir' => $noformulir])->row_array();
		$tahunppdbdefault = $this->db->get_where('m_options', ['id' => '1'])->row_array();
		if ($user) {
			//usernya ada
			if ($user['tahun_ppdb'] == $tahunppdbdefault['value']) {
				//cek password
				if ($password==$user['password']) {
					$datasiswa = $this->db->get_where('ppdb_siswa', ['noformulir' => $noformulir])->row_array();
					if($datasiswa){
						$data = [
							'noformulir' => $datasiswa['noformulir'],
							'role_id' => '3',
							'siswa_id'=> $datasiswa['id']
						];
						$this->db->set('status', 'terpakai');
						$this->db->where('noformulir', $noformulir);
						$this->db->update('ppdb_formulir');
						$this->session->set_userdata($data);
					redirect('loginppdb');
				}else{
					$gelombangppdbdefault = $this->db->get_where('m_options', ['id' => '4'])->row_array();
					$data = [
						'sekolah_id' => '1',
						'noformulir' => $noformulir,
						'tahun_ppdb' => $user['tahun_ppdb'],
						'gelombang_id' => $gelombangppdbdefault['value'],
						'ppdb_status' => 'calon',
					];
					$this->db->insert('ppdb_siswa', $data);
					$datasiswa = $this->db->get_where('ppdb_siswa', ['noformulir' => $noformulir])->row_array();
					$data = [
						'noformulir' => $datasiswa['noformulir'],
						'role_id' => '3',
						'siswa_id'=> $datasiswa['id']
					];
					$this->db->set('status', 'terpakai');
						$this->db->where('noformulir', $noformulir);
						$this->db->update('ppdb_formulir');
					$this->session->set_userdata($data);
					redirect('loginppdb');
					}
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Wrong password!</div>');
					redirect('loginppdb');
				}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Tahun PPDB tidak Aktif!</div>');
			redirect('loginppdb');
		}
	}else{
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Kode yang anda Masukkan salah !</div>');
		redirect('loginppdb');

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
		redirect('loginppdb');
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
