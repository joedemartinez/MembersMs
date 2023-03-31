<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupModel extends CI_Model {

    // new GROUP
    public function newGroup($data)
    {
        return $this->db->insert('grouptype', $data);
    }

    // member to group
    public function addMemberToGroup($data)
    {
        return $this->db->insert('groups', $data);
    }

    // showing all group type
    public function allGroups(){
        $this->db->select('*');
        $this->db->from('grouptype');
        // $this->db->where('del', '0');
        $this->db->order_by("GroupTypeID", "ASC");
        $query = $this->db->get();
        return $query->result();
    }

    // showing get group members
    public function getMembers($data){
        $this->db->select('memberID');
        $this->db->from('groups');
        $this->db->where('GroupTypeID', $data);
        $this->db->order_by("memberID", "ASC");
        $query = $this->db->get();
        return $query->result();
    }

    //get members info
    public function getMemberDetails($id)
    {
        $query1 = $this->db->where(['memberID' => $id])
                     ->get('members');
        return $query1->result();
    }


}
