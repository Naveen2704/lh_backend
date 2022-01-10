<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Profiles extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['profiles'] = $this->db->query("select * from profiles order by profile_id ASC")->result();
        $data['view'] = "profiles/profiles";
        $this->load->view("layout", $data);
    }

    // add profile
    public function Add()
    {
        extract($_POST);
        if(isset($_POST['profileSubmit']))
        {
            if($profile_id == ""){
                $data['profile_name'] = $profile_name;
                $this->DefaultModel->insertData('profiles', $data);
                $this->session->set_flashdata('msg','Profile Created Successfully');
                $this->session->set_flashdata('type','alert-success');
            }
            else{
                $data['profile_name'] = $profile_name;
                $this->DefaultModel->updateData('profiles', $data, array('profile_id'=>$profile_id));
                $this->session->set_flashdata('msg','Profile Updated Successfully');
                $this->session->set_flashdata('type','alert-success');
            }
            redirect('Profiles');
        }
        else
        {
            redirect('Profiles');
        }
    }


    // Delete Profile
    public function DelProfile($profile_id)
    {
        $check = $this->db->query("select * from profiles where profile_id='".$profile_id."'")->row();
        if(count($check) > 0)
        {
            $this->DefaultModel->deleteRecord('profiles', array('profile_id'=>$profile_id));
            $this->session->set_flashdata('msg','Profile Deleted Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect('Profiles');
        }
        else
        {
            redirect('Profiles');
        }
    }


}
?>
