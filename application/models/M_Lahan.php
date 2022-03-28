<?php

class M_Lahan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_lahan';
        $this->primary_key = 'id_lahan';
        $this->fillable = ['nama_pemilik', 'lokasi_lahan', 'no_hp'];
        $this->protected = [$this->primary_key];
        parent::__construct();
    }

    public $table_lahan   = 'tb_lahan';
    public $table_kecamatan = 'tb_kecamatan';
    public $table_jeruk = 'tb_jeruk';
    public $table_kelurahan = 'tb_kelurahan';
    public $id_lahan      = 'tb_lahan.id_lahan';
    public $order_lahan   = 'ASC';

    function get_all_lahan()
    {
        $data = $this->db->select('*')
            ->from($this->table_lahan)
            ->join($this->table_kecamatan, 'tb_lahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
            ->join($this->table_jeruk, 'tb_lahan.id_jeruk = tb_jeruk.id_jeruk', 'left')
            ->join($this->table_kelurahan, 'tb_lahan.kelurahan_id = tb_kelurahan.kelurahan_id', 'left')
            ->order_by($this->id_lahan, $this->order_lahan)
            ->get()
            ->result();
        return $data;
    }

    function get_all()
    {
        $data = $this->db->select('*')
            ->from($this->table_lahan)
            ->join($this->table_kecamatan, 'tb_lahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
            ->join($this->table_jeruk, 'tb_lahan.id_jeruk = tb_jeruk.id_jeruk', 'left')
            ->join($this->table_kelurahan, 'tb_lahan.kelurahan_id = tb_kelurahan.kelurahan_id', 'left')
            ->order_by($this->id_lahan, $this->order_lahan)
            ->get()
            ->result_array();
        return $data;
    }

    function get_all_lahan_cari($cari)
    {
        $data = $this->db->select('*')
            ->from($this->table_lahan)
            ->join($this->table_kecamatan, 'tb_lahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
            ->join($this->table_jeruk, 'tb_lahan.id_jeruk = tb_jeruk.id_jeruk', 'left')
            ->join($this->table_kelurahan, 'tb_lahan.kelurahan_id = tb_kelurahan.kelurahan_id', 'left')
            ->where('tb_lahan.kecamatan_id','tb_lahan.id_jeruk','tb_lahan.kelurahan_id', $cari)
            ->order_by($this->id_lahan, $this->order_lahan)
            ->get()
            ->result();
        return $data;
    }
    function get_by_id_lahan($id)
    {
        $data = $this->db->select('*')
            ->from($this->table_lahan)
            ->join($this->table_kecamatan, 'tb_lahan.kecamatan_id = tb_kecamatan.kecamatan_id', 'left')
            ->join($this->table_jeruk, 'tb_lahan.id_jeruk = tb_jeruk.id_jeruk', 'left')
            ->join($this->table_kelurahan, 'tb_lahan.kelurahan_id = tb_kelurahan.kelurahan_id', 'left')
            ->where($this->id_lahan, $id)
            ->order_by($this->id_lahan, $this->order_lahan)
            ->get()
            ->row();
        return $data;
    }

    public function getResult()
    {
        $get = $this->db->query("SELECT * from hasil rk");
        if ($get->num_rows()!=0) {
            return $get->result_array();
        }else {
            return array();
        }
    }

    function insert_lahan($data)
    {
        $this->db->insert($this->table_lahan, $data);
    }
    function update_lahan($id, $data)
    {
        $this->db->where($this->id_lahan, $id);
        $this->db->update($this->table_lahan, $data);
    }
    function delete_lahan($id)
    {
        $this->db->where($this->id_lahan, $id);
        $this->db->delete($this->table_lahan);
    }

    function get_total()
    {
      $query = $this->db->query ("SELECT * FROM tb_lahan ");
    return $query->num_rows();
    }

    public function getVariabel($params)
    {
        $this->db->select("*");
        $this->db->from('variabel');
        $this->db->where($params);
        $result =  $this->db->get();
        if ($result->num_rows()!=0) {
            return $result->row_array();
        }else {
            return array();
        }
    }

    public function getRekomendasi($id_aturan)
    {
        $this->db->select("id_jeruk, jeruk_nama, icon_jeruk, minimum, maksimum");
        $this->db->from("tb_rules");
        $this->db->join("tb_jeruk","tb_jeruk.id_jeruk=tb_rules.hasil","left");
        $this->db->where("id_rule", $id_aturan);
        $get = $this->db->get();
        return $get->row_array();
    }

    public function getJeruk()
    {
        $this->db->select("*");
        $this->db->from("tb_jeruk");
        $result = $this->db->get();
        return $result->result_array();
    }

}