<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Navigation extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['navigation'] = $this->db->query("select * from navigation order by navigation_id ASC")->result();
        $data['view'] = "navigation/menus";
        $this->load->view("layout", $data);
    }

    // add profile
    public function Add()
    {
        extract($_POST);
        if(isset($_POST['navSubmit']))
        {
            $data['menu_name'] = $menu_name;
            $data['link'] = $link;
            $data['type'] = $type;
            $data['parent_id'] = $parent;
            $data['icon'] = $icon;
            $this->DefaultModel->insertData('navigation', $data);
            $this->session->set_flashdata('msg','Navigation Created Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect('Navigation');
        }
        else
        {
            $this->session->set_flashdata('msg','Error Occured');
            $this->session->set_flashdata('type','alert-danger');
            redirect('Navigation');
        }
    }

    // edit profile
    public function Edit($navigation_id)
    {
        extract($_POST);
        if(isset($_POST['EditNavSubmit']))
        {
            $data['menu_name'] = $menu_name;
            $data['link'] = $link;
            $data['type'] = $type;
            $data['parent_id'] = $parent;
            $data['icon'] = $icon;
            $this->DefaultModel->updateData('navigation', $data, array('navigation_id'=>$navigation_id));
            $this->session->set_flashdata('msg','Navigation Updated Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect('Navigation');
        }
        else
        {
            $data['navigation'] = $this->db->query("select * from navigation order by navigation_id ASC")->result();
            $data['navInfo'] = $this->db->query("select * from navigation where navigation_id='".$navigation_id."'")->row();
            $data['view'] = "navigation/menus";
            $this->load->view("layout", $data);
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
