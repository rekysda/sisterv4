<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['infosekolah'] = $this->db->get_where('m_sekolah', ['id' => '1'])->row_array();
		$data['title'] = '' . $data['infosekolah']['sekolah'];

		$this->load->view('themes/frontend/head', $data);
		$this->load->view('themes/frontend/header');
		$this->load->view('home', $data);
		$this->load->view('themes/frontend/footer', $data);
	}
}
