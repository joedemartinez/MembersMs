<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {
    public function index()
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }

        $this->load->model('MembersModel');
        $data['records'] = $this->MembersModel->allMembers();

        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['pageTitle'] = 'Members';
        $this->load->view('dashboard-layout', $data);
    }

    public function unapproved()
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }

        $this->load->model('MembersModel');
        $data['records'] = $this->MembersModel->unapprovedMembers();

        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['pageTitle'] = 'Unapproved Members';
        $this->load->view('dashboard-layout', $data);
    }

    public function approved($hashed, $id)
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }

        $this->load->model('MembersModel');
        $data['Status'] = 1;

        if(!$this->MembersModel->approveMember($data,$id)){
            $this->session->set_flashdata('msg', ' Member Approved');
        }else{
            $this->session->set_flashdata('msg', ' Member Approval Failed');
        }

        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['records'] = $this->MembersModel->unapprovedMembers();
        $data['pageTitle'] = 'Unapproved Members';
        $this->load->view('dashboard-layout', $data);
    }


    // public function getDoB()
    // {

    //     $this->load->model('MembersModel');
    //     $thisMonth = '-'.date('m').'-';
    
    //     $fullname = $this->MembersModel->getDoB($thisMonth); 

    //     if ($fullname == null) {
    //          echo 'null';
    //     } else {
    //         $data['dob'] = $fullname;
    //         $this->load->view('navbar', $dob);
    //     }
          
    // }
}
