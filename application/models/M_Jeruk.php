<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Jeruk extends CI_Model
{
    public function __construct()
    {
		parent::__construct();
    }

    public $table_jeruk = 'tb_jeruk';
    public $id_jeruk = 'id_jeruk';
    public $order_jeruk = 'ASC';

    function get_all_jeruk()
    {
        $this->db->order_by($this->id_jeruk, $this->order_jeruk);
        return $this->db->get($this->table_jeruk)->result();
    }
    function get_by_id_jeruk($id)
    {
        $this->db->where($this->id_jeruk, $id);
        return $this->db->get($this->table_jeruk)->row();
    }

    function insert_jeruk($data)
    {
        $this->db->insert($this->table_jeruk, $data);
    }
    function update_jeruk($id, $data)
    {
        $this->db->where($this->id_jeruk, $id);
        $this->db->update($this->table_jeruk, $data);
    }
    function delete_jeruk($id)
    {
        $this->db->where($this->id_jeruk, $id);
        $this->db->delete($this->table_jeruk);
    }

    function get_total()
    {
      $query = $this->db->query ("SELECT * FROM tb_jeruk ");
    return $query->num_rows();
    }

}