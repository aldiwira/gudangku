<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('cookie');
        $this->load->model('User_model', 'user_m');
        $this->load->model('Admin_model', 'admin_m');

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
        $data_sec['kategoriDatas'] = $this->admin_m->getKategori();
        $data_sec['barangDatas'] = $this->admin_m->getBarang();
        // Data peminjaman admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/peminjaman_barang', $data_sec, true);
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
        $data_sec['kategoriDatas'] = $this->admin_m->getKategori();
        $data_sec['barangDatas'] = $this->admin_m->getBarang();
        // Data tambah barang admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['stat_segment'] = $this->uri->segment(2);
        $data_main['content'] = $this->load->view('admin/tambah_barang', $data_sec, true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        // Main
        $data['title'] = "Tambah Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Status()
    {
        $data_sec['barangDatas'] = $this->admin_m->getBarang();
        // Data status barang admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/status_barang', $data_sec, true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        // Main
        $data['title'] = "Status Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function User()
    {
        $data_sec['users'] = $this->user_m->getUsers();
        // Data dashboard admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['stat_segment'] = $this->uri->segment(2);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        $data_main['content'] = $this->load->view('admin/register', $data_sec, true);
        // Main
        $data["title"] = "Admin Dashboard";
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
            $this->session->set_flashdata('toast', 'success:Berhasil memasukkan katagori ' . $katagoriName . '');
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

    public function Barang()
    {
        $this->form_validation->set_rules('namabarangtxt', 'namabarangtxt', 'required');
        $this->form_validation->set_rules('jumlahbarangtxt', 'jumlahbarangtxt', 'required');
        $this->form_validation->set_rules('kondisibarang', 'kondisibarang', 'required');
        $this->form_validation->set_rules('katagoribarang', 'katagoribarang', 'required');

        if ($this->form_validation->run() == false) {
            $this->Tambah();
        } else {
            if ($this->admin_m->addBarang()) {
                $this->session->set_flashdata('toast', 'success:Berhasil menambahkan barang baru');
                redirect('tambah');
            }
        }
    }

    public function Register()
    {
        $this->form_validation->set_rules('usernameInput', 'usernameInput', 'required', array('required' => 'Harap isi username terlebih dahulu'));
        $this->form_validation->set_rules('passwordInput', 'passwordInput', 'required', array('required' => 'Harap isi password terlebih dahulu'));
        if ($this->form_validation->run() == false) {
            $this->User();
        } else {
            if ($this->user_m->addUser()) {
                $this->session->set_flashdata('toast', 'success:Berhasil menambahkan user baru');
                redirect('user');
            }
        }
    }

    private function handlingPage()
    {
        $uri = $this->uri->segment(1);
        if ($uri == "tambah") {
            $this->Tambah();
        } else if ($uri == "admin") {
            $this->Admin();
        } else if ($uri == "peminjaman") {
            $this->Peminjaman();
        } else if ($uri == "pengembalian") {
            $this->Pengembalian();
        } else if ($uri == "status") {
            $this->Status();
        }
    }

    public function ChangePassword()
    {
        $this->form_validation->set_rules("oldpassword", "oldpassword", "required|callback_check_password", array('required' => 'Harap masukan password dengan benar'));
        $this->form_validation->set_rules("newpassword", "newpassword", "required", array('required' => 'Harap masukan password dengan benar'));

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("failedchange", "show");
            $this->handlingPage();
        } else {
            $newpassword = $this->input->post('newpassword');

            $check = $this->admin_m->changePassword(array("password" => $newpassword));
            if ($check) {
                $this->session->set_flashdata("toast", "success:Success change password");
                $this->handlingPage();
            }
        }
    }
    public function check_password($str)
    {
        $userID = get_cookie('SID');
        $oldpass = $str;
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID, "password" => $oldpass))->row();
        if ($check != null) {
            return true;
        } else {
            $this->form_validation->set_message('check_password', 'Password yang anda masukkan salah');
            return false;
        }
    }
}
    
    /* End of file Main.php */
