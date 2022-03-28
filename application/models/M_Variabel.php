<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Variabel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'variables';
		$this->primary_key = 'id_variabel';
		$this->fillable = ['nama_variabel', 'min', 'max', 'tabel', 'field', 'created_by', 'updated_by'];
		$this->protected = [$this->primary_key];
		parent::__construct();
	}

    public $table_variabel = 'variables';
    public $id_variabel = 'id_variabel';
    public $order_variabel = 'ASC';

    function get_all_variabel()
    {
        $this->db->order_by($this->id_variabel, $this->order_variabel);
        return $this->db->get($this->table_variabel)->result();
    }
    function get_by_id_variabel($id)
    {
        $this->db->where($this->id_variabel, $id);
        return $this->db->get($this->table_variabel)->row();
    }

    function insert_variabel($data)
    {
        $this->db->insert($this->table_variabel, $data);
    }
    function update_variabel($id, $data)
    {
        $this->db->where($this->id_variabel, $id);
        $this->db->update($this->table_variabel, $data);
    }
    function delete_variabel($id)
    {
        $this->db->where($this->id_variabel, $id);
        $this->db->delete($this->table_variabel);
    }

    function get_total()
    {
      $query = $this->db->query ("SELECT * FROM tb_variabel ");
    return $query->num_rows();
    }

}