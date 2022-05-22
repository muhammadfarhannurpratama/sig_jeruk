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
        //CEK LOGIN
        // cek_session_login();
    }

    public function index()
    {
        $this->data['lahan_data'] = $this->lahan->get_all_lahan();
        $this->data['start']        = 0;
        $this->data['title']        = 'Data Lahan';

        $this->data['main_view']	= "frontend/lokasi/lokasi_lahan";
        $this->load->view('frontend/public', $this->data);

    }
    public function retail()
    {
        $this->data['retail_data'] = $this->retail->get_all_retail();
        $this->data['start']        = 0;
        $this->data['title']        = 'Data Retail';

        $this->data['main_view']	= "frontend/lokasi/lokasi_retail";
        $this->load->view('frontend/public', $this->data);

    }

    public function detail($id){
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

    public function mdetail($id){
        $row = $this->lahan->get_by_id_lahan($id);

        if ($row) {
            $this->data['lahan']  = $row;
            $this->data['title'] = $row->nama_pemilik;

            $this->data['main_view']	= "backend/lokasi/lokasi-detail";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function detailretail($id){
        $row = $this->retail->get_by_id_retail($id);
        if ($row) {
            $this->data['retail']  = $row;
            $this->data['title'] = $row->nama_retail;

            $this->data['main_view']	= "frontend/lokasi/lokasi-detail";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
        $this->load->view('frontend/public', $this->data);
    }

    public function mdetailretail($id){
        $row = $this->retail->get_by_id_retail($id);

        if ($row) {
            $this->data['retail']  = $row;
            $this->data['title'] = $row->nama_retail;

            $this->data['main_view']	= "backend/lokasi/lokasi_mdetail";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
        $this->load->view('backend/public', $this->data);
    }

}