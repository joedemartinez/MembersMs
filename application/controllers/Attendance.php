<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
    public function index()
    {
        // checking if logged in
        if(($this->session->userdata('email') == '')){
            return redirect('Home');
        }

        $this->load->model('AttendanceModel');
        $data['records'] = $this->AttendanceModel->allAttendance();
        

        $this->load->model('MembersModel');
		$data['members'] = $this->MembersModel->allMembers();

        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['pageTitle'] = 'Attendance';
        $this->load->view('dashboard-layout', $data);
    }

    public function newAttendance()
    {
        // checking if logged in
        if(($this->session->userdata('email') == '')){
            return redirect('Home');
        }

        // print_r($this->input->post());

        //validation
        $this->form_validation->set_rules('member[]', 'Full Name', 'required');
        $this->form_validation->set_rules('todayDate', 'Amount', 'required');
        $this->form_validation->set_rules('attendanceType', 'Attendance Type', 'required');

        //total of member
        $totalmembers = count($this->input->post('member'));

        if ($this->form_validation->run() == TRUE)
        {
            //load model and insert data
            $this->load->model('AttendanceModel');

            //loop
            for($i=0;$i<$totalmembers;$i++){

                //set values to be inserted into database
                $data['memberID'] = $this->input->post('member')[$i];
                $data['attendanceDate'] = $this->input->post('todayDate');
                $data['attendanceType'] = $this->input->post('attendanceType');

                //insert into database
                if($this->AttendanceModel->newAttendance($data)){
                    $this->session->set_flashdata('msg', ' Attendance Created Successfully');
                }else{
                    $this->session->set_flashdata('msg', ' Failed, Unable to create Attendance');
                }
            }
                return redirect('Attendance');
        }      
        else
        {
                //submit without filling all fields
            $this->session->set_flashdata('msg', validation_errors());
            return redirect('Attendance');
        }
    }

    public function getMembers()
    {
        $this->load->model('AttendanceModel');

        $id = $this->input->post('id');
        $results = explode("/", $id);

        $attendanceDate = $results[0];
        $attendanceType = $results[1];

        $id = $this->AttendanceModel->getMembers($attendanceDate, $attendanceType);


        if ($id == null) {
            echo 'null';
        } else {
            $i = 1;
            $table = '';
            foreach ($id as $id):
                // <td>". $id->memberID."</td>
             $table .= "<tr>
                        <td>". $i."</td>
                        <td>". $this->AttendanceModel->getMemberDetails($id->memberID)[0]->FName.' '.$this->AttendanceModel->getMemberDetails($id->memberID)[0]->MName.' '.$this->AttendanceModel->getMemberDetails($id->memberID)[0]->LName ."</td>
                    </tr>
                    ";
                $i++;
            endforeach;
            echo $table;
        }

    }
}