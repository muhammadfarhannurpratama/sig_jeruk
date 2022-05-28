<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retail extends CI_Controller {

    public $data = array(
        'title'  => 'Retail',
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
        $retail = $this->retail->get_all_retail();

        $this->data['retail_data']   = $retail;
        $this->data['start']        = $start;
        $this->data['title'] = 'Master Retail';

        $this->data['main_view']	= "backend/retail/retail_list";
        $this->load->view('backend/public', $this->data);

    }


    public function create(){

        $this->data['title'] = 'Tambah Data Retail';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('retail/create_action');
        $this->data['id_retail']      = set_value('id_retail');
        $this->data['nama_retail']     = set_value('nama_retail');
        $this->data['stok']     = set_value('stok');
        $this->data['limitstok']     = set_value('limitstok');
        $this->data['lokasi_retail']     = set_value('lokasi_retail');
        $this->data['no_hp']     = set_value('no_hp');
        $this->data['id_jeruk']     = set_value('id_jeruk');
        $this->data['berat']     = set_value('berat');
        $this->data['harga_beli']     = set_value('harga_beli');
        $this->data['harga_jual']      = set_value('harga_jual');
        $this->data['user_id']     = set_value('user_id');
        $this->data['data_user']   = $this->user->get_all_user_retail();

       
        $this->data['latitude']     = set_value('latitude');
        $this->data['longitude']     = set_value('longitude');
        $this->data['jeruk_data']   = $this->jeruk->get_all_jeruk();


        $this->data['main_view']	= "backend/retail/retail_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->retail->get_by_id_retail($id);

        if ($row) {
            $this->data['title'] = 'Update Data retail';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('retail/update_action');
            $this->data['id_retail']      = set_value('id_retail', $row->id_retail);
            $this->data['nama_retail']     = set_value('nama_retail', $row->nama_retail);
            $this->data['lokasi_retail']     = set_value('lokasi_retail', $row->lokasi_retail);
            $this->data['no_hp']     = set_value('no_hp', $row->no_hp);
            $this->data['id_jeruk']     = set_value('id_jeruk', $row->id_jeruk);
            $this->data['berat']     = set_value('berat', $row->berat);
            $this->data['stok']     = set_value('stok', $row->stok);
            $this->data['limitstok']     = set_value('limitstok', $row->limitstok);
            $this->data['harga_jual']     = set_value('harga_jual', $row->harga_jual);
            $this->data['harga_beli']     = set_value('harga_beli', $row->harga_beli);
            $this->data['latitude']     = set_value('latitude', $row->latitude);
            $this->data['longitude']     = set_value('longitude', $row->longitude);
            $this->data['user_id']     = set_value('user_id');
            $this->data['data_user']   = $this->user->get_all_user_retail();
            $this->data['jeruk_data']   = $this->jeruk->get_all_jeruk();

            $this->data['main_view']	= "backend/retail/retail_form";
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Record Not Found</h6>
        </div>');
            redirect(site_url('retail'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->retail->get_by_id_retail($id);

        if ($row) {
            $this->retail->delete_retail($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Hapus Data Berhasil</h6>
        </div>');
            redirect(site_url('retail'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Tidak Ditemukan</h6>
        </div>');
            redirect(site_url('retail'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function create_action(){
        $this->_rules_retail();
        $config = [
            'upload_path' => './assets/img/fotoretail',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => round(microtime(date('dY')))
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $response = [
                'status' => 'error',
                'message' => $this->upload->display_errors()
            ];

            $this->session->set_flashdata('response', $response);
        }

        $data_foto = $this->upload->data();
        $foto = $data_foto['file_name'];

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            redirect(site_url('retail/create'));
        } else {
            $data = array(
                'nama_retail' => $this->input->post('nama_retail',TRUE),
                'lokasi_retail' => $this->input->post('lokasi_retail',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
                'id_jeruk' => $this->input->post('id_jeruk',TRUE),
                'berat' => $this->input->post('berat',TRUE),
                'stok' => $this->input->post('stok',TRUE),
                'limitstok' => $this->input->post('limitstok',TRUE),
                'harga_jual' => $this->input->post('harga_jual',TRUE),
                'harga_beli' => $this->input->post('harga_beli',TRUE),
                'latitude' => $this->input->post('latitude',TRUE),
                'longitude' => $this->input->post('longitude',TRUE),
                'user_id' => $this->input->post('user_id',TRUE),
                'foto_retail' => $foto,
            );

            $this->retail->insert_retail($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Tambah Data Berhasil</h6>
        </div>');
            redirect(site_url('retail'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function update_action(){
        $this->_rules_retail();

        $config = [
            'upload_path' => './assets/img/fotoretail',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => round(microtime(date('dY')))
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $response = [
                'status' => 'error',
                'message' => $this->upload->display_errors()
            ];

            $this->session->set_flashdata('response', $response);
        }

        $data_foto = $this->upload->data();
        $foto = $data_foto['file_name'];

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('retail/update/'.$this->input->post('id_retail', TRUE)));
        } else {
            //cek apakah input password baru atau tidak
            $data = array(
                'nama_retail' => $this->input->post('nama_retail',TRUE),
                'lokasi_retail' => $this->input->post('lokasi_retail',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
                'id_jeruk' => $this->input->post('id_jeruk',TRUE),
                'berat' => $this->input->post('berat',TRUE),
                'stok' => $this->input->post('stok',TRUE),
                'limitstok' => $this->input->post('limitstok',TRUE),
                'harga_jual' => $this->input->post('harga_jual',TRUE),
                'harga_beli' => $this->input->post('harga_beli',TRUE),
                'latitude' => $this->input->post('latitude',TRUE),
                'longitude' => $this->input->post('longitude',TRUE),
                'user_id' => $this->input->post('user_id',TRUE),
                'foto_retail' => $foto,
            );

            $this->retail->update_retail($this->input->post('id_retail', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Edit Data Berhasil</h6>
        </div>');
            redirect(site_url('retail'));
        }
        $this->load->view('backend/public', $this->data);
    }

    function _rules_retail()
    {
        $this->form_validation->set_rules('nama_retail', ' ', 'trim|required');
        $this->form_validation->set_rules('lokasi_retail', ' ', 'trim|required');
        $this->form_validation->set_rules('no_hp', ' ', 'trim');
        $this->form_validation->set_rules('id_jeruk', ' ', 'trim');

        $this->form_validation->set_rules('berat', ' ', 'trim|required');
        $this->form_validation->set_rules('stok', ' ', 'trim|required');
        $this->form_validation->set_rules('limitstok', ' ', 'trim|required');
        $this->form_validation->set_rules('harga_beli', ' ', 'trim|required');
        $this->form_validation->set_rules('harga_jual', ' ', 'trim|required');
       
        $this->form_validation->set_rules('longitude', ' ', 'trim|required');
        $this->form_validation->set_rules('latitude', ' ', 'trim|required');
        $this->form_validation->set_rules('user_id', ' ', 'trim|required');

        $this->form_validation->set_rules('id_retail', 'id_retail', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}