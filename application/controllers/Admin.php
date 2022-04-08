<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $data = array(
        'title'  => 'Admin Admin',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        //cek_session_login();
    }

    public function index()
    {
        $start = 0;
        $admin = $this->admin->get_all_admin();

        $this->data['admin_data']   = $admin;
        $this->data['start']        = $start;
        $this->data['title'] = 'Master User/Pengguna';

        $this->data['main_view']	= "frontend/admin/admin_list";
        $this->load->view('frontend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data Admin/Pengguna';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('admin/create_action');
        $this->data['admin_id']      = set_value('admin_id');
        $this->data['admin_user']     = set_value('admin_user');
        $this->data['admin_pass']     = set_value('admin_pass');
        $this->data['admin_namalengkap'] = set_value('admin_namalengkap');
        $this->data['admin_status']         = set_value('admin_status');
        $this->data['option_admin_status']  = array(
            'Administrator' => 'Administrator',
            'User'          => 'User',
        );

        $this->data['main_view']	= "frontend/admin/admin_form";
        $this->load->view('frontend/public', $this->data);
    }

    public function update($id){
        $row = $this->admin->get_by_id_admin($id);

        if ($row) {
            $this->data['title'] = 'Update Data Admin/Pengguna';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('admin/update_action');
            $this->data['admin_id']      = set_value('admin_id', $row->admin_id);
            $this->data['admin_user']     = set_value('admin_user', $row->admin_user);
            $this->data['admin_namalengkap'] = set_value('admin_namalengkap', $row->admin_namalengkap);
            $this->data['admin_status']         = set_value('admin_status', $row->admin_status);
            $this->data['option_admin_status']  = array(
                'Administrator' => 'Administrator',
                'User'          => 'User',
            );

            $this->data['main_view']	= "frontend/admin/admin_form";
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
        $this->load->view('frontend/public', $this->data);
    }

    public function delete($id){
        $row = $this->admin->get_by_id_admin($id);

        if ($row) {
            $this->admin->delete_admin($id);
            $this->session->set_flashdata('message', 'Hapus data berhasil.');
            redirect(site_url('admin'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan.');
            redirect(site_url('admin'));
        }
        $this->load->view('frontend/public', $this->data);
    }
    public function create_action(){
        $this->_rules_admin();

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('admin/create'));
        } else {
            $data = array(
                'admin_user' => $this->input->post('admin_user',TRUE),
                'admin_pass' => password_hash($this->input->post('admin_pass',TRUE), PASSWORD_DEFAULT),
                'admin_namalengkap' => $this->input->post('admin_namalengkap',TRUE),
                'admin_status' => $this->input->post('admin_status',TRUE),
            );

            $this->admin->insert_admin($data);
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            redirect(site_url('admin'));
        }
        $this->load->view('frontend/public', $this->data);
    }
    public function update_action(){
        $this->_rules_admin();

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('admin/update/'.$this->input->post('admin_id', TRUE)));
        } else {
            //cek apakah input password baru atau tidak
            if (strip_tags($this->input->post('admin_pass', TRUE) != "")){
                $data = array(
                    'admin_user' => $this->input->post('admin_user',TRUE),
                    'admin_pass' => password_hash($this->input->post('admin_pass',TRUE), PASSWORD_DEFAULT),
                    'admin_namalengkap' => $this->input->post('admin_namalengkap',TRUE),
                    'admin_status' => $this->input->post('admin_status',TRUE),
                );

            }else {
                $data = array(
                    'admin_user' => $this->input->post('admin_user',TRUE),
                    'admin_namalengkap' => $this->input->post('admin_namalengkap',TRUE),
                    'admin_status' => $this->input->post('admin_status',TRUE),
                );
            }

            $this->admin->update_admin($this->input->post('admin_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Data Berhasil');
            redirect(site_url('admin'));
        }
        $this->load->view('frontend/public', $this->data);
    }

    function _rules_admin()
    {
        $this->form_validation->set_rules('admin_user', ' ', 'trim|required');
        $this->form_validation->set_rules('admin_pass', ' ', 'trim');
        $this->form_validation->set_rules('admin_namalengkap', ' ', 'trim|required');
        $this->form_validation->set_rules('admin_status', ' ', 'trim|required');

        $this->form_validation->set_rules('admin_id', 'admin_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}