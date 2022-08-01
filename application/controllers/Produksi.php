<?php

class Produksi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->model('produksi_m');
        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tambah_produksi()
    {
        $this->load->view('produksi/tambah_produksi');
    }

    public function store()
    {
        $id_produksi = $_POST['id_produksi'];
        $tgl = $_POST['tgl'];
        $jenis_produk       = $_POST['jenis_produk'];
        $jumlah       = $_POST['jumlah'];
        $nama       = $_POST['nama'];
        $jumlah1       = $_POST['jumlah1'];
        $nama2       = $_POST['nama2'];
        $jumlah2       = $_POST['jumlah2'];
        $nama3       = $_POST['nama3'];
        $jumlah3       = $_POST['jumlah3'];
        $nama4       = $_POST['nama4'];
        $jumlah4       = $_POST['jumlah4'];
        $nama5       = $_POST['nama5'];
        $jumlah5       = $_POST['jumlah5'];
        $nama6       = $_POST['nama6'];
        $jumlah6       = $_POST['jumlah6'];
        $nama7       = $_POST['nama7'];
        $jumlah7       = $_POST['jumlah7'];
        $nama8       = $_POST['nama8'];
        $jumlah8       = $_POST['jumlah8'];
        $nama9       = $_POST['nama9'];
        $jumlah9       = $_POST['jumlah9'];
        $nama10       = $_POST['nama10'];
        $jumlah10       = $_POST['jumlah10'];
        $tgl_true   = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_produksi = ltrim(rtrim($id_produksi));
        $tgl = ltrim(rtrim($tgl));
        $jenis_produk       = ltrim(rtrim($jenis_produk));
        $jumlah       = ltrim(rtrim($jumlah));
        $nama       = ltrim(rtrim($nama));
        $jumlah1       = ltrim(rtrim($jumlah1));
        $nama2       = ltrim(rtrim($nama2));
        $jumlah2       = ltrim(rtrim($jumlah2));
        $nama3       = ltrim(rtrim($nama3));
        $jumlah3       = ltrim(rtrim($jumlah3));
        $nama4       = ltrim(rtrim($nama4));
        $jumlah4       = ltrim(rtrim($jumlah4));
        $nama5       = ltrim(rtrim($nama5));
        $jumlah5       = ltrim(rtrim($jumlah5));
        $nama6       = ltrim(rtrim($nama6));
        $jumlah6       = ltrim(rtrim($jumlah6));
        $nama7       = ltrim(rtrim($nama7));
        $jumlah7       = ltrim(rtrim($jumlah7));
        $nama8       = ltrim(rtrim($nama8));
        $jumlah8       = ltrim(rtrim($jumlah8));
        $nama9       = ltrim(rtrim($nama9));
        $jumlah9       = ltrim(rtrim($jumlah9));
        $nama10       = ltrim(rtrim($nama10));
        $jumlah10       = ltrim(rtrim($jumlah10));


        //disini cek dulu kode kategori kosong atau tidak
        if ($id_produksi == "") {
            echo "errkat\t";
            exit();
        }

        //disini cek kode kategori sudah ada atau belum
        $cek_kat = $this->produksi_m->cek_kode_produksi($id_produksi);
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
        $cek_nama = $this->produksi_m->cek_jenis_produksi($jenis_produk);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        if ($jenis_produk != "" && $jumlah != "") {
            $this->db->query("UPDATE produk SET jumlah=jumlah-'$jumlah' WHERE jenis_produk ='$jenis_produk'");
        }
        if ($nama != "" && $jumlah1 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah1' WHERE nama='$nama'");
        }
        if ($nama2 != "" && $jumlah2 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah2' WHERE nama='$nama2'");
        }
        if ($nama3 != "" && $jumlah3 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah3' WHERE nama='$nama3'");
        }
        if ($nama4 != "" && $jumlah4 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah4' WHERE nama='$nama4'");
        }
        if ($nama5 != "" && $jumlah5 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah5' WHERE nama='$nama5'");
        }
        if ($nama6 != "" && $jumlah6 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah6' WHERE nama='$nama6'");
        }
        if ($nama7 != "" && $jumlah7 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah7' WHERE nama='$nama7'");
        }
        if ($nama8 != "" && $jumlah8 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah8' WHERE nama='$nama8'");
        }
        if ($nama9 != "" && $jumlah9 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah9' WHERE nama='$nama9'");
        }
        if ($nama10 != "" && $jumlah10 != "") {
            $this->db->query("UPDATE bahan SET jmlh=jmlh-'$jumlah10' WHERE nama='$nama10'");
        }
        $this->db->query("INSERT INTO produksi SET
        				    id_produksi = '$id_produksi',
                            tgl = '$tgl',
        				    jenis_produk   = '$jenis_produk',
                            jumlah = '$jumlah',
                            nama = '$nama',
                            jumlah1 = '$jumlah1',
                            nama2 = '$nama2',
                            jumlah2 = '$jumlah2',
                            nama3 = '$nama3',
                            jumlah3 = '$jumlah3',
                            nama4 = '$nama4',
                            jumlah4 = '$jumlah4',
                            nama5 = '$nama5',
                            jumlah5 = '$jumlah5',
                            nama6 = '$nama6',
                            jumlah6 = '$jumlah6',
                            nama7 = '$nama7',
                            jumlah7 = '$jumlah7',
                            nama8 = '$nama8',
                            jumlah8 = '$jumlah8',
                            nama9 = '$nama9',
                            jumlah9 = '$jumlah9',
                            nama10 = '$nama10',
                            jumlah10 = '$jumlah10',
                            created_by          = '$user_login',
                            created_date        = '$tgl_true',
                            modified_by         = '$user_login',
                            modified_date       = '$tgl_true'");

        echo "OK\t";
    }

    public function kelola_produksi()
    {
        $data['data'] = $this->produksi_m->get_alldata('produksi');
        $this->load->view('produksi/kelola_produksi', $data);
    }

    public function cari()
    {
        $id_produksi = $_POST['id_produksi'];

        $data = $this->produksi_m->cari('produksi', $id_produksi);

        echo json_encode($data);
    }

    public function update()
    {

        $id_produksi = $_POST['id_produksi'];
        $tgl = $_POST['tgl'];
        $jenis_produk       = $_POST['jenis_produk'];
        $jumlah       = $_POST['jumlah'];
        $nama       = $_POST['nama'];
        $jumlah1       = $_POST['jumlah1'];
        $nama2       = $_POST['nama2'];
        $jumlah2       = $_POST['jumlah2'];
        $nama3       = $_POST['nama3'];
        $jumlah3       = $_POST['jumlah3'];
        $nama4       = $_POST['nama4'];
        $jumlah4       = $_POST['jumlah4'];
        $nama5       = $_POST['nama5'];
        $jumlah5       = $_POST['jumlah5'];
        $nama6       = $_POST['nama6'];
        $jumlah6       = $_POST['jumlah6'];
        $nama7       = $_POST['nama7'];
        $jumlah7       = $_POST['jumlah7'];
        $nama8       = $_POST['nama8'];
        $jumlah8       = $_POST['jumlah8'];
        $nama9       = $_POST['nama9'];
        $jumlah9       = $_POST['jumlah9'];
        $nama10       = $_POST['nama10'];
        $jumlah10       = $_POST['jumlah10'];
        $tgl_true   = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $id_produksi = ltrim(rtrim($id_produksi));
        $tgl = ltrim(rtrim($tgl));
        $jenis_produk       = ltrim(rtrim($jenis_produk));
        $jumlah       = ltrim(rtrim($jumlah));
        $nama       = ltrim(rtrim($nama));
        $jumlah1       = ltrim(rtrim($jumlah1));
        $nama2       = ltrim(rtrim($nama2));
        $jumlah2       = ltrim(rtrim($jumlah2));
        $nama3       = ltrim(rtrim($nama3));
        $jumlah3       = ltrim(rtrim($jumlah3));
        $nama4       = ltrim(rtrim($nama4));
        $jumlah4       = ltrim(rtrim($jumlah4));
        $nama5       = ltrim(rtrim($nama5));
        $jumlah5       = ltrim(rtrim($jumlah5));
        $nama6       = ltrim(rtrim($nama6));
        $jumlah6       = ltrim(rtrim($jumlah6));
        $nama7       = ltrim(rtrim($nama7));
        $jumlah7       = ltrim(rtrim($jumlah7));
        $nama8       = ltrim(rtrim($nama8));
        $jumlah8       = ltrim(rtrim($jumlah8));
        $nama9       = ltrim(rtrim($nama9));
        $jumlah9       = ltrim(rtrim($jumlah9));
        $nama10       = ltrim(rtrim($nama10));
        $jumlah10       = ltrim(rtrim($jumlah10));

        //disini cek kode  kategori barang kosong atau tidak
        if ($id_produksi == "") {
            echo "errkode\t";
            exit();
        }

        //disini cek nama kategori barang kosong atau tidak
        if ($jenis_produk == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama kategori barang sudah ada atau belum
        $cek_nama = $this->produksi_m->cek_jenis_kode_produksi('produksi', $id_produksi, $jenis_produk);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("UPDATE produksi SET
                                    id_produksi = '$id_produksi',
                                    tgl = '$tgl_true',
                                    jenis_produk = '$jenis_produk',
                                    jumlah = '$jumlah',
                                    nama = '$nama',
                                    jumlah1 = '$jumlah1',
                                    nama2 = '$nama2',
                                    jumlah2 = '$jumlah2',
                                    nama3 = '$nama3',
                                    jumlah3 = '$jumlah3',
                                    nama4 = '$nama4',
                                    jumlah4 = '$jumlah4',
                                    nama5 = '$nama5',
                                    jumlah5 = '$jumlah5',
                                    nama6 = '$nama6',
                                    jumlah6 = '$jumlah6',
                                    nama7 = '$nama7',
                                    jumlah7 = '$jumlah7',
                                    nama8 = '$nama8',
                                    jumlah8 = '$jumlah8',
                                    nama9 = '$nama9',
                                    jumlah9 = '$jumlah9',
                                    nama10 = '$nama10',
                                    jumlah10 = '$jumlah10',
                                    created_by          = '$user_login',
                                    created_date        = '$tgl_true',
                                    modified_by         = '$user_login',
                                    modified_date       = '$tgl_true'
                                    WHERE id_produksi = '$id_produksi'");
        echo "OK\t";
    }

    public function delete()
    {
        $id_produksi = $_POST['id_produksi'];
        $this->db->query("DELETE FROM produksi WHERE id_produksi = '$id_produksi'");
        echo "OK\t";
    }
}
