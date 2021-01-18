<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function Admin()
    {
        $data['title'] = "Admin Dashboard";
        $data['content'] = $this->load->view('admin/dashboard');
        $this->load->view('template/main', $data);
    }

    public function Peminjaman()
    {
        $data['title'] = "Peminjaman Barang";
        $this->load->view('template/main', $data);
        $data['content'] = $this->load->view('admin/peminjaman_barang');
    }

    public function Pengembalian()
    {
        $data['title'] = "Pengembalian Barang";
        $this->load->view('template/main', $data);
        $data['content'] = $this->load->view('admin/pengembalian_barang');
    }

    public function Tambah()
    {
        $data['title'] = "Tambah Barang";
        $this->load->view('template/main', $data);
        $data['content'] = $this->load->view('admin/tambah_barang');
    }
}
    
    /* End of file Main.php */
