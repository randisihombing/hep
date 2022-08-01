<?php

class Penjualan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->model('penjualan_m');
        $this->load->model('produk_m');
        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tambah_penjualan()
    {
        $this->load->view('penjualan/tambah_penjualan');
    }

    public function get_data()
    {
        $min = 0;
        $min_ramal = 0;
        $nama_produksi = $this->input->post('jenis_produk');
        $tanggal = $this->input->post('tgl');
        $first_data = $this->penjualan_m->get_first_date();
        $main_tanggal = date("Y-m", strtotime($tanggal));
        $total_bulan = $this->penjualan_m->get_all_ramal($first_data->tanggal, $main_tanggal, $nama_produksi);
        $jumlah_bulan = round(abs(strtotime($main_tanggal) - strtotime($first_data->tanggal)) / 2592000);
        $selisih_bulan = [];
        for ($i = 0; $i < $jumlah_bulan; $i++) {
            $get_date = date("Y-m", strtotime("+" . $i . " month", strtotime($first_data->tanggal)));
            $get_data_date = $this->penjualan_m->ramal($nama_produksi, $get_date);
            array_push($selisih_bulan, $get_data_date);
        }
        $prediksi = [];
        $gelat = [];
        if (count($selisih_bulan) <= count($total_bulan)) {
            // gelat lngsung kuadrat ^2
            if (count($selisih_bulan) > 1) {
                // w2
                $hasil_final = 0;
                for ($i = 2; $i <= count($selisih_bulan); $i++) {
                    if ($i != count($selisih_bulan)) {
                        $hasil_peramalan = (($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah)) / 2;
                        $hasil_gelat = round(pow(($selisih_bulan[$i]->jumlah - $hasil_peramalan), 2));
                        array_push($gelat, $hasil_gelat);
                    } else {
                        $hasil_final = round((($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah)) / 2);
                        if (count($gelat) == 0) {
                            array_push($gelat, 0);
                        }
                    }
                }
                $prediksi[] = [round(array_sum($gelat) / count($gelat)), $hasil_final];
                $gelat = [];
            }
            if (count($selisih_bulan) > 2) {
                // w3
                $hasil_final = 0;
                for ($i = 3; $i <= count($selisih_bulan); $i++) {
                    if ($i != count($selisih_bulan)) {
                        $hasil_peramalan = (($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah) + ($selisih_bulan[$i - 3]->jumlah)) / 3;
                        $hasil_gelat = round(pow(($selisih_bulan[$i]->jumlah - $hasil_peramalan), 2));
                        array_push($gelat, $hasil_gelat);
                    } else {
                        $hasil_final = round((($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah) + ($selisih_bulan[$i - 3]->jumlah)) / 3);
                        if (count($gelat) == 0) {
                            array_push($gelat, 0);
                        }
                    }
                }
                $prediksi[] = [round(array_sum($gelat) / count($gelat)), $hasil_final];
                $gelat = [];
            }
            if (count($selisih_bulan) > 3) {
                // w4
                $hasil_final = 0;
                for ($i = 4; $i <= count($selisih_bulan); $i++) {
                    if ($i != count($selisih_bulan)) {
                        $hasil_peramalan = (($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah) + ($selisih_bulan[$i - 3]->jumlah) + ($selisih_bulan[$i - 4]->jumlah)) / 4;
                        $hasil_gelat = round(pow(($selisih_bulan[$i]->jumlah - $hasil_peramalan), 2));
                        array_push($gelat, $hasil_gelat);
                    } else {
                        $hasil_final = round((($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah) + ($selisih_bulan[$i - 3]->jumlah) + ($selisih_bulan[$i - 4]->jumlah)) / 4);
                        if (count($gelat) == 0) {
                            array_push($gelat, 0);
                        }
                    }
                }
                $prediksi[] = [round(array_sum($gelat) / count($gelat)), $hasil_final];
                $gelat = [];
            }
            if (count($selisih_bulan) > 4) {
                // w5
                $hasil_final = 0;
                for ($i = 5; $i <= count($selisih_bulan); $i++) {
                    if ($i != count($selisih_bulan)) {
                        $hasil_peramalan = (($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah) + ($selisih_bulan[$i - 3]->jumlah) + ($selisih_bulan[$i - 4]->jumlah) + ($selisih_bulan[$i - 5]->jumlah)) / 5;
                        $hasil_gelat = round(pow(($selisih_bulan[$i]->jumlah - $hasil_peramalan), 2));
                        array_push($gelat, $hasil_gelat);
                    } else {
                        $hasil_final = round((($selisih_bulan[$i - 1]->jumlah) + ($selisih_bulan[$i - 2]->jumlah) + ($selisih_bulan[$i - 3]->jumlah) + ($selisih_bulan[$i - 4]->jumlah) + ($selisih_bulan[$i - 5]->jumlah)) / 5);
                        if (count($gelat) == 0) {
                            array_push($gelat, 0);
                        }
                    }
                }
                $prediksi[] = [round(array_sum($gelat) / count($gelat)), $hasil_final];
                $gelat = [];
            }

            for ($i = 0; $i < count($prediksi); $i++) {
                if ($i == 0) {
                    $min = $prediksi[$i][0];
                    $min_ramal = $prediksi[$i][1];
                } else {
                    if ($prediksi[$i][0] != 0) {
                        if ($min > $prediksi[$i][0]) {
                            $min = $prediksi[$i][0];
                            $min_ramal = $prediksi[$i][1];
                        }
                    }
                }
            }
        }
        $data = array(
            'nama_produksi' => $nama_produksi,
            'main_tanggal' => $main_tanggal,
            'first_tanggal' => $first_data->tanggal,
            'jumlah_bulan' => $jumlah_bulan,
            'selisih_bulan' => $selisih_bulan,
            'jumlah_bulan' => count($selisih_bulan),
            'prediksi' => $prediksi,
            'wma' => $min_ramal,
            // 'data' => $selisih_bulan[0]->jumlah,
            // 'data1' => $selisih_bulan[1]->jumlah,
            // 'data2' => $selisih_bulan[2]->jumlah,
            // 'data3' => $selisih_bulan[3]->jumlah,
            // 'data4' => $selisih_bulan[4]->jumlah,
        );

        echo json_encode($data);
    }

    public function jadwal()
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
        $this->load->view('penjualan/jadwal', $data);
    }

    public function store()
    {
        $id_penjualan   = $_POST['id_penjualan'];
        $jenis_produk   = $_POST['jenis_produk'];
        $jumlah         = $_POST['jumlah'];
        $tgl_true       = date("Y-m-d H:i:s");

        $user_login     = $this->session->userdata("username");

        $id_penjualan   = ltrim(rtrim($id_penjualan));
        $jenis_produk   = ltrim(rtrim($jenis_produk));
        $jumlah         = ltrim(rtrim($jumlah));


        //disini cek dulu kode kategori kosong atau tidak
        if ($id_penjualan == "") {
            echo "errkat\t";
            exit();
        }

        //disini cek kode kategori sudah ada atau belum
        $cek_kat = $this->penjualan_m->cek_kode_penjualan($id_penjualan);
        if ($cek_kat > 0) {
            echo "katada\t";
            exit();
        }

        //disini cek nama barang kosong atau tidak
        if ($jenis_produk == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama barang sudah ada atau belum
        // $cek_nama = $this->penjualan_m->cek_jenis_penjualan($jenis_produk);
        // if ($cek_nama > 0) {
        //     echo "namaada\t";
        //     exit();
        // }
        if ($jenis_produk != "" && $jumlah != "") {
            $this->db->query("UPDATE produk SET jumlah=jumlah-'$jumlah' WHERE jenis_produk='$jenis_produk'");
        }

        $this->db->query("INSERT INTO penjualan SET
        				    id_penjualan = '$id_penjualan',
                            tgl = '$tgl_true',
        				    jenis_produk   = '$jenis_produk',
                            jumlah = '$jumlah',
                            created_by = '$user_login',
                            created_date = '$tgl_true',
                            status = 0");

        echo "OK\t";
    }

    public function kelola_penjualan()
    {
        $data['data'] = $this->penjualan_m->get_alldata('penjualan');
        $this->load->view('penjualan/kelola_penjualan', $data);
    }

    public function cari()
    {
        $id_penjualan = $_POST['id_penjualan'];

        $data = $this->penjualan_m->cari('penjualan', $id_penjualan);

        echo json_encode($data);
    }

    public function update()
    {

        $id_penjualan = $_POST['id_penjualan'];
        $jenis_produk       = $_POST['jenis_produk'];
        $jumlah       = $_POST['jumlah'];
        $tgl_true   = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_penjualan = ltrim(rtrim($id_penjualan));
        $jenis_produk       = ltrim(rtrim($jenis_produk));
        $jumlah       = ltrim(rtrim($jumlah));

        //disini cek kode  kategori barang kosong atau tidak
        if ($id_penjualan == "") {
            echo "errkode\t";
            exit();
        }

        //disini cek nama kategori barang kosong atau tidak
        if ($jenis_produk == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama kategori barang sudah ada atau belum
        $cek_nama = $this->penjualan_m->cek_jenis_kode_penjualan('penjualan', $id_penjualan, $jenis_produk);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }
        // if ($jenis_produk != "" && $jumlah != "") {
        //     $this->db->query("UPDATE produk SET jumlah=jumlah-'$jumlah' WHERE jenis_produk='$jenis_produk'");
        // }
        $this->db->query("UPDATE penjualan SET
                                    id_penjualan = '$id_penjualan',
                                    tgl = '$tgl_true',
                                    jenis_produk = '$jenis_produk',
                                    jumlah = '$jumlah',
                                    modified_by = '$user_login',
                                    modified_date = '$tgl_true'
                                    WHERE id_penjualan = '$id_penjualan'");
        echo "OK\t";
    }

    public function delete()
    {
        $id_penjualan = $_POST['id_penjualan'];
        $this->db->query("DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");
        echo "OK\t";
    }
}
