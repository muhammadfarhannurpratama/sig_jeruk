<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        cek_session_login();
    }
    
    public function index()
    {
        $this->data['belum_bayar']        = $this->transaksipengguna->belum_bayar();
        $this->data['diproses']        = $this->transaksipengguna->diproses();
        $this->data['dikirim']        = $this->transaksipengguna->dikirim();
        $this->data['selesai']        = $this->transaksipengguna->selesai();
        $this->data['title']        = 'Pesanan Saya';

        $this->data['main_view']	= "frontend/transaksipengguna/v_pesanan_saya";
        $this->load->view('frontend/public', $this->data);
    }

    public function bayar($kode_transaksipengguna)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama','required',
        array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules('nama_bank', 'Nama Bank','required',
        array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules('no_rek', 'No.Rekening','required',
        array('required' => '%s Harus Diisi')
        );

        
		// setting konfigurasi upload
        
        $config = [
            'upload_path' => './assets/img/buktibayar',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => date('Ymd').strtoupper(random_string('alnum', 8))
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

        if ($this->form_validation->run() == TRUE) {
                $data = array(
                  'kode_transaksipengguna' => $kode_transaksipengguna,
                  'atas_nama' => $this->input->post('atas_nama'), 
                  'nama_bank' => $this->input->post('nama_bank'), 
                  'no_rek' => $this->input->post('no_rek'),
                  'status_bayar' => '1',
                  'bukti_bayar' => $foto,    
                );
                $a = $kode_transaksipengguna;//kodingan yang baru sukses
                $b = $this->db->query("SELECT * FROM detail_transaksipengguna WHERE detail_transaksipengguna.kode_detailtransaksi = '$a'")->result_array();
                foreach ($b as $c) {
                $id_retail = $c['id_retail'];
                $qty = $c['qty'];
                $retail = $this->db->query("SELECT * FROM tb_retail WHERE id_retail = '$id_retail'")->row_array();
                $stok = $retail['stok'];
                $hitung = $stok - $qty;
                $arr = [
                    'id_retail' => $id_retail,
                    'stok'      => $hitung
                ];
                $this->db->set('stok', $arr['stok']);
                $this->db->where('id_retail', $arr['id_retail']);
                $this->db->update('tb_retail'); 
                    }
                    $this->transaksipengguna->upload_bukti_bayar($data);
                    $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Di Upload !');
                    redirect('pesanan_saya');    
                    
                }

        $this->data['pesanan']        = $this->transaksipengguna->detail_pesanan($kode_transaksipengguna);
        $this->data['detail_transaksi'] = $this->transaksipengguna->detail_transaksi($kode_transaksipengguna);
        $this->data['rekening'] = $this->transaksipengguna->rekening();
        $this->data['title']        = 'Pembayaran Pesanan';

        $this->data['main_view']	= "frontend/transaksipengguna/v_bayar_pesanan";
        $this->load->view('frontend/public', $this->data);
    }
    
    public function diterima($kode_transaksipengguna)
    {
        $data= array(
            'kode_transaksipengguna' => $kode_transaksipengguna,      
            'status_order' =>'3'
        );
        $this->transaksipengguna->update_order($data);
        
        $sql = $this->db->query("SELECT * FROM transaksi_pengguna a 
        JOIN detail_transaksipengguna b ON a.kode_transaksipengguna=b.kode_transaksipengguna 
        where b.kode_transaksipengguna='$kode_transaksipengguna'");
        foreach ($sql->result() as $d) {
            $sql2 = $this->db->query("UPDATE tb_retail SET stok=stok-'$d->qty' WHERE id_retail='$d->id_retail'");
        }
        
        $this->session->set_flashdata('pesan', 'Pesanan Telah Diterima');
        redirect('pesanan_saya');
    }
}
    