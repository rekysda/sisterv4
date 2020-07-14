<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authguru extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('nip')) {
			redirect('guru');
		}
		$this->form_validation->set_rules('nip', 'nip', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pegawai Login';
			$data['body_class'] = 'login-page';
			$this->load->view('themes/guru/auth/header', $data);
			$this->load->view('login', $data);
			$this->load->view('themes/guru/auth/footer');
		} else {
			//validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');
		$user = $this->db->get_where('m_pegawai', ['nip' => $nip])->row_array();
		if ($user) {
				//cek password
				if ($password==$user['password']) {
					$datapegawai = $this->db->get_where('m_pegawai', ['nip' => $nip])->row_array();
					if($datapegawai){
						$data = [
							'nip' => $datapegawai['nip'],
							'role_id' => '5',
							'guru_id'=> $datapegawai['id']
						];
						$this->session->set_userdata($data);
					redirect('guru');
				}}else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Wrong password!</div>');
					redirect('loginguru');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Wrong Username and password!</div>');
					redirect('loginguru');
				}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('guru_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
		You have been logout!</div>');
		redirect('loginguru');
	}

	public function blocked()
	{
		$data['title'] = '404';
		$data['body_class'] = 'register-page';

		$this->load->view('themes/guru/auth/header', $data);
		$this->load->view('blocked', $data);
		$this->load->view('themes/guru/auth/footer');
	}


	//end class
}
