<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public $data = array(
        'main_view'     => 'frontend/kontak/kontak',
    );

    public function __construct()
    {
        parent::__construct();

        $this->data['iden_data']      = $this->identitas->get_identitas('1');
    }

    public function index()
    {
        $this->data['action']           = site_url('kontak/proses_hubungi');
        $this->data['captcha']          = $this->recaptcha->getWidget();
        $this->data['script_captcha']   = $this->recaptcha->getScriptTag();

        $this->data['title'] = 'Kontak Kami';

        $this->load->view('frontend/public',$this->data);
    }

    public function proses_hubungi(){

        // validasi form
        $this->_rules_hubungi();

        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);

        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $this->session->set_flashdata('message', 'Pengisian Formulir Kontak Kami Gagal!');
            redirect(site_url('kontak/'));
        } else {

            //konfigurasi email
            $config = array();
            $config['charset'] = 'iso-8859-1';
            $config['useragent'] = 'SIG Pemetaan Lahan Jeruk'; //bebas sesuai keinginan kamu
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://mail..com";
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "5";
            $config['smtp_user']= "@gmail.com";//isi dengan email kamu
            $config['smtp_pass']= ""; // isi dengan password kamu
            $config['crlf']="\r\n";
            $config['newline']="\r\n";

            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $row = $this->identitas->get_identitas();
            $email = $row['email_website'];

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from("@gmail.com","SIG Pemetaan Lahan jeruk");
            $this->email->to($email);
            $this->email->cc($this->input->post('email'));
            $this->email->subject($this->input->post('subjek'));
            $this->email->message($this->input->post('pesan'));

            if($this->email->send()){
                $this->session->set_flashdata('message', 'Pengisian Formulir Kontak Kami Berhasil!');
                redirect(site_url('kontak/'));
            }
            else {
                $this->session->set_flashdata('message', $this->email->print_debugger());
                redirect(site_url('kontak/'));
            }
        }
    }

    function _rules_hubungi()
    {
        $this->form_validation->set_rules('nama', ' ', 'trim|required');
        $this->form_validation->set_rules('email', ' ', 'trim|required');
        $this->form_validation->set_rules('subjek', ' ', 'trim|required');
        $this->form_validation->set_rules('pesan', ' ', 'trim|required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
    }
}