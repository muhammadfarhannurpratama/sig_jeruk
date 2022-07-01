<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantifoto extends CI_Controller {

    public $data = array(
        'title'  => 'Ganti Foto',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        cek_session_login();
    }

    public function index()
    {
            $user = $this->user->get_all_user();
            $this->data['user_data']   = $user;
            $this->data['title']            = 'Ganti foto';
            $this->data['button']           = 'Update Foto';
            $this->data['action']           = site_url('gantifoto/update_foto');
            $this->data['main_view']        = 'backend/user/gantifoto';
            $this->load->view('backend/public', $this->data);
    }


    public function update_foto()
    {
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
            return redirect('Gantifoto');
        }

        $data_foto = $this->upload->data();
        $foto = $data_foto['file_name'];
        // $result = $this->user->update_data($this->session->id_user, $data);
        $data = array(
            'foto_user' => $foto,
        );
    $this->user->update_user($this->input->post('user_id', TRUE), $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
<h6> <i class="icon fas fa-check"></i>Edit Foto Berhasil</h6>
</div>');
        redirect('Gantifoto');
    }
    
}