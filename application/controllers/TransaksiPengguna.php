<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiPengguna extends CI_Controller {

    public $data = array(
        'title'  => 'Data Retail',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        cek_session_login();
    }

    public function pesan($id){
        // $id = $this->uri->segment(3);
        $this->data['retail_data'] = $this->retail->get_by_retail($id);
        $this->data['start']        = 0;
        $this->data['title']        = 'Transaksi Pembelian';
        $this->data['id']        = $id;
        
        $this->cart->destroy();
        $this->data['main_view']	= "frontend/transaksipengguna/pesantransaksi";
        $this->load->view('frontend/public', $this->data);

    }
    public function checkout(){
        
        $this->data['data'] = array(
        	'id'      => $this->input->post('id'),
        	'qty'     => $this->input->post('qty'),
        	'price'   => $this->input->post('price'),
        	'name'    => $this->input->post('name'),
        ); 
		$this->cart->insert($this->data['data']);
        $id = $this->session->userdata('user_id');
        $id_retail       = $this->input->post('id');
        $this->data['no_order']     = $this->input->post('no_order');
        $this->data['retail'] = $this->retail->detail_retail($id_retail);
        $this->data['user'] = $this->user->get_by_id_user($id);
        $this->data['main_view']	= "frontend/transaksipengguna/checkout";
        $this->load->view('frontend/public', $this->data);
    }

    public function checkout_pesanan(){

    //simpan transaksi ke table transaksi
    $i = 1;
      $data = array('user_id'      => $this->session->userdata('user_id'),
                    'kode_transaksipengguna' => $this->input->post('no_order'),
                    'tgl_transaksi'     => date('Y-m-d H:i:s'),
                    'batas_bayar'       => date('Y-m-d H:i:s', mktime( date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')) ),
                    'nama_pelanggan'    => $this->input->post('nama_pelanggan'),
                    'no_telepon'        => $this->input->post('no_telepon'),
                    'provinsi'          => $this->input->post('provinsi'),
                    'kota'              => $this->input->post('kota'),
                    'alamat'            => $this->input->post('alamat'),
                    'kode_pos'          => $this->input->post('kode_pos'),
                    'expedisi'          => $this->input->post('expedisi'),
                    'paket'             => $this->input->post('paket'),
                    'estimasi'          => $this->input->post('estimasi'),
                    'ongkir'            => $this->input->post('ongkir'),
                    'berat'             => $this->input->post('berat'),
                    'grand_total'       => $this->input->post('grand_total'),
                    'total_bayar'       => $this->input->post('total_bayar'),
                    'status_bayar'      => '0',
                    'status_order'      => '0',
    );
    $this->transaksipengguna->simpan_transaksi($data);
    //simpan ke tabel detail transaksi
    $i = 1;
    $kode_detailtransaksi = $this->db->insert_id();
    foreach ($this->cart->contents() as $items) {
        $detail_data = array(
                             'kode_detailtransaksi'=> $kode_detailtransaksi,
                             'kode_transaksipengguna'=> $this->input->post('no_order'),
                             'id_retail'   => $items['id'], 
                             'harga'       => $items['price'],
                             'qty'         => $this->input->post('qty'.$i++),
    
    );
    $this->transaksipengguna->simpan_detail_transaksi($detail_data);
    
    }
    $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !');
    $this->cart->destroy();
    redirect('pesanan_saya');
    }

    
    public function pesanan_masuk()
    {
        $this->data['pesanan']        = $this->pesananmasuk->pesanan();
        $this->data['pesanan_diproses']        = $this->pesananmasuk->pesanan_diproses();
        $this->data['pesanan_dikirim']        = $this->pesananmasuk->pesanan_dikirim();
        $this->data['pesanan_selesai']        = $this->pesananmasuk->pesanan_selesai();
        $this->data['title']        = 'Pesanan Masuk';
        // var_dump($this->data['pesanan']);
        // die;

        $this->data['main_view']	= "backend/transaksipengguna/v_pesanan_masuk";
        $this->load->view('backend/public', $this->data);
    }
    public function proses($kode_transaksipengguna)
    {
        $data= array(
            'kode_transaksipengguna' => $kode_transaksipengguna,
            'status_order' =>'1',
        );
        $this->pesananmasuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Sedang Dikemas');
        redirect('transaksipengguna/pesanan_masuk');
        
    }

    public function detail_pesanan($kode_transaksipengguna)
    {
        $this->data['detail_pesanan']  = $this->pesananmasuk->detail_pesanan($kode_transaksipengguna);
        $this->data['detail_transaksi']  = $this->pesananmasuk->detail_transaksi($kode_transaksipengguna);
        $this->data['title']        = 'Detail Pemesanan';

        $this->data['main_view']	= "backend/transaksipengguna/v_detail_pesanan";
        $this->load->view('backend/public', $this->data);

    }
    public function kirim($kode_transaksipengguna)
    {
        $data= array(
            'kode_transaksipengguna' => $kode_transaksipengguna,
            'no_resi' => $this->input->post('no_resi'),            
            'status_order' =>'2'

        );
        $this->pesananmasuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim');
        redirect('TransaksiPengguna/pesanan_masuk');
        
    }
}