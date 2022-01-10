<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Users extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

    public function index()
	{
        $data['users'] = $this->db->query("select * from users where profile_id!='1' order by user_id DESC")->result();
        $data['view'] = "users/users";
        $this->load->view("layout", $data);
    }

    public function Adduser(){
        if(isset($_POST['add'])){
            extract($_POST);
            $check = $this->db->query("select * from users where email='".$email."' or mobile='".$mobile."'")->row();
            if(count($check) > 0){
                $this->session->set_flashdata("msg", "Mobile Number or Email Exists");
                $this->session->set_flashdata("type", "alert-danger");
                redirect("Users/Adduser");
            }
            else{
                $udata['name'] = $full_name;
                $udata['email'] = $email;
                $udata['mobile'] = $mobile;
                $udata['profile_id'] = $profile;
                $udata['password'] = md5($password);
                $udata['email_verified_at'] = date("Y-m-d H:i:s");
                $udata['created_by'] = $this->session->userdata("user_id");
                $udata['created_at'] = date("Y-m-d H:i:s");
                $udata['updated_at'] = date("Y-m-d H:i:s");
                $udata['status'] = $status;
                $this->DefaultModel->insertData("users", $udata);
                $this->session->set_flashdata("msg", "User Created Successfully");
                $this->session->set_flashdata("type", "alert-success");
                redirect("Users");
            }
        }
        else{
            $data['profiles'] = $this->DefaultModel->getAllRecords("profiles");
            $data['view'] = "users/add";
            $this->load->view("layout", $data);
        }
    }

    public function Edituser($user_id){
        if(isset($_POST['edit'])){
            extract($_POST);
            $check = $this->db->query("select * from users where user_id!='".$user_id."' and (email='".$email."' or mobile='".$mobile."')")->row();
            if(count($check) > 0){
                $this->session->set_flashdata("msg", "Mobile Number or Email Exists");
                $this->session->set_flashdata("type", "alert-danger");
                redirect("Users/Edituser/".$user_id);
            }
            else{
                $udata['name'] = $full_name;
                $udata['email'] = $email;
                $udata['mobile'] = $mobile;
                $udata['profile_id'] = $profile;
                $udata['password'] = md5($password);
                $udata['email_verified_at'] = date("Y-m-d H:i:s");
                $udata['updated_at'] = date("Y-m-d H:i:s");
                $udata['status'] = $status;
                $this->DefaultModel->updateData("users", $udata, array('user_id'=>$user_id));
                $this->session->set_flashdata("msg", "User Modified Successfully");
                $this->session->set_flashdata("type", "alert-success");
                redirect("Users");
            }
        }
        else{
            $data['userInfo'] = $this->DefaultModel->getSingleRecord('users', array('user_id'=>$user_id));
            $data['profiles'] = $this->DefaultModel->getAllRecords("profiles");
            $data['view'] = "users/edit";
            $this->load->view("layout", $data);
        }
    }

    public function delete($user_id){
        $this->DefaultModel->deleteRecord('users', array("user_id"=>$user_id));
        $this->session->set_flashdata("msg", "User Deleted Successfully");
        $this->session->set_flashdata("type", "alert-success");
        redirect("Users");
    }
    

}
?>
