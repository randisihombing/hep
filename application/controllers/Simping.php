<?php

class Simping extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->model('simping_m');
        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tambah_simping()
    {
        $this->load->view('simping/tambah_simping');
    }

    public function store()
    {
        $id_simping = $_POST['id_simping'];
        $nama_simping       = $_POST['nama_simping'];
        $tgl   = $_POST['tgl'];
        $target   = $_POST['target'];
        $realisasi   = $_POST['realisasi'];
        $tgl_true                = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_simping = ltrim(rtrim($id_simping));
        $nama_simping       = ltrim(rtrim($nama_simping));
        $tgl       = ltrim(rtrim($tgl));
        $target       = ltrim(rtrim($target));
        $realisasi       = ltrim(rtrim($realisasi));



        //disini cek dulu kode kategori kosong atau tidak
        if ($id_simping == "") {
            echo "errkat\t";
            exit();
        }

        //disini cek kode kategori sudah ada atau belum
        $cek_kat = $this->simping_m->cek_kode_kategori($id_simping);
        if ($cek_kat > 0) {
            echo "katada\t";
            exit();
        }

        //disini cek nama barang kosong atau tidak
        if ($nama_simping == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama barang sudah ada atau belum
        $cek_nama = $this->simping_m->cek_nama_barang($nama_simping);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("INSERT INTO simping SET
        				    id_simping = '$id_simping',
        				    tgl = '$tgl',
        				    nama_simping   = '$nama_simping',
        				    target   = '$target',
        				    realisasi   = '$realisasi',
                            created_by = '$user_login',
                            created_date = '$tgl_true',
                            modified_by = '$user_login',
                            modified_date = '$tgl_true'");

        echo "OK\t";
    }

    public function kelola_simping()
    {
        $data['data'] = $this->simping_m->get_alldata('simping');
        $this->load->view('simping/kelola_simping', $data);
    }

    public function cari()
    {
        $kode_jen = $_POST['kode_jen'];

        $data = $this->jenis_m->cari('jenis', $kode_jen);

        echo json_encode($data);
    }

    public function update()
    {

        $kode_jen            = $_POST['kode_jen'];
        $jenis                = $_POST['jenis'];
        $tgl_true            = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $kode_jen            = ltrim(rtrim($kode_jen));
        $jenis                = ltrim(rtrim($jenis));

        //disini cek kode  kategori barang kosong atau tidak
        if ($kode_jen == "") {
            echo "errkode\t";
            exit();
        }

        //disini cek nama kategori barang kosong atau tidak
        if ($jenis == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama kategori barang sudah ada atau belum
        $cek_nama = $this->jenis_m->cek_nama_kode_kategori('kategori', $kode_jen, $jenis);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("UPDATE jenis SET
                                    id_jenis = '$kode_jen',
                                    jenis_barang = '$jenis',
                                    modified_by = '$user_login',
                                    modified_date = '$tgl_true'
                                    WHERE id_jenis = '$kode_jen'");
        echo "OK\t";
    }

    public function delete()
    {
        $kode_jen = $_POST['kode_jen'];

        $data = $this->jenis_m->cek_kategori('barang', $kode_jen);

        if ($data > 0) {
            echo "Kode Jenis Sudah Digunakan di Data Barang\t";
            exit();
        }

        $this->db->query("DELETE FROM jenis WHERE id_jenis = '$kode_jen'");
        echo "OK\t";
    }
}
