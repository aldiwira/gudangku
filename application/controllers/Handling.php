<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Handling extends CI_Controller
{

    public function index()
    {
        $data['title'] = "404 Not Found";
        $data['content'] = $this->load->view('template/404');
        $this->load->view('template/main', $data);
    }
}
    
    /* End of file 404.php */
