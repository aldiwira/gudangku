<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function countBarang($select = null, $where = null, $group = null, $sum = null)
    {
        $this->db->select($select);
        // sum anything
        $this->db->select_sum($sum);
        // group by kondisi_barang or status_barang
        $this->db->group_by($group);
        // where status_barang, kondisi_barang
        $this->db->where($where);
        $this->db->from("barang");
        return $this->db->get()->row();
    }
}

/* End of file Log_model.php */
