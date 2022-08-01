<?php

class simping_m extends CI_Model
{

    public function cek_kode_kategori($id_jenis)
    {
        $chek_code = $this->db->query("SELECT * FROM simping WHERE id_simping ='$id_jenis'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_nama_barang($id_jenis)
    {
        $chek_code = $this->db->query("SELECT * FROM simping WHERE nama_simping ='$id_jenis'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_nama_kode_kategori($id_jenis, $nama_jenis)
    {
        $chek_code = $this->db->query("SELECT * FROM simping WHERE nama_simping ='$nama_jenis' and id_simping != '$id_jenis'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kode_kategori_barang($id_jenis)
    {
        $chek_code = $this->db->query("SELECT * FROM simping WHERE id_simping != '$id_jenis'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kategori($table, $id_jenis)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_simping', $id_jenis);
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

    public function cari($table, $id_jenis)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_simping', $id_jenis);
        $result = $this->db->get()->result();
        return $result;
    }
}
