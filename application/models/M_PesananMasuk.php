<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_PesananMasuk extends CI_Model
{
    
    public function pesanan()
    {
    $this->db->select('*');
    $this->db->from('transaksi_pengguna');
    $this->db->join('detail_transaksipengguna', 'detail_transaksipengguna.kode_transaksipengguna = transaksi_pengguna.kode_transaksipengguna', 'left');
    $this->db->where('detail_transaksipengguna.id_retail', $this->session->userdata('user_id'));
    // $this->db->order_by('kode_transaksipengguna', 'desc');
    $this->db->where('status_order=0');
    
    return $this->db->get()->result();   
}

public function pesanan_diproses()
    {
    $this->db->select('*');
    $this->db->from('transaksi_pengguna');
    $this->db->join('detail_transaksipengguna', 'detail_transaksipengguna.kode_transaksipengguna = transaksi_pengguna.kode_transaksipengguna', 'left');
    $this->db->where('detail_transaksipengguna.id_retail', $this->session->userdata('user_id'));
    $this->db->where('status_order=1');
    
    return $this->db->get()->result();   
}

public function pesanan_dikirim()
    {
    $this->db->select('*');
    $this->db->from('transaksi_pengguna');
    $this->db->join('detail_transaksipengguna', 'detail_transaksipengguna.kode_transaksipengguna = transaksi_pengguna.kode_transaksipengguna', 'left');
    $this->db->where('detail_transaksipengguna.id_retail', $this->session->userdata('user_id'));
    $this->db->where('status_order=2');
    
    return $this->db->get()->result();   
}

public function pesanan_selesai()
    {
    $this->db->select('*');
    $this->db->from('transaksi_pengguna');
    $this->db->join('detail_transaksipengguna', 'detail_transaksipengguna.kode_transaksipengguna = transaksi_pengguna.kode_transaksipengguna', 'left');
    $this->db->where('detail_transaksipengguna.id_retail', $this->session->userdata('user_id'));
    $this->db->where('status_order=3');
    
    return $this->db->get()->result();   
}


public function update_order($data)
{
    $this->db->where('kode_transaksipengguna', $data['kode_transaksipengguna']);
    $this->db->update('transaksi_pengguna', $data);   
}

public function detail_pesanan($kode_transaksipengguna)
{
    $this->db->select('*');
    $this->db->from('transaksi_pengguna');
    $this->db->join('detail_transaksipengguna', 'detail_transaksipengguna.kode_transaksipengguna = transaksi_pengguna.kode_transaksipengguna', 'left');
    $this->db->join('tb_retail', 'detail_transaksipengguna.id_retail = tb_retail.id_retail', 'left');
    $this->db->join('tb_kecamatan', 'tb_retail.kecamatan_id = tb_kecamatan.kecamatan_id', 'left');
    $this->db->join('tb_jeruk', 'tb_retail.id_jeruk = tb_jeruk.id_jeruk', 'left');
    $this->db->join('tb_kelurahan', 'tb_retail.kelurahan_id = tb_kelurahan.kelurahan_id', 'left');
    $this->db->where('transaksi_pengguna.kode_transaksipengguna', $kode_transaksipengguna);
    return $this->db->get()->row();      
}

public function detail_transaksi($kode_transaksipengguna)
{
    $this->db->select('*');
    $this->db->from('transaksi_pengguna');
    $this->db->join('detail_transaksipengguna', 'detail_transaksipengguna.kode_transaksipengguna = transaksi_pengguna.kode_transaksipengguna', 'left');
    $this->db->join('tb_retail', 'detail_transaksipengguna.id_retail = tb_retail.id_retail', 'left');
    $this->db->join('tb_kecamatan', 'tb_retail.kecamatan_id = tb_kecamatan.kecamatan_id', 'left');
    $this->db->join('tb_jeruk', 'tb_retail.id_jeruk = tb_jeruk.id_jeruk', 'left');
    $this->db->join('tb_kelurahan', 'tb_retail.kelurahan_id = tb_kelurahan.kelurahan_id', 'left');
    $this->db->where('transaksi_pengguna.kode_transaksipengguna', $kode_transaksipengguna);
    return $this->db->get()->result();      
} 

}

/* End of file Ikan_pemasok_model.php */
/* Location: ./application/models/Ikan_pemasok_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-20 09:31:57 */
/* http://harviacode.com */