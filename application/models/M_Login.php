<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function load_form_rules()
    {
        $form_rules = array(
            array('field' => 'logUser','label' => 'Username','rules' => 'required'),
            array('field' => 'logPass','label' => 'Password','rules' => 'required'),
        );
        return $form_rules;
    }
    public function validasi_login()
    {
        $form = $this->load_form_rules();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array(
            'admin_id' => '',
            'admin_namalengkap' => '',
            'admin_status' => '',
            'admin_user' => '',
            'admin_pass' => '',
            'loginadmin' => FALSE));
        $this->session->sess_destroy();
    }

}