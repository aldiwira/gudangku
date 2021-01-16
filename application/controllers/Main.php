<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function Login()
    {
        $data['title'] = "Login";
        $data['content'] = $this->load->view('users/login');
        $this->load->view('template/main', $data);
    }

    public function Admin()
    {
        $data['title'] = "Admin Dashboard";
        $this->load->view('template/main', $data);
        $data['content'] = $this->load->view('admin/dashboard');
    }
}
    
    /* End of file Main.php */
