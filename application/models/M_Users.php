<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Users extends CI_Model
{

    public $table = 'users';
    public $id = 'id_users';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_users', $q);
	$this->db->or_like('namalengkap', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('akses', $q);
	$this->db->or_like('isActive', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_users', $q);
	$this->db->or_like('namalengkap', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('akses', $q);
	$this->db->or_like('isActive', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // Function Aktivasi
        function aktivasi($id_users)
        {
            $this->db->set('isActive', 1);
            $this->db->where($this->id, $id_users);
            $this->db->update($this->table);
        }
        
        function nonaktif($id_users)
        {
            $this->db->set('isActive', 0);
            $this->db->where($this->id, $id_users);
            $this->db->update($this->table);
        }
    // Function Hak Akses
        function guest($id_users)
        {
            $this->db->set('akses', 2);
            $this->db->where($this->id, $id_users);
            $this->db->update($this->table);
        }
        
        function admin($id_users)
        {
            $this->db->set('akses', 1);
            $this->db->where($this->id, $id_users);
            $this->db->update($this->table);
        }

}

/* End of file M_Users.php */
/* Location: ./application/models/M_Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-19 17:26:31 */
/* http://harviacode.com */