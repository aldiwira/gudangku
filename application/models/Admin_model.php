<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Cruder_Model', 'cruder');
    }

    public function getUsername($SID)
    {
        $filter = array("id_pengguna" => $SID);
        return $this->cruder->where('pengguna');
    }
}

/* End of file Admin.php */
