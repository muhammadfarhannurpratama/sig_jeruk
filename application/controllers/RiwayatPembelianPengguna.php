<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatPembelianPengguna extends CI_Controller {

    public $data = array(
        'title'  => 'Transaksi Pembelian',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        cek_session_login();
    }

    public function index(){
        $id = $this->session->userdata('user_id');
        $this->data['data_pembelian'] = $this->transaksipengguna->get_all_penjualan($id);
        $this->data['data_pesanan'] = $this->transaksipengguna->get_all_penjualan($id);
        $this->data['start']        = 0;
        $this->data['title']        = 'Transaksi Pembelian';
        
        $this->data['main_view']	= "backend/transaksipengguna/riwayatpembelianpengguna";
        $this->load->view('backend/public', $this->data);

    }

}