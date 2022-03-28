<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

    public $data = array(
        'title'  => 'Kecamatan',
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
        $kecamatan = $this->kecamatan->get_all_kecamatan();

        $this->data['kecamatan_data']   = $kecamatan;
        $this->data['start']            = $start;
        $this->data['title']            = 'Master Kecamatan';

        $this->data['main_view']	= "backend/kecamatan/kecamatan_list";
        $this->load->view('backend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data Kecamatan';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('kecamatan/create_action');
        $this->data['kecamatan_id']      = set_value('kecamatan_id');
        $this->data['kecamatan_nama']     = set_value('kecamatan_nama');

        $this->data['main_view']	= "backend/kecamatan/kecamatan_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->kecamatan->get_by_id_kecamatan($id);

        if ($row) {
            $this->data['title'] = 'Update Data Kecamatan';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('kecamatan/update_action');
            $this->data['kecamatan_id']      = set_value('kecamatan_id', $row->kecamatan_id);
            $this->data['kecamatan_nama']     = set_value('kecamatan_nama', $row->kecamatan_nama);

            $this->data['main_view']	= "backend/kecamatan/kecamatan_form";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->kecamatan->get_by_id_kecamatan($id);

        if ($row) {
            $this->kecamatan->delete_kecamatan($id);
            $this->session->set_flashdata('message', 'Hapus data berhasil.');
            redirect(site_url('kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan.');
            redirect(site_url('kecamatan'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function create_action(){
        $this->_rules_kecamatan();

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('kecamatan/create'));
        } else {
            $data = array(
                'kecamatan_nama' => $this->input->post('kecamatan_nama',TRUE),
            );

            $this->kecamatan->insert_kecamatan($data);
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            redirect(site_url('kecamatan'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function update_action(){
        $this->_rules_kecamatan();

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('kecamatan/update/'.$this->input->post('kecamatan_id', TRUE)));
        } else {
            //cek apakah input password baru atau tidak
            $data = array(
                'kecamatan_nama' => $this->input->post('kecamatan_nama',TRUE),
            );

            $this->kecamatan->update_kecamatan($this->input->post('kecamatan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Data Berhasil');
            redirect(site_url('kecamatan'));
        }
        $this->load->view('backend/public', $this->data);
    }

    function _rules_kecamatan()
    {
        $this->form_validation->set_rules('kecamatan_nama', ' ', 'trim|required');

        $this->form_validation->set_rules('kecamatan_id', 'kecamatan_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}