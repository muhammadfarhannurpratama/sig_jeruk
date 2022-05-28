<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public $data = array(
        'title'  => 'User',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        //cek_session_login();
    }

    public function index()
    {
        $start = 0;
        $user = $this->user->get_all_user();

        $this->data['user_data']   = $user;
        $this->data['start']        = $start;
        $this->data['title'] = 'Master User';

        $this->data['main_view']	= "backend/user/user_list";
        $this->load->view('backend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data User';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('user/create_action');
        $this->data['user_id']      = set_value('user_id');
        $this->data['user_username']     = set_value('user_username');
        $this->data['user_pass']     = set_value('user_pass');
        $this->data['user_namalengkap'] = set_value('user_namalengkap');
        $this->data['user_status']         = set_value('user_status');
        $this->data['option_user_status']  = array(
            'Administrator' => 'Administrator',
            'Petani'          => 'Petani',
            'Retail'          => 'Retail',
        );

        $this->data['main_view']	= "backend/user/user_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->user->get_by_id_user($id);

        if ($row) {
            $this->data['title'] = 'Update Data User';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('user/update_action');
            $this->data['user_id']      = set_value('user_id', $row->user_id);
            $this->data['user_username']     = set_value('user_username', $row->user_username);
            $this->data['user_namalengkap'] = set_value('user_namalengkap', $row->user_namalengkap);
            $this->data['user_status']         = set_value('user_status', $row->user_status);
            $this->data['option_user_status']  = array(
                'Administrator' => 'Administrator',
                'Petani'          => 'Petani',
                'Retail'          => 'Retail',
            );

            $this->data['main_view']	= "backend/user/user_form";
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Record Not Found</h6>
        </div>');
            redirect(site_url('user'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->user->get_by_id_user($id);

        if ($row) {
            $this->user->delete_user($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Hapus data berhasil</h6>
        </div>');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data tidak ditemukan</h6>
        </div>');
            redirect(site_url('user'));
        }
        $this->load->view('backend/public', $this->data);
    }
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
            redirect(site_url('user/create'));
        } else {
            $data = array(
                'user_username' => $this->input->post('user_username',TRUE),
                'user_pass' => password_hash($this->input->post('user_pass',TRUE), PASSWORD_DEFAULT),
                'user_namalengkap' => $this->input->post('user_namalengkap',TRUE),
                'user_status' => $this->input->post('user_status',TRUE),
                'foto_user' => $foto,
            );

            $this->user->insert_user($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Tambah Data Berhasil</h6>
        </div>');
            redirect(site_url('user'));
        }
        $this->load->view('backend/public', $this->data);
    }
    
    public function update_action(){
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
            redirect(site_url('user/update/'.$this->input->post('user_id', TRUE)));
        } else {
            //cek apakah input password baru atau tidak
            if (strip_tags($this->input->post('user_pass', TRUE) != "")){
                $data = array(
                    'user_user' => $this->input->post('user_user',TRUE),
                    'user_pass' => password_hash($this->input->post('user_pass',TRUE), PASSWORD_DEFAULT),
                    'user_namalengkap' => $this->input->post('user_namalengkap',TRUE),
                    'user_status' => $this->input->post('user_status',TRUE),
                    'foto_user' => $foto,
                );

            }else {
                $data = array(
                    'user_username' => $this->input->post('user_username',TRUE),
                    'user_namalengkap' => $this->input->post('user_namalengkap',TRUE),
                    'user_status' => $this->input->post('user_status',TRUE),
                    'foto_user' => $foto,
                );
            }
            $this->user->update_user($this->input->post('user_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Edit Data Berhasil</h6>
        </div>');
            redirect(site_url('user'));
        }
        $this->load->view('backend/public', $this->data);
    }

    function _rules_user()
    {
        $this->form_validation->set_rules('user_username', ' ', 'trim|required');
        $this->form_validation->set_rules('user_pass', ' ', 'trim');
        $this->form_validation->set_rules('user_namalengkap', ' ', 'trim|required');
        $this->form_validation->set_rules('user_status', ' ', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}