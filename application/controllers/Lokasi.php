<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

    public $data = array(
        'title'  => 'Data Lahan',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
    }

    public function index()
    {
        $this->data['lahan_data'] = $this->lahan->get_all_lahan();
        $this->data['start']        = 0;
        $this->data['title']        = 'Data Lahan';

        $this->data['main_view']	= "frontend/lokasi/lokasi";
        $this->load->view('frontend/public', $this->data);

    }

    public function detail($id){
        $row = $this->lahan->get_by_id_lahan($id);

        if ($row) {
            $this->data['lahan']  = $row;
            $this->data['title'] = $row->nama_pemilik;

            $this->data['main_view']	= "frontend/lokasi/lokasi-detail";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
        $this->load->view('frontend/public', $this->data);
    }

    public function mdetail($id){
        $row = $this->lahan->get_by_id_lahan($id);

        if ($row) {
            $this->data['lahan']  = $row;
            $this->data['title'] = $row->nama_pemilik;

            $this->data['main_view']	= "frontend/lokasi/lokasi_mdetail";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
        $this->load->view('frontend/public', $this->data);
    }

}