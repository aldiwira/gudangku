<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->model('User_model', 'user_m');

        // Check cookies session
        if (!get_cookie('SID')) {
            redirect('/');
        }
    }

    public function Admin()
    {
        // Data dashboard admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/dashboard', '', true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        // Main
        $data["title"] = "Admin Dashboard";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Peminjaman()
    {
        // Data dashboard admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/peminjaman_barang', '', true);
        // Main
        $data['title'] = "Peminjaman Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Pengembalian()
    {
        // Data dashboard admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/pengembalian_barang', '', true);
        // Main
        $data['title'] = "Pengembalian Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Tambah()
    {
        // Data dashboard admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/tambah_barang', '', true);
        // Main
        $data['title'] = "Tambah Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }
}
    
    /* End of file Main.php */
