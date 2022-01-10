<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Services extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['services'] = $this->db->query("select * from services order by id DESC")->row();
        $data['view'] = "services/services";
        $this->load->view("layout", $data);
    }

    // add profile
    public function Add()
    {
        extract($_POST);
        if(isset($_POST['add']))
        {
            if(isset($_FILES['file']['name'])){
                $this->load->library('upload');
                $config['upload_path'] = './uploads/service/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
                $_FILES['file']['name'] = $_FILES['file']['name'];
                $_FILES['file']['type'] = $_FILES['file']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['file']['error'];
                $_FILES['file']['size'] = $_FILES['file']['size'];
                $this->upload->initialize($config);
                $this->upload->do_upload('file');
                $fname = $this->upload->data();
                $fileName = trim($fname['file_name']);
                $data['image'] = $fileName;
            }
            $data['title'] = $title;
            $data['description'] = $description;
            $data['created_at'] = date("Y-m-d H:i:s");
            $this->DefaultModel->updateData('services', $data, array("id"=>"1"));
            $this->session->set_flashdata('msg','Services Updated Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect('Services');
        }
    }



}
?>
