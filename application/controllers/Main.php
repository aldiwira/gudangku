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
}
    
    /* End of file Main.php */
