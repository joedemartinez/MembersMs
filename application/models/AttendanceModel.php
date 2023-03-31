<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceModel extends CI_Model {

    //  allAttendance
    public function allAttendance(){
            $this->db->select('*');
            $this->db->from('attendance');
            $this->db->group_by("attendanceDate", "attendanceType");
            $query = $this->db->get();
            return $query->result();
    }
    //  allAttendance
    public function allAttendance1(){
            $this->db->select('*');
            $this->db->from('attendance');
            $this->db->group_by("attendanceDate", "attendanceType");
            $query = $this->db->get();
            return $query->last_row();
    }

   // 
    public function newAttendance($data)
    {
        return $this->db->insert('attendance', $data);
    }   

    // showing get members
    public function getMembers($attendanceDate, $attendanceType){
        $this->db->select('memberID');
        $this->db->from('attendance');
        $this->db->where('attendanceDate', $attendanceDate);
        $this->db->where('attendanceType', $attendanceType);
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
