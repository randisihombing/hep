<?php

class bahan_m extends CI_Model
{

    public function cek_kode_bahan($id_bahan)
    {
        $chek_code = $this->db->query("SELECT * FROM bahan WHERE id_bahan ='$id_bahan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_nama_barang($id_bahan)
    {
        $chek_code = $this->db->query("SELECT * FROM bahan WHERE nama ='$id_bahan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_nama_kode_bahan($id_bahan, $nama)
    {
        $chek_code = $this->db->query("SELECT * FROM bahan WHERE nama ='$nama' and id_bahan != '$id_bahan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kode_bahan_barang($id_bahan)
    {
        $chek_code = $this->db->query("SELECT * FROM bahan WHERE id_bahan != '$id_bahan'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_bahan($table, $id_bahan)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_bahan', $id_bahan);
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

    public function cari($table, $id_bahan)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_bahan', $id_bahan);
        $result = $this->db->get()->result();
        return $result;
    }
}
