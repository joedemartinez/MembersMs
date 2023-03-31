<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donations extends CI_Controller {
    public function index()
    {
        // checking if logged in
        if(($this->session->userdata('email') == '')){
            return redirect('Home');
        }

        $this->load->model('DuesModel');
        $data['records'] = $this->DuesModel->allDonations();

        $this->load->model('MembersModel');
		$data['members'] = $this->MembersModel->allMembers();
            
        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['pageTitle'] = 'Donations';
        $this->load->view('dashboard-layout', $data);
    }

    public function newDonations()
    {
        // checking if logged in
        if(($this->session->userdata('email') == '')){
            return redirect('Home');
        }

        //validation
        $this->form_validation->set_rules('member', 'Full Name', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('donationType', 'Donation Type', 'required');

        if ($this->form_validation->run() == TRUE)
        {

            $id = $this->input->post('member');
            $amount = $this->input->post('amount');
            $donationType = $this->input->post('donationType');

            //set values to be inserted into database
            $data['memberID'] =$id;
            $data['AmountQuantity'] = $amount;  
            $data['DonationType'] = $donationType;
             
            //load model and insert data
            $this->load->model('DuesModel');

             if($this->DuesModel->newDonations($data)){
                $this->session->set_flashdata('msg', ' New User Added Successfully');
             }else{
                $this->session->set_flashdata('msg', ' Failed, Unable to create user');
             }
                return redirect('Donations');
        }      
        else
        {
                //submit without filling all fields
            $this->session->set_flashdata('msg', validation_errors());
            return redirect('Donations');
        }
    }
}