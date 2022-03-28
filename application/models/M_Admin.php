<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table_admin = 'tb_admin';
    public $id_admin = 'admin_id';
    public $order_admin = 'ASC';

    function get_all_admin()
    {
        $this->db->order_by($this->id_admin, $this->order_admin);
        return $this->db->get($this->table_admin)->result();
    }
    function get_by_id_admin($id)
    {
        $this->db->where($this->id_admin, $id);
        return $this->db->get($this->table_admin)->row();
    }

    function insert_admin($data)
    {
        $this->db->insert($this->table_admin, $data);
    }
    function update_admin($id, $data)
    {
        $this->db->where($this->id_admin, $id);
        $this->db->update($this->table_admin, $data);
    }
    function delete_admin($id)
    {
        $this->db->where($this->id_admin, $id);
        $this->db->delete($this->table_admin);
    }

    function update_password($id, $data)
    {
        $this->db->where('admin_id', $id);
        $this->db->update('tb_admin', $data);
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    

}