<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {

    public $data = array(
        'title'  => 'Kelurahan',
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
        $kelurahan = $this->kelurahan->get_all_kelurahan();

        $this->data['kelurahan_data']   = $kelurahan;
        $this->data['start']            = $start;
        $this->data['title']            = 'Master Kelurahan';

        $this->data['main_view']	= "backend/kelurahan/kelurahan_list";
        $this->load->view('backend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data Kelurahan';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('kelurahan/create_action');
        $this->data['kelurahan_id']      = set_value('kelurahan_id');
        $this->data['kecamatan_id']      = set_value('kecamatan_id');
        $this->data['kelurahan_nama']     = set_value('kelurahan_nama');

        $this->data['kecamatan_data']   = $this->kecamatan->get_all_kecamatan();

        $this->data['main_view']	= "backend/kelurahan/kelurahan_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->kelurahan->get_by_id_kelurahan($id);

        if ($row) {
            $this->data['title'] = 'Update Data Kelurahan';
            $this->data['button']       = 'Update Data';
            $this->data['action']        = site_url('kelurahan/update_action');
            $this->data['kelurahan_id']      = set_value('kelurahan_id');
            $this->data['kecamatan_id']      = set_value('kecamatan_id', $row->kecamatan_id);

            $this->data['kecamatan_data']   = $this->kecamatan->get_all_kecamatan();

            $this->data['kelurahan_nama']     = set_value('kelurahan_nama', $row->kelurahan_nama);

            $this->data['main_view']	= "backend/kelurahan/kelurahan_form";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelurahan'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->kelurahan->get_by_id_kelurahan($id);

        if ($row) {
            $this->kelurahan->delete_kelurahan($id);
            $this->session->set_flashdata('message', 'Hapus data berhasil.');
            redirect(site_url('kelurahan'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan.');
            redirect(site_url('kelurahan'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function create_action(){
        $this->_rules_kelurahan();

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('kelurahan/create'));
        } else {
            $data = array(
                'kelurahan_nama' => $this->input->post('kelurahan_nama',TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
            );

            $this->kelurahan->insert_kelurahan($data);
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            redirect(site_url('kelurahan'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function update_action(){
        $this->_rules_kelurahan();

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('kelurahan/update/'.$this->input->post('kelurahan_id', TRUE)));
        } else {
            //cek apakah input password baru atau tidak
            $data = array(
                'kelurahan_nama' => $this->input->post('kelurahan_nama',TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
            );

            $this->kelurahan->update_kelurahan($this->input->post('kelurahan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Data Berhasil');
            redirect(site_url('kelurahan'));
        }
        $this->load->view('backend/public', $this->data);
    }

    function _rules_kelurahan()
    {
        $this->form_validation->set_rules('kelurahan_nama', ' ', 'trim|required');
        $this->form_validation->set_rules('kelurahan_id', 'kelurahan_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}