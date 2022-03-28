<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kecamatan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table_kecamatan = 'tb_kecamatan';
    public $id_kecamatan = 'kecamatan_id';
    public $order_kecamatan = 'ASC';

    function get_all_kecamatan()
    {
        $this->db->order_by($this->id_kecamatan, $this->order_kecamatan);
        return $this->db->get($this->table_kecamatan)->result();
    }
    function get_by_id_kecamatan($id)
    {
        $this->db->where($this->id_kecamatan, $id);
        return $this->db->get($this->table_kecamatan)->row();
    }

    function insert_kecamatan($data)
    {
        $this->db->insert($this->table_kecamatan, $data);
    }
    function update_kecamatan($id, $data)
    {
        $this->db->where($this->id_kecamatan, $id);
        $this->db->update($this->table_kecamatan, $data);
    }
    function delete_kecamatan($id)
    {
        $this->db->where($this->id_kecamatan, $id);
        $this->db->delete($this->table_kecamatan);
    }
    
    function get_total()
    {
      $query = $this->db->query ("SELECT * FROM tb_kecamatan ");
    return $query->num_rows();
    }


}