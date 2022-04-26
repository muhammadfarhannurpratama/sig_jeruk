<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $data = array(
        'main_view'     => 'frontend/home/home',
        'title'  => 'Selamat Datang',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
    }

    public function index()
    {
        $this->data['kecamatan']        = '';
        $this->data['action']           = site_url('home/filter');
        $this->data['kecamatan_data']   = $this->kecamatan->get_all_kecamatan();
        $this->data['lahan_data']     = $this->lahan->get_all_lahan();
        $this->data['retail_data']     = $this->retail->get_all_retail();
        $this->load->view('frontend/public',$this->data);
    }

    public function filter()
    {
        if($this->input->post('kecamatan'))
        {
            $kecamatan = $this->input->post('kecamatan');
            if($kecamatan == 'all'){
                redirect('home');
            } else {
                $this->session->set_userdata(
                    array('kecamatan' => $this->input->post('kecamatan',TRUE))
                );

                $this->data['action']           = site_url('home/filter');
                $this->data['kecamatan_data']   = $this->kecamatan->get_all_kecamatan();
                $this->data['lahan_data']     = $this->lahan->get_all_lahan_cari($kecamatan);

                $this->data['main_view'] = 'frontend/home/home';
                $this->data['title']     = 'Filter Data';

                $this->load->view('frontend/public',$this->data);
            }
        }
        else{
            redirect('home');
        }
    }

}