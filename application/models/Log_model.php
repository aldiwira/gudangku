<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here

        $this->load->model('Cruder_model', 'cruder_m');
    }


    // List all your items
    public function getLog()
    {
        $this->db->select("riwayat.id_riwayat, riwayat.nama_riwayat, catatan.nama_catatan, catatan.penanggung, catatan.tipe_catatan, riwayat.createdAt, riwayat.updatedAt");
        $this->db->from("riwayat");
        $this->db->join("catatan", "catatan.id_catatan = riwayat.id_catatan");
        $thisMonth = date("m", time());
        $this->db->where('month(riwayat.createdAt)', $thisMonth);
        return $this->db->get()->result();
    }

    // Add a new item
    public function addLog($type, $id_catatan)
    {
        $kodeLog = randomId(10);
        $checkCatatan = $this->cruder_m->where("catatan", array("id_catatan" => $id_catatan))->row();
        if ($type == "masuk") {
            $data = array(
                "id_riwayat" => $kodeLog,
                "nama_riwayat" => "Barang masuk dari " . $checkCatatan->penanggung,
                "id_catatan" => $id_catatan,
                "status" => "masuk"
            );
        } else if ($type == "keluar") {
            $data = array(
                "id_riwayat" => $kodeLog,
                "nama_riwayat" => "Barang keluar ke " . $checkCatatan->penanggung,
                "id_catatan" => $id_catatan,
                "status" => "keluar"
            );
        }
        $this->cruder->create("riwayat", $data);
        return true;
    }

    // for count items at dashboard
    public function getAllCountItems()
    {
        $json = [];
        $type = ['baru', 'normal', 'rusak', 'ada', 'keluar'];

        foreach ($type as $key => $value) {
            if ($value == 'baru' || $value == 'normal' || $value == 'rusak') {
                $where = array("status_barang" => "ada", "kondisi_barang" => $value);
                $sum = "jumlah_barang";
                $group = "kondisi_barang";
            } else if ($value == 'ada' || $value == 'keluar') {
                $where = array("status_barang" => $value);
                $sum = "jumlah_barang";
                $group = "kondisi_barang";
            }
            $query = $this->getCountItems($where, $sum, $group);
            if ($query != null) {
                $res = (int) $query->jumlah_barang;
            } else {
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
