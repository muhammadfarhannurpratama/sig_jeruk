<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public $data = array(
        'main_view'     => 'frontend/login/login',
        'title'  => 'Login',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
    }

    public function index()
    {
        $this->data['action']           = site_url('login/auth');
        $this->load->view('frontend/public2',$this->data);
    }

    public function auth()
    {
        if($this->login->validasi_login()) {
            $username = $this->input->post('logUser');
            $password = strip_tags($this->input->post('logPass'));

            // query chek users
            $this->db->where('admin_user',$username);
            $users       = $this->db->get('tb_admin');
            if($users->num_rows()>0){
                $user = $users->row_array();
                if(password_verify($password,$user['admin_pass'])){
                    // retrive user data to session
                    $sess_data['loginadmin']      = TRUE;
                    $sess_data['admin_id']          = $user['admin_id'];
                    $sess_data['admin_namalengkap'] = $user['admin_namalengkap'];
                    $sess_data['admin_status']      = $user['admin_status'];
                    $sess_data['admin_user']        = $user['admin_user'];
                    $sess_data['admin_pass']        = $user['admin_pass'];

                    $this->session->set_userdata($sess_data);

                    redirect('Dashboard');
                }else{
                    $this->session->set_flashdata('message', 'Username atau Password salah.');
                    redirect('login');
                }
            }else{
                $this->session->set_flashdata('message','username atau password yang anda input salah');
                redirect('login');
            }

/*


            if($this->login->cek_user_login())
            {
                redirect('home');
            }
            else
            {
                $this->data['pesan']        = 'Username atau Password salah.';
                $this->data['main_view']	= "login";
                $this->session->set_flashdata('message', 'Username atau Password salah.');
                $this->load->view('frontend/public',$this->data);
                redirect('login');
            }*/
        }
        else{
            $this->session->set_flashdata('message', 'Username atau Password salah.');
            $this->load->view('frontend/public2',$this->data);
        }
    }

    public function logout()
    {
        $this->login->logout();
        redirect('login');
    }
}
