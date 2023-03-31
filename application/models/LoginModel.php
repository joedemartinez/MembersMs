<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    // logging in 
    public function logIn($email, $password)
    {
        $check = $this->getUserDetails($email);
        if (password_verify($password, $check->Password)){
            return $check;
         }
    } 


    //get members info
    public function getUserDetails($email)
    {
        $query1 = $this->db->where(['Email' => $email])
                     ->get('users');
        return $query1->row();
    }

    //get members info
    public function getMemberDetails($email)
    {
        $query1 = $this->db->where(['Email' => $email])
                     ->get('members');
        return $query1->row();
    }

    //get member info
    public function getMemberData($id)
    {
        $query1 = $this->db->where(['memberID' => $id])
                     ->get('members');
        return $query1->row();
    }

}
