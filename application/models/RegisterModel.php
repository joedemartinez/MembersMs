<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

    // new member
    public function newMember($data)
    {
        return $this->db->insert('members', $data);
    }

}
