<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LimitRetail extends CI_Controller {

    public $data = array(
        'title'  => 'Limit Stok Retail',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        cek_session_login();
    }

    public function index()
    {
        $start = 0;
        $totalpanen = $this->lahan->get_totalpanen();
        $limit = $this->limitpetani->get_all_limit();
        $totalretail = $this->retail->get_totalretail();
        
        $stokpetani = ($totalpanen->jumlah_panen - $limit->limitstok)/$totalretail->jumlahretail;
        $retail = $this->retail->get_all_retail();

        $this->data['retail_data']   = $retail;
        $this->data['limitstok'] = $stokpetani;
        
        $this->data['start']            = $start;
        $this->data['title']            = 'Limit Stok retail';

        $this->data['main_view']	= "backend/limitstok/limitretail_list";
        $this->load->view('backend/public', $this->data);

    }


    

}