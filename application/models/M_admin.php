<?php

use PhpParser\Node\Stmt\Return_;

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tb_setting');   
        $this->db->where('id_konfigurasi', 1);     
        return $this->db->get()->row();        
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('konfigurasi', $data);  
    }
}

/* End of file M_admin.php */