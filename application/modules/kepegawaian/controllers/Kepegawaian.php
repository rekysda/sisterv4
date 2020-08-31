<?php

error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Kepegawaian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('cart');
	}

	public function pegawai()
	{
		$data['title'] = 'Pegawai';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['pegawairesult'] = $this->kepegawaian_model->pegawaiGetDataAll();

		$this->load->view('themes/backend/header', $data);
		$this->load->view('themes/backend/sidebar', $data);
		$this->load->view('themes/backend/topbar', $data);
		$this->load->view('pegawai', $data);
		$this->load->view('themes/backend/footer');
		$this->load->view('themes/backend/footerajax');
	}

	public function pegawai_add()
	{
		$data['title'] = 'Pegawai';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
		$data['m_agama'] = $this->db->get('m_agama')->result_array();
		$data['m_jenisptk'] = $this->db->get('m_jenisptk')->result_array();
		$data['m_statuspegawai'] = $this->db->get('m_statuspegawai')->result_array();
		$data['m_statuskeaktifan'] = $this->db->get('m_statuskeaktifan')->result_array();
		$data['m_statusnikah'] = $this->db->get('m_statusnikah')->result_array();
		$data['m_golongan'] = $this->db->get('m_golongan')->result_array();

		$this->form_validation->set_rules('aa', 'NIP', 'required|is_unique[m_pegawai.nip]', [
			'is_unique' => 'NIP has already registered'
		]);
		$this->form_validation->set_rules('ab', 'Password', 'required');
		$this->form_validation->set_rules('ac', 'Nama lengkap', 'required|alpha_numeric_spaces');

		if ($this->form_validation->run() == false) {
			$this->load->view('themes/backend/header', $data);
			$this->load->view('themes/backend/sidebar', $data);
			$this->load->view('themes/backend/topbar', $data);
			$this->load->view('pegawai_add', $data);
			$this->load->view('themes/backend/footer');
			$this->load->view('themes/backend/footerajax');
		} else {
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = '200';
				$config['upload_path'] = './assets/images/pegawai/';
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
				$config2['source_image'] = './assets/images/pegawai/' . $new_image;
				$config['new_image'] = './assets/images/pegawai/' . $new_image;
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

			$al = $this->input->post('al');
			$rtrw = explode('/', $al);
			$rt = $rtrw[0];
			$rw = $rtrw[1];
			$data = [
				'nip' => $this->input->post('aa'),
				'password' => $this->input->post('ab'),
				'nama_guru' => $this->input->post('ac'),
				'tempat_lahir' => $this->input->post('ad'),
				'tanggal_lahir' => $this->input->post('ae'),
				'id_jenis_kelamin' => $this->input->post('af'),
				'id_agama' => $this->input->post('ag'),
				'hp' => $this->input->post('ah'),
				'telepon' => $this->input->post('ai'),
				'email' => $this->input->post('aj'),
				'alamat_jalan' => $this->input->post('ak'),
				'rt' => $rt,
				'rw' => $rw,
				'nama_dusun' => $this->input->post('am'),
				'desa_kelurahan' => $this->input->post('an'),
				'kecamatan' => $this->input->post('ao'),
				'kode_pos' => $this->input->post('ap'),
				'nuptk' => $this->input->post('aq'),
				'pengawas_bidang_studi' => $this->input->post('ar'),
				'id_jenis_ptk' => $this->input->post('as'),
				'tugas_tambahan' => $this->input->post('at'),
				'id_status_kepegawaian' => $this->input->post('au'),
				'id_status_keaktifan' => $this->input->post('av'),
				'id_status_pernikahan' => $this->input->post('aw'),
				'nik' => $this->input->post('ba'),
				'sk_cpns' => $this->input->post('bb'),
				'tanggal_cpns' => $this->input->post('bc'),
				'sk_pengangkatan' => $this->input->post('bd'),
				'tmt_pengangkatan' => $this->input->post('be'),
				'lembaga_pengangkatan' => $this->input->post('bf'),
				'id_golongan' => $this->input->post('bg'),
				'sumber_gaji' => $this->input->post('bh'),
				'keahlian_laboratorium' => $this->input->post('bi'),
				'nama_ibu_kandung' => $this->input->post('bj'),
				'nama_suami_istri' => $this->input->post('bk'),
				'nip_suami_istri' => $this->input->post('bl'),
				'pekerjaan_suami_istri' => $this->input->post('bm'),
				'tmt_pns' => $this->input->post('bn'),
				'lisensi_kepsek' => $this->input->post('bo'),
				'jumlah_sekolah_binaan' => $this->input->post('bp'),
				'diklat_kepengawasan' => $this->input->post('bq'),
				'mampu_handle_kk' => $this->input->post('br'),
				'keahlian_breile' => $this->input->post('bs'),
				'keahlian_bahasa_isyarat' => $this->input->post('bt'),
				'kewarganegaraan' => $this->input->post('bu'),
				'niy_nigk' => $this->input->post('bv'),
				'npwp' => $this->input->post('bw'),
				'image' => $new_image,
			];
			$this->db->insert('m_pegawai', $data);
//log activity
//$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('ac');
activity_log($user,'Tambah Guru',$item);
//end log
			$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
			redirect('kepegawaian/pegawai');
		}
	}

	public function pegawai_edit($id)
	{
		$data['title'] = 'Pegawai';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['s'] = $this->db->get_where('m_pegawai', ['id' =>
		$id])->row_array();

		$data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
		$data['m_agama'] = $this->db->get('m_agama')->result_array();
		$data['m_jenisptk'] = $this->db->get('m_jenisptk')->result_array();
		$data['m_statuspegawai'] = $this->db->get('m_statuspegawai')->result_array();
		$data['m_statuskeaktifan'] = $this->db->get('m_statuskeaktifan')->result_array();
		$data['m_statusnikah'] = $this->db->get('m_statusnikah')->result_array();
		$data['m_golongan'] = $this->db->get('m_golongan')->result_array();

		$this->form_validation->set_rules('aa', 'NIP', 'required');
		$this->form_validation->set_rules('ac', 'Nama lengkap', 'required|alpha_numeric_spaces');

		if ($this->form_validation->run() == false) {
			$this->load->view('themes/backend/header', $data);
			$this->load->view('themes/backend/sidebar', $data);
			$this->load->view('themes/backend/topbar', $data);
			$this->load->view('pegawai_edit', $data);
			$this->load->view('themes/backend/footer');
			$this->load->view('themes/backend/footerajax');
		} else {
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = '100';
				$config['upload_path'] = './assets/images/pegawai/';
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $this->input->post('old_image');
					if ($old_image != 'default.jpg') {
						if (file_exists('assets/images/pegawai/' . $old_image)) {
							unlink(FCPATH . 'assets/images/pegawai/' . $old_image);
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
								$config2['source_image'] = './assets/images/pegawai/' . $new_image;
								$config['new_image'] = './assets/images/pegawai/' . $new_image;
								$config2['create_thumb'] = FALSE;
								$config2['maintain_ratio'] = TRUE;
								$config2['width'] = 200;
								$config2['height'] = 200;
				
								$this->image_lib->clear();
								$this->image_lib->initialize($config2);
								$this->image_lib->resize();
								//ukuran resize
			}
			$al = $this->input->post('al');
			$rtrw = explode('/', $al);
			$rt = $rtrw[0];
			$rw = $rtrw[1];
			$data = [
				'nip' => $this->input->post('aa'),
				'nama_guru' => $this->input->post('ac'),
				'tempat_lahir'       => $this->input->post('ad'),
				'tanggal_lahir' => $this->input->post('ae'),
				'id_jenis_kelamin'       => $this->input->post('af'),
				'id_agama'           => $this->input->post('ag'),
				'hp'         => $this->input->post('ah'),
				'telepon'       => $this->input->post('ai'),
				'email'        => $this->input->post('aj'),
				'alamat_jalan'      => $this->input->post('ak'),
				'rt' => $rt,
				'rw'          => $rw,
				'nama_dusun' => $this->input->post('am'),
				'desa_kelurahan' => $this->input->post('an'),
				'kecamatan' => $this->input->post('ao'),
				'kode_pos' => $this->input->post('ap'),
				'nuptk' => $this->input->post('aq'),
				'pengawas_bidang_studi' => $this->input->post('ar'),
				'id_jenis_ptk' => $this->input->post('as'),
				'tugas_tambahan' => $this->input->post('at'),
				'id_status_kepegawaian' => $this->input->post('au'),
				'id_status_keaktifan' => $this->input->post('av'),
				'id_status_pernikahan' => $this->input->post('aw'),
				'nik' => $this->input->post('ba'),
				'sk_cpns' => $this->input->post('bb'),
				'tanggal_cpns' => $this->input->post('bc'),
				'sk_pengangkatan' => $this->input->post('bd'),
				'tmt_pengangkatan' => $this->input->post('be'),
				'lembaga_pengangkatan' => $this->input->post('bf'),
				'id_golongan' => $this->input->post('bg'),
				'sumber_gaji' => $this->input->post('bh'),
				'keahlian_laboratorium' => $this->input->post('bi'),
				'nama_ibu_kandung' => $this->input->post('bj'),
				'nama_suami_istri' => $this->input->post('bk'),
				'nip_suami_istri' => $this->input->post('bl'),
				'pekerjaan_suami_istri' => $this->input->post('bm'),
				'tmt_pns' => $this->input->post('bn'),
				'lisensi_kepsek' => $this->input->post('bo'),
				'jumlah_sekolah_binaan' => $this->input->post('bp'),
				'diklat_kepengawasan' => $this->input->post('bq'),
				'mampu_handle_kk' => $this->input->post('br'),
				'keahlian_breile' => $this->input->post('bs'),
				'keahlian_bahasa_isyarat' => $this->input->post('bt'),
				'kewarganegaraan' => $this->input->post('bu'),
				'niy_nigk' => $this->input->post('bv'),
				'npwp' => $this->input->post('bw'),
			];
			$password=$this->input->post('ab');
			if($password<>''){
				$this->db->set('password', $password);
			}
			$this->db->where('id', $id);
			$this->db->update('m_pegawai', $data);
//log activity
//$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('ac');
activity_log($user,'Edit Guru',$item);
//end log
			$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
			redirect('kepegawaian/pegawai');
		}
	}

	public function hapuspegawai($id)
	{
//log activity
$data['table'] = $this->db->get_where('m_pegawai', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama_guru'];
activity_log($user,'Hapus Guru',$item);
//end log
		$data['getpegawai'] = $this->db->get_where('m_pegawai', ['id' => $id])->row_array();
		$old_image = $data['getpegawai']['image'];
		if ($old_image != 'default.jpg') {
			unlink(FCPATH . './assets/images/pegawai/' . $old_image);
		}
		$this->db->where('id', $id);
		$this->db->delete('m_pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
		redirect('kepegawaian/pegawai');
	}

	public function laporan_print()
	{
		$data['title'] = 'Laporan Pegawai';
		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['pegawairesult'] = $this->kepegawaian_model->pegawaiGetDataAll();
		$this->load->view('themes/backend/headerprint', $data);
		$this->load->view('laporan_print', $data);
	}

	public function laporan_excel()
	{
		$data['title'] = 'Laporan Pegawai';
		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['pegawairesult'] = $this->kepegawaian_model->pegawaiGetDataAll();
		$this->load->view('themes/backend/headerprint', $data);
		$this->load->view('laporan_excel', $data);
	}

	public function laporan_pdf()
	{
		$data['title'] = 'Laporan Pegawai';
		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['pegawairesult'] = $this->kepegawaian_model->pegawaiGetDataAll();
		$html = $this->load->view('laporan_pdf', $data, true);
		// create pdf using dompdf
		$filename = 'laporanpegawai_pdf' . date('dmY') . '_' . date('His');
		$paper = 'A4';
		$orientation = 'landscape';
		pdf_create($html, $filename, $paper, $orientation);
	}

	public function penggajian()
	{
		$data['title'] = 'Penggajian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['pegawairesult'] = $this->kepegawaian_model->pegawaiGetDataAll();

		$this->load->view('themes/backend/header', $data);
		$this->load->view('themes/backend/sidebar', $data);
		$this->load->view('themes/backend/topbar', $data);
		$this->load->view('penggajian', $data);
		$this->load->view('themes/backend/footer');
		$this->load->view('themes/backend/footerajax');
	}

	public function penggajian_add($id)
	{
		$data['title'] = 'Penggajian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('kepegawaian_model', 'kepegawaian_model');

		$data['s'] = $this->kepegawaian_model->pegawaiGetDatabyId($id);

		$this->form_validation->set_rules('bulan', 'bulan', 'required');
		$this->form_validation->set_rules('tahun', 'tahun', 'required');
		$this->form_validation->set_rules('tanggalcetak', 'tanggalcetak', 'required');
		$this->form_validation->set_rules('aa', 'Gaji Pokok', 'required|numeric');
		$this->form_validation->set_rules('ab', 'Gelar', 'required|numeric');
		$this->form_validation->set_rules('ac', 'Sertifikasi', 'required|numeric');
		$this->form_validation->set_rules('ad', 'Masa Kerja', 'required|numeric');
		$this->form_validation->set_rules('ae', 'Gaji Per Jam', 'required|numeric');
		$this->form_validation->set_rules('af', 'Jam Ngajar', 'required|numeric');
		$this->form_validation->set_rules('ag', 'Gaji Ngajar', 'required|numeric');
		$this->form_validation->set_rules('ah', 'Transport', 'required|numeric');
		$this->form_validation->set_rules('ai', 'Laboratorium', 'required|numeric');
		$this->form_validation->set_rules('aj', 'WaliKelas', 'required|numeric');
		$this->form_validation->set_rules('ba', 'Sosial', 'required|numeric');
		$this->form_validation->set_rules('bb', 'BPJS', 'required|numeric');
		$this->form_validation->set_rules('ca', 'Gaji Di Terima', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('themes/backend/header', $data);
			$this->load->view('themes/backend/sidebar', $data);
			$this->load->view('themes/backend/topbar', $data);
			$this->load->view('penggajian_add', $data);
			$this->load->view('themes/backend/footer');
			$this->load->view('themes/backend/footerajax');
		} else {

			$data = [
				'id_pegawai' => $this->input->post('id_pegawai'),
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun'),
				'tanggalcetak' => $this->input->post('tanggalcetak'),
				'gajipokok' => $this->input->post('aa'),
				'gelar' => $this->input->post('ab'),
				'sertifikasi' => $this->input->post('ac'),
				'masakerja' => $this->input->post('ad'),
				'gajiperjam' => $this->input->post('ae'),
				'jamngajar' => $this->input->post('af'),
				'gajingajar' => $this->input->post('ag'),
				'transport' => $this->input->post('ah'),
				'laboratorium' => $this->input->post('ai'),
				'walikelas' => $this->input->post('aj'),
				'sosial' => $this->input->post('ba'),
				'bpjs' => $this->input->post('bb'),
				'gajiditerima' => $this->input->post('ca'),
			];
			$this->db->insert('hrd_penggajian', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
			redirect('kepegawaian/penggajian_add/' . $id);
		}
	}

	public function penggajian_list($id)
	{
		$data['title'] = 'Penggajian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('kepegawaian_model', 'kepegawaian_model');

		$data['s'] = $this->kepegawaian_model->pegawaiGetDatabyId($id);
		$data['getgaji'] = $this->kepegawaian_model->pegawaiGetGajibyId($id);

		$this->load->view('themes/backend/header', $data);
		$this->load->view('themes/backend/sidebar', $data);
		$this->load->view('themes/backend/topbar', $data);
		$this->load->view('penggajian_list', $data);
		$this->load->view('themes/backend/footer');
		$this->load->view('themes/backend/footerajax');
	}

	public function penggajian_hapus($id, $id_pegawai)
	{
//log activity
$data['table'] = $this->db->get_where('hrd_penggajian', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item="#ID Pegawai : $id_pegawai ";
activity_log($user,'Hapus Guru',$item);
//end log
		$this->db->where('id', $id);
		$this->db->delete('hrd_penggajian');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
		redirect('kepegawaian/penggajian_list/' . $id_pegawai);
	}

	public function cetak_slipgaji($id, $id_pegawai)
	{
		$this->load->model('kepegawaian_model', 'kepegawaian_model');

		$data['s'] = $this->kepegawaian_model->pegawaiGetDatabyId($id_pegawai);
		$data['getslipgaji'] = $this->kepegawaian_model->pegawaiSlipGajibyId($id);
		$data['logoslip'] = $this->db->get_where('m_logoslip', ['id' =>
		'1'])->row_array();
		$this->load->view('cetak_slipgaji', $data);
	}

	public function laporan_penggajian()
	{
		$data['title'] = 'Laporan Penggajian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$this->form_validation->set_rules('tahun', 'tahun', 'required|numeric');
		$this->form_validation->set_rules('bulan', 'bulan', 'required|numeric');
		$data['bulan'] = date('m');
		$data['tahun'] = date('Y');
		$bulan = date('m');
		$tahun = date('Y');
		$data['getgajiall'] = $this->kepegawaian_model->getDataGajiAll($tahun, $bulan);

		if ($this->form_validation->run() == false) {
			$this->load->view('themes/backend/header', $data);
			$this->load->view('themes/backend/sidebar', $data);
			$this->load->view('themes/backend/topbar', $data);
			$this->load->view('laporan_penggajian', $data);
			$this->load->view('themes/backend/footer');
			$this->load->view('themes/backend/footerajax');
		} else {
			$data['bulan'] = $this->input->post('bulan');
			$data['tahun'] = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$data['getgajiall'] = $this->kepegawaian_model->getDataGajiAll($tahun, $bulan);
			$this->load->view('themes/backend/header', $data);
			$this->load->view('themes/backend/sidebar', $data);
			$this->load->view('themes/backend/topbar', $data);
			$this->load->view('laporan_penggajian', $data);
			$this->load->view('themes/backend/footer');
			$this->load->view('themes/backend/footerajax');
		}
	}

	public function laporangaji_print($tahun, $bulan)
	{
		$data['title'] = 'Laporan Penggajian';
		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['getgajiall'] = $this->kepegawaian_model->getDataGajiAll($tahun, $bulan);
		$data['total'] = '0';
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$this->load->view('themes/backend/headerprint', $data);
		$this->load->view('laporangaji_print', $data);
	}

	public function laporangaji_excel($tahun, $bulan)
	{
		$data['title'] = 'Laporan Penggajian';
		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['getgajiall'] = $this->kepegawaian_model->getDataGajiAll($tahun, $bulan);
		$data['total'] = '0';
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$this->load->view('themes/backend/headerprint', $data);
		$this->load->view('laporangaji_excel', $data);
	}

	public function laporangaji_pdf($tahun, $bulan)
	{
		$data['title'] = 'Laporan Penggajian';
		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['getgajiall'] = $this->kepegawaian_model->getDataGajiAll($tahun, $bulan);
		$data['total'] = '0';
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$html = $this->load->view('laporangaji_pdf', $data, true);
		// create pdf using dompdf
		$filename = 'laporangaji_pdf' . $tahun . '_' . $bulan;
		$paper = 'A4';
		$orientation = 'landscape';
		pdf_create($html, $filename, $paper, $orientation);
	}
	//print pegawai detail
	public function print_pegawai_detail($id)
	{
		$data['title'] = 'Cetak Pegawai Detail';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('kepegawaian_model', 'kepegawaian_model');
		$data['s'] = $this->kepegawaian_model->pegawaiGetDatabyId($id);

		$this->load->view('themes/backend/headerraport', $data);
		$this->load->view('print_pegawai_detail', $data);
		$this->load->view('themes/backend/footer_print', $data);
			

	}
	public function ultah_pegawai()
    {
        $data['title'] = 'Ultah Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('kepegawaian_model', 'kepegawaian_model');
		$this->form_validation->set_rules('bulan', 'bulan', 'required');
		$data['bulan']='';
		$data['sno']='';
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('ultah_pegawai', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $bulan = $this->input->post('bulan');
            $data['bulan'] = $bulan;
            $this->load->model('kepegawaian_model', 'kepegawaian_model');
            $data['list_pegawai'] = $this->kepegawaian_model->pegawaiGetDataAll();
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('ultah_pegawai', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }

    public function ultah_pegawai_print($bulan)
	{
		$data['title'] = 'Ultah Pegawai';
            $data['bulan'] = $bulan;
            $this->load->model('kepegawaian_model', 'kepegawaian_model');
            $data['list_pegawai'] = $this->kepegawaian_model->pegawaiGetDataAll();
			$data['sno']='';
		$this->load->view('themes/backend/headerprint', $data);
		$this->load->view('ultah_pegawai_print', $data);
	}
	//end
}
