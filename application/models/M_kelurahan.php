<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kelurahan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table_kelurahan = 'tb_kelurahan';
    public $table_kecamatan = 'tb_kecamatan';
    public $id_kelurahan    = 'tb_kelurahan.kelurahan_id';
    public $order_kelurahan = 'ASC';

    function get_all_kelurahan()
    {
        $data = $this->db->select('*')
        ->from($this->table_kelurahan)
        ->join($this->table_kecamatan, 'tb_kelurahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
        ->order_by($this->id_kelurahan, $this->order_kelurahan)
        ->get()
        ->result();
        return $data;
    }
    function get_by_id_kelurahan($id)
    {
        $data = $this->db->select('*')
            ->from($this->table_kelurahan)
            ->join($this->table_kecamatan, 'tb_kelurahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
            ->where($this->id_kelurahan, $id)
            ->order_by($this->id_kelurahan, $this->order_kelurahan)
            ->get()
            ->row();
        return $data;;
    }

    function insert_kelurahan($data)
    {
        $this->db->insert($this->table_kelurahan, $data);
    }
    function update_kelurahan($id, $data)
    {
        $this->db->where($this->id_kelurahan, $id);
        $this->db->update($this->table_kelurahan, $data);
    }
    function delete_kelurahan($id)
    {
        $this->db->where($this->id_kelurahan, $id);
        $this->db->delete($this->table_kelurahan);
    }

    function get_total()
    {
      $query = $this->db->query ("SELECT * FROM tb_kelurahan ");
    return $query->num_rows();
    }

}