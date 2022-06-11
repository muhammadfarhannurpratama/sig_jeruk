<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LimitRetail extends CI_Controller {

    public $data = array(
        'title'  => 'Limit Stok Retail',
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
        $limitretail = $this->limitretail->get_all_limit();

        $this->data['limitretail_data']      = $limitretail;
        $this->data['start']            = $start;
        $this->data['title']            = 'Limit Stok retail';

        $this->data['main_view']	= "backend/limitstok/limitretail_list";
        $this->load->view('backend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data Limit';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('limitretail/create_action');
        $this->data['id_limitretail']      = set_value('id_limitretail');
        $this->data['limitstok']     = set_value('limitstok');
        

        $this->data['main_view']	= "backend/limitstok/limitretail_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->limitretail->get_by_id_limit($id);

        if ($row) {
            $this->data['title'] = 'Update Data Limit';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('limitretail/update_action');
            $this->data['id_limitretail']      = set_value('id_limiteretail', $row->id_limitretail);
            $this->data['limitstok']     = set_value('limitstok', $row->limitstok);

            $this->data['main_view']	= "backend/limitstok/limitretail_form";
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Record Not Found</h6>
        </div>');
            redirect(site_url('Limitretail'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->limitretail->get_by_id_limit($id);

        if ($row) {
            $this->limitretail->delete_limit($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Hapus Data Berhasil</h6>
        </div>');
            redirect(site_url('limitretail'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Tidak Ditemukan</h6>
        </div>');
            redirect(site_url('limitretail'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function create_action(){


        $this->_rules_limit();

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('limitretail/create'));
        } else {
            $data = array(
                'limitstok' => $this->input->post('limitstok',TRUE),
            );

            $this->limitretail->insert_limit($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Tambah Data Berhasil</h6>
        </div>');
            redirect(site_url('limitretail'));
        }
        $this->load->view('backend/public', $this->data);
    }
    
    public function update_action(){
        $this->_rules_limit();

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('limitretail/update/'.$this->input->post('id_limitretail', TRUE)));
      
        } else {
            //cek apakah input password baru atau tidak
            $data = array(
                'limitstok' => $this->input->post('limitstok',TRUE),
            );
        

            $this->limitretail->update_limit($this->input->post('id_limitretail', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Edit Data Berhasil</h6>
        </div>');
            redirect(site_url('limitretail'));
        }

        $this->load->view('backend/public', $this->data);
    }

    function _rules_limit()
    {
        $this->form_validation->set_rules('limitstok', ' ', 'trim|required');

        $this->form_validation->set_rules('id_limitretail', 'id_limitretail', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}