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
      $nis])->result_array();
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
    public function siswaprestasi()
    {
      $nis=$_GET['nis'];    
      $this->db->select('`ppdb_siswa`.namasiswa,`bk_siswaprestasi`.tanggal,`bk_siswaprestasi`.lomba,`bk_siswaprestasi`.instansi,`bk_siswaprestasi`.prestasi,`bk_tingkat`.tingkat as `tingkat`');
      $this->db->from('bk_siswaprestasi');
      $this->db->join('bk_tingkat', 'bk_tingkat.id = bk_siswaprestasi.tingkat_id');
      $this->db->join('ppdb_siswa', 'ppdb_siswa.id = bk_siswaprestasi.siswa_id');
      $this->db->where('ppdb_siswa.nis',$nis);
      $this->db->order_by('bk_siswaprestasi.tanggal', 'ASC');
      $query = $this->db->get()->result_array();
      echo json_encode($query);
    } 
    public function siswapembayaran()
    {
      $nis=$_GET['nis'];    
      $this->db->select('`siswa_keuangan`.id as id,`ppdb_siswa`.namasiswa,`siswa_keuangan`.nominal,`siswa_keuangan`.jenis,`m_biaya`.nama as `biaya`');
      $this->db->from('siswa_keuangan');
      $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
      $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_keuangan.siswa_id');
      $this->db->where('ppdb_siswa.nis',$nis);
      $this->db->where('siswa_keuangan.is_paid','1');
      $this->db->where('siswa_keuangan.push_notif','0');
      $this->db->order_by('biaya', 'ASC');
      $query = $this->db->get()->result_array();
      echo json_encode($query);
    }
    public function updatepushnotif()
    {
      $id=$_GET['id'];    
      $this->db->set('push_notif', '1');
      $this->db->where('id', $id);
      $this->db->update('siswa_keuangan');
      $query = $this->db->get();
      $array = array(
        'success'  => true
       );
      echo json_encode($array, true);
    } 
    public function insertdeviceidsiswa()
    {  
      $nis=$_POST['nis']; 
      $deviceid=$_POST['deviceid'];   
    $this->db->where('nis', $nis);
    $this->db->delete('siswa_deviceid');
    $datadetail = [
                'nis'     =>  $nis,
                'deviceid'     =>  $deviceid
              ];
            $this->db->insert('siswa_deviceid', $datadetail);

            $array = array(
              'success'  => true
             );
            echo json_encode($array, true);
            }
   public function getsiswadeviceid()
    {
      $nis=$_GET['nis'];    
      $this->db->select('`siswa_deviceid`.*');
      $this->db->from('siswa_deviceid');
      $this->db->where('siswa_deviceid.nis',$nis);
      $query = $this->db->get()->result_array();
      echo json_encode($query);
    }
    public function loginsiswa()
    {  
    //  $response = array();
      /* format nis 190001 ; tanggallahir 2005-06-18 */
      $username=$_POST['username']; 
      $password=$_POST['password'];   
      //$user = $this->db->get_where('ppdb_siswa', ['nis' => $nis,'tanggallahirsiswa' => $tanggallahir])->row_array();
      $this->db->select('`siswa_android`.*');
      $this->db->from('siswa_android');
      $this->db->where('siswa_android.nis',$username);
      $this->db->where('siswa_android.password',$password);
      $user = $this->db->get()->row_array();
      if ($user) {
      $user['value'] = 1;
      $user['message'] = 'Login Berhasil';
      echo json_encode($user);

  } else{
          $user['value'] = 0;
          $user['message'] = "login gagal";
          echo json_encode($user);
      }
            }
            
            public function pengumuman()
            {  
              $data = $this->db->query("SELECT * FROM m_pengumuman")->result();
              echo json_encode($data);
            } 
            
public function siswakeuangan()
    {
      $nis=$_GET['nis'];    
      $this->db->select('`ppdb_siswa`.namasiswa,`siswa_keuangan`.nominal,`siswa_keuangan`.jenis,`m_biaya`.nama as `biaya`,siswa_keuangan.is_paid');
      $this->db->from('siswa_keuangan');
      $this->db->join('m_biaya', 'm_biaya.id = siswa_keuangan.biaya_id');
      $this->db->join('ppdb_siswa', 'ppdb_siswa.id = siswa_keuangan.siswa_id');
      $this->db->where('ppdb_siswa.nis',$nis);
      $this->db->order_by('biaya', 'ASC');
      $query = $this->db->get()->result_array();
      echo json_encode($query);
    }
//end
}
?>