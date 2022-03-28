<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

//untuk mengetahui bulan bulan

function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

//format tanggal yyyy-mm-dd
function tgl_indo($tgl)
{
    $ubah = gmdate($tgl, time()+60*60*8);
    $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
}

function tgl_jam_indo($tgl){
    $teks = explode(' ',$tgl);
    $teks1 = explode('-',$teks[0]);
    $teks2 = $teks[1];

    $tanggal = $teks1[2];
    $bulan = bulan($teks1[1]);
    $tahun = $teks1[0];

    return $tanggal.' '.$bulan.' '.$tahun.', '.$teks2;
}

function tgl_jam_indo2($tgl){
    $teks = explode(' ',$tgl);
    $teks1 = explode('-',$teks[0]);
    $teks2 = $teks[1];

    $tanggal = $teks1[2];
    $bulan = $teks1[1];
    $tahun = $teks1[0];

    return $tanggal.'-'.$bulan.'-'.$tahun.' '.$teks2;
}

function tgl_indo2($tgl){
    $tgl1    = substr($tgl,8,2);
    $bln      = substr($tgl,5,2);
    $thn      = substr($tgl,0,4);
    return $tgl1.'-'.$bln.'-'.$thn;
}

function jumlah_hari($tgl1, $tgl2){
    $tglAwal = strtotime($tgl1);
    $tglAkhir = strtotime($tgl2);
    $jeda = abs($tglAkhir - $tglAwal);
    return floor($jeda/(60*60*24));
}

if(!function_exists('notify'))
{
    function notify($msg,$type = 'info',$judul = '')
    {
        $tpl = '';
        switch ($type)
        {
            case 'info' :
                $tpl  = '<div class="alert  alert-info fade">';
                break;

            case 'success' :
                $tpl  = '<div class="alert  alert-success fade">';
                break;

            case 'warning' :
                $tpl  = '<div class="alert  alert-warning fade">';
                break;

            case 'danger' :
                $tpl  = '<div class="alert  alert-danger fade">';
                break;
            default :
                $tpl  = '<div class="alert  alert-info fade>';
                break;
        }


        $tpl .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $tpl .= '<strong> '. (trim($judul) !='' ? ucwords($judul) : ucwords($type)) .' ! </strong> ' . $msg;
        $tpl .= '<script>
                
                $(document).ready(function(){
                     $(".alert").delay(4000).addClass("in").fadeOut("slow");
                });
                
                </script>';
        $tpl .= '</div>';

        return $tpl;
    }
}

//untuk mengetahui bulan bulan
if ( ! function_exists('format_rupiah'))
{
    function format_rupiah($angka){
        $rupiah=number_format($angka,0,',','.');
        return $rupiah;
    }
}

if ( ! function_exists('seo_title'))
{
    function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }
}

function cek_session_login(){
    $ci = & get_instance();
    if($ci->session->userdata('loginadmin') == FALSE){
        redirect('login');
    }
}