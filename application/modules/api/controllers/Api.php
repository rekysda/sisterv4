<?php

class Api extends CI_Controller{
// constructor
  public function __construct(){
    parent::__construct();
    is_logged_in();
  }

  public function apipublic()
  {
      $data['title'] = 'API Public';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

          $this->load->view('themes/backend/header', $data);
          $this->load->view('themes/backend/sidebar', $data);
          $this->load->view('themes/backend/topbar', $data);
          $this->load->view('apipublic', $data);
          $this->load->view('themes/backend/footer');
          $this->load->view('themes/backend/footerajax');
      
  }
  public function apisms()
    {  
        $data['title'] = 'API SMS';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['cekkredit'] = $this->cismsapi->cekkredit(apisms('user_api_sms'),apisms('user_key_sms'));

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('apisms', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');

        if (isset($_POST["submit"])) {
            if (is_array($_POST['apisms'])) {
                foreach ($_POST['apisms'] as $key => $val) {
                    $this->db->query("UPDATE `apisms` SET value = '$val' WHERE name = '$key'");
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">API SMS updated.</div>');
                redirect('api/apisms');
            }
        }
    }

    public function apiemail()
    {  
        $data['title'] = 'API Email';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('apiemail', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');

        if (isset($_POST["submit"])) {
            if (is_array($_POST['apiemail'])) {
                foreach ($_POST['apiemail'] as $key => $val) {
                    $this->db->query("UPDATE `apiemail` SET value = '$val' WHERE name = '$key'");
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">API Email updated.</div>');
                redirect('api/apiemail');
            }
        }
    }
//end
}
?>