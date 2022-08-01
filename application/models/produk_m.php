<?php

class produk_m extends CI_Model
{

    public function cek_kode_produk($id_produk)
    {
        $chek_code = $this->db->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_jenis_produk($id_produk)
    {
        $chek_code = $this->db->query("SELECT * FROM produk WHERE jenis_produk ='$id_produk'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_jenis_kode_produk($id_produk, $jenis_produk)
    {
        $chek_code = $this->db->query("SELECT * FROM produk WHERE jenis_produk ='$jenis_produk' and id_produk != '$id_produk'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kode_produk_barang($id_produk)
    {
        $chek_code = $this->db->query("SELECT * FROM produk WHERE id_produk != '$id_produk'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_produk($table, $id_produk)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_produk', $id_produk);
        $result = $this->db->get();
        return json_encode($result->num_rows());
    }

    public function get_alldata($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $result = $this->db->get()->result();
        return $result;
    }

    public function cari($table, $id_produk)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_produk', $id_produk);
        $result = $this->db->get()->result();
        return $result;
    }
}
