<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_TransaksiRetail extends CI_Model
{

    public $table = 'tb_lahan';
    public $id = 'id_lahan';
    public $order = 'DESC';
    
    public $table_lahan   = 'tb_lahan';
    public $table_keranjangretail   = 'keranjang_retail';
    public $table_transaksiretail   = 'transaksi_retail';
    public $table_kecamatan = 'tb_kecamatan';
    public $table_jeruk = 'tb_jeruk';
    public $table_kelurahan = 'tb_kelurahan';
    public $id_lahan      = 'tb_lahan.id_lahan';
    public $kode_transaksiretail      = 'transaksi_retail.kode_transaksiretail';
    public $order_pembelian   = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $this->db->like('id_lahan', $q);
	$this->db->or_like('nama_pemilik', $q);
	$this->db->or_like('harga_jeruk', $q);
	$this->db->or_like('id_jeruk ', $q);
	$this->db->or_like('stok', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {

        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_lahan', $q);
        $this->db->or_like('nama_pemilik', $q);
        $this->db->or_like('harga_jeruk', $q);
        $this->db->or_like('id_jeruk ', $q);
        $this->db->or_like('stok', $q);
	$this->db->limit($limit, $start);
    $this->db->where('user_id', 3);
        return $this->db->get($this->table)->result();
    }

    function get_all_pembelian($id)
    {
        $data = $this->db->select('*');
        $this->db->from('transaksi_retail');
        $this->db->join('keranjang_retail', 'keranjang_retail.kode_keranjangretail = transaksi_retail.kode_keranjangretail', 'left');
        $this->db->join('tb_lahan', 'keranjang_retail.id_lahan = tb_lahan.id_lahan', 'left');
        $this->db->join('tb_kecamatan', 'tb_lahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left');
        $this->db->join('tb_user', 'tb_lahan.user_id = tb_user.user_id', 'left');
        $this->db->join('tb_jeruk', 'tb_lahan.id_jeruk = tb_jeruk.id_jeruk', 'left');
        $this->db->join('tb_kelurahan', 'tb_lahan.kelurahan_id = tb_kelurahan.kelurahan_id', 'left');
        $this->db->where('tb_user.user_id', $id);
        $this->db->order_by('transaksi_retail.kode_transaksiretail', 'DESC');
        return $this->db->get()->result();   
    }

    function get_all_lahan_cari($cari)
    {
        $data = $this->db->select('*')
            ->from($this->table_transaksiretail)
            ->join($this->table_keranjangretail, 'keranjang_retail.kode_keranjangretail = keranjang_retail.kode_keranjangretail', 'left')
            ->join($this->table_lahan, 'keranjang_retail.id_lahan = tb_lahan.id_lahan', 'left')
            ->join($this->table_kecamatan, 'tb_lahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
            ->join($this->table_jeruk, 'tb_lahan.id_jeruk = tb_jeruk.id_jeruk', 'left')
            ->join($this->table_kelurahan, 'tb_lahan.kelurahan_id = tb_kelurahan.kelurahan_id', 'left')
            ->where('tb_lahan.kecamatan_id','tb_lahan.id_jeruk','tb_lahan.kelurahan_id', $cari)
            ->order_by($this->kode_keranjangretail, $this->order_pembelian)
            ->get()
            ->result();
        return $data;
    }
    function get_by_id_pembelian($id)
    {
        $data = $this->db->select('*')
            ->from($this->table_transaksiretail)
            ->join($this->table_keranjangretail, 'keranjang_retail.kode_keranjangretail = keranjang_retail.kode_keranjangretail', 'left')
            ->join($this->table_lahan, 'keranjang_retail.id_lahan = tb_lahan.id_lahan', 'left')
            ->join($this->table_kecamatan, 'tb_lahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
            ->join($this->table_jeruk, 'tb_lahan.id_jeruk = tb_jeruk.id_jeruk', 'left')
            ->join($this->table_kelurahan, 'tb_lahan.kelurahan_id = tb_kelurahan.kelurahan_id', 'left')
            ->where($this->kode_keranjangretail, $id)
            ->order_by($this->kode_keranjangretail, $this->order_pembelian)
            ->get()
            ->row();
        return $data;
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Ikan_pemasok_model.php */
/* Location: ./application/models/Ikan_pemasok_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-20 09:31:57 */
/* http://harviacode.com */