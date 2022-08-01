<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        // $this->load->model('stock_m');
        $this->load->model('penjualan_m');
        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['data'] = $this->penjualan_m->jadwal();
        foreach ($data['data'] as $ramal) {
            $date[] = $ramal->date;
            $nama[] = $ramal->jenis_produk;
            $tanggal[] = $ramal->tgl;
            $jumlah_produksi[] = $ramal->jumlah_produk;
            $date1[] = $this->penjualan_m->ramal($ramal->jenis_produk, date("Y-m", strtotime("-1 month", strtotime($ramal->date))));
            $date2[] = $this->penjualan_m->ramal($ramal->jenis_produk, date("Y-m", strtotime("-2 month", strtotime($ramal->date))));
            $date3[] = $this->penjualan_m->ramal($ramal->jenis_produk, date("Y-m", strtotime("-3 month", strtotime($ramal->date))));
        }
        $data['count_produksi'] = $this->penjualan_m->get_count_produksi();
        for ($i = 0; $i < count($date1); $i++) {
            // var_dump($date1[$i]->jumlah);
            if ($date1[$i]->jumlah == null) {
                $satu = 1;
            } else {
                $satu = $date1[$i]->jumlah / 30;
            }
            if ($date2[$i]->jumlah == null) {
                $dua = 1;
            } else {
                $dua = $date2[$i]->jumlah / 30;
            }
            if ($date3[$i]->jumlah == null) {
                $tiga = 1;
            } else {
                $tiga = $date3[$i]->jumlah / 30;
            }
            $foo = (1260 / ($data['count_produksi'])) / ($satu + $dua + $tiga);
            $time = number_format((float)$foo, 2, '.', '');
            $foo2 = ($jumlah_produksi[$i] * $time) / 60;
            $jumlah_waktu[] = number_format((float)$foo2, 2, '.', '');
        }
        $data['jadwal'] = [];
        for ($i = 0; $i < count($date); $i++) {
            $jadwal = array(
                'jenis_produk' => $nama[$i],
                'tanggal' => $tanggal[$i],
                'date' => $date[$i],
                'jumlah_produksi' => $jumlah_produksi[$i],
                'jumlah_waktu' => $jumlah_waktu[$i],
            );
            array_push($data['jadwal'], $jadwal);
        }
        usort($data['jadwal'], function ($first, $second) {
            return ($first['jumlah_waktu']) > ($second['jumlah_waktu']);
        });
        $this->load->view('home', $data);
    }
}
