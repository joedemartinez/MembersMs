<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index()
    {
        // checking if logged in
        if(($this->session->userdata('email') == '')){
            return redirect('Home');
        }

        $this->load->model('MembersModel');
        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $this->load->model('AttendanceModel');
        $data['records1'] = $this->AttendanceModel->allAttendance1();

        $data['pageTitle'] = 'Dashboard';
        $this->load->view('dashboard-layout', $data);
    }
}