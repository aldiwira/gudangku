<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper('cookie');

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
        // Main
        $data["title"] = "Admin Dashboard";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Peminjaman()
    {
        // Data peminjaman admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/peminjaman_barang', '', true);
        // Main
        $data['title'] = "Peminjaman Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Pengembalian()
    {
        // Data pengembalian admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/pengembalian_barang', '', true);
        // Main
        $data['title'] = "Pengembalian Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Tambah()
    {
        // Data tambah barang admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/tambah_barang', '', true);
        // Main
        $data['title'] = "Tambah Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Status()
    {
        // Data status barang admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/status_barang', '', true);
        // Main
        $data['title'] = "Status Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }
}
    
    /* End of file Main.php */
