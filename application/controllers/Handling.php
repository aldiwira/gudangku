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
}
    
    /* End of file 404.php */
