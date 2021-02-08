<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->model('Cruder_model', 'cruder');
        $this->load->model('User_model', 'user_m');


        // Check cookies session
        if ($this->user_m->checkAccount()) {
            redirect('/admin');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required|callback_username_check', array('required' => 'Harap masukan username dengan benar'));
        $this->form_validation->set_rules('password', 'password', 'required|callback_password_check', array('required' => 'Harap masukan password dengan benar'));
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $data['content'] = $this->load->view('users/login', '', true);
            $this->load->view('template/main', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $filter = array('username' => $username, 'password' => $password);
            $loging = $this->user_m->login($filter);
            if ($loging != null) {
                $this->input->set_cookie('SID', $loging->id_pengguna, 36000);
                redirect('/admin');
            } else {
                $data['callback'] = "Pastikan username dan password benar";
                redirect('/');
            }
        }
    }

    public function username_check($str)
    {
        $filter = array('username' => $str);
        $resp = $this->cruder->where('pengguna', $filter)->row();
        if ($resp != null) {
            return true;
        } else {
            $this->form_validation->set_message('username_check', 'Pastikan username yang anda masukan benar');
            return false;
        }
    }
    public function password_check($str)
    {
        $filter = array('password' => $str);
        $resp = $this->cruder->where('pengguna', $filter)->row();
        if ($resp != null) {
            return true;
        } else {
            $this->form_validation->set_message('password_check', 'Pastikan password yang anda masukan benar');
            return false;
        }
    }
}

/* End of file User.php */
