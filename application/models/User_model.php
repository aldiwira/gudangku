<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Cruder_model', 'cruder');
        $this->load->helper('Date_Helper');
    }

    private function getDateLocal()
    {
        date_default_timezone_set("Asia/Bangkok");
        return date("Y-m-d H:i:s", time());
    }

    public function login($data)
    {
        $loginCheck = $this->cruder->where('pengguna', $data)->row();
        if ($loginCheck != null) {
            date_default_timezone_set("Asia/Bangkok");
            $update = array('updatedAt' => $this->getDateLocal());
            echo $this->cruder->update('pengguna', $data, $update);
            return $loginCheck;
        } else {
            return null;
        }
    }

    public function getUsers()
    {
        return $this->cruder->get('pengguna')->result();
    }

    public function addUser()
    {
        $data = array(
            "id_pengguna" => randomId(10),
            "username" => $this->input->post('usernameInput'),
            "password" => $this->input->post('passwordInput'),
        );
        $this->cruder->create('pengguna', $data);
        return true;
    }

    public function getUserDatas()
    {
        $userID =  get_cookie('SID');
        $userDatas = $this->cruder->where('pengguna', array('id_pengguna' => $userID))->row();
        if ($userDatas != null) {
            return $userDatas;
        } else {
            return null;
        }
    }
}

/* End of file User.php */
