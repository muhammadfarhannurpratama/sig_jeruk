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

        if (!$this->upload->do_upload('foto')) {
            $response = [
                'status' => 'error',
                'message' => $this->upload->display_errors()
            ];

            $this->session->set_flashdata('response', $response);
            return redirect('user');
        }

        $data_foto = $this->upload->data();
        $data['foto_user'] = $data_foto['file_name'];
        // $result = $this->user->update_data($this->session->id_user, $data);
        $this->db->set('foto_user',$data['foto_user']);
        $this->db->where('user_id',$this->session->user_id);
        $result=$this->db->update('tb_user');
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Foto Profil berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Foto Profil gagal diubah!'
            ];
            unlink($data_foto['full_path']);
        }
        
        $this->session->set_flashdata('response', $response);
        redirect('user');
    }
    
}