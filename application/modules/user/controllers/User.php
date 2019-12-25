<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('user', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('edit', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // Jika Ada Gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['image_library'] = 'gd2';
                $config['allowed_types'] = 'gif|jpg|png';
                // $config['max_size'] = '200';
                $config['upload_path'] = './assets/images/profile/';
                $config['file_name'] = round(microtime(true) * 1000);
                // $config['file_name'] ='112233';
                // $config['quality'] = '50%';
                // $config['width'] = 200;
                // $config['height'] = 200;
                $this->load->library('upload', $config);


                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        if (file_exists('assets/images/profile/' . $old_image)) {
                            unlink(FCPATH . 'assets/images/profile/' . $old_image);
                        }
                    }
                    $new_image = $this->upload->data('file_name');
                    //ukuran resize
                    $this->load->library('image_lib');

                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = 'assets/images/profile/' . $new_image;
                    $config['new_image'] = 'assets/images/profile/' . $new_image;
                    $config2['create_thumb'] = FALSE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 200;
                    $config2['height'] = 200;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                    //ukuran resize

                    $this->db->set('image', $new_image);
                } else {
                    echo  $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->session->userdata('email');
activity_log($user,'Edit Profil',$item);
//end log 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
                Profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('changepassword', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password1 = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">
                Wrong Current Password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">
                    New password cannot be same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash($new_password1, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
                            Password has been changed!</div>');
//log act
//$data['user'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
$user=$this->session->userdata('email');
$item=$this->session->userdata('email');
activity_log($user,'Ganti Password',$item);
//end log 
                    redirect('user/changepassword');
                }
            }
        }
    }
}
