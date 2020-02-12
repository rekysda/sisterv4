<?php 
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('role', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'role' => htmlspecialchars($this->input->post('role'))
            ];
            $this->db->insert('user_role', $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('role');
activity_log($user,'Tambah Role',$item);
//end log  
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New Role added !</div>');
            redirect('admin/role');
        }
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $menuaccess = $this->uri->segment(3);
        if ($menuaccess == '1') {
            $this->db->where('id>', 0);
        } else {
            $this->db->where('id!=', 1);
        }
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu'] = $this->db->get('user_sub_menu')->result_array();
        $data['menuadmin'] = $this->db->get_where('user_menu', ['id' => '1'])->row_array();

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('role-access', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Access Changed!</div>');
    }
    public function changeAccesssub()
    {
        $role_id = $this->input->post('roleId');
        $submenu_id = $this->input->post('submenuid');

        $data = [
            'role_id' => $role_id,
            'submenu_id' => $submenu_id
        ];
        $result = $this->db->get_where('user_access_submenu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_submenu', $data);
        } else {
            $this->db->delete('user_access_submenu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Access Changed!</div>');
    }
    public function userlogin()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Userlogin_model', 'userlogin');

        $data['userlogin'] = $this->userlogin->getuserLogin();
        $this->db->select("*");
        $this->db->from('user_role');
        $this->db->where_not_in('id', '3');
        $this->db->where_not_in('id', '4');
        $data['role'] = $this->db->get()->result_array();

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('userlogin', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name')),
                'image' => 'default.jpg',
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => time()
            ];
            //log act
            $user=$this->session->userdata('email');
            $item=$this->input->post('email');
            activity_log($user,'Tambah User',$item);
            //end log
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New UserLogin added !</div>');
            redirect('admin/userlogin');
        }
    }

    public function useredit($id)
    {
        $data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Userlogin_model', 'userlogin');

        $data['userlogin'] = $this->userlogin->getuserLogin();
        $data['getuserlogin'] = $this->userlogin->getUserloginById($id);
        $this->db->select("*");
        $this->db->from('user_role');
        $this->db->where_not_in('id', '3');
        $this->db->where_not_in('id', '4');
        $data['role'] = $this->db->get()->result_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('username', 'UserName', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('userloginedit', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $role_id = $this->input->post('role_id');
            $is_active = $this->input->post('is_active');
            // Jika Ada Gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '200';
                $config['upload_path'] = './assets/images/profile/';
                $config['file_name'] = round(microtime(true) * 1000);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['getuserlogin']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo  $this->upload->display_errors();
                }
            }
            if ($password) {
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->db->set('password', $password);
            }
            $this->db->set('username', $username);
            $this->db->set('name', $name);
            $this->db->set('is_active', $is_active);
            $this->db->where('email', $email);
            $this->db->update('user');
//log act
$user=$this->session->userdata('email');
$item=$this->input->post('email');
activity_log($user,'Edit User',$item);
//end log
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
            User Login has been updated!</div>');
            redirect('admin/userlogin');
        }
    }

    public function userdelete($id)
    {
        $this->load->model('Userlogin_model', 'user_model');
        $data['getuserlogin'] = $this->user_model->getUserloginById($id);
        $old_image = $data['getuserlogin']['image'];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }
        $this->user_model->delete_user($id);
        //log act
        $user=$this->session->userdata('email');
        $item='Hapus User';
        activity_log($user,'Hapus User',$item);
        //end log
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">User Login deleted !</div>');
        redirect('admin/userlogin');
    }

    public function roleEdit($id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->model('User_role_model', 'role_model');
        $data['getrole'] = $this->role_model->get_user_role($id);
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('roleedit', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $id = $this->input->post('id');
            $data = [
                'role' => $this->input->post('role')
            ];
            $this->role_model->update_user_role($id, $data);
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->input->post('role');
activity_log($user,'Edit Role',$item);
//end log          
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New Role edited !</div>');
            redirect('admin/role');
        }
    }

public function roleDelete($id)
{
//log act
$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$data['user']['role'];
activity_log($user,'Hapus Role',$item);
//end log
        $this->load->model('User_role_model', 'role_model');
        $this->role_model->delete_user_role($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Role deleted !</div>');
        redirect('admin/role');
}

    public function websetting()
    {
        $data['title'] = 'Web Setting';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['websetting'] = $this->db->get('web_setting')->result_array();

        // $names = array('signup_member', 'forgot_password', 'smtp_user', 'smtp_pass', 'smtp_port');
        // $this->db->where_in('name', $names);
        // $data['options'] = $this->db->get('options')->result_array();

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('websetting', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');

        if (isset($_POST["submit"])) {

            if (is_array($_POST['option'])) {
                foreach ($_POST['option'] as $key => $val) {
                    $this->db->query("UPDATE `options` SET value = '$val' WHERE name = '$key'");
                }
                                    //log act
                                    $user=$this->session->userdata('email');
                                    $item='';
                                    activity_log($user,'Edit Websetting',$item);
                                    //end log
                $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Web setting updated.</div>');
                redirect('admin/websetting');
            }
        }
    }

    public function changeWebsetting()
    {
        $name = $this->input->post('name');
        $is_active = $this->input->post('is_active');

        if ($is_active == '0') {
            $this->db->set('is_active', '1');
        } else {
            $this->db->set('is_active', '0');
        }
        $this->db->where('name', $name);
        $this->db->update('web_setting');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Web Setting Changed!</div>');
    }

    public function changeoptions()
    {
        $id = $this->input->post('id');
        $value = $this->input->post('value');

        $this->db->set('value', $value);

        $this->db->where('id', $id);
        $this->db->update('options');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Web Setting Changed!</div>');
    }

    public function usersekolah()
    {
        $data['title'] = 'User Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['listaccessuser']='0';
        $data['userlist'] = $this->db->get('user')->result_array();
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('usersekolah', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
    }

    public function usersekolahaccess($user_id)
    {
        $data['title'] = 'User Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['user'] = $this->db->get_where('user', ['id' => $user_id])->row_array();
        $menuaccess = $this->uri->segment(3);
        $data['sekolah'] = $this->db->get('m_sekolah')->result_array();

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('usersekolahaccess', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }
    public function changeaccesssekolah()
    {
        $user_id = $this->input->post('userId');
        $sekolah_id = $this->input->post('sekolahId');

        $data = [
            'user_id' => $user_id,
            'sekolah_id' => $sekolah_id
        ];
        $result = $this->db->get_where('user_access_sekolah', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_sekolah', $data);
        } else {
            $this->db->delete('user_access_sekolah', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Access Sekolah Changed!</div>');
    }

    //end
}
