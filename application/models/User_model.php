<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Cruder_Model', 'cruder');
        $this->load->helper('Date');
    }

    public function login($data)
    {
        $loginCheck = $this->cruder->where('pengguna', $data)->row();
        if ($loginCheck != null) {
            $update = array('updatedAt' => getDateNow());
            echo $this->cruder->update('pengguna', $data, $update);
            return $loginCheck;
        } else {
            return null;
        }
    }
}

/* End of file User.php */
