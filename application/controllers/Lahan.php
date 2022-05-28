<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lahan extends CI_Controller {

    public $data = array(
        'title'  => 'Lahan',
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
        $lahan = $this->lahan->get_all_lahan();

        $this->data['lahan_data']   = $lahan;
        $this->data['start']        = $start;
        $this->data['title'] = 'Master Lahan';

        $this->data['main_view']	= "backend/lahan/lahan_list";
        $this->load->view('backend/public', $this->data);

    }

    public function create(){

        $this->data['title'] = 'Tambah Data Lahan';
        $this->data['button']       = 'Tambah Data';
        $this->data['action']       = site_url('lahan/create_action');
        $this->data['id_lahan']      = set_value('id_lahan');
        $this->data['nama_pemilik']     = set_value('nama_pemilik');
        $this->data['lokasi_lahan']     = set_value('lokasi_lahan');
        $this->data['no_hp']     = set_value('no_hp');
        $this->data['id_jeruk']     = set_value('id_jeruk');

        $this->data['luas_lahan']     = set_value('luas_lahan');
        $this->data['jumlah_panen']     = set_value('jumlah_panen');
        $this->data['harga_jeruk']      = set_value('harga_jeruk');
        $this->data['tanggal_panen']      = set_value('tanggal_panen');
        $this->data['latitude']     = set_value('latitude');
        $this->data['longitude']     = set_value('longitude');
        $this->data['kecamatan_id']     = set_value('kecamatan_id');
        $this->data['kelurahan_id']     = set_value('kelurahan_id');
        $this->data['user_id']     = set_value('user_id');
        $this->data['data_user']   = $this->user->get_all_user_petani();

        $this->data['kecamatan_data']   = $this->kecamatan->get_all_kecamatan();
        $this->data['jeruk_data']   = $this->jeruk->get_all_jeruk();
        $this->data['kelurahan_data']    = $this->kelurahan->get_all_kelurahan();


        $this->data['main_view']	= "backend/lahan/lahan_form";
        $this->load->view('backend/public', $this->data);
    }

    public function update($id){
        $row = $this->lahan->get_by_id_lahan($id);

        if ($row) {
            $this->data['title'] = 'Update Data lahan';
            $this->data['button']       = 'Update Data';
            $this->data['action']       = site_url('lahan/update_action');
            $this->data['id_lahan']      = set_value('id_lahan', $row->id_lahan);
            $this->data['nama_pemilik']     = set_value('nama_pemilik', $row->nama_pemilik);
            $this->data['lokasi_lahan']     = set_value('lokasi_lahan', $row->lokasi_lahan);
            $this->data['no_hp']     = set_value('no_hp', $row->no_hp);
            $this->data['id_jeruk']     = set_value('id_jeruk', $row->id_jeruk);

            $this->data['luas_lahan']     = set_value('luas_lahan', $row->luas_lahan);
            $this->data['jumlah_panen']     = set_value('jumlah_panen', $row->jumlah_panen);
            $this->data['harga_jeruk']     = set_value('harga_jeruk', $row->harga_jeruk);
            $this->data['tanggal_panen']     = set_value('tanggal_panen', $row->tanggal_panen);
           
            $this->data['latitude']     = set_value('latitude', $row->latitude);
            $this->data['longitude']     = set_value('longitude', $row->longitude);
            $this->data['kecamatan_id']     = set_value('kecamatan_id', $row->kecamatan_id);
            $this->data['kelurahan_id']     = set_value('kelurahan_id', $row->kelurahan_id);
            $this->data['user_id']     = set_value('user_id');
            $this->data['data_user']   = $this->user->get_all_user_petani();


            $this->data['kecamatan_data']   = $this->kecamatan->get_all_kecamatan();
            $this->data['jeruk_data']   = $this->jeruk->get_all_jeruk();
            $this->data['kelurahan_data']    = $this->kelurahan->get_all_kelurahan();

            $this->data['main_view']	= "backend/lahan/lahan_form";
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Record Not Found</h6>
        </div>');
            redirect(site_url('lahan'));
        }
        $this->load->view('backend/public', $this->data);
    }

    public function delete($id){
        $row = $this->lahan->get_by_id_lahan($id);

        if ($row) {
            $this->lahan->delete_lahan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Hapus Data Berhasil</h6>
        </div>');
            redirect(site_url('lahan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Tidak Ditemukan</h6>
        </div>');
            redirect(site_url('lahan'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function create_action(){
        $this->_rules_lahan();
        $config = [
            'upload_path' => './assets/img/fotolahan',
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
            redirect(site_url('lahan/create'));
        } else {
            

            $data = array(
                'nama_pemilik' => $this->input->post('nama_pemilik',TRUE),
                'lokasi_lahan' => $this->input->post('lokasi_lahan',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
                'id_jeruk' => $this->input->post('id_jeruk',TRUE),
                'luas_lahan' => $this->input->post('luas_lahan',TRUE),
                'jumlah_panen' => $this->input->post('jumlah_panen',TRUE),
                'harga_jeruk' => $this->input->post('harga_jeruk',TRUE),
                'tanggal_panen' => $this->input->post('tanggal_panen',TRUE),
                'latitude' => $this->input->post('latitude',TRUE),
                'longitude' => $this->input->post('longitude',TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
                'kelurahan_id' => $this->input->post('kelurahan_id',TRUE),
                'user_id' => $this->input->post('user_id',TRUE),
                'foto_lahan' => $foto,
            );

            $this->lahan->insert_lahan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <h6> <i class="icon fas fa-check"></i>Tambah Data Berhasil</h6>
            </div>');
            redirect(site_url('lahan'));
        }
        $this->load->view('backend/public', $this->data);
    }
    public function update_action(){
        $this->_rules_lahan();

        $config = [
            'upload_path' => './assets/img/fotolahan',
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
            redirect(site_url('lahan/update/'.$this->input->post('id_lahan', TRUE)));
        } else {
            //cek apakah input password baru atau tidak
            $data = array(
                'nama_pemilik' => $this->input->post('nama_pemilik',TRUE),
                'lokasi_lahan' => $this->input->post('lokasi_lahan',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
                'id_jeruk' => $this->input->post('id_jeruk',TRUE),
                'luas_lahan' => $this->input->post('luas_lahan',TRUE),
                'jumlah_panen' => $this->input->post('jumlah_panen',TRUE),
                'harga_jeruk' => $this->input->post('harga_jeruk',TRUE),
                'latitude' => $this->input->post('latitude',TRUE),
                'longitude' => $this->input->post('longitude',TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
                'kelurahan_id' => $this->input->post('kelurahan_id',TRUE),
                'user_id' => $this->input->post('user_id',TRUE),
                'foto_lahan' => $foto,
            );

            $this->lahan->update_lahan($this->input->post('id_lahan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <h6> <i class="icon fas fa-check"></i>Edit Data Berhasil</h6>
            </div>');
            redirect(site_url('lahan'));
        }
        $this->load->view('backend/public', $this->data);
    }

    function _rules_lahan()
    {
        $this->form_validation->set_rules('nama_pemilik', ' ', 'trim|required');
        $this->form_validation->set_rules('lokasi_lahan', ' ', 'trim|required');
        $this->form_validation->set_rules('no_hp', ' ', 'trim');
        $this->form_validation->set_rules('id_jeruk', ' ', 'trim');
        $this->form_validation->set_rules('tanggal_panen', ' ', 'trim');

        $this->form_validation->set_rules('luas_lahan', ' ', 'trim|required');
        $this->form_validation->set_rules('jumlah_panen', ' ', 'trim|required');
        $this->form_validation->set_rules('harga_jeruk', ' ', 'trim|required');
       
        $this->form_validation->set_rules('longitude', ' ', 'trim|required');
        $this->form_validation->set_rules('kecamatan_id', ' ', 'trim|required');
        $this->form_validation->set_rules('kelurahan_id', ' ', 'trim|required');
        $this->form_validation->set_rules('user_id', ' ', 'trim|required');

        $this->form_validation->set_rules('id_lahan', 'id_lahan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}