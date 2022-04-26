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
            $this->db->where('user_username',$username);
            $users       = $this->db->get('tb_user');
            if($users->num_rows()>0){
                $user = $users->row_array();
                if(password_verify($password,$user['user_pass'])){
                    // retrive user data to session
                    $sess_data['loginadmin']      = TRUE;
                    $sess_data['user_id']          = $user['user_id'];
                    $sess_data['user_namalengkap'] = $user['user_namalengkap'];
                    $sess_data['user_status']      = $user['user_status'];
                    $sess_data['user_username']        = $user['user_user'];
                    $sess_data['user_pass']        = $user['user_pass'];

                    $this->session->set_userdata($sess_data);

                    // redirect('Dashboard');
                    if ($this->session->userdata('user_status')=='Pengguna') {
                        redirect('Home');
                        }
                    else{
                        redirect('Dashboard');
                    }

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
        redirect('home');
    }
}