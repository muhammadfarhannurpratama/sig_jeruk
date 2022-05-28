<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $data = array(
        'title'  => 'Dashboard',
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

        $kecamatan = $this->kecamatan->get_all_kecamatan();
        $kecamatan1 = $this->kecamatan->get_total();
        $kelurahan = $this->kelurahan->get_total();
        $lahan = $this->lahan->get_all_lahan();
        $this->data['retail_data']     = $this->retail->get_all_retail();
        $lahan1 = $this->lahan->get_total();
        $jeruk = $this->jeruk->get_total();
        
         
        $this->data['kecamatan_data']   = $kecamatan;
        $this->data['total_kecamatan']   = $kecamatan1;
        $this->data['total_kelurahan']   = $kelurahan;
        $this->data['lahan_data']   = $lahan;
        $this->data['total_lahan']   = $lahan1;
        $this->data['total_jeruk']   = $jeruk;
        $this->data['title']            = 'Dashboard';

        $this->data['main_view']	= "backend/user/dashboard";
        $this->load->view('backend/public', $this->data);

    }
}