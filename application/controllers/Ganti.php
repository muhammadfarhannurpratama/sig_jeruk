<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti extends CI_Controller {

    public $data = array(
        'title'  => 'Ganti Password',
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
            $this->data['title']     = 'Ganti Password';
            $this->data['button']           = 'Update Password';
            $this->data['action']           = site_url('ganti/update_password');
            $this->data['main_view']        = 'backend/user/gantipassword';
            $this->load->view('backend/public', $this->data);
    }

    public function update_password()
    {
        $pass_lama = strip_tags($this->input->post('password_lama',TRUE));
        $pass_baru = strip_tags($this->input->post('password_baru',TRUE));
        $pass_conf = strip_tags($this->input->post('password_confirm',TRUE));

        if(password_verify($pass_lama,$this->session->userdata('user_pass'))){
            if($pass_baru == $pass_conf){

                $data = array(
                    'user_pass' => password_hash($pass_baru, PASSWORD_DEFAULT)
                );

                $this->user->update_password($this->input->post('user_id', TRUE), $data);

                $this->session->set_flashdata('message', 'Sukses Ganti Password');
                redirect(site_url('ganti'));
            }
            else{
                $this->session->set_flashdata('message','Konfirmasi Password harus sama dengan Password Baru');
                redirect(site_url('ganti'));
            }
        }
        else {
            $this->session->set_flashdata('message','Password Lama harus sama dengan password yang sebelumnya');
            redirect(site_url('ganti'));
        }
    }
}