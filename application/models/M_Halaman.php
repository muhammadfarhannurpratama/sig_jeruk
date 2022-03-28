<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Halaman extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table_halaman = 'tb_halaman';
    public $id_halaman = 'halaman_id';
    public $order_halaman = 'DESC';
    // get all
    function get_all_halaman()
    {
        $this->db->order_by($this->id_halaman, $this->order_halaman);
        return $this->db->get($this->table_halaman)->result();
    }
    // get data by id
    function get_by_id_halaman($id)
    {
        $this->db->where($this->id_halaman, $id);
        return $this->db->get($this->table_halaman)->row();
    }
    // insert data
    function insert_halaman($data)
    {
        $this->db->insert($this->table_halaman, $data);
    }
    // update data
    function update_halaman($id, $data)
    {
        $this->db->where($this->id_halaman, $id);
        $this->db->update($this->table_halaman, $data);
    }
    // delete data
    function delete_halaman($id)
    {
        $this->db->where($this->id_halaman, $id);
        $this->db->delete($this->table_halaman);
    }

}