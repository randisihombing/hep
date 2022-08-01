<?php

class Bahan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->model('bahan_m');
        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tambah_bahan()
    {
        $this->load->view('bahan/tambah_bahan');
    }

    public function store()
    {
        $id_bahan = $_POST['id_bahan'];
        $nama       = $_POST['nama'];
        $tgl       = $_POST['tgl'];
        $jmlh   = $_POST['jmlh'];
        $tgl_true                = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_bahan = ltrim(rtrim($id_bahan));
        $nama       = ltrim(rtrim($nama));
        $tgl       = ltrim(rtrim($tgl));
        $jmlh       = ltrim(rtrim($jmlh));



        //disini cek dulu kode kategori kosong atau tidak

        //disini cek kode kategori sudah ada atau belum
        $cek_kat = $this->bahan_m->cek_kode_bahan($id_bahan);
        if ($cek_kat > 0) {
            echo "katada\t";
            exit();
        }

        //disini cek nama barang kosong atau tidak
        if ($nama == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama barang sudah ada atau belum
        $cek_nama = $this->bahan_m->cek_nama_barang($nama);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("INSERT INTO bahan SET
        				    id_bahan = '$id_bahan',
        				    tgl = '$tgl',
        				    nama   = '$nama',
        				    jmlh   = '$jmlh',
                            created_by = '$user_login',
                            created_date = '$tgl_true',
                            modified_by = '$user_login',
                            modified_date = '$tgl_true'");

        echo "OK\t";
    }

    public function kelola_bahan()
    {
        $data['data'] = $this->bahan_m->get_alldata('bahan');
        $this->load->view('bahan/kelola_bahan', $data);
    }

    public function cari()
    {
        $id_bahan = $_POST['id_bahan'];

        $data = $this->bahan_m->cari('bahan', $id_bahan);

        echo json_encode($data);
    }

    public function update()
    {

        $id_bahan = $_POST['id_bahan'];
        $nama       = $_POST['nama'];
        $tgl       = $_POST['tgl'];
        $jmlh   = $_POST['jmlh'];
        $tgl_true                = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_bahan = ltrim(rtrim($id_bahan));
        $nama       = ltrim(rtrim($nama));
        $tgl       = ltrim(rtrim($tgl));
        $jmlh       = ltrim(rtrim($jmlh));

        //disini cek kode  kategori barang kosong atau tidak
        if ($id_bahan == "") {
            echo "errkode\t";
            exit();
        }

        //disini cek nama kategori barang kosong atau tidak
        if ($nama == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama kategori barang sudah ada atau belum
        $cek_nama = $this->bahan_m->cek_nama_kode_bahan('bahan', $id_bahan, $nama);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("UPDATE bahan SET
                                    id_bahan = '$id_bahan',
                                    tgl = '$tgl',
                                    nama = '$nama',
                                    jmlh = '$jmlh',
                                    modified_by = '$user_login',
                                    modified_date = '$tgl_true'
                                    WHERE id_bahan = '$id_bahan'");
        echo "OK\t";
    }

    public function delete()
    {
        $id_bahan = $_POST['id_bahan'];
        $this->db->query("DELETE FROM bahan WHERE id_bahan = '$id_bahan'");
        echo "OK\t";
    }
}
