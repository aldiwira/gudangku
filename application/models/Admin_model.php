<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Cruder_Model', 'cruder');
        $this->load->helper('Varrand');
    }

    public function getKategori()
    {
        return $this->cruder->get('kategori')->result();
    }
    public function getBarang()
    {
        $this->db->select("barang.kode_barang, barang.nama_barang, kategori.nama_katagori, barang.jumlah_barang, barang.status_barang, barang.kondisi_barang");
        $this->db->select_sum("barang.jumlah_barang");
        $this->db->group_by("barang.kondisi_barang");
        $this->db->group_by("barang.status_barang");
        $this->db->group_by("barang.nama_barang");
        $this->db->where("barang.status_barang", "ada");
        $this->db->from("barang");
        $this->db->join("kategori", "kategori.id_katagori = barang.id_katagori");
        $datas = $this->db->get()->result();
        return $datas;
    }
    public function addBarang()
    {
        $datas = array(
            "kode_barang" => randomId(10),
            "nama_barang" => $this->input->post('namabarangtxt'),
            "jumlah_barang" => $this->input->post('jumlahbarangtxt'),
            "kondisi_barang" => $this->input->post('kondisibarang'),
            "id_katagori" => $this->input->post('katagoribarang')
        );
        $checker = $this->cruder->whereLikeCondition(
            "barang",
            array("nama_barang" => $datas["nama_barang"]),
            array("kondisi_barang" => $datas["kondisi_barang"], "status_barang" => "ada", "id_katagori" => $datas["id_katagori"])
        )->row();

        if ($checker != null) {
            $this->cruder->update(
                "barang",
                array("kode_barang" => $checker->kode_barang, "id_katagori" => $datas["id_katagori"]),
                array("jumlah_barang" => $checker->jumlah_barang + $datas["jumlah_barang"])
            );
            return true;
        } else {
            $this->cruder->create('barang', $datas);
            return true;
        }
    }
}

/* End of file Admin.php */
