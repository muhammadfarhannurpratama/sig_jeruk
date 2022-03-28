<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Identitas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table_identitas = 'tb_identitas';
    public $id_identitas = 'id_identitas';
    public $order_identitas = 'ASC';

    function get_by_id_identitas($id)
    {
        $this->db->where($this->id_identitas, $id);
        return $this->db->get($this->table_identitas)->row();
    }

    function update_identitas($id, $data)
    {
        $this->db->where($this->id_identitas, $id);
        $this->db->update($this->table_identitas, $data);
    }

    public function get_identitas($id)
    {
        $result = $this->db->select('*')
            ->from('tb_identitas')
            ->where('id_identitas', $id)
            ->get();
        if ($result->num_rows() == 1){
            return $result->row_array();
        }
        else {
            return array();
        }
    }

}