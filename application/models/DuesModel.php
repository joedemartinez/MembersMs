<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DuesModel extends CI_Model {

    //  Dues
    public function allDues(){
            $this->db->select('*');
            $this->db->from('duespayment');
            $this->db->order_by("DuesID", "ASC");
            $query = $this->db->get();
            return $query->result();
    }

    //  Donations
    public function allDonations(){
            $this->db->select('*');
            $this->db->from('donation');
            $this->db->order_by("DonationID", "ASC");
            $query = $this->db->get();
            return $query->result();
    }

    // new newDues
    public function newDues($data)
    {
        return $this->db->insert('duespayment', $data);
    }

   // new newDues
    public function newDonations($data)
    {
        return $this->db->insert('donation', $data);
    }

}
