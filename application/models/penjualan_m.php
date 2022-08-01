<?php

class penjualan_m extends CI_Model
{

    public function cek_kode_penjualan($id_penjualan)
    {
        $chek_code = $this->db->query("SELECT * FROM penjualan WHERE id_penjualan ='$id_penjualan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_jenis_penjualan($id_penjualan)
    {
        $chek_code = $this->db->query("SELECT * FROM penjualan WHERE jenis_produk ='$id_penjualan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_jenis_kode_penjualan($id_penjualan, $jenis_produk)
    {
        $chek_code = $this->db->query("SELECT * FROM penjualan WHERE jenis_produk ='$jenis_produk' and id_penjualan != '$id_penjualan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kode_penjualan_barang($id_penjualan)
    {
        $chek_code = $this->db->query("SELECT * FROM penjualan WHERE id_penjualan != '$id_penjualan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_penjualan($table, $id_penjualan)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_penjualan', $id_penjualan);
        $result = $this->db->get();
        return json_encode($result->num_rows());
    }

    public function get_alldata($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by('status');
        $this->db->group_by('id_penjualan');
        $result = $this->db->get()->result();
        return $result;
    }

    public function cari($table, $id_penjualan)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_penjualan', $id_penjualan);
        $result = $this->db->get()->result();
        return $result;
    }

    // peramalan
    public function get_first_date()
    {
        $chek_code = $this->db->query("SELECT DATE_FORMAT(MIN(tgl), '%Y-%m') as tanggal FROM penjualan WHERE status=1");
        return $chek_code->row();
    }

    public function get_all_ramal($first_date, $current_date, $nama_produksi)
    {
        $chek_code = $this->db->query("SELECT SUM(jumlah) as jumlah FROM penjualan WHERE status = 1 and '$first_date' <= DATE_FORMAT(tgl, '%Y-%m') and DATE_FORMAT(tgl, '%Y-%m') < '$current_date' and jenis_produk = '$nama_produksi' group by DATE_FORMAT(tgl, '%Y-%m')");
        return $chek_code->result();
    }

    public function ramal($nama_produksi, $tanggal)
    {
        $chek_code = $this->db->query("SELECT SUM(jumlah) as jumlah,tgl FROM `penjualan` WHERE status = 1 and DATE_FORMAT(tgl, '%Y-%m') = '$tanggal' and jenis_produk = '$nama_produksi'");
        return $chek_code->row();
    }

    public function jadwal()
    {
        $chek_code = $this->db->query("SELECT DATE_FORMAT(tgl, '%Y-%m') as date,SUM(jumlah) as jumlah_produk,tgl,jenis_produk FROM penjualan where status = 0 group by DATE_FORMAT(tgl, '%Y-%m'), jenis_produk");
        return $chek_code->result();
    }

    public function get_count_produksi()
    {
        $chek_code = $this->db->query("SELECT * FROM `penjualan` WHERE 1 group by jenis_produk");
        return $chek_code->num_rows();
    }
    // end peramalan
}
