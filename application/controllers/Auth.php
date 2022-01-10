<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

	public function index()
	{
        $data['view'] = "auth/login";
        $this->load->view("authLayout",$data);
    }
    
    //Check Authentication
    public function Login(){
        extract($_POST);
        if(isset($_POST))
        {
            $password = md5($password);
            $check = $this->db->query("select * from users where email='".$email."' and password='".$password."' and status='1'")->row();
            
            if(count($check) > 0)
            {
                $profiles = $this->db->query("select * from profiles where profile_id='".$check->profile_id."'")->row();
                $sess_data=array(
                    'user_id'  =>$check->user_id,
                    'user_name'=>$check->name,
                    'profile_id'=>$check->profile_id,
                    'profile_name'=>$profiles->profile_name,
                    'is_logged_in'=>TRUE
                );
                $this->session->set_userdata($sess_data);
            //     echo "<pre>";print_r($_SESSION);"</pre>";
            // exit;
                redirect('Dashboard');
            }
            else
            {
                $this->session->set_flashdata('type','alert-danger');
                $this->session->set_flashdata('msg','Invalid Login. Try Again.');
                redirect('Auth');
            }
        }
    }

    // logout
    public function Logout(){
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
?>
