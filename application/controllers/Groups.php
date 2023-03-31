<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {
    public function index()
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }

        $this->load->model('GroupModel');
        $this->load->model('MembersModel');
        
        $data['records'] = $this->GroupModel->allGroups();
        $data['results'] = $this->GroupModel->allGroups(); 
        $data['members'] = $this->MembersModel->allMembers();

        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['pageTitle'] = 'Groups';
        $this->load->view('dashboard-layout', $data);
    }

    public function addGroup()
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }

        //validation
        $this->form_validation->set_rules('groupName', 'Group Name', 'required');

        //if validation is okay
        if ($this->form_validation->run() == TRUE)
        {

            //set values to be inserted into database
            $data['GroupTypeName'] = $this->input->post('groupName');

            //load model and insert data
            $this->load->model('GroupModel');
             if($this->GroupModel->newGroup($data)){
                $this->session->set_flashdata('msg', ' New Group Added Successful');
             }else{
                $this->session->set_flashdata('msg', ' Failed, Something Went Wrong!!');
             }

             return redirect('Groups');
        }
        else
        {
                // if all fields are not filled 
            $this->session->set_flashdata('msg', validation_errors());
                 return redirect('Groups');
        }
    }


    public function addMemberToGroup()
    {
        // checking if logged in
        if(($this->session->userdata('email') == null)){
            return redirect('Home');
        }


        //validation
        $this->form_validation->set_rules('group', 'Group Name', 'required');
        $this->form_validation->set_rules('member', 'Full Name', 'required');

        //if validation is okay
        if ($this->form_validation->run() == TRUE)
        {

            //set values to be inserted into database
            $data['GroupTypeID'] = $this->input->post('group');
            $data['memberID'] = $this->input->post('member');

            //load model and insert data
            $this->load->model('GroupModel');
             if($this->GroupModel->addMemberToGroup($data)){
                $this->session->set_flashdata('msg', ' New Member Added To Group Successful');
             }else{
                $this->session->set_flashdata('msg', ' Failed, Something Went Wrong!!');
             }

             return redirect('Groups');
        }
        else
        {
                // if all fields are not filled 
            $this->session->set_flashdata('msg', validation_errors());
                 return redirect('Groups');
        }
    }


    public function getMembers()
    {
        $this->load->model('GroupModel');

        $id = $this->input->post('id');
        $id = $this->GroupModel->getMembers($id);

        if ($id == null) {
            echo 'null';
        } else {
            $i = 1;
            $table = '';
            foreach ($id as $id):
                // <td>". $id->memberID."</td>
             $table .= "<tr>
                        <td>". $i."</td>
                        <td>". $this->GroupModel->getMemberDetails($id->memberID)[0]->FName.' '.$this->GroupModel->getMemberDetails($id->memberID)[0]->MName.' '.$this->GroupModel->getMemberDetails($id->memberID)[0]->LName ."</td>
                    </tr>
                    ";
                $i++;
            endforeach;
            echo $table;
        }

    }


}
