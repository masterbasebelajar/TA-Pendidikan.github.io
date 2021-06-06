<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_login extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // Get User
    function getUser($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        // $this->db->where('password', $password);
        return $this->db->get()->result();
    }

    // Get User Daftar
    

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

}