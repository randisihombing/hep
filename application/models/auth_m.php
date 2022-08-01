<?php

class auth_m extends CI_Model
{

    //ini adalah fungsi login dari controller
    function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $query = $this->db->get();
        return $query;
    }
    function lupa_password($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query;
    }
}
