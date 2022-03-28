<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variabel extends CI_Controller {

    public $data = array(
        'title'  => 'Variabel',
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
        $variabel = $this->variabel->get_all_variabel();

        $this->data['variabel_data']    = $variabel;
        $this->data['start']            = $start;
        $this->data['title']            = 'Master Variabel';

        $this->data['main_view']	= "backend/variabel/variabel_list";
        $this->load->view('backend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data Variabel';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('variabel/create_action');
        $this->data['id_variabel']  = set_value('id_variabel');
        $this->data['nama_variabel']     = set_value('nama_variabel');
        $this->data['kategori']          = set_value('kategori');
        $this->data['prioritas']          = set_value('prioritas');
        $this->data['nilai_minimum']        = set_value('nilai_minimum');
        $this->data['nilai_maksimum']        = set_value('nilai_maksimum');

        $this->data['main_view']	= "backend/variabel/variabel_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->variabel->get_by_id_variabel($id);

        if ($row) {
            $this->data['title'] = 'Update Data Variabel';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('variabel/update_action');
            $this->data['id_variabel']  = set_value('id_variabel', $row->id_variabel);
            $this->data['nama_variabel']     = set_value('variabel', $row->nama_variabel);
            $this->data['kategori']      	= set_value('min', $row->kategori);
            $this->data['prioritas']          = set_value('max', $row->prioritas);
            $this->data['nilai_minimum']        = set_value('tabel',$row->nilai_minimum);
            $this->data['nilai_maksimum']        = set_value('field',$row->nilai_maksimum);

            $this->data['main_view']	= "backend/variabel/variabel_form";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('variabel'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->variabel->get_by_id_variabel($id);

        if ($row) {
            $this->variabel->delete_variabel($id);
            $this->session->set_flashdata('message', 'Hapus data berhasil.');
            redirect(site_url('variabel'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan.');
            redirect(site_url('variabel'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function create_action(){
        $this->_rules_variabel();

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('variabel/create'));
        } else {
            $data = array(
                'nama_variabel' => $this->input->post('nama_variabel',TRUE),
                'kategori' => $this->input->post('kategori',TRUE),
                'prioritas' => $this->input->post('prioritas',TRUE),
                'nilai_minimum' => $this->input->post('nilai_minimum',TRUE),
                'nilai_maksimum' => $this->input->post('nilai_maksimum',TRUE)
            );

            $this->variabel->insert_variabel($data);
            $this->session->set_flashdata('message', 'Tambah Data Variabel Berhasil');
            redirect(site_url('variabel'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function update_action(){
        $this->_rules_variabel();

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('variabel/update/'.$this->input->post('id_variabel', TRUE)));
        } else {
            //cek apakah input password baru atau tidak
            $data = array(
                'nama_variabel' => $this->input->post('nama_variabel',TRUE),
                'kategori' => $this->input->post('kategori',TRUE),
                'prioritas' => $this->input->post('prioritas',TRUE),
                'nilai_minimum' => $this->input->post('nilai_minimum',TRUE),
                'nilai_maksimum' => $this->input->post('nilai_maksimum',TRUE)
            );

            $this->variabel->update_variabel($this->input->post('id_variabel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Data Berhasil');
            redirect(site_url('variabel'));
        }
        $this->load->view('backend/public', $this->data);
    }

    function _rules_variabel()
    {
        $this->form_validation->set_rules('nama_variabel', ' ', 'trim|required');
        $this->form_validation->set_rules('kategori', ' ', 'trim|required');
        $this->form_validation->set_rules('prioritas', ' ', 'trim|required');
        $this->form_validation->set_rules('nilai_minimum', ' ', 'trim|required');
        $this->form_validation->set_rules('nilai_maksimum', ' ', 'trim|required');

        $this->form_validation->set_rules('id_variabel', 'id_variabel', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}