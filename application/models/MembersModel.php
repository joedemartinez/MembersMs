<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MembersModel extends CI_Model {

		// showing all member
		public function allMembers(){
			$this->db->select('*');
			$this->db->from('members');
			$this->db->where('Status', 1);
			$this->db->order_by("memberID", "ASC");
			$query = $this->db->get();
			return $query->result();
		}
		

		// showing unapprovedMembers
		public function unapprovedMembers(){
			$this->db->select('*');
			$this->db->from('members');
			$this->db->where('Status', 0);
			$this->db->order_by("memberID", "ASC");
			$query = $this->db->get();
			return $query->result();
		}

		// showing all users
		public function allUsers(){
			$this->db->select('*');
			$this->db->from('users');
			// $this->db->where('del', '0');
			$this->db->order_by("userID", "ASC");
			$query = $this->db->get();
			return $query->result();
		}

		// new user
	    public function newUser($data)
	    {
	        return $this->db->insert('users', $data);
	    }


	    // updating stats
		public function approveMember($data, $id)
		{
			$this->db->where('memberID', $id);
			$this->db->update('members', $data);
		}

		public function getDoB($thisMonth)
		{
			$this->db->select('*');
			$this->db->where('Status', 1);
			$this->db->like('DoB', $thisMonth);
			$this->db->from('members');
			$query = $this->db->get(); 
			return $query->result();
		}

}