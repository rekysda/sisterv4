<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api extends CI_Controller{
// constructor
  public function __construct(){
    parent::__construct();
  }
  public function apipublic()
  {
      $data['title'] = 'API Public';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      $data['apilist'] = $this->db->get('m_apilist')->result_array();
          $this->load->view('themes/backend/header', $data);
          $this->load->view('themes/backend/sidebar', $data);
          $this->load->view('themes/backend/topbar', $data);
          $this->load->view('apipublic', $data);
          $this->load->view('themes/backend/footer');
          $this->load->view('themes/backend/footerajax');
      
  }
  
  public function tahunakademiklist()
  {
    $data = $this->db->query("SELECT * FROM m_tahunakademik")->result();
    echo json_encode($data);
  }

  public function tahunakademikaktif()
  {
    $data = $this->db->get_where('m_options', ['id' =>
    '2'])->row_array();
    echo json_encode($data);
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

  
    public function siswadetail()
    {
      $nis=$_GET['nis'];  
      $data = $data = $this->db->get_where('ppdb_siswa', ['nis' =>
      $nis])->row_array();
      echo json_encode($data);
    }

    public function siswatagihan()
    {
      $nis=$_GET['nis'];    
      $this->db->select('`ppdb_siswa`.namasiswa,`siswa_keuangan`.nominal,`siswa_keuangan`.jenis,`m_biaya`.nama as `biaya`');
      $this->db->from('siswa_keuangan');
      $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
      $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_keuangan.siswa_id');
      $this->db->where('ppdb_siswa.nis',$nis);
      $this->db->where('siswa_keuangan.is_paid','0');
      $this->db->order_by('biaya', 'ASC');
      $query = $this->db->get()->result_array();
      echo json_encode($query);
    }
    public function siswapresensi()
    {
        $nis=$_GET['nis'];  
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tahun_akademik_default'] = $this->db->get_where('m_options', ['name' => 'tahun_akademik_default'])->row_array();
        $tahunakademikdefault = $data['tahun_akademik_default']['value'];
        $data['datasiswa'] = $this->db->get_where('ppdb_siswa', ['nis' => $nis])->row_array();
        $id = $data['datasiswa']['id'];
        $namasiswa = $data['datasiswa']['namasiswa'];

        $this->load->model('api_model', 'api_model');
        
        $hadir = $this->api_model->get_absensiswa($id, $tahunakademikdefault, "H");
        $sakit = $this->api_model->get_absensiswa($id, $tahunakademikdefault, "S");
        $ijin = $this->api_model->get_absensiswa($id, $tahunakademikdefault, "I");
        $alpa = $this->api_model->get_absensiswa($id, $tahunakademikdefault, "A");
        $query = [
            'idsiswa'     =>  $id,
            'tahunakademikdefault'     =>  $tahunakademikdefault,
            'nis'     =>  $nis,
            'namasiswa'     =>  $namasiswa,
            'hadir'     =>  $hadir,
            'sakit'     =>  $sakit,
            'ijin'     =>  $ijin,
            'alpa'     =>  $alpa
        ];
       
        echo json_encode($query);
    }
    public function siswapelanggaran()
    {
      $nis=$_GET['nis'];    
      $this->db->select('`ppdb_siswa`.namasiswa,`bk_siswapelanggaran`.tanggal,`bk_siswapelanggaran`.point,`bk_pelanggaran`.pelanggaran as `nama`');
      $this->db->from('bk_siswapelanggaran');
      $this->db->join('bk_pelanggaran', 'bk_pelanggaran.id = bk_siswapelanggaran.pelanggaran_id');
      $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswapelanggaran.siswa_id');
      $this->db->where('ppdb_siswa.nis',$nis);
      $this->db->order_by('bk_siswapelanggaran.tanggal', 'ASC');
      $query = $this->db->get()->result_array();
      echo json_encode($query);
    }  
//end
}
?>