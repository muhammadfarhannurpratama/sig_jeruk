<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterRetail extends CI_Controller {

    public $data = array(
        'main_view'     => 'frontend/register/registerretail',
        'title'  => 'Register',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
    }

    public function index()
    {
        $this->data['main_view']	= "frontend/register/registerretail";
        $this->data['action']           = site_url('registerretail/create_action');
        $this->load->view('frontend/public2',$this->data);
    }
    
    public function create_action(){
        $this->_rules_user();
        $config = [
            'upload_path' => './assets/img/fotoretail',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => round(microtime(date('dY')))
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_retail')) {
            $response = [
                'status' => 'error',
                'message' => $this->upload->display_errors()
            ];

            $this->session->set_flashdata('response', $response);
        }

        $data_foto = $this->upload->data();
        $foto = $data_foto['file_name'];

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('registerretail'));
        }else {
            $data = array(
                'user_username' => $this->input->post('user_username',TRUE),
                'user_pass' => password_hash($this->input->post('user_pass',TRUE), PASSWORD_DEFAULT),
                'user_namalengkap' => $this->input->post('nama_retail',TRUE),
                'user_status' => 'Retail',
                'foto_user' => $foto,
            );
            $this->register->insert_user($data);
            $user_id = $this->db->insert_id();
            $data2 = array(
                'id_retail' => $user_id,
                'nama_retail' => $this->input->post('nama_retail',TRUE),
                'lokasi_retail' => $this->input->post('lokasi_retail',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
                'latitude' => $this->input->post('latitude',TRUE),
                'longitude' => $this->input->post('longitude',TRUE),
                'user_id' => $user_id,
                'stok' => 0,
                'foto_retail' => $foto,
                'status_aktif' => 2,
            );
            $this->retail->insert_retail($data2);
            
            $this->session->set_flashdata('message', 'Register Berhasil');
            redirect(site_url('login'));
        }
        
        $this->session->set_flashdata('message', 'Register Gagal');
        $this->load->view('frontend/public2', $this->data);
    }
    
    function _rules_user()
    {
        $this->form_validation->set_rules('nama_retail', ' ', 'trim|required');
        $this->form_validation->set_rules('lokasi_retail', ' ', 'trim|required');
        $this->form_validation->set_rules('no_hp', ' ', 'trim');       
        $this->form_validation->set_rules('longitude', ' ', 'trim|required');
        $this->form_validation->set_rules('latitude', ' ', 'trim|required');

        $this->form_validation->set_rules('user_username', ' ', 'trim|required');
        $this->form_validation->set_rules('user_pass', ' ', 'trim');
        // $this->form_validation->set_rules('user_namalengkap', ' ', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}