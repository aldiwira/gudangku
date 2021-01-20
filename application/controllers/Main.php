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
        // Data peminjaman admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/peminjaman_barang', '', true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
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
        $data_main['userDatas'] = $this->user_m->getUserDatas();
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
        $data_main['userDatas'] = $this->user_m->getUserDatas();
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
    /// Form Handler

    public function Katagori()
    {
        $this->form_validation->set_rules('katagoritxt', 'katagoritxt', 'required|callback_katagori_check', array('required' => 'Harap masukan katagori dengan benar'));
        if ($this->form_validation->run() == false) {
            $this->Tambah();
        } else {
            $katagoriName = $this->input->post('katagoritxt');
            $arrData = array('nama_katagori' => $katagoriName);
            $this->cruder->create('kategori', $arrData);
            redirect('tambah');
        }
    }
    public function katagori_check($str)
    {
        $check = $this->cruder->whereLike('kategori', array('nama_katagori' => $str))->row();
        if ($check == null) {
            return true;
        } else {
            $this->form_validation->set_message('katagori_check', 'Katagori yang anda masukan sudah tersedia');
            return false;
        }
    }
}
    
    /* End of file Main.php */
