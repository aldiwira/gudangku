<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAllCountItems()
    {
        $json = [];
        $type = ['baru', 'normal', 'rusak', 'ada', 'keluar'];
        
        foreach ($type as $key => $value) {
            if ($value == 'baru' || $value == 'normal' || $value == 'rusak') {
                $where = array("status_barang" => "ada", "kondisi_barang" => $value);
                $sum = "jumlah_barang";
                $group = "kondisi_barang";
            }else if($value == 'ada' || $value == 'keluar') {
                $where = array("status_barang" => "ada", "kondisi_barang" => $value);
                $sum = "jumlah_barang";
                $group = "kondisi_barang";
            }
            $query = $this->getCountItems($where, $sum, $group);
            if ($query != null) {
                $res = (int) $query->jumlah_barang;
            }else{
                $res = (int) "0";
            }
            $json[$value] = $res;
        }
        return $json;
    }

    private function getCountItems($where, $sum, $group)
    {
        $this->db->select_sum($sum);
        $this->db->where($where);
        $this->db->group_by($group);
        $this->db->from("barang");
        $datas = $this->db->get()->row();
        return $datas;
    }
}

/* End of file Log_model.php */
