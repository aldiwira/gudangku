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
        $data['title'] = "Admin Dashboard";
        $data['content'] = $this->load->view('admin/dashboard');
        $this->load->view('template/main', $data);
    }

    public function Peminjaman()
    {
        $data['title'] = "Peminjaman Barang";
        $data['content'] = $this->load->view('admin/peminjaman_barang');
        $this->load->view('template/main', $data);
    }

    public function Pengembalian()
    {
        $data['title'] = "Pengembalian Barang";
        $data['content'] = $this->load->view('admin/pengembalian_barang');
        $this->load->view('template/main', $data);
    }

    public function Tambah()
    {
        $data['title'] = "Tambah Barang";
        $data['content'] = $this->load->view('admin/tambah_barang');
        $this->load->view('template/main', $data);
    }
}
    
    /* End of file Main.php */
