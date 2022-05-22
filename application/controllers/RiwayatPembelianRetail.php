<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatPembelianRetail extends CI_Controller {

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
        // $id = $this->session->userdata('user_id');
        // $this->data['data_pembelian'] = $this->transaksiretail->get_all_pembelian($id);
        // $this->data['data_pesanan'] = $this->transaksiretail->get_all_pembelian($id);
        // var_dump($this->data['data_pembelian']);
        // die;
        $this->data['start']        = 0;
        $this->data['title']        = 'Transaksi Pembelian';
        
        $this->data['main_view']	= "backend/transaksiretail/riwayatpembelianretail";
        $this->load->view('backend/public', $this->data);

    }

    public function list_pesanan_retail()
	{
        $id = $this->session->userdata('user_id');
        $this->data['start']        = 0;
        $this->data['title']        = 'Transaksi Penjualan';
        
        $this->data['main_view']	= "backend/transaksiretail/riwayattransaksi";
        $this->load->view('backend/public', $this->data);
    }

    public function simpan_pesanan_retail($kode)
    {
        $sql = $this->db->query("SELECT * FROM transaksi_retail a 
        JOIN keranjang_retail b ON a.kode_keranjangretail=b.kode_keranjangretail 
        where b.kode_keranjangretail='$kode'");
        foreach ($sql->result() as $d) {
            $cek = $this->db->query("SELECT * from tb_retail where id_retail='$d->id_retail'");
            if ($cek->num_rows() == 1) {
                $row = $this->db->query("SELECT * from tb_lahan where id_lahan='$d->id_lahan'")->row();
                $sql1= $this->db->query("UPDATE tb_retail SET stok=stok+'$d->qty' WHERE id_retail='$d->id_retail'");
            }

            $sql2 = $this->db->query("UPDATE tb_lahan SET jumlah_panen=jumlah_panen-'$d->qty' WHERE id_lahan='$d->id_lahan'");

        }
        $sql3= $this->db->query("UPDATE transaksi_retail SET status_pesanan='y' WHERE kode_transaksiretail='$kode'");
        redirect('RiwayatPembelianRetail/list_pesanan_retail');
    }

}