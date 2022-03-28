<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends MY_Controller {

    public $data = array(
        'title'  => 'Data Lahan',
    );

    public function __construct()
    {
        parent::__construct();
        $this->data['iden_data']      = $this->identitas->get_identitas('1');
        $this->load->model("M_pencarian",'pencarian');
    }

    public function index()
    {
        
        $this->data['start']        = 0;
        $this->data['title']        = 'Data Lahan';

        $this->data['main_view']	= "frontend/pencarian/rekomendasi";
        $this->db->truncate('hasil');

        $this->load->view('frontend/public', $this->data);

    }

	public function result()
    {
        
        $this->data['start']        = 0;
        $this->data['title']        = 'Hasil Rekomendasi';

        $this->data['main_view']	= "frontend/pencarian/hasil";
        $this->data['rekomendasi'] = $this->pencarian->getResult();
        $this->load->view('frontend/public', $this->data);

    }

	private function _add_to_result(&$array, $lahan)
	{
		if (isset($array[$lahan->id_lahan])) {
			$d = $array[$lahan->id_lahan];
			if ($d->nilai > $lahan->nilai)
				$array[$lahan->id_lahan] = $lahan;
		} else {
			$array[$lahan->id_lahan] = $lahan;
		}
	}

    public function prosesFuzzy()
    {
        $params = $this->input->post(null, true);

        // echo '<pre>ketinggian min = ';
        // print_r($this->ketinggianMin($params['ketinggian']));
        // echo '<pre>ketinggian max = ';
        // print_r($this->ketinggianMax($params['ketinggian']));


        // echo '<pre>suhuMin = ';
        // print_r($this->suhuMin($params['suhu']));
        // echo '<pre>suhuMax = ';
        // print_r($this->suhuMax($params['suhu']));


        // echo '<pre>hujanMin = ';
        // print_r($this->hujanMin($params['curah_hujan']));
        // echo '<pre>hujanMax = ';
        // print_r($this->hujanMax($params['curah_hujan']));


        // echo '<pre>tanahMin = ';
        // print_r($this->tanahMin($params['ph_tanah']));
        // echo '<pre>tanahMax = ';
        // print_r($this->tanahMax($params['ph_tanah']));

        // echo '<br><pre>inferensi = ';
        $this->inferensi($params['ketinggian'], $params['suhu'], $params['curah_hujan'], $params['ph_tanah']);
        $response['success'] = true;
        echo json_encode($response);
    }

    public function inferensi($ketinggian, $suhu, $hujan, $tanah)
    {
        $x = 0;
        $no =1;

        $kondisi = [];

        $nKetinggian = [$this->ketinggianMin($ketinggian), $this->ketinggianMax($ketinggian)];
        $nSuhu = [$this->suhuMin($suhu), $this->suhuMax($suhu)];
        $nHujan = [$this->hujanMin($hujan), $this->hujanMax($hujan)];
        $nTanah = [$this->tanahMin($tanah),  $this->tanahMax($tanah)];

        $jKetinggian = count($nKetinggian);
        $jSuhu = count($nSuhu);
        $jHujan = count($nHujan);
        $jTanah = count($nTanah);
        $aturan = array();
        $minimal = array();

        for ($i = 0; $i < $jKetinggian; $i++) {
            for ($j = 0; $j < $jSuhu; $j++) {
                for ($k = 0; $k < $jHujan; $k++) {
                    for ($l = 0; $l < $jTanah; $l++) {
                        if (($nKetinggian[$i]>0) && ($nSuhu[$j]) && ($nHujan[$k]>0) &&($nTanah[$l]>0)) {
                            $minimal[$x] = min($nKetinggian[$i], $nSuhu[$j], $nHujan[$k],$nTanah[$l]);
                            if ($l==0) {
                                $kondisi[$x] ="";
                            }
                            $aturan[] = $no;

                            // echo "<p>" . $no . ". IF ketinggian = " . $nKetinggian[$i] . " AND suhu = " . $nSuhu[$j] . " AND hujan = " . $nHujan[$k] . " AND tanah Air = " . $nTanah[$l] . "  THAN Jeruk = " . "(" . $minimal[$x] . ")";
                            $x++;
                        }
                        $no++;
                    }
                }
            }
        }

        $result = array_combine($aturan, $minimal);
        $rekomendasi = array();
        $defuz = 0;
        $comma = 0;
        $u = 0;
        $no=1;
        foreach ($result as $key => $value) {
            $rekomendasi[$u]['kode_aturan'] = $key;
            $rekomendasi[$u]['nilai_aturan'] = $value;
            $rekomendasi[$u]['id_jeruk'] = $this->getResult($key)['id_jeruk'];
            $rekomendasi[$u]['nama_jeruk'] = $this->getResult($key)['jeruk_nama'];
            $rekomendasi[$u]['minimal'] = $this->getResult($key)['minimum'];
            $rekomendasi[$u]['maksimal'] = $this->getResult($key)['maksimum'];
            $rekomendasi[$u]['x'] = (($rekomendasi[$u]['nilai_aturan']*($rekomendasi[$u]['maksimal']-$rekomendasi[$u]['minimal']))+$rekomendasi[$u]['minimal']);

            // echo '<br>Aturannya '.$no.' : ';
            // echo '('.$rekomendasi[$u]['nilai_aturan'].' x ('.$rekomendasi[$u]['maksimal'].' - '.$rekomendasi[$u]['minimal'].')'.')-'.$rekomendasi[$u]['maksimal'].' = '.(($rekomendasi[$u]['nilai_aturan']*($rekomendasi[$u]['maksimal']-$rekomendasi[$u]['minimal']))+$rekomendasi[$u]['minimal']).'<br>';

            $defuz += ($rekomendasi[$u]['nilai_aturan']*$rekomendasi[$u]['x']);
            $comma += ($rekomendasi[$u]['nilai_aturan']);

            $u++;
            $no++;
        }
        $defuzi = round($defuz/$comma,2);

        $jeruk = $this->pencarian->getJeruk();
        $akhir = array();
        $akhir2 = array();
        $a=0;
        foreach ($jeruk as $rows) {
            $akhir[$a]['id_jeruk'] = $rows['id_jeruk'];
            $akhir[$a]['jeruk'] = $rows['jeruk_nama'];
            $akhir[$a]['bobot'] = ($rows['maksimum']-$defuzi)/($rows['maksimum']-$rows['minimum']);
            $akhir[$a]['persentase'] = $akhir[$a]['bobot']*100;
            if ($akhir[$a]['persentase']>0 && $akhir[$a]['persentase']<=100) {
                $this->db->insert('hasil', $akhir[$a]);
            }
            $a++;
        }

        $b=0;
        foreach ($jeruk as $rows) {
            $akhir2[$b]['id_jeruk'] = $rows['id_jeruk'];
            $akhir2[$b]['jeruk'] = $rows['jeruk_nama'];
            $akhir2[$b]['bobot'] = ($defuzi-$rows['maksimum'])/($rows['maksimum']-$rows['minimum']);
            $akhir2[$b]['persentase'] = $akhir2[$b]['bobot']*100;
            if ($akhir2[$b]['persentase']>0 && $akhir2[$b]['persentase']<=100) {
                $this->db->insert('hasil', $akhir2[$b]);
            }
            $b++;
        }

    }

    public function getResult($id_aturan)
    {
        $result = $this->pencarian->getRekomendasi($id_aturan);
        return $result;
    }



    public function ketinggianMin($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'ketinggian','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'ketinggian','prioritas'=>'max'));

        $nilaimin = ($max['nilai_minimum']-$params)/($max['nilai_minimum']-$min['nilai_maksimum']);
        // if ($params<=$max['nilai_minimum']) {
        //     $nilaimin = 1;
        // }else {
        //     if ($params>$max['nilai_minimum'] && $params<=$min['nilai_maksimum']) {
        //         $nilaimin = ($min['nilai_maksimum']-$params)/($min['nilai_maksimum']-$max['nilai_minimum']);
        //     }else {
        //         $nilaimin = 0;
        //     }
        // }
        return round($nilaimin,2);

    }

    public function ketinggianMax($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'ketinggian','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'ketinggian','prioritas'=>'max'));

        $nilaimin = ($params-$min['nilai_maksimum'])/($max['nilai_minimum']-$min['nilai_maksimum']);

        // if ($params>=$min['nilai_maksimum']) {
        //     $nilaimin = 1;
        // }else {
        //     if ($params>$max['nilai_minimum'] && $params<=$min['nilai_maksimum']) {
        //         $nilaimin = ($params-$max['nilai_minimum'])/($min['nilai_maksimum']-$max['nilai_minimum']);
        //     }else {
        //         $nilaimin = 0;
        //     }
        // }
        return round($nilaimin,2);

    }

    // suhu
    public function suhuMin($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'suhu','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'suhu','prioritas'=>'max'));

        if ($params<=$max['nilai_minimum']) {
            $nilaimin = 1;
        }else {
            if ($params>$max['nilai_minimum'] && $params<=$min['nilai_maksimum']) {
                $nilaimin = ($min['nilai_maksimum']-$params)/($min['nilai_maksimum']-$max['nilai_minimum']);
            }else {
                $nilaimin = 0;
            }
        }
        return round($nilaimin,2);

    }

    public function suhuMax($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'suhu','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'suhu','prioritas'=>'max'));

        if ($params>=$min['nilai_maksimum']) {
            $nilaimin = 1;
        }else {
            if ($params>$max['nilai_minimum'] && $params<=$min['nilai_maksimum']) {
                $nilaimin = ($params-$max['nilai_minimum'])/($min['nilai_maksimum']-$max['nilai_minimum']);
            }else {
                $nilaimin = 0;
            }
        }
        return round($nilaimin,2);

    }

    // curah hujan
    public function hujanMin($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'hujan','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'hujan','prioritas'=>'max'));

        $nilaimin = ($max['nilai_minimum']-$params)/($max['nilai_minimum']-$min['nilai_maksimum']);
        return round($nilaimin,2);

    }

    public function hujanMax($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'hujan','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'hujan','prioritas'=>'max'));

        $nilaimin = ($params-$min['nilai_maksimum'])/($max['nilai_minimum']-$min['nilai_maksimum']);
        return round($nilaimin,2);

    }

    // ph tanah
    // suhu
    public function tanahMin($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'tanah','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'tanah','prioritas'=>'max'));

        $nilaimin = ($max['nilai_minimum']-$params)/($max['nilai_minimum']-$min['nilai_maksimum']);

        return round($nilaimin,2);

    }

    public function tanahMax($params)
    {
        $nilaimin =0;

        $min = $this->pencarian->getVariabel(array('kategori'=>'tanah','prioritas'=>'min'));
        $max = $this->pencarian->getVariabel(array('kategori'=>'tanah','prioritas'=>'max'));

        $nilaimin = ($params-$min['nilai_maksimum'])/($max['nilai_minimum']-$min['nilai_maksimum']);
        return round($nilaimin,2);

    }


}