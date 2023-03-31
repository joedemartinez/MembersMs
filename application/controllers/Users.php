<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function index()
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }

        $this->load->model('MembersModel');
        $this->load->model('LoginModel');
        
        $data['records'] = $this->MembersModel->allUsers();
               
        $data['members'] = $this->MembersModel->allMembers();

       
        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['pageTitle'] = 'Users';
        $this->load->view('dashboard-layout', $data);
    }

    public function getMember()
    {   
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }

        $this->load->model('LoginModel');

        $memberID = $this->input->post('memberDues');
        $fullname = $this->LoginModel->getMemberData($memberID); 

         if ($fullname == null) {
             echo 'null';
        } else {
            $fullname = $fullname->MemberType;
            echo $fullname;
        }

    }

    public function addUser()
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }
        
        //validation
        $this->form_validation->set_rules('member', 'Full Name', 'required');

        if ($this->form_validation->run() == TRUE)
        {

            $email = $this->input->post('member');

            //set values to be inserted into database
            //hash password
            $data['Password'] = password_hash('P#ssw0rd', PASSWORD_DEFAULT);
            $data['email'] = $email;
             
            //load model and insert data
            $this->load->model('MembersModel');

             if($this->MembersModel->newUser($data)){
                $this->session->set_flashdata('msg', ' New User Added Successfully');
             }else{
                $this->session->set_flashdata('msg', ' Failed, Unable to create user');
             }
                return redirect('Users');
        }      
        else
        {
                //submit without filling all fields
            $this->session->set_flashdata('msg', validation_errors());
                 return redirect('Users');
        }

    }

}
