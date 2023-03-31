<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->view('login', $data);
    }


    public function login()
    { 
    // 
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE)
        {
             $this->load->model('LoginModel');

             $email = $this->input->post('email');
             $password = $this->input->post('password');

             $user = $this->LoginModel->logIn($email, $password); 

            if($user > ''){

                $fullname = $this->LoginModel->getMemberDetails($user->email);


                $session_data = array(
                    'email' => $user->email,
                    'fullname' => $fullname->FName.' '.$fullname->MName.' '.$fullname->LName,
                    'pic' => $fullname->photo,

                );
                $this->session->set_userdata($session_data);
                return redirect('Dashboard');
             }else{
                $this->session->set_flashdata('msg', ' Login Failed, Username or Password is Incorrect');
                return redirect('Home');
             }
        }      
        else
        {
                //submit without filling all fields
            $this->session->set_flashdata('msg', validation_errors());
                 return redirect('Home');
        }
    }


    // logging out
    public function logout(){
        $this->session->sess_destroy();
        return redirect('Home');
        //session_destroy();
    }


}
