<?php

class Produk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->model('produk_m');
        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tambah_produk()
    {
        $this->load->view('produk/tambah_produk');
    }

    public function store()
    {
        $id_produk = $_POST['id_produk'];
        $jenis_produk       = $_POST['jenis_produk'];
        $jumlah       = $_POST['jumlah'];
        $tgl_true   = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_produk = ltrim(rtrim($id_produk));
        $jenis_produk       = ltrim(rtrim($jenis_produk));
        $jumlah       = ltrim(rtrim($jumlah));


        //disini cek dulu kode kategori kosong atau tidak
        if ($id_produk == "") {
            echo "errkat\t";
            exit();
        }

        //disini cek kode kategori sudah ada atau belum
        $cek_kat = $this->produk_m->cek_kode_produk($id_produk);
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
        $cek_nama = $this->produk_m->cek_jenis_produk($jenis_produk);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("INSERT INTO produk SET
        				    id_produk = '$id_produk',
                            tgl = '$tgl_true',
        				    jenis_produk   = '$jenis_produk',
                            jumlah = '$jumlah',
                            created_by = '$user_login',
                            created_date = '$tgl_true'");

        echo "OK\t";
    }

    public function kelola_produk()
    {
        $data['data'] = $this->produk_m->get_alldata('produk');
        $this->load->view('produk/kelola_produk', $data);
    }

    public function cari()
    {
        $id_produk = $_POST['id_produk'];

        $data = $this->produk_m->cari('produk', $id_produk);

        echo json_encode($data);
    }

    public function update()
    {

        $id_produk = $_POST['id_produk'];
        $jenis_produk       = $_POST['jenis_produk'];
        $jumlah       = $_POST['jumlah'];
        $tgl_true   = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_produk = ltrim(rtrim($id_produk));
        $jenis_produk       = ltrim(rtrim($jenis_produk));
        $jumlah       = ltrim(rtrim($jumlah));

        //disini cek kode  kategori barang kosong atau tidak
        if ($id_produk == "") {
            echo "errkode\t";
            exit();
        }

        //disini cek nama kategori barang kosong atau tidak
        if ($jenis_produk == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama kategori barang sudah ada atau belum
        $cek_nama = $this->produk_m->cek_jenis_kode_produk('produk', $id_produk, $jenis_produk);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("UPDATE produk SET
                                    id_produk = '$id_produk',
                                    tgl = '$tgl_true',
                                    jenis_produk = '$jenis_produk',
                                    jumlah = '$jumlah',
                                    modified_by = '$user_login',
                                    modified_date = '$tgl_true'
                                    WHERE id_produk = '$id_produk'");
        echo "OK\t";
    }

    public function delete()
    {
        $id_produk = $_POST['id_produk'];
        $this->db->query("DELETE FROM produk WHERE id_produk = '$id_produk'");
        echo "OK\t";
    }
}
