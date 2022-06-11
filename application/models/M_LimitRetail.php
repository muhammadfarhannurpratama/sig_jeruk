<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_LimitRetail extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table_limitretail = 'tb_limitretail';
    public $id_limitretail = 'id_limitretail';
    public $limitstok = 'limitstok';
    public $order_limit = 'ASC';

    function get_all_limit()
    {
        $this->db->order_by($this->id_limitretail, $this->order_limit);
        return $this->db->get($this->table_limitretail)->result();
    }
    function get_by_id_limit($id)
    {
        $this->db->where($this->id_limitretail, $id);
        return $this->db->get($this->table_limitretail)->row();
    }

    function insert_limit($data)
    {
        $this->db->insert($this->table_limitretail, $data);
    }
    function update_limit($id, $data)
    {
        $this->db->where($this->id_limitretail, $id);
        $this->db->update($this->table_limitretail, $data);
    }
    function delete_limit($id)
    {
        $this->db->where($this->id_limitretail, $id);
        $this->db->delete($this->table_limitretail);
    }

}