<?php

class produksi_m extends CI_Model
{

    public function cek_kode_produksi($id_produksi)
    {
        $chek_code = $this->db->query("SELECT * FROM produksi WHERE id_produksi ='$id_produksi'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_jenis_produksi($id_produksi)
    {
        $chek_code = $this->db->query("SELECT * FROM produksi WHERE jenis_produk ='$id_produksi'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_jenis_kode_produksi($id_produksi, $jenis_produksi)
    {
        $chek_code = $this->db->query("SELECT * FROM produksi WHERE jenis_produk ='$jenis_produksi' and id_produksi != '$id_produksi'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kode_produksi_barang($id_produksi)
    {
        $chek_code = $this->db->query("SELECT * FROM produksi WHERE id_produksi != '$id_produksi'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_produksi($table, $id_produksi)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_produksi', $id_produksi);
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

    public function get($id_produksi = null)
    {
        $this->db->from('produksi');
        if ($id_produksi != null) {
            $this->db->where('id_produksi', $id_produksi);
        }
        $query = $this->db->get();
        return $query;
    }

    public function cari($table, $id_produksi)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_produksi', $id_produksi);
        $result = $this->db->get()->result();
        return $result;
    }
}
