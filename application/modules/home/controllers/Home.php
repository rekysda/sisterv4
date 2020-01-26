<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['infosekolah'] = '';
		$data['title'] = 'SISTER';

		$this->load->view('themes/frontend/head', $data);
		$this->load->view('themes/frontend/header');
		$this->load->view('home', $data);
		$this->load->view('themes/frontend/footer', $data);
	}
	public function forbidden()
	{
		$data['infosekolah'] = '';
		$data['title'] = 'SISTER UNDERMAINTENANCE';

		$this->load->view('themes/frontend/head2', $data);
		$this->load->view('themes/frontend/header');
		$this->load->view('forbidden', $data);
		$this->load->view('themes/frontend/footer', $data);
	}
}
