<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Gallery extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['gallery'] = $this->db->query("select * from gallery order by gallery_id DESC")->result();
        $data['view'] = "gallery/gallery";
        $this->load->view("layout", $data);
    }

    // add profile
    public function Add()
    {
        extract($_POST);
        if(isset($_POST['add']))
        {
            $this->load->library('upload');
            $config['upload_path'] = './uploads/gallery/';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
            $file_count=count($_FILES['file']['name']);
            for($i=0;$i<$file_count;$i++)
            {
              $_FILES['file[]']['name'] = $_FILES['file']['name'][$i];
              $_FILES['file[]']['type'] = $_FILES['file']['type'][$i];
              $_FILES['file[]']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
              $_FILES['file[]']['error'] = $_FILES['file']['error'][$i];
              $_FILES['file[]']['size'] = $_FILES['file']['size'][$i];
              $this->upload->initialize($config);
              $this->upload->do_upload('file[]');
              $fname = $this->upload->data();
              $fileName[$i] = trim($fname['file_name']);
              $data['image'] = $fileName[$i];
              $data['created_by'] = $this->session->userdata("user_id");
              $data['created_at'] = date("Y-m-d H:i:s");
              $this->DefaultModel->insertData("gallery",$data);
            }
            $this->session->set_flashdata('msg','Images Added Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect("Gallery");
        }
    }



}
?>
