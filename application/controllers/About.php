<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class About extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['about'] = $this->db->query("select * from about order by id DESC")->row();
        $data['view'] = "about/about";
        $this->load->view("layout", $data);
    }

    // add profile
    public function Add()
    {
        extract($_POST);
        if(isset($_POST['add']))
        {
            $data['title'] = $title;
            $data['description'] = $description;
            $data['created_by'] = $this->session->userdata("user_id");
            $this->DefaultModel->updateData('about', $data, array("id"=>"1"));
            $this->session->set_flashdata('msg','About Updated Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect('About');
        }
    }



}
?>
