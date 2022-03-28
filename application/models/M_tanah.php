<?php

class M_tanah extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_lahan';
        $this->primary_key = 'id_lahan';
        $this->fillable = ['nama_pemilik', 'lokasi_lahan', 'no_hp', 'ketinggian', 'suhu', 'curah_hujan', 'ph_tanah'];
        $this->protected = [$this->primary_key];
        parent::__construct();
    }

}