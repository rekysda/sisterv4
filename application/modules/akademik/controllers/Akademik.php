<?php

error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Akademik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function sekolah()
    {
        $data['title'] = 'Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->result_array();
        $this->form_validation->set_rules('sekolah', 'sekolah', 'required|is_unique[m_sekolah.sekolah]', [
            'is_unique' => 'has already registered'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat','required');
        $this->form_validation->set_rules('telepon', 'telepon','required');
        $this->form_validation->set_rules('kota', 'kota','required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('sekolah', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'sekolah' => $this->input->post('sekolah'),
                'npsn' => $this->input->post('npsn'),
                'nss' => $this->input->post('nss'),
                'alamat' => $this->input->post('alamat'),
                'kodepos' => $this->input->post('kodepos'),
                'telepon' => $this->input->post('telepon'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'website' => $this->input->post('website'),
                'email' => $this->input->post('email'),

            ];
            $this->db->insert('m_sekolah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/sekolah');
        }
    }
    public function editsekolah($id)
    {
        $data['title'] = 'Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['infosekolah'] = $this->db->get_where('m_sekolah', ['id' =>
        $id])->row_array();

        $this->form_validation->set_rules('sekolah', 'sekolah', 'required');
        $this->form_validation->set_rules('alamat', 'alamat','required');
        $this->form_validation->set_rules('telepon', 'telepon','required');
        $this->form_validation->set_rules('kota', 'kota','required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editsekolah', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'sekolah' => $this->input->post('sekolah'),
                'npsn' => $this->input->post('npsn'),
                'nss' => $this->input->post('nss'),
                'alamat' => $this->input->post('alamat'),
                'kodepos' => $this->input->post('kodepos'),
                'telepon' => $this->input->post('telepon'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'website' => $this->input->post('website'),
                'email' => $this->input->post('email'),

            ];
            $this->db->where('id', $id);
            $this->db->update('m_sekolah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/sekolah');
        }
    }
    public function hapussekolah($id)
    {
        //log act
$data['table'] = $this->db->get_where('m_sekolah', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['sekolah'];
activity_log($user,'Hapus Sekolah',$item);
//end log
        $this->db->where('id', $id);
        $this->db->delete('m_sekolah');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/sekolah');
    }
    // TAHUN AJARAN
    public function tahunakademik()
    {
        $data['title'] = 'Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->order_by('tahun', 'desc');
        $this->db->order_by('semester', 'asc');
        $data['tahunakademik'] = $this->db->get('m_tahunakademik')->result_array();
        $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[m_tahunakademik.nama]', [
            'is_unique' => 'has already registered'
        ]);
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('tahunakademik', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'tahun' => $this->input->post('tahun'),
                'semester' => $this->input->post('semester')
            ];
            $this->db->insert('m_tahunakademik', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Tambah TahunAkademik',$item);
//end log  
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/tahunakademik');
        }
    }

    public function edittahun($id)
    {
        $data['title'] = 'Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['gettahun'] = $this->db->get_where('m_tahunakademik', ['id' =>
        $id])->row_array();
        $data['tahunakademik'] = $this->db->get('m_tahunakademik')->result_array();
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('edittahun', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'tahun' => $this->input->post('tahun'),
                'semester' => $this->input->post('semester')
            ];
            $this->db->where('id', $id);
            $this->db->update('m_tahunakademik', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Edit TahunAkademik',$item);
//end log  
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role"alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Data Saved !
                </div>'
            );
            redirect('akademik/tahunakademik');
        }
    }

    public function hapustahun($id)
    {
        //log act
$data['table'] = $this->db->get_where('m_tahunakademik', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama'];
activity_log($user,'Hapus TahunAkademik',$item);
//end log
        $this->db->where('id', $id);
        $this->db->delete('m_tahunakademik');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/tahunakademik');
    }

    // GELOMBANG
    public function gelombang()
    {
        $data['title'] = 'Gelombang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['gelombang'] = $this->db->get('m_gelombang')->result_array();
        $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[m_gelombang.nama]', [
            'is_unique' => 'has already registered'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('gelombang', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama' => $this->input->post('nama')
            ];
            $this->db->insert('m_gelombang', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Tambah Gelombang',$item);
//end log  
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/gelombang');
        }
    }

    public function editgelombang($id)
    {
        $data['title'] = 'Gelombang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['getgelombang'] = $this->db->get_where('m_gelombang', ['id' =>
        $id])->row_array();
        $data['gelombang'] = $this->db->get('m_gelombang')->result_array();
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editgelombang', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama' => $this->input->post('nama')
            ];
            $this->db->where('id', $id);
            $this->db->update('m_gelombang', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Edit Gelombang',$item);
//end log  
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role"alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Data Saved !
                </div>'
            );
            redirect('akademik/gelombang');
        }
    }

    public function hapusgelombang($id)
    {
//log act
$data['table'] = $this->db->get_where('m_gelombang', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama'];
activity_log($user,'Hapus Gelombang',$item);
//end log  
        $this->db->where('id', $id);
        $this->db->delete('m_gelombang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/gelombang');
    }

    // JALUR
    public function jalur()
    {
        $data['title'] = 'Jalur';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jalur'] = $this->db->get('m_jalur')->result_array();
        $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[m_jalur.nama]', [
            'is_unique' => 'has already registered'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('jalur', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama' => $this->input->post('nama')
            ];
            $this->db->insert('m_jalur', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Tambah Jalur',$item);
//end log 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/jalur');
        }
    }

    public function editjalur($id)
    {
        $data['title'] = 'Jalur';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['getjalur'] = $this->db->get_where('m_jalur', ['id' =>
        $id])->row_array();
        $data['jalur'] = $this->db->get('m_jalur')->result_array();
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editjalur', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama' => $this->input->post('nama')
            ];
            $this->db->where('id', $id);
            $this->db->update('m_jalur', $data);
//log act
//$data['table'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Edit jalur',$item);
//end log 
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role"alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Data Saved !
                </div>'
            );
            redirect('akademik/jalur');
        }
    }

    public function hapusjalur($id)
    {
//log act
$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama'];
activity_log($user,'Hapus Jalur',$item);
//end log 
        $this->db->where('id', $id);
        $this->db->delete('m_jalur');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/jalur');
    }

    // GELOMBANG JALUR
    public function gelombangjalur()
    {
        $data['title'] = 'Gelombang Jalur';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahunppdbdefault'] = $this->db->get_where('m_options', ['id' => '1'])->row_array();

        $this->db->select('*');
        $this->db->like('nama', 'Ganjil');
        $this->db->from('m_tahunakademik');
        $data['tahun'] = $this->db->get()->result_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->result_array();
        $data['gelombang'] = $this->db->get('m_gelombang')->result_array();
        $data['jalur'] = $this->db->get('m_jalur')->result_array();
        $this->db->select('`m_gelombang_jalur`.*,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`,`m_sekolah`.sekolah');
        $this->db->from('m_gelombang_jalur');
        $this->db->join('m_gelombang', 'm_gelombang.id = m_gelombang_jalur.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = m_gelombang_jalur.jalur_id', 'left');
        $this->db->join('m_sekolah', 'm_sekolah.id = m_gelombang_jalur.sekolah_id', 'left');
        $this->db->order_by('sekolah_id', 'asc');
        $this->db->order_by('tahun_id', 'desc');
        $data['gelombangjalur'] = $this->db->get()->result_array();

        $this->form_validation->set_rules('tahun_id', 'Tahun Akademik', 'required');
        $this->form_validation->set_rules('sekolah_id', 'Sekolah', 'required');
        $this->form_validation->set_rules('gelombang_id', 'Gelombang', 'required');
        $this->form_validation->set_rules('jalur_id', 'Jalur', 'required|callback_check_jalur', array('check_jalur' => 'terdapat Tahun - Gelombang - Jalur yang sama.'));

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('gelombangjalur', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'tahun_id' => $this->input->post('tahun_id'),
                'sekolah_id' => $this->input->post('sekolah_id'),
                'gelombang_id' => $this->input->post('gelombang_id'),
                'jalur_id' => $this->input->post('jalur_id')
            ];
            $this->db->insert('m_gelombang_jalur', $data);
    //log act
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Tambah Gelombang Jalur',$item);
//end log 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/gelombangjalur');
        }
    }

    function check_jalur()
    {
        $tahun_id = $this->input->post('tahun_id');
        $sekolah_id = $this->input->post('sekolah_id');
        $gelombang_id = $this->input->post('gelombang_id');
        $jalur_id = $this->input->post('jalur_id');
        $this->db->select('jalur_id');
        $this->db->from('m_gelombang_jalur');
        $this->db->where('tahun_id', $tahun_id);
        $this->db->where('sekolah_id', $sekolah_id);
        $this->db->where('gelombang_id', $gelombang_id);
        $this->db->where('jalur_id', $jalur_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function editgelombangjalur($id)
    {
        $data['title'] = 'Gelombang Jalur';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        //    $data['tahun'] = $this->db->get('m_tahunakademik')->result_array();
        $data['getgelombangjalur'] = $this->db->get_where('m_gelombang_jalur', ['id' =>
        $id])->row_array();

        $this->db->select('*');
        $this->db->like('nama', 'Ganjil');
        $this->db->from('m_tahunakademik');
        $data['tahun'] = $this->db->get()->result_array();
        $data['gelombang'] = $this->db->get('m_gelombang')->result_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->result_array();
        $data['jalur'] = $this->db->get('m_jalur')->result_array();

        $this->db->select('`m_gelombang_jalur`.*,`m_gelombang`.nama as `gelombang`,`m_jalur`.nama as `jalur`');
        $this->db->from('m_gelombang_jalur');
        $this->db->join('m_gelombang', 'm_gelombang.id = m_gelombang_jalur.gelombang_id', 'left');
        $this->db->join('m_jalur', 'm_jalur.id = m_gelombang_jalur.jalur_id', 'left');
        $this->db->order_by('gelombang_id', 'asc');
        $this->db->order_by('tahun_id', 'desc');
        $data['gelombangjalur'] = $this->db->get()->result_array();

        $this->form_validation->set_rules('tahun_id', 'Tahun Akademik', 'required');
        $this->form_validation->set_rules('gelombang_id', 'Gelombang', 'required');
        $this->form_validation->set_rules('jalur_id', 'Jalur', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editgelombangjalur', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'tahun_id' => $this->input->post('tahun_id'),
                'sekolah_id' => $this->input->post('sekolah_id'),
                'gelombang_id' => $this->input->post('gelombang_id'),
                'jalur_id' => $this->input->post('jalur_id')
            ];
            $this->db->where('id', $id);
            $this->db->update('m_gelombang_jalur', $data);
    //log act
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item='';
activity_log($user,'Edit Gelombang Jalur',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/gelombangjalur');
        }
    }

    public function hapusgelombangjalur($id)
    {
    //log act
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item="#ID : $id";
activity_log($user,'Hapus Gelombang Jalur',$item);
//end log
        $this->db->where('id', $id);
        $this->db->delete('m_gelombang_jalur');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Deleted !</div>');
        redirect('akademik/gelombangjalur');
    }

    // BIAYA
    public function biaya()
    {
        $data['title'] = 'Biaya';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parent'] = $this->db->get('m_biaya_categories')->result_array();

        $query = "SELECT `m_biaya`.*,`m_biaya_categories`.`nama`as category
        FROM `m_biaya` LEFT JOIN `m_biaya_categories`
        ON `m_biaya`.`category_id`=`m_biaya_categories`.`id`
        order by `m_biaya`.`nama` asc
        ";
        $data['biaya'] = $this->db->query($query)->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[m_biaya.nama]', [
            'is_unique' => 'has already registered'
        ]);
        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('biaya', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'category_id' => $this->input->post('category_id'),
                'nama' => $this->input->post('nama'),
                'is_publish' => '1'
            ];
            $this->db->insert('m_biaya', $data);
//log activity
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Tambah Biaya',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/biaya');
        }
    }

    public function editBiaya($id)
    {
        $data['title'] = 'Biaya';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parent'] = $this->db->get('m_biaya_categories')->result_array();
        $data['getbiaya'] = $this->db->get_where('m_biaya', ['id' =>
        $id])->row_array();

        $query = "SELECT `m_biaya`.*,`m_biaya_categories`.`nama`as category
        FROM `m_biaya` LEFT JOIN `m_biaya_categories`
        ON `m_biaya`.`category_id`=`m_biaya_categories`.`id`";
        $data['biaya'] = $this->db->query($query)->result_array();

        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editbiaya', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'category_id' => $this->input->post('category_id'),
                'nama' => $this->input->post('nama'),
                'is_publish' => '1'
            ];
            $this->db->where('id', $id);
            $this->db->update('m_biaya', $data);
//log activity
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama');
activity_log($user,'Edit Biaya',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/biaya');
        }
    }

    public function hapusBiaya($id)
    {
        $query = ('SELECT count(*) as jumlah FROM siswa_keuangan where biaya_id = ' . $id . '');
        $data['databiaya'] = $this->db->query($query)->row_array();
        $jumlah = $data['databiaya']['jumlah'];
        if ($jumlah > '0') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Data error, Student has ' . $jumlah . ' Transaction with this ID' . $id . '!</div>');
        } else {
//log activity
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item="#ID : $id";
activity_log($user,'Hapus Biaya',$item);
//end log
            $this->db->where('id', $id);
            $this->db->delete('m_biaya');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Deleted !</div>');
        }
        redirect('akademik/biaya');
    }

    //Setting
    public function setting()
    {
        $data['title'] = 'Setting';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahunakademik'] = $this->db->get('m_tahunakademik')->result_array();
        $data['gelombangppdb'] = $this->db->get('m_gelombang')->result_array();
        $data['tahun_ppdb_default'] = $this->db->get_where('m_options', ['name' =>
        'tahun_ppdb_default'])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' =>
        'tahun_akademik_default'])->row_array();
        $data['is_ppdb_online'] = $this->db->get_where('m_options', ['name' =>
        'is_ppdb_online'])->row_array();
        $data['gelombang_ppdb_default'] = $this->db->get_where('m_options', ['name' =>
        'gelombang_ppdb_default'])->row_array();
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' =>
        'tahun_default'])->row_array();
        $data['kartu_peserta'] = $this->db->get_where('m_options', ['name' =>
        'kartu_peserta'])->row_array();
        $this->form_validation->set_rules('tahun_akademik_default', 'tahun_akademik_default', 'required');
        $this->form_validation->set_rules('tahun_default', 'tahun_default', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('setting', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = array(
                array(
                    'name' => 'tahun_akademik_default',
                    'value' => $this->input->post('tahun_akademik_default')
                ),
                array(
                    'name' => 'tahun_default',
                    'value' => $this->input->post('tahun_default')
                )
            );

            $this->db->update_batch('m_options', $data, 'name');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role"alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Data Saved !
                </div>'
            );
            redirect('akademik/setting');
        }
    }

    // TAHUN AJARAN
    public function logoslip()
    {
        $data['title'] = 'Logo Slip';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['getlogoslip'] = $this->db->get_where('m_logoslip', ['id' =>
        '1'])->row_array();

        $this->form_validation->set_rules('id', 'id', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('logoslip', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $id = $this->input->post('id');
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg';
                $config['upload_path'] = './assets/images/logoslip/';
                $config['file_name'] = round(microtime(true) * 1000);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['getlogoslip']['image'];
                    if ($old_image != 'default.jpg') {
                        if (file_exists('assets/images/logoslip/' . $old_image)) {
                            unlink(FCPATH . 'assets/images/logoslip/' . $old_image);
                        }
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('id', $id);
                    $this->db->update('m_logoslip');
                } else {
                    echo  $this->upload->display_errors();
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/logoslip');
        }
    }
    // KELAS
    public function kelas()
    {
        $data['title'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $this->load->model('akademik_model', 'akademik_model');
        $data['getkelasAll'] = $this->akademik_model->getkelasAll();
        $data['getpegawai'] = $this->db->get_where('m_pegawai', ['id_status_keaktifan' =>
        '1'])->result_array();
        $data['getjurusanAll'] = $this->akademik_model->getjurusanAll();

        $this->form_validation->set_rules('tahun', 'Tahun Angkatan', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|callback_cek_tahunkelas', array('cek_tahunkelas' => 'terdapat Kelas pada ANgkatan yang sama.'));
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('kelas', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'tahun' => $this->input->post('tahun'),
                'jurusan' => $this->input->post('jurusan'),
                'nama_kelas' => $this->input->post('nama_kelas'),
                'wali_kelas' => $this->input->post('wali_kelas')
            ];
            $this->db->insert('m_kelas', $data);
//log activity
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_kelas');
activity_log($user,'Tambah Kelas',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/kelas');
        }
    }
    function cek_tahunkelas()
    {
        $tahun = $this->input->post('tahun');
        $nama_kelas = $this->input->post('nama_kelas');
        $this->db->select('nama_kelas');
        $this->db->from('m_kelas');
        $this->db->where('tahun', $tahun);
        $this->db->where('nama_kelas', $nama_kelas);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function editkelas($id)
    {
        $data['title'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $this->load->model('akademik_model', 'akademik_model');
        $data['getkelasbyId'] = $this->akademik_model->getkelasbyId($id);
        $data['getkelasAll'] = $this->akademik_model->getkelasAll();
        $data['getpegawai'] = $this->akademik_model->get_pegawai_all();


        $data['getjurusanAll'] = $this->akademik_model->getjurusanAll();

        $this->form_validation->set_rules('tahun', 'Tahun Angkatan', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editkelas', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'tahun' => $this->input->post('tahun'),
                'jurusan' => $this->input->post('jurusan'),
                'nama_kelas' => $this->input->post('nama_kelas'),
                'wali_kelas' => $this->input->post('wali_kelas')
            ];
            $this->db->where('id', $id);
            $this->db->update('m_kelas', $data);
//log activity
//$data['table'] = $this->db->get_where('m_jalur', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_kelas');
activity_log($user,'Edit Kelas',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/kelas');
        }
    }
    public function hapuskelas($id)
    {
//log activity
$data['table'] = $this->db->get_where('m_kelas', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama_kelas'];
activity_log($user,'Hapus Kelas',$item);
//end log
        $this->db->where('id', $id);
        $this->db->delete('m_kelas');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Deleted !</div>');
        redirect('akademik/kelas');
    }
    public function kelas_addsiswa()
    {
        $data['title'] = 'Kelas Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $data['kelasbaru'] = $this->db->get_where('m_kelas', ['tahun' =>
        $data['tahun_default']['value']])->result_array();
        $data['getsiswaaktif'] = $this->akademik_model->getsiswaaktif();
        $data['listsiswabykelas'] = '';
        $data['kelas_tujuan'] = '';
        if ($this->session->userdata('kelas_tujuan')) {
            $data['kelas_tujuan'] = $this->session->userdata('kelas_tujuan');
            $data['listsiswabykelas'] = $this->akademik_model->getlistsiswa_byIdkelas($this->session->userdata('kelas_tujuan'));
            $data['getkelasbyId'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_tujuan'));
        }
        if ($this->session->userdata('angkatan')) {
            $data['getsiswaaktif'] = $this->akademik_model->getsiswaaktif($this->session->userdata('angkatan'));
        }
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('kelas_addsiswa', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }
    public function kelas_tujuan($id, $tahun)
    {
        $this->session->set_userdata('kelas_tujuan', $id);
        $this->session->set_userdata('angkatan', $tahun);
        redirect('akademik/kelas_addsiswa');
    }
    public function kelas_addsiswabaru($id)
    {
        $data['kelastujuan'] = $this->db->get_where('m_kelas', ['id' =>
        $this->session->userdata('kelas_tujuan')])->row_array();
        if ($this->session->userdata('kelas_tujuan')) {
            $this->db->select('siswa_id');
            $this->db->from('m_kelas_siswa');
            $this->db->where('siswa_id', $id);
            $this->db->where('tahun', $this->session->userdata('angkatan'));
            $query = $this->db->get();
            $num = $query->num_rows();
            if ($num > 0) {
//jikaduplicate
    $this->db->select('m_kelas_siswa.*,m_kelas.nama_kelas');
    $this->db->from('m_kelas_siswa');
    $this->db->join('m_kelas', 'm_kelas.id = m_kelas_siswa.kelas_id');
    $this->db->where('m_kelas_siswa.siswa_id', $id);
   $this->db->where('m_kelas_siswa.tahun', $this->session->userdata('angkatan'));
    $data['siswa'] = $this->db->get()->row_array();
    $nama_kelas= $data['siswa']['nama_kelas'];
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Siswa Duplicate -> '.$nama_kelas.'!</div>');
//jikaduplicate    
            } else {
                $data = [
                    'tahun' => $data['kelastujuan']['tahun'],
                    'kelas_id' =>  $data['kelastujuan']['id'],
                    'siswa_id' => $id
                ];
                $this->db->insert('m_kelas_siswa', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Siswa ke Kelas !</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">harus ada Kelas Tujuan !</div>');
        }
        redirect('akademik/kelas_addsiswa');
    }
    public function kelas_delsiswa($id)
    {
        $this->db->where('kelas_id', $this->session->userdata('kelas_tujuan'));
        $this->db->where('siswa_id', $id);
        $this->db->delete('m_kelas_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Siswa Removed from Kelas !</div>');
        redirect('akademik/kelas_addsiswa');
    }
    public function kelas_pindahsiswa()
    {
        $data['title'] = 'Kelas Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('nama_kelas', 'ASC');
        $this->db->where('tahun', $data['tahun_default']['value']);
        $data['m_kelas'] = $this->db->get('m_kelas')->result_array();

        $data['listsiswaasal'] = '';
        if ($this->session->userdata('kelas_asal')) {
            $data['listsiswaasal'] = $this->akademik_model->getlistsiswa_byIdkelas($this->session->userdata('kelas_asal'));
            $data['getkelasasal'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_asal'));
        }

        $data['listsiswatujuan'] = '';
        if ($this->session->userdata('kelas_tujuan')) {
            $data['listsiswatujuan'] = $this->akademik_model->getlistsiswa_byIdkelas($this->session->userdata('kelas_tujuan'));
            $data['getkelastujuan'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_tujuan'));
        }
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('kelas_pindahsiswa', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }
    public function kelas_movesiswa($id)
    {
        $data['kelastujuan'] = $this->db->get_where('m_kelas', ['id' =>
        $this->session->userdata('kelas_tujuan')])->row_array();
        if ($this->session->userdata('kelas_tujuan')) {
            $data = [
                'tahun' => $data['kelastujuan']['tahun'],
                'kelas_id' =>  $data['kelastujuan']['id'],
                'siswa_id' => $id
            ];
            $this->db->where('kelas_id', $this->session->userdata('kelas_tujuan'));
            $this->db->insert('m_kelas_siswa', $data);


            $this->db->where('kelas_id', $this->session->userdata('kelas_asal'));
            $this->db->where('siswa_id', $id);
            $this->db->delete('m_kelas_siswa');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Siswa pindah ke Kelas !</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">harus ada kelas tujuan !</div>');
        }
        redirect('akademik/kelas_pindahsiswa');
    }
    public function kelas_movesiswa_kembali($id)
    {
        $data['kelasasal'] = $this->db->get_where('m_kelas', ['id' =>
        $this->session->userdata('kelas_asal')])->row_array();
        if ($this->session->userdata('kelas_asal')) {
            $data = [
                'tahun' => $data['kelasasal']['tahun'],
                'kelas_id' =>  $data['kelasasal']['id'],
                'siswa_id' => $id
            ];
            $this->db->where('kelas_id', $this->session->userdata('kelas_asal'));
            $this->db->insert('m_kelas_siswa', $data);


            $this->db->where('kelas_id', $this->session->userdata('kelas_tujuan'));
            $this->db->where('siswa_id', $id);
            $this->db->delete('m_kelas_siswa');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Siswa kembali ke Kelas !</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">harus ada kelas asal !</div>');
        }
        redirect('akademik/kelas_pindahsiswa');
    }
    public function kelas_tujuanpindah($id, $tahun)
    {
        $this->session->set_userdata('kelas_tujuan', $id);
        $this->session->set_userdata('angkatan_tujuan', $tahun);
        redirect('akademik/kelas_pindahsiswa');
    }
    public function kelas_asalpindah($id, $tahun)
    {
        $this->session->set_userdata('kelas_asal', $id);
        $this->session->set_userdata('angkatan_asal', $tahun);
        $this->session->set_userdata('kelas_tujuan', '');
        redirect('akademik/kelas_pindahsiswa');
    }
    public function kelas_delsiswapindah($id)
    {
        $this->db->where('kelas_id', $this->session->userdata('kelas_tujuan'));
        $this->db->where('siswa_id', $id);
        $this->db->delete('m_kelas_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Siswa Removed from Kelas !</div>');
        redirect('akademik/kelas_pindahsiswa');
    }
    //
    public function kelas_naiksiswa()
    {
        $data['title'] = 'Kelas Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('nama_kelas', 'ASC');
        $data['m_kelas'] = $this->db->get('m_kelas')->result_array();

        $data['listsiswaasal'] = '';
        if ($this->session->userdata('kelas_asal')) {
            $data['listsiswaasal'] = $this->akademik_model->getlistsiswa_byIdkelas($this->session->userdata('kelas_asal'));
            $data['getkelasasal'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_asal'));
        }

        $data['listsiswatujuan'] = '';
        if ($this->session->userdata('kelas_tujuan')) {
            $data['listsiswatujuan'] = $this->akademik_model->getlistsiswa_byIdkelas($this->session->userdata('kelas_tujuan'));
            $data['getkelastujuan'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_tujuan'));
        }
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('kelas_naiksiswa', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }
    public function kelas_upsiswa($id)
    {
        $data['kelastujuan'] = $this->db->get_where('m_kelas', ['id' =>
        $this->session->userdata('kelas_tujuan')])->row_array();
        if ($this->session->userdata('kelas_tujuan')) {
            $data = [
                'tahun' => $data['kelastujuan']['tahun'],
                'kelas_id' =>  $data['kelastujuan']['id'],
                'siswa_id' => $id
            ];
            $this->db->where('kelas_id', $this->session->userdata('kelas_tujuan'));
            $this->db->insert('m_kelas_siswa', $data);


            $this->db->where('kelas_id', $this->session->userdata('kelas_asal'));
            $this->db->where('siswa_id', $id);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Siswa pindah ke Kelas !</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Error harus ada kelas Tujuan !</div>');
        }
        redirect('akademik/kelas_naiksiswa');
    }
    public function kelas_tujuannaik($id, $tahun)
    {
        $this->session->set_userdata('kelas_tujuan', $id);
        $this->session->set_userdata('angkatan_tujuan', $tahun);
        redirect('akademik/kelas_naiksiswa');
    }
    public function kelas_asalnaik($id, $tahun)
    {
        $this->session->set_userdata('kelas_asal', $id);
        $this->session->set_userdata('angkatan_asal', $tahun);
        $this->session->set_userdata('kelas_tujuan', '');
        redirect('akademik/kelas_naiksiswa');
    }
    public function kelas_delsiswanaik($id)
    {
        $this->db->where('kelas_id', $this->session->userdata('kelas_tujuan'));
        $this->db->where('siswa_id', $id);
        $this->db->delete('m_kelas_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Siswa Removed from Kelas !</div>');
        redirect('akademik/kelas_naiksiswa');
    }
    public function kelas_cetak()
    {
        $data['title'] = 'Kelas Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('nama_kelas', 'ASC');
        $data['m_kelas'] = $this->db->get('m_kelas')->result_array();

        $data['listsiswaasal'] = '';
        $data['getkelasasal'] = '';
        if ($this->session->userdata('kelas_asalcetak')) {
            $data['listsiswaasal'] = $this->akademik_model->getlistsiswa_byIdkelas($this->session->userdata('kelas_asalcetak'));
            $data['getkelasasal'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_asalcetak'));
            $data['kelas_asalcetak'] = $this->session->userdata('kelas_asalcetak');
        }

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('kelas_cetak', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }
    public function kelas_asalcetak($id, $tahun)
    {
        $this->session->set_userdata('kelas_asalcetak', $id);
        $this->session->set_userdata('angkatan_asalcetak', $tahun);
        redirect('akademik/kelas_cetak');
    }
    //cetak kelas
    public function cetak_kelas_print($id)
    {
        $data['title'] = 'Cetak Siswa per Kelas';
        $this->load->model('akademik_model', 'akademik_model');
        $data['listsiswaasal'] = $this->akademik_model->getlistsiswa_byIdkelas($id);
        $data['getkelasasal'] = $this->akademik_model->getkelasbyId($id);
        $this->load->view('themes/backend/headerprint', $data);
        $this->load->view('cetak_kelas_print', $data);
    }
    public function cetak_kelas_excel($id)
    {
        $data['title'] = 'Cetak Siswa per Kelas';
        $this->load->model('akademik_model', 'akademik_model');
        $data['listsiswaasal'] = $this->akademik_model->getlistsiswa_byIdkelas($id);
        $data['getkelasasal'] = $this->akademik_model->getkelasbyId($id);

        $this->load->view('themes/backend/headerprint', $data);
        $this->load->view('cetak_kelas_excel', $data);
    }

    public function cetak_kelas_pdf($id)
    {
        $data['title'] = 'Cetak Siswa per Kelas';
        $this->load->model('akademik_model', 'akademik_model');
        $data['listsiswaasal'] = $this->akademik_model->getlistsiswa_byIdkelas($id);
        $data['getkelasasal'] = $this->akademik_model->getkelasbyId($id);

        $html = $this->load->view('cetak_kelas_pdf', $data, true);
        // create pdf using dompdf
        $filename = 'cetakkelassiswa_pdf' . date('dmY') . '_' . date('His');
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }
    //presensi siswa
    public function presensi_siswa()
    {
        $data['title'] = 'Presensi Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
        $data['tahun_akademik_default']['value']])->row_array();

        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('nama_kelas', 'ASC');
        $data['m_kelas'] = $this->db->get('m_kelas')->result_array();

        $data['listsiswa'] = '';
        $data['getkelas'] = '';
        if ($this->session->userdata('kelas_presensi')) {
            $data['getkelas'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_presensi'));
            $data['kelas_presensi'] = $this->session->userdata('kelas_presensi');
        }
        if ($this->session->userdata('tanggal')) {
            $data['tanggal'] = $this->session->userdata('tanggal');
            $data['getkelas'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_presensi'));
            $data['listsiswa'] = $this->akademik_model->getlistsiswa_byIdkelas($this->session->userdata('kelas_presensi'));
            $data['listabsensi'] = $this->akademik_model->getabsensisiswa_bytanggalandkelas($this->session->userdata('tanggal'), $this->session->userdata('kelas_presensi'));
        }
 
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('presensi_siswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {

            $tanggal = $this->input->post('tanggal');
            $this->session->set_userdata('tanggal', $tanggal);
            redirect('akademik/presensi_siswa');
        }
    }
    public function kelas_presensi($id, $tahun)
    {
        $this->session->set_userdata('kelas_presensi', $id);
        $this->session->set_userdata('tahun_presensi', $tahun);
        redirect('akademik/presensi_siswa');
    }
    public function kelas_addpresensi()
    {

        $data['title'] = 'Presensi Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
        $data['tahun_akademik_default']['value']])->row_array();

        $tahunakademik_id = $data['m_tahunakademik']['id'];
        $semester = $data['m_tahunakademik']['semester'];
        $tanggal =  $this->session->userdata('tanggal');
        $kelas_id = $this->session->userdata('kelas_presensi');
        $bulan = date('n', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));
        $siswa_id = $this->input->post('siswa_id');
        $status = $this->input->post('status');

        $this->db->where('tanggal', $tanggal);
        $this->db->where('kelas_id', $kelas_id);
        $this->db->delete('akad_siswaabsenharian');

        foreach ($siswa_id as $key => $n) {
            $datadetail = [
                'siswa_id'     =>  $n,
                'status'     =>  $status[$key],
                'tahunakademik_id'     =>  $tahunakademik_id,
                'semester'     =>  $semester,
                'kelas_id'     =>  $kelas_id,
                'tanggal'     =>  $tanggal,
                'bulan'     =>  $bulan,
                'tahun'     =>  $tahun
            ];
            $this->db->insert('akad_siswaabsenharian', $datadetail);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
        redirect('akademik/presensi_siswa');
    }

    public function presensi_rekap_siswa()
    {

        $data['title'] = 'Rekap Presensi Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
        $data['tahun_akademik_default']['value']])->row_array();

        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('nama_kelas', 'ASC');
        $data['m_kelas'] = $this->db->get('m_kelas')->result_array();
        $data['listsiswa'] = '';
        $data['getkelas'] = '';
        $data['tahun'] = (date('Y'));
        $data['bulan'] = (date('n'));
        if ($this->session->userdata('kelas_rekap_presensi')) {
            $data['getkelas'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_rekap_presensi'));
            $data['kelas_presensi'] = $this->session->userdata('kelas_rekap_presensi');
        }

        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('bulan', 'bulan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('presensi_rekap_siswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }
    public function kelas_rekap_presensi($id, $tahun)
    {
        $this->session->set_userdata('kelas_rekap_presensi', $id);
        $this->session->set_userdata('tahun_rekap_presensi', $tahun);
        redirect('akademik/presensi_rekap_siswa');
    }
    public function cetak_rekap_presensi()
    {
        $data['title'] = 'Rekap Presensi Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');
        $kelas_id = $this->input->post('kelas_id');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $format = $this->input->post('format');
        if ($format == 'Print') {
            $data['getkelas'] = $this->akademik_model->getkelasbyId($kelas_id);
            $data['getlistsiswa'] = $this->akademik_model->getlistsiswa_byIdkelas($kelas_id);
            $data['gettglabsensi'] = $this->akademik_model->gettglabsensi($kelas_id, $tahun, $bulan);
            $data['getdataabsensi'] = $this->akademik_model->getabsensisiswaAll($kelas_id, $tahun, $bulan);
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['th'] = '0';
            $data['ts'] = '0';
            $data['ti'] = '0';
            $data['ta'] = '0';
            $this->load->view('themes/backend/headerprint', $data);
            $this->load->view('cetak_rekap_presensi_print', $data);
        }
        if ($format == 'Excel') {
            $data['getkelas'] = $this->akademik_model->getkelasbyId($kelas_id);
            $data['getlistsiswa'] = $this->akademik_model->getlistsiswa_byIdkelas($kelas_id);
            $data['gettglabsensi'] = $this->akademik_model->gettglabsensi($kelas_id, $tahun, $bulan);
            $data['getdataabsensi'] = $this->akademik_model->getabsensisiswaAll($kelas_id, $tahun, $bulan);
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['th'] = '0';
            $data['ts'] = '0';
            $data['ti'] = '0';
            $data['ta'] = '0';
            $this->load->view('cetak_rekap_presensi_excel', $data);
        }
        if ($format == 'PDF') {
            $data['getkelas'] = $this->akademik_model->getkelasbyId($kelas_id);
            $data['getlistsiswa'] = $this->akademik_model->getlistsiswa_byIdkelas($kelas_id);
            $data['gettglabsensi'] = $this->akademik_model->gettglabsensi($kelas_id, $tahun, $bulan);
            $data['getdataabsensi'] = $this->akademik_model->getabsensisiswaAll($kelas_id, $tahun, $bulan);
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['th'] = '0';
            $data['ts'] = '0';
            $data['ti'] = '0';
            $data['ta'] = '0';
            $html = $this->load->view('cetak_rekap_presensi_pdf', $data, true);
            // create pdf using dompdf
            $filename = 'cetakrekappresensi_pdf' . date('dmY') . '_' . date('His');
            $paper = 'A4';
            $orientation = 'landscape';
            pdf_create($html, $filename, $paper, $orientation);
        }
    }
    public function presensi_hapus_siswa()
    {

        $data['title'] = 'Presensi Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
        $data['tahun_akademik_default']['value']])->row_array();

        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('nama_kelas', 'ASC');
        $data['m_kelas'] = $this->db->get('m_kelas')->result_array();
        $data['listsiswa'] = '';
        $data['getkelas'] = '';
        $data['gettglabsensi'] = '';
        $data['tahun'] = (date('Y'));
        $data['bulan'] = (date('n'));
        if ($this->session->userdata('kelas_rekap_presensi')) {
            $data['getkelas'] = $this->akademik_model->getkelasbyId($this->session->userdata('kelas_rekap_presensi'));
            $data['kelas_presensi'] = $this->session->userdata('kelas_rekap_presensi');
        }

        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('bulan', 'bulan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('presensi_hapus_siswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');

            $this->session->set_userdata('bulan', $bulan);
            $this->session->set_userdata('tahun', $tahun);

            $data['kelas_id'] = $this->session->userdata('kelas_rekap_presensi');

            $kelas_id = $this->session->userdata('kelas_rekap_presensi');
            $bulan = $this->session->userdata('bulan');
            $tahun = $this->session->userdata('tahun');
            $data['getdataabsensi'] = $this->akademik_model->getabsensisiswaAll($kelas_id, $tahun, $bulan);
            $data['gettglabsensi'] = $this->akademik_model->gettglabsensi($kelas_id, $tahun, $bulan);

            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('presensi_hapus_siswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }
    public function kelas_hapus_presensi($id, $tahun)
    {
        $this->session->set_userdata('kelas_rekap_presensi', $id);
        $this->session->set_userdata('tahun_rekap_presensi', $tahun);
        redirect('akademik/presensi_hapus_siswa');
    }
    public function kelas_hapus_presensitgl($tanggal)
    {
        $kelas_id = $this->session->userdata('kelas_rekap_presensi');

        $this->db->where('tanggal', $tanggal);
        $this->db->where('kelas_id', $kelas_id);
        $this->db->delete('akad_siswaabsenharian');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Deleted !</div>');
        redirect('akademik/presensi_hapus_siswa');
    }

    public function presensi_persiswa()
    {
        $data['title'] = 'Presensi perSiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();


        $this->load->model('akademik_model', 'akademik_model');
        $data['siswaresult'] = $this->akademik_model->siswagetDataAll();
        $data['namakelas'] = '';
        // Load view
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('presensi_persiswa', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function presensi_detail($id)
    {
        $data['title'] = 'Presensi perSiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $tahunakademikdefault = $data['tahun_akademik_default']['value'];
        $tahun_default = $data['tahun_default']['value'];
        $this->load->model('akademik_model', 'akademik_model');
        $data['getdatasiswa'] = $this->akademik_model->getsiswabyId($id);
        $data['getdatapresensi'] = $this->akademik_model->getpresensisiswabyId($id, $tahunakademikdefault);
        $data['getkelassiswa'] = $this->akademik_model->getkelassiswabyId($id, $tahun_default);
        $data['get_siswahadir'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "H");
        $data['get_siswasakit'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "S");
        $data['get_siswaijin'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "I");
        $data['get_siswaalpa'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "A");
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('presensi_detail', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    } 
    public function cetak_presensi_detail_print($id)
    {
        $data['title'] = 'Presensi perSiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $tahunakademikdefault = $data['tahun_akademik_default']['value'];
        $tahun_default = $data['tahun_default']['value'];
        $this->load->model('akademik_model', 'akademik_model');
        $data['getdatasiswa'] = $this->akademik_model->getsiswabyId($id);
        $data['getdatapresensi'] = $this->akademik_model->getpresensisiswabyId($id, $tahunakademikdefault);
        $data['getkelassiswa'] = $this->akademik_model->getkelassiswabyId($id, $tahun_default);
        $data['get_siswahadir'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "H");
        $data['get_siswasakit'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "S");
        $data['get_siswaijin'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "I");
        $data['get_siswaalpa'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "A");
        $this->load->view('themes/backend/headerprint', $data);
        $this->load->view('cetak_presensi_detail_print', $data);
    }
    public function cetak_presensi_detail_excel($id)
    {
        $data['title'] = 'Presensi perSiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $tahunakademikdefault = $data['tahun_akademik_default']['value'];
        $tahun_default = $data['tahun_default']['value'];
        $this->load->model('akademik_model', 'akademik_model');
        $data['getdatasiswa'] = $this->akademik_model->getsiswabyId($id);
        $data['getdatapresensi'] = $this->akademik_model->getpresensisiswabyId($id, $tahunakademikdefault);
        $data['getkelassiswa'] = $this->akademik_model->getkelassiswabyId($id, $tahun_default);
        $data['get_siswahadir'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "H");
        $data['get_siswasakit'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "S");
        $data['get_siswaijin'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "I");
        $data['get_siswaalpa'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "A");
        $this->load->view('themes/backend/headerprint', $data);
        $this->load->view('cetak_presensi_detail_excel', $data);
    }
    public function cetak_presensi_detail_pdf($id)
    {
        $data['title'] = 'Presensi perSiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $tahunakademikdefault = $data['tahun_akademik_default']['value'];
        $tahun_default = $data['tahun_default']['value'];
        $this->load->model('akademik_model', 'akademik_model');
        $data['getdatasiswa'] = $this->akademik_model->getsiswabyId($id);
        $data['getdatapresensi'] = $this->akademik_model->getpresensisiswabyId($id, $tahunakademikdefault);
        $data['getkelassiswa'] = $this->akademik_model->getkelassiswabyId($id, $tahun_default);
        $data['get_siswahadir'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "H");
        $data['get_siswasakit'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "S");
        $data['get_siswaijin'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "I");
        $data['get_siswaalpa'] = $this->akademik_model->get_absensiswa($id, $tahunakademikdefault, "A");
        $this->load->view('themes/backend/headerprint', $data);
        $this->load->view('cetak_presensi_detail_pdf', $data);
        $html = $this->load->view('cetak_presensi_detail_pdf', $data, true);
        // create pdf using dompdf
        $filename = 'cetak_presensi_detail_pdf' . date('dmY') . '_' . date('His');
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }
    public function jurusan()
    {
        $data['title'] = 'Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('akademik_model', 'akademik_model');
        $data['getjurusanAll'] = $this->akademik_model->getjurusanAll();

        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', [
            'is_unique' => 'This nama_jurusan has already registered'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('jurusan', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama_jurusan' => $this->input->post('nama_jurusan')
            ];
            $this->db->insert('m_jurusan', $data);
//log activity
//$data['table'] = $this->db->get_where('m_kelas', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_jurusan');
activity_log($user,'Tambah Jurusan',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/jurusan');
        }
    }
    public function editjurusan($id)
    {
        $data['title'] = 'Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('akademik_model', 'akademik_model');
        $data['getjurusanbyId'] = $this->akademik_model->getjurusanbyId($id);
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editjurusan', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nama_jurusan' => $this->input->post('nama_jurusan')
            ];
            $this->db->where('id', $id);
            $this->db->update('m_jurusan', $data);
//log activity
//$data['table'] = $this->db->get_where('m_kelas', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('nama_jurusan');
activity_log($user,'Edit Jurusan',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/jurusan');
        }
    }
    public function hapusjurusan($id)
    {
//log activity
$data['table'] = $this->db->get_where('m_jurusan', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['nama_jurusan'];
activity_log($user,'Hapus Jurusan',$item);
//end log
        $this->db->where('id', $id);
        $this->db->delete('m_jurusan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/jurusan');
    }

    // KegiatanAkademik
    public function kegiatanakademik()
    {
        $data['title'] = 'Kegiatan Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->db->order_by('tanggal_awal', 'desc');
        $data['kegiatanakademik'] = $this->db->get('akad_kegiatanakademik')->result_array();

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('tanggal_awal', 'tanggal_awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'tanggal_akhir', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('kegiatanakademik', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'tanggal_awal' => $this->input->post('tanggal_awal'),
                'tanggal_akhir' => $this->input->post('tanggal_akhir')
            ];
            $this->db->insert('akad_kegiatanakademik', $data);
//log activity
//$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('judul');
activity_log($user,'Tambah Kegiatan Akademik',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/kegiatanakademik');
        }
    }

    public function editkegiatanakademik($id)
    {
        $data['title'] = 'Kegiatan Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['getkegiatanakademik'] = $this->db->get_where('akad_kegiatanakademik', ['id' =>
        $id])->row_array();
        $data['kegiatanakademik'] = $this->db->get('akad_kegiatanakademik')->result_array();
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('tanggal_awal', 'tanggal_awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'tanggal_akhir', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editkegiatanakademik', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'tanggal_awal' => $this->input->post('tanggal_awal'),
                'tanggal_akhir' => $this->input->post('tanggal_akhir')
            ];
            $this->db->where('id', $id);
            $this->db->update('akad_kegiatanakademik', $data);
//log activity
//$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('judul');
activity_log($user,'Edit Kegiatan Akademik',$item);
//end log
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role"alert">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     Data Saved !
                 </div>'
            );
            redirect('akademik/kegiatanakademik');
        }
    }

    public function hapuskegiatanakademik($id)
    {
//log activity
$data['table'] = $this->db->get_where('akad_kegiatanakademik', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['judul'];
activity_log($user,'Hapus Kegiatan Akademik',$item);
//end log
        $this->db->where('id', $id);
        $this->db->delete('akad_kegiatanakademik');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/kegiatanakademik');
    }


    public function view_fullcalendar()
    {
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['result'] = $this->db->get("akad_kegiatanakademik")->result();
        foreach ($data['result'] as $key => $value) {
            $data['data'][$key]['title'] = $value->judul;
            $data['data'][$key]['start'] = $value->tanggal_awal;
            $data['data'][$key]['end'] = $value->tanggal_akhir;
            $data['data'][$key]['backgroundColor'] = "#3b5998 ";
        }
        $this->load->view('view_fullcalendar', $data);
    }
    //journalkbm
    public function journalkbm()
    {
        $data['title'] = 'Journal KBM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('akademik_model', 'akademik_model');
        $data['tahunakademik'] = $this->akademik_model->get_tahunakademikAll();
        $data['kelas'] = $this->akademik_model->get_kelasAll();
        $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
        $this->form_validation->set_rules('kelas_id', 'kelas_id', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('journalkbm', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $tahunakademik_id = $this->input->post('tahunakademik_id');
            $kelas_id = $this->input->post('kelas_id');
            $data['jadwal_pelajaran'] = $this->akademik_model->get_jadwal_pelajaran($tahunakademik_id, $kelas_id);
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('journalkbm', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }
    public function journalkbm_list($jadwal_id)
    {
        $data['title'] = 'Journal KBM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');


        $data['get_datajadwal'] = $this->akademik_model->get_jadwal_byId($jadwal_id);
        $data['get_journal'] = $this->akademik_model->get_journal_byjadwal($jadwal_id);
        $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
        $kelas_id = $data['get_datajadwal']['kelas_id'];

        $data['jadwal_id'] = $data['get_datajadwal']['jadwal_id'];
        $data['tahunakademik_id'] = $data['get_datajadwal']['tahunakademik_id'];
        $data['mapel_id'] = $data['get_datajadwal']['mapel_id'];
        $data['kelas_id'] = $data['get_datajadwal']['kelas_id'];
        $data['guru_id'] = $data['get_datajadwal']['guru_id'];
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('journalkbm_list', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }

    public function addjournalkbm($jadwal_id)
    {
        $data['title'] = 'Journal KBM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');


        $data['get_datajadwal'] = $this->akademik_model->get_jadwal_byId($jadwal_id);
        $data['get_journal'] = $this->akademik_model->get_journal_byjadwal($jadwal_id);
        $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
        $kelas_id = $data['get_datajadwal']['kelas_id'];

        $data['jadwal_id'] = $jadwal_id;
        $data['tahunakademik_id'] = $data['get_datajadwal']['tahunakademik_id'];
        $data['mapel_id'] = $data['get_datajadwal']['mapel_id'];
        $data['kelas_id'] = $data['get_datajadwal']['kelas_id'];
        $data['guru_id'] = $data['get_datajadwal']['guru_id'];
        $data['tanggalskrg'] = date('Y-m-d');
        $this->form_validation->set_rules('hari', 'hari', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('jamke', 'jamke', 'required');
        $this->form_validation->set_rules('materi', 'materi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('addjournalkbm', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'jadwal_id' => $this->input->post('jadwal_id'),
                'tahunakademik_id' => $this->input->post('tahunakademik_id'),
                'mapel_id' => $this->input->post('mapel_id'),
                'kelas_id' => $this->input->post('kelas_id'),
                'guru_id' => $this->input->post('guru_id'),
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal'),
                'jamke' => $this->input->post('jamke'),
                'materi' => $this->input->post('materi'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->insert('akad_journalkbm', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/journalkbm_list/' . $jadwal_id);
        }
    }
    public function editjournalkbm($jadwal_id, $id)
    {
        $data['title'] = 'Journal KBM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');


        $data['get_datajadwal'] = $this->akademik_model->get_jadwal_byId($jadwal_id);
        $data['get_journal'] = $this->akademik_model->get_journal_byjadwal($jadwal_id);
        $data['get_datajurnal'] = $this->akademik_model->get_journalkbm_byId($id);
        $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
        $kelas_id = $data['get_datajadwal']['kelas_id'];

        $data['jadwal_id'] = $jadwal_id;
        $data['tahunakademik_id'] = $data['get_datajadwal']['tahunakademik_id'];
        $data['mapel_id'] = $data['get_datajadwal']['mapel_id'];
        $data['kelas_id'] = $data['get_datajadwal']['kelas_id'];
        $data['guru_id'] = $data['get_datajadwal']['guru_id'];
        $data['tanggalskrg'] = date('Y-m-d');
        $this->form_validation->set_rules('hari', 'hari', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('jamke', 'jamke', 'required');
        $this->form_validation->set_rules('materi', 'materi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editjournalkbm', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'jadwal_id' => $this->input->post('jadwal_id'),
                'tahunakademik_id' => $this->input->post('tahunakademik_id'),
                'mapel_id' => $this->input->post('mapel_id'),
                'kelas_id' => $this->input->post('kelas_id'),
                'guru_id' => $this->input->post('guru_id'),
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal'),
                'jamke' => $this->input->post('jamke'),
                'materi' => $this->input->post('materi'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->where('id', $id);
            $this->db->update('akad_journalkbm', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/journalkbm_list/' . $jadwal_id);
        }
    }
    public function hapusjurnalkbm($jadwal_id, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete('akad_journalkbm');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/journalkbm_list/' . $jadwal_id);
    }
    //cetak journal
    public function cetak_journalkbm($jadwal_id)
    {
        $data['title'] = 'Cetak Journal KBM';
        $this->load->model('akademik_model', 'akademik_model');
        $data['get_datajadwal'] = $this->akademik_model->get_jadwal_byId($jadwal_id);
        $data['get_journal'] = $this->akademik_model->get_journal_byjadwal($jadwal_id);
        $this->load->view('themes/backend/headerprint', $data);
        $this->load->view('cetak_journalkbm', $data);
    }
    //rekapkbm
    public function rekapkbm()
    {
        $data['title'] = 'Rekap KBM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('akademik_model', 'akademik_model');
        $data['tahunakademik'] = $this->akademik_model->get_tahunakademikAll();
        $this->form_validation->set_rules('tahunakademik_id', 'tahunakademik_id', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('rekapkbm', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $tahunakademik_id = $this->input->post('tahunakademik_id');
            $data['jadwal_pelajaran'] = $this->akademik_model->get_guru_pelajaran($tahunakademik_id);
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('rekapkbm', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }
    public function rekapkbm_list($tahunakademik_id, $mapel_id, $guru_id)
    {
        $data['title'] = 'Rekap KBM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');


        $data['get_datagurukbm'] = $this->akademik_model->get_datagurukbm($tahunakademik_id, $mapel_id, $guru_id);
        $tahunakademik_id = $data['get_datagurukbm']['tahunakademik_id'];
        $data['tahunakademik_id'] = $data['get_datagurukbm']['tahunakademik_id'];
        $data['mapel_id'] = $data['get_datagurukbm']['mapel_id'];
        $data['guru_id'] = $data['get_datagurukbm']['guru_id'];
        $this->form_validation->set_rules('bulan', 'bulan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('rekapkbm_list', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $tahunakademik_id = $this->input->post('tahunakademik_id');
            $mapel_id = $this->input->post('mapel_id');
            $guru_id = $this->input->post('guru_id');
            $bulan = $this->input->post('bulan');
            $data['bulan'] = $bulan;
            $data['get_journal'] = $this->akademik_model->get_journal_byguru($tahunakademik_id, $mapel_id, $guru_id, $bulan);
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('rekapkbm_list', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }
    public function cetak_rekapkbm_print($tahunakademik_id, $mapel_id, $guru_id, $bulan)
    {
        $data['title'] = 'Cetak DKN';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');
        $data['get_datagurukbm'] = $this->akademik_model->get_datagurukbm($tahunakademik_id, $mapel_id, $guru_id);
        $data['get_journal'] = $this->akademik_model->get_journal_byguru($tahunakademik_id, $mapel_id, $guru_id, $bulan);
        $data['bulan'] = $bulan;
        $this->load->view('themes/backend/headerprint', $data);
        $this->load->view('cetak_rekapkbm_print', $data);
    }

    // SISWA

    public function siswa()
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['options'] = $this->db->get_where('m_options', ['name' =>
        'tahun_default'])->row_array();
        $angkatandefault=$data['options']['value'];

        $this->load->model('akademik_model', 'akademik_model');
        $data['siswa'] = $this->akademik_model->siswagetDataAllbyAngkatan($angkatandefault);
        // Search text


        // Load view
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('siswa', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function siswa_add()
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->select('`m_gelombang_jalur`.*,`m_tahunakademik`.nama as `tahun`');
        $this->db->from('m_gelombang_jalur');
        $this->db->join('m_tahunakademik', 'm_tahunakademik.id = m_gelombang_jalur.tahun_id');
        $this->db->group_by('tahun_id');
        $this->db->order_by('tahun_id', 'ASC');
        $data['tahun_ppdb'] = $this->db->get()->result_array();

        $this->db->select('`m_gelombang_jalur`.*,`m_gelombang`.nama as `gelombang`');
        $this->db->from('m_gelombang_jalur');
        $this->db->join('m_gelombang', 'm_gelombang.id = m_gelombang_jalur.gelombang_id');
        $this->db->group_by('gelombang_id');
        $this->db->order_by('gelombang_id', 'ASC');
        $data['gelombang'] = $this->db->get()->result_array();

        $this->db->select('`m_gelombang_jalur`.*,`m_jalur`.nama as `jalur`');
        $this->db->from('m_gelombang_jalur');
        $this->db->join('m_jalur', 'm_jalur.id = m_gelombang_jalur.jalur_id');
        $this->db->group_by('jalur_id');
        $this->db->order_by('jalur_id', 'ASC');
        $data['jalur'] = $this->db->get()->result_array();


        $data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
        $data['m_agama'] = $this->db->get('m_agama')->result_array();
        $data['m_statusanak'] = $this->db->get('ppdb_status_anak')->result_array();
        $data['m_statusortu'] = $this->db->get('ppdb_status_ortu')->result_array();
        $data['m_pendidikan'] = $this->db->get('m_pendidikan')->result_array();

        $this->form_validation->set_rules('tahun_ppdb', 'tahun_ppdb', 'required');
        $this->form_validation->set_rules('noformulir', 'noformulir', 'required|is_unique[ppdb_siswa.noformulir]');
        $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('tempatlahirsiswa', 'tempatlahirsiswa', 'required');
        $this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'required');
        $this->form_validation->set_rules('tinggisiswa', 'tinggisiswa', 'required');
        $this->form_validation->set_rules('beratsiswa', 'beratsiswa', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required');
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
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/javascript', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('siswa_add', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg';
                $config['upload_path'] = './assets/images/siswa/';
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
                $new_image = 'default.jpg';
            }

            $data = [
                'tahun_ppdb' => $this->input->post('tahun_ppdb'),
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
                'image' => $new_image
            ];
            $this->db->insert('ppdb_siswa', $data);
//log activity
//$data['table'] = $this->db->get_where('m_jurusan', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('namasiswa');
activity_log($user,'Tambah Siswa',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/siswa');
        }
    }
    public function editsiswa($id)
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' =>
        $id])->row_array();

        $data['m_kelamin'] = $this->db->get('m_kelamin')->result_array();
        $data['m_agama'] = $this->db->get('m_agama')->result_array();
        $data['m_statusanak'] = $this->db->get('ppdb_status_anak')->result_array();
        $data['m_statusortu'] = $this->db->get('ppdb_status_ortu')->result_array();
        $data['m_pendidikan'] = $this->db->get('m_pendidikan')->result_array();

        $this->form_validation->set_rules('tahun_ppdb', 'tahun_ppdb', 'required');
        $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'required');

        $this->form_validation->set_rules('tempatlahirsiswa', 'tempatlahirsiswa', 'required');
        $this->form_validation->set_rules('tinggisiswa', 'tinggisiswa', 'required');
        $this->form_validation->set_rules('beratsiswa', 'beratsiswa', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required');
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
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editsiswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            // Jika Ada Gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg';
                $config['upload_path'] = './assets/images/siswa/';
                $config['file_name'] = round(microtime(true) * 1000);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $this->input->post('old_image');
                    if ($old_image != 'default.jpg') {
                        if (file_exists('assets/images/siswa/' . $old_image)) {
                            unlink(FCPATH . 'assets/images/siswa/' . $old_image);
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
          $config2['source_image'] = './assets/images/siswa/' . $new_image;
          $config['new_image'] = './assets/images/siswa/' . $new_image;
          $config2['create_thumb'] = FALSE;
          $config2['maintain_ratio'] = TRUE;
          $config2['width'] = 200;
  
          $this->image_lib->clear();
          $this->image_lib->initialize($config2);
          $this->image_lib->resize();
          //ukuran resize
            }
            $id = $this->input->post('id');
            $data = [
                'tahun_ppdb' => $this->input->post('tahun_ppdb'),
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
            ];

            $this->db->where('id', $id);
            $this->db->update('ppdb_siswa', $data);
//log activity
//$data['table'] = $this->db->get_where('m_jurusan', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('namasiswa');
activity_log($user,'Edit Siswa',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
                  Profile has been updated!</div>');
            redirect('akademik/siswa');
        }
    }
    public function hapussiswa($id)
    {
//log activity
$data['table'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['table']['namasiswa'];
activity_log($user,'Hapus Siswa',$item);
//end log
        $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' => $id])->row_array();
        $old_image = $data['getsiswa']['image'];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . './assets/images/siswa/' . $old_image);
        }
        $this->db->where('id', $id);
        $this->db->delete('ppdb_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
        redirect('akademik/siswa');
    }
    public function print_siswa_detail($id)
    {
        $data['title'] = 'Cetak Siswa Detail';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Akademik_model', 'Akademik_model');
        $data['getsiswa'] = $this->Akademik_model->siswa_GetAll_DatabyId($id);
        $this->load->view('themes/backend/headerraport', $data);
        $this->load->view('print_siswa_detail', $data);
        $this->load->view('themes/backend/footer_print', $data);
    }
    // siswa lama
    public function siswalama_add()
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['statussiswa'] = $this->db->get('ppdb_status')->result_array();

        $this->form_validation->set_rules('tahun_ppdb', 'tahun_ppdb', 'required');
        $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('nis', 'nis', 'required|numeric|is_unique[ppdb_siswa.nis]', ['is_unique' => 'This number has already registered']);
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/javascript', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('siswalama_add', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg';
                $config['upload_path'] = './assets/images/siswa/';
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
                $new_image = 'default.jpg';
            }
            $data = [
                'tahun_ppdb' => $this->input->post('tahun_ppdb'),
                'namasiswa' => $this->input->post('namasiswa'),
                'nis' => $this->input->post('nis'),
                'ppdb_status' => $this->input->post('ppdb_status'),
                'image' => $new_image
            ];
            $this->db->insert('ppdb_siswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/siswa');
        }
    }

    // SISWA LOGIN
    public function siswa_login()
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->get_where('ppdb_siswa')->result_array();

        // Load view
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('siswa_login', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function editsiswalogin($id)
    {
        $data['title'] = 'Siswa - LOGIN';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['getsiswa'] = $this->db->get_where('ppdb_siswa', ['id' =>
        $id])->row_array();

        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('namasiswa', 'namasiswa', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('tanggallahirsiswa', 'tanggallahirsiswa', 'required');

        // Load view
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('editsiswalogin', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'namasiswa' => $this->input->post('namasiswa'),
                'tanggallahirsiswa' => $this->input->post('tanggallahirsiswa')
            ];
            $this->db->where('id', $id);
            $this->db->update('ppdb_siswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
            redirect('akademik/siswa_login');
        }
    }
    public function ultah_siswa()
    {
        $data['title'] = 'Ultah Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');
        $this->form_validation->set_rules('bulan', 'bulan', 'required');
        $data['bulan']='';
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('ultah_siswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $bulan = $this->input->post('bulan');
            $data['bulan'] = $bulan;
            $this->load->model('akademik_model', 'akademik_model');
            $data['list_siswa'] = $this->akademik_model->siswagetDataAll();
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('ultah_siswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        }
    }

    public function ultah_siswa_print($bulan)
	{
		$data['title'] = 'Ultah Siswa';
            $data['bulan'] = $bulan;
            $this->load->model('akademik_model', 'akademik_model');
            $data['list_siswa'] = $this->akademik_model->siswagetDataAll();
	
		$this->load->view('themes/backend/headerprint', $data);
		$this->load->view('ultah_siswa_print', $data);
    }
    
    public function editjournalabsensi($jadwal_id, $journal_id)
    {
        $data['title'] = 'Journal KBM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');


        $data['get_datajadwal'] = $this->akademik_model->get_jadwal_byId($jadwal_id);
        $data['get_journal'] = $this->akademik_model->get_journal_byjadwal($jadwal_id);
        $data['get_datajurnal'] = $this->akademik_model->get_journalkbm_byId($journal_id);
        $tahunakademik_id = $data['get_datajadwal']['tahunakademik_id'];
        $kelas_id = $data['get_datajadwal']['kelas_id'];

        $data['jadwal_id'] = $jadwal_id;
        $data['journal_id'] = $journal_id;
        $data['tahunakademik_id'] = $data['get_datajadwal']['tahunakademik_id'];
        $data['mapel_id'] = $data['get_datajadwal']['mapel_id'];
        $data['kelas_id'] = $data['get_datajadwal']['kelas_id'];
        $data['guru_id'] = $data['get_datajadwal']['guru_id'];
        $data['tanggalskrg'] = date('Y-m-d');
        $data['tanggal']=$data['get_datajurnal']['tanggal'];
        $data['listsiswa'] = $this->akademik_model->getlistsiswa_byIdkelas($kelas_id);
        $data['listabsensijournal'] = $this->akademik_model->getabsensisiswa_byjournal($journal_id,$data['tanggal']);

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('editjournalabsensi', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function journal_addpresensi()
    {

        $data['title'] = 'Presensi Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('akademik_model', 'akademik_model');

        $data['tahun_default'] = $this->db->get_where('m_options', ['name' => 'tahun_default'])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $data['m_tahunakademik'] = $this->db->get_where('m_tahunakademik', ['id' =>
        $data['tahun_akademik_default']['value']])->row_array();

        $tahunakademik_id = $data['m_tahunakademik']['id'];
        $semester = $data['m_tahunakademik']['semester'];
        $tanggal =  $this->input->post('tanggal');
        $kelas_id = $this->input->post('kelas_id');
        $bulan = date('n', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));
        $siswa_id = $this->input->post('siswa_id');
        $status = $this->input->post('status');
        $jadwal_id = $this->input->post('jadwal_id');
        $journal_id = $this->input->post('journal_id');

        $this->db->where('tanggal', $tanggal);
        $this->db->where('journal_id', $journal_id);
        $this->db->delete('akad_siswaabsenjournal');

        foreach ($siswa_id as $key => $n) {
            $datadetail = [
                'siswa_id'     =>  $n,
                'status'     =>  $status[$key],
                'tahunakademik_id'     =>  $tahunakademik_id,
                'semester'     =>  $semester,
                'kelas_id'     =>  $kelas_id,
                'tanggal'     =>  $tanggal,
                'bulan'     =>  $bulan,
                'tahun'     =>  $tahun,
                'journal_id'     =>  $journal_id
            ];
            $this->db->insert('akad_siswaabsenjournal', $datadetail);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
       redirect('akademik/editjournalabsensi/' . $jadwal_id.'/'. $journal_id);
    //    redirect('akademik/journalkbm_list/' . $jadwal_id);
    }

    //end
}
