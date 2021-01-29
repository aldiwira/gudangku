<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cruder_model extends CI_Model
{
    public function get($table)
    {
        return $this->db->get($table);
    }
    public function where($table, $filter)
    {
        $this->db->where($filter);
        return $this->db->get($table);
    }
    public function whereLike($table, $filter)
    {
        $this->db->like($filter);
        return $this->db->get($table);
    }
    public function wherelikecondition($table, $where, $like)
    {
        $this->db->like($like);
        $this->db->where($where);
        return $this->db->get($table);
    }
    public function create($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function update($table, $filter, $update)
    {
        $this->db->where($filter);
        $this->db->update($table, $update, $filter);
    }
    public function remove($table, $filter)
    {
        $this->db->delete($table, $filter);
    }
}
    
    /* End of file cruder.php */
