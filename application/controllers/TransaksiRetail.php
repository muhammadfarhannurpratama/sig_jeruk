<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiRetail extends CI_Controller {

    public $data = array(
        'title'  => 'Transaksi Pembelian',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        //CEK LOGIN
        cek_session_login();
    }

    public function pesan($id){
        $this->data['lahan_data'] = $this->lahan->get_all_lahan();
        $this->data['start']        = 0;
        $this->data['title']        = 'Transaksi Pembelian';
        $this->data['id']        = $id;
        
        $this->data['main_view']	= "backend/transaksiretail/pesantransaksi";
        $this->load->view('backend/public', $this->data);

    }

    public function aksi_pesan($id)
	{
		if ($this->session->userdata('kdpesan') == '') {
			$wkt = date('dmy').''.time();
			$array = array('kdpesan' => $wkt);
			$this->session->set_userdata($array);
		} else { }
		$this->db->where('id_lahan',$id);
		$dt = $this->db->get('tb_lahan')->row();
		$kdpesan = $this->session->userdata('kdpesan');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('harga');
		$user_id = $this->input->post('user_id');
        $total = $qty*$harga;
		$data = array(
			'kode_keranjangretail' => $kdpesan,
            'id_lahan' => $id,
            'harga' => $harga,
            'qty' => $qty,
            'subtotal' => $harga,
		);
		$this->db->insert('keranjang_retail', $data);

		$cek_pesanan_retail = $this->db->query("SELECT * FROM transaksi_retail WHERE kode_transaksiretail='$kdpesan'");
		if ($cek_pesanan_retail->num_rows() == 1) {
			redirect('Dahsboard');
		} else {
        $nama_retail = $this->input->post('namaretail');
		$alamat = $this->input->post('alamat');
		$jumlah = $this->input->post('jumlah');
		$kdpesan = $this->session->userdata('kdpesan');
		// setting konfigurasi upload
        
        $config = [
            'upload_path' => './assets/img/buktibayar',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => date('Ymd').strtoupper(random_string('alnum', 8))
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $response = [
                'status' => 'error',
                'message' => $this->upload->display_errors()
            ];

            $this->session->set_flashdata('response', $response);
        }

        $data_foto = $this->upload->data();
        $foto = $data_foto['file_name'];
        $id = $this->session->userdata('user_id');
			$data1 = array(
				'kode_transaksiretail' => $kdpesan,
	            'tanggal_beli' => date('Y-m-d'),
	            'kode_keranjangretail' => $kdpesan,
            	'nama_retail' => $nama_retail,
            	'alamat_pengiriman' => $alamat,
            	'id_retail' => $id,
            	'bukti_pembayaran' => $foto,
			);
			$this->db->insert('transaksi_retail', $data1);
            $this->session->unset_userdata('kdpesan');
            $wkt = date('dmy').''.time();
			$array = array('kdpesan' => $wkt);
			$this->session->set_userdata($array);
            ?>
<script type="text/javascript">
alert("Terima Kasih telah melakukan Transaksi Pembelian, Jeruk akan segara kami antar !");
window.location = "<?php echo base_url('RiwayatPembelianRetail') ?>";
</script>
<?php
		}
	}

}