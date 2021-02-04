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
        $this->load->library('cart');

        $this->load->helper('cookie');
        $this->load->model('Cruder_model', 'cruder_m');
        $this->load->model('User_model', 'user_m');
        $this->load->model('Admin_model', 'admin_m');
        $this->load->model('Log_model', 'log_m');

        // Check cookies session
        if (!get_cookie('SID')) {
            redirect('/');
        }
    }

    /// end main function
    public function Admin()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();

        $data_sec = $this->log_m->getAllCountItems();
        // Data dashboard admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/dashboard', $data_sec, true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        $data_main['users_check'] = $check->isAdmin == "0";
        // Main
        $data["title"] = "Admin Dashboard";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Peminjaman()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();
        
        $data_sec['kategoriDatas'] = $this->admin_m->getKategori();
        $data_sec['barangDatas'] = $this->admin_m->getBarang();
        // Data peminjaman admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['stat_segment'] = $this->uri->segment(2);
        $data_main['content'] = $this->load->view('admin/peminjaman_barang', $data_sec, true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        $data_main['users_check'] = $check->isAdmin == "0";
        // Main
        $data['title'] = "Peminjaman Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Pengembalian()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();

        $data_sec["semuaPinjaman"] = $this->admin_m->getPinjaman();

        // Data pengembalian admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/pengembalian_barang', $data_sec, true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        $data_main['users_check'] = $check->isAdmin == "0";
        // Main
        $data['title'] = "Pengembalian Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Tambah()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();

        $data_sec['kategoriDatas'] = $this->admin_m->getKategori();
        $data_sec['barangDatas'] = $this->admin_m->getBarang();
        // Data tambah barang admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['stat_segment'] = $this->uri->segment(2);
        $data_main['content'] = $this->load->view('admin/tambah_barang', $data_sec, true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        $data_main['users_check'] = $check->isAdmin == "0";
        // Main
        $data['title'] = "Tambah Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function Status()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();

        $data_sec['availableItems'] = $this->cruder->where("barang", array("status_barang" => "ada"))->result();
        $data_sec['outItems'] = $this->cruder->where("barang", array("status_barang" => "keluar"))->result();

        // Data status barang admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['content'] = $this->load->view('admin/status_barang', $data_sec, true);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        $data_main['users_check'] = $check->isAdmin == "0";
        // Main
        $data['title'] = "Status Barang";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }

    public function User()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();

        $data_sec['users'] = $this->user_m->getUsers();
        // Data dashboard admin
        $data_main['segment'] = $this->uri->segment(1);
        $data_main['stat_segment'] = $this->uri->segment(2);
        $data_main['userDatas'] = $this->user_m->getUserDatas();
        $data_main['users_check'] = $check->isAdmin == "0";
        $data_main['content'] = $this->load->view('admin/register', $data_sec, true);
        // Main
        $data["title"] = "Manajemen User";
        $data['content'] = $this->load->view('admin/main', $data_main, true);
        $this->load->view('template/main', $data);
    }
    /// end main function
    /// Form Handler
    /// start Form Handler

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

    // add barang function
    public function addBarang()
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

    // User Function
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

    public function updateUser()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();
        if ($check->isAdmin == "0") {
            // print_r($check);die;
            $this->session->set_flashdata('toast', 'error:Aksi hanya dapat dilakukan oleh admin');
            redirect('user');
        } else {
            $id = $this->uri->segment(3);
            $data = $this->user_m->updateUserById($id);
            $this->session->set_flashdata('toast', 'success:Berhasil menjadikan admin');
            redirect('user', $data);
        }
    }

    public function deleteUser()
    {
        $userID = get_cookie('SID');
        $check = $this->cruder->where('pengguna', array("id_pengguna" => $userID))->row();
        if ($check->isAdmin == "0") {
            $this->session->set_flashdata('toast', 'error:Aksi hanya dapat dilakukan oleh admin');
            redirect('user');
        } else {
            $id = $this->uri->segment(3);
            $data = $this->user_m->deleteUserById($id);
            $this->session->set_flashdata('toast', 'success:Berhasil menghapus user');
            redirect('user', $data);
        }
    }

    // End User Function

    // handling page by uri page
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
    // start change password func
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
    // end change password func

    // management items to tempt cart

    private function showCart()
    {
        $output = '';
        $count = 0;
        foreach ($this->cart->contents() as $key => $value) {
            
            $count++;
            $output .= "<tr>";
            $output .= "<td>" . $count . "</td>";
            $output .= "<td>" . $this->cruder_m->where("barang", array("kode_barang" => $value["name"]), "nama_barang")->row()->nama_barang . "</td>";
            $output .= "<td>" . $this->cruder_m->where("kategori", array("id_katagori" => $value["options"]["kategori"]), "nama_katagori")->row()->nama_katagori . "</td>";
            $output .= "<td>" . $value["qty"] . "</td>";
            $output .= "<td>Baik</td>"; 
            $output .= "<td>";
            $output .= "<button type='button' value=".$value["rowid"]." id='deleteCartItem' onClick='deleteCartItems(`".$value["rowid"]."`)' class='btn btn-sm btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button>";
            $output .= "</td>";
            $output .= "</tr>";
        }
        return $output;
    }
    
    // add item to cart
    public function addCart()
    {
        $datas = array(
            'id'      => randomId(10),
            'qty'     => $this->input->post('jmlbrginput'),
            'price'   => 0,
            'name'    => $this->input->post('namabrginput'),
            'options' => array("kategori" => $this->input->post("katbrginput"))
        );
        $this->cart->insert($datas);
        echo $this->showCart();
    }

    public function getCartItem()
    {
        $rowId = $this->uri->segment(3);
        $jsons = json_encode($this->cart->get_item($rowId));
        print_r($jsons);
    }

    public function delCart()
    {
        $rowId = $this->uri->segment(3);
        $this->cart->remove($rowId);
        echo $this->showCart();
    }
    // do pinjam barang func
    public function addPinjam()
    {
        $this->form_validation->set_rules("namatempattxt", "namatempattxt", "required", array('required' => 'Harap masukkan nama tempat peminjam'));
        $this->form_validation->set_rules("namapeminjamtxt", "namapeminjamtxt", "required", array('required' => 'Harap masukkan nama peminjam'));
        $this->form_validation->set_rules("tglambiltxt", "tglambiltxt", "required", array('required' => 'Harap masukkan tanggal pengambilan'));
        $this->form_validation->set_rules("tglkembalitxt", "tglkembalitxt", "required", array('required' => 'Harap masukkan tanggal pengembalian'));

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("toast", "warn:Pastikan terdapat barang yang dimasukkan");
            $this->Peminjaman();
        } else {
            if ($this->cart->contents() != null) {
                $stat = $this->admin_m->addRecord();
                if ($stat) {
                    $this->session->set_flashdata('toast', 'success:Berhasil Menambahkan peminjaman baru');
                    redirect("peminjaman");
                }
            } else {
                $this->session->set_flashdata("toast", "warn:Pastikan terdapat barang yang dimasukkan");
            }
        }
    }

    // start fun pengembalian

    private function printTableBarang($data)
    {
        $output = '';
        $output .= "<label value=" . $data->id_catatan . " id='kodecatatan'><strong>Kode Catatan</strong> : " . $data->id_catatan . "</label><br/>";
        $output .= "<label> <strong>Nama Peminjam</strong> : " . $data->penanggung . "</label><br/>";
        $output .= "<label><strong>Nama Tempat</strong> : " . $data->nama_catatan . "</label><p class='text-info'>Informasi : Pastikan untuk memasukkan jumlah barang normal dan rusak, harap mencentang terlebih dahulu</p><form action='' method='post'>";
        $output .= "<div class='table-responsive-xl'><table id='dataPinjam' class='table table-bordered'><thead><tr>";
        $rowAtas = array("Kode Barang", "Nama Barang", "Kategori Barang", 'Jumlah Barang', "Kondisi Barang Normal", "Kondisi Barang Rusak");
        foreach ($rowAtas as $key => $value) {
            $output .= "<th scope='col'>" . $value . "</th>";
        }
        $output .= "</tr></thead><tbody>";
        $datasBarang = $this->admin_m->getBarangPinjam($data->id_catatan);
        foreach ($datasBarang as $key => $value) {
            $output .= "<tr>";
            $output .= "<td>" . $value->kode_barang . "</td>";
            $output .= "<td>" . $value->nama_barang . "</td>";
            $output .= "<td>" . $value->nama_katagori . "</td>";
            $output .= "<td>" . $value->jumlah . "</td>";
            $output .= "<td><div class='input-group mb-3'><div class='input-group-prepend'><div class='input-group-text'>";
            $output .= "<input type='checkbox' aria-label='Checkbox for following text input'>";
            $output .= "</div></div><input type='number' id='valueNormal" . $key . "' class='form-control' placeholder='Jika ada centang terlebih dahulu' aria-label='Text input with checkbox'>";
            $output .= "</div></td>";
            $output .= "<td><div class='input-group mb-3'><div class='input-group-prepend'><div class='input-group-text'>";
            $output .= "<input type='checkbox' aria-label='Checkbox for following text input'>";
            $output .= "</div></div><input type='number' id='valueRusak" . $key . "' class='form-control' placeholder='Jika ada centang terlebih dahulu' aria-label='Text input with checkbox'>";
            $output .= "</div></td>";
            $output .= "</tr>";
        }
        $output .= "</tr></tbody></table></div></form>";
        return $output;
    }

    public function showKembaliBarang()
    {
        $idDetail = $this->uri->segment(3);
        $dataPinjaman = $this->admin_m->getPinjaman($idDetail);
        echo $this->printTableBarang($dataPinjaman);
    }
    public function kembaliBarang()
    {
        $idDetail = $this->uri->segment(3);
        $datas = $this->input->post('datas');

        $asdsa = $this->admin_m->doneBarangPinjam($idDetail, $datas);
        $status = json_encode($asdsa);
        if ($status) {
            $this->session->set_flashdata('toast', 'success:Berhasil Mengembalikan barang');
            print_r(true);
        } else {
            print_r(false);
        }
    }
    // end fun pengembalian

    /// start Form Handler
}
    
    /* End of file Main.php */
