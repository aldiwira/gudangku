<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Handling extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Cruder_model', 'cruder');
        $this->load->model('Admin_model', 'admin_m');
        $this->load->model('Log_model', 'log_m');
    }

    // 404 handler page error
    public function index()
    {
        $data['title'] = "404 Not Found";
        $data['content'] = $this->load->view('template/404');
        $this->load->view('template/main', $data);
    }

    public function check()
    {
        $type = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        if ($type == "kategori") {
            if ($id != 0) {
                $datas = $this->cruder->where("barang", array("id_katagori" => $id, "status_barang" => "ada", "kondisi_barang !=" => "rusak"))->result();

                $html = "";
                $html .= "<option value='0'>Silahkan pilih barang yang tersedia</option>";
                foreach ($datas as $value) {
                    $html .= "<option value=" . $value->kode_barang . ">" . $value->nama_barang . " (Kondisi Barang : " . $value->kondisi_barang . ")</option>";
                }
                print_r($html);
            }
        } else if ($type == "stok") {
            if ($id != "0") {
                $datas = $this->cruder->where("barang", array("kode_barang" => $id, "status_barang" => "ada"))->result();
                print_r($datas[0]->jumlah_barang);
            } else {
                print_r("0");
            }
        }
    }
    public function countItems()
    {
        $typeItem = $this->uri->segment(3);
        if ($typeItem == "baru") {
            $select = "barang.kondisi_barang, barang.status_barang";
            $where = array("kondisi_barang" => "baru", "status_barang" => "ada");
            $sum = "jumlah_barang";
            $group = array("kondisi_barang");
        } else if ($typeItem == "normal") {
            $select = "barang.kondisi_barang, barang.status_barang";
            $where = array("kondisi_barang" => "normal", "status_barang" => "ada");
            $sum = "jumlah_barang";
            $group = array("kondisi_barang");
        } else if ($typeItem == "rusak") {
            $select = "barang.kondisi_barang, barang.status_barang";
            $where = array("kondisi_barang" => "rusak", "status_barang" => "ada");
            $sum = "jumlah_barang";
            $group = array("kondisi_barang");
        } else if ($typeItem == "ada") {
            $select = "barang.status_barang";
            $where = array("status_barang" => "ada");
            $sum = "jumlah_barang";
            $group = array("status_barang");
        } else if ($typeItem == "keluar") {
            $select = "barang.status_barang";
            $where = array("status_barang" => "keluar");
            $sum = "jumlah_barang";
            $group = array("status_barang");
        }
        $res = $this->log_m->countBarang($select, $where, $group, $sum);
        print_r(json_encode($res));
    }
    public function showDetailLog()
    {
        $idDetail = $this->uri->segment(3);
        $data["dataPinjaman"] = $this->admin_m->getPinjaman($idDetail, "semua");
        $data["datas_barang"] = $this->admin_m->getBarangPinjam($data["dataPinjaman"]->id_catatan);
        $this->load->view('components/Table_detail', $data, FALSE);
    }
}
    
    /* End of file 404.php */
