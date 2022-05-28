<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeruk extends CI_Controller {

    public $data = array(
        'title'  => 'Jeruk',
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
        $start = 0;
        $jeruk = $this->jeruk->get_all_jeruk();

        $this->data['jeruk_data']      = $jeruk;
        $this->data['start']            = $start;
        $this->data['title']            = 'Master Jeruk';

        $this->data['main_view']	= "backend/jeruk/jeruk_list";
        $this->load->view('backend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data jeruk';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('jeruk/create_action');
        $this->data['id_jeruk']      = set_value('id_jeruk');
        $this->data['jeruk_nama']     = set_value('jeruk_nama');
        

        $this->data['main_view']	= "backend/jeruk/jeruk_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->jeruk->get_by_id_jeruk($id);

        if ($row) {
            $this->data['title'] = 'Update Data Jeruk';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('jeruk/update_action');
            $this->data['id_jeruk']      = set_value('id_jeruk', $row->id_jeruk);
            $this->data['jeruk_nama']     = set_value('jeruk_nama', $row->jeruk_nama);

            $this->data['main_view']	= "backend/jeruk/jeruk_form";
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Record Not Found</h6>
        </div>');
            redirect(site_url('jeruk'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->jeruk->get_by_id_jeruk($id);

        if ($row) {
            $this->jeruk->delete_jeruk($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Hapus Data Berhasil</h6>
        </div>');
            redirect(site_url('jeruk'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Tidak Ditemukan</h6>
        </div>');
            redirect(site_url('jeruk'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function create_action(){


        $this->_rules_jeruk();

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('jeruk/create'));
        } else {
            $data = array(
                'jeruk_nama' => $this->input->post('jeruk_nama',TRUE),
            );

            $this->jeruk->insert_jeruk($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Tambah Data Berhasil</h6>
        </div>');
            redirect(site_url('jeruk'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function update_action(){
        $this->_rules_jeruk();

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('jeruk/update/'.$this->input->post('id_jeruk', TRUE)));
      
        } else {
            //cek apakah input password baru atau tidak
            $data = array(
                'jeruk_nama' => $this->input->post('jeruk_nama',TRUE),
            );
        

            $this->jeruk->update_jeruk($this->input->post('id_jeruk', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Edit Data Berhasil</h6>
        </div>');
            redirect(site_url('jeruk'));
        }

        $this->load->view('backend/public', $this->data);
    }

    function _rules_jeruk()
    {
        $this->form_validation->set_rules('jeruk_nama', ' ', 'trim|required');

        $this->form_validation->set_rules('id_jeruk', 'id_jeruk', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}