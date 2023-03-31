<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index()
    {
        // checking if logged in
        if(($this->session->userdata('email') != null)){
            return redirect('Dashboard');
        }
        
        $this->load->model('MembersModel');
        $thisMonth = '-'.date('m').'-';
        $fullname = $this->MembersModel->getDoB($thisMonth); 
        $data['dob'] = $fullname;

        $data['pageTitle'] = 'Welcome';
        $this->load->view('register', $data);
    }

    public function save()
    {
        
        //validation
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('birthdate', 'DoB', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone', 'DoB', 'required');
        $this->form_validation->set_rules('memberType', 'Member Type', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|is_unique[members.Email]');

        //if validation is okay
        if ($this->form_validation->run() == TRUE)
        {

            //set values to be inserted into database
            $data['FName'] = $this->input->post('firstname');
            $data['MName'] = $this->input->post('middlename');
            $data['LName'] = $this->input->post('lastname');
            $data['DoB'] = $this->input->post('birthdate');
            $data['Gender'] = $this->input->post('gender');
            $data['PhoneNo'] = $this->input->post('phone');
            $data['MemberType'] = $this->input->post('memberType');
            $data['Email'] = $this->input->post('email');
            $data['Profession'] = $this->input->post('profession');
            $data['ResidenceAddress'] = $this->input->post('address');
            $data['Church'] = $this->input->post('church');
            $data['MemberNo'] = $this->input->post('memberNo');
            $data['photo'] = $_FILES['pic']['name'];

            if (isset($this->session->userdata['email'])) {
                $data['Status'] = 1;
            }


            //uploads photo
            $config = [
            'upload_path' => './assets/image/profilePics',
            'file_name' =>  $this->input->post('email').''.$data['photo'],
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 20000
            ];
            $this->load->library('upload', $config);
            $this->upload->do_upload('pic');


            //load model and insert data
            $this->load->model('RegisterModel');
             if($this->RegisterModel->newMember($data)){

                //gmail
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.gmail.com';
                $config['smtp_timeout'] = 30;
                $config['smtp_crypto'] = 'tls'; //tls ssl
                $config['smtp_port'] = 587; //587 465


                $config['smtp_user'] = 'careerpathway.co@gmail.com';
                $config['smtp_pass'] = 'P@$$w0rd11';

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->to($this->input->post('email'));
                $this->email->from('careerpathway.co@gmail.com','Name of Association');
                $this->email->cc('abnite@gmail.com');
                $this->email->bcc('careerpathway.co@gmail.com');

                $this->email->subject('Members Club Association Registration');
                $this->email->message('Congratulations!! '.$this->input->post('firstname'));

                if($this->email->send()){
                    echo 'Email sent';
                }else{
                    $this->session->set_flashdata('msg',$this->email->print_debugger());
                }

                $this->session->set_flashdata('msg', ' Registration Successful');
             }else{
                $this->session->set_flashdata('msg', ' Registration Failed');
             }
             //redirect
             if (isset($this->session->userdata['email'])) {
                return redirect('Members');
            }else{
                return redirect('Register');
             }
        }
        else
        {
                // if all fields are not filled 
            $this->session->set_flashdata('msg', validation_errors());
                 return redirect('Register');
        }

    }
}
