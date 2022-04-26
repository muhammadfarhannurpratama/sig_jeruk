<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public $data = array(
        'main_view'     => 'frontend/register/register',
        'title'  => 'Register',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
    }

    public function index()
    {
        $this->data['main_view']	= "frontend/register/register";
        $this->data['action']           = site_url('register/create_action');
        $this->load->view('frontend/public2',$this->data);
    }

    // public function create(){

    //     $this->data['title'] = 'Tambah Data Admin/Pengguna';
    //     $this->data['button']       = 'Tambah Data';
    //     $this->data['action']       = site_url('admin/create_action');
    //     $this->data['admin_id']      = set_value('admin_id');
    //     $this->data['admin_user']     = set_value('admin_user');
    //     $this->data['admin_pass']     = set_value('admin_pass');
    //     $this->data['admin_namalengkap'] = set_value('admin_namalengkap');

    //     $this->data['main_view']	= "frontend/admin/admin_form";
    //     $this->load->view('frontend/public2', $this->data);
    // }
    
    public function create_action(){
        $this->_rules_user();
        $config = [
            'upload_path' => './assets/img/fotouser',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => round(microtime(date('dY')))
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_user')) {
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
            redirect(site_url('register'));
        }else {
            $data = array(
                'user_username' => $this->input->post('user_username',TRUE),
                'user_pass' => password_hash($this->input->post('user_pass',TRUE), PASSWORD_DEFAULT),
                'user_namalengkap' => $this->input->post('user_namalengkap',TRUE),
                'user_status' => 'Pengguna',
                'foto_user' => $foto,
            );

            $this->register->insert_user($data);
            $this->session->set_flashdata('message', 'Register Berhasil');
            redirect(site_url('login'));
        }
        
        $this->session->set_flashdata('message', 'Register Gagal');
        $this->load->view('frontend/public2', $this->data);
    }
    
    function _rules_user()
    {
        $this->form_validation->set_rules('user_username', ' ', 'trim|required');
        $this->form_validation->set_rules('user_pass', ' ', 'trim');
        $this->form_validation->set_rules('user_namalengkap', ' ', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}