<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Limitpetani extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table_limitpetani = 'tb_limitpetani';
    public $id_limitpetani = 'id_limitpetani';
    public $limitstok = 'limitstok';
    public $order_limit = 'ASC';

    function get_all_limit()
    {
    $data = $this->db->select('limitstok')
            ->from($this->table_limitpetani)
            ->get()
            ->row();
        return $data;
    }
    function get_all_limit1()
    {
        $this->db->order_by($this->id_limitpetani, $this->order_limit);
        return $this->db->get($this->table_limitpetani)->result();
    }
    function get_all_limit2()
    {
        $this->db->order_by($this->id_limitpetani, $this->order_limit);
        return $this->db->get($this->table_limitpetani)->row();
    }
    function get_by_id_limit($id)
    {
        $this->db->where($this->id_limitpetani, $id);
        return $this->db->get($this->table_limitpetani)->row();
    }

    function insert_limit($data)
    {
        $this->db->insert($this->table_limitpetani, $data);
    }
    function update_limit($id, $data)
    {
        $this->db->where($this->id_limitpetani, $id);
        $this->db->update($this->table_limitpetani, $data);
    }
    function delete_limit($id)
    {
        $this->db->where($this->id_limitpetani, $id);
        $this->db->delete($this->table_limitpetani);
    }
    

}