<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Categories extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

    public function index()
	{
        $data['categories_list'] = $this->db->query("select * from categories")->result();
        	// echo $this->db->last_query()."<br>";
			// 	exit();

        $data['view'] = "categories/category";
        $this->load->view("layout", $data);
    }

    public function add_categories()
    {
        $data['view'] = "categories/add_categories";
        $this->load->view("layout", $data);
    }

    public function save_categories() 
    {
            $path = './uploads/categories/';
            $config['upload_path'] = './uploads/categories/';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';  
            $this->load->library('upload');
            $this->upload->initialize($config);
            $this->upload->do_upload('category_image'); //uploading file to server
            $fileData=$this->upload->data('file_name');
            $inputFileName =  $fileData;
            $cat['category_name'] = $this->input->post('category_name');
            $cat['image'] = $inputFileName;
            $cat['status'] = '1';
            $cat['created_date_time'] = date('Y-m-d H:i:s');

            $this->DefaultModel->insertData("categories", $cat);
            redirect('Categories');
    }

    public function edit_category($cid)
    {		
        $data['category_data'] = $this->db->query("select * from categories where category_id='".$cid."'")->row();
        $data['view'] = "categories/edit_category";
        $this->load->view("layout", $data);
    }

    public function save_edit_categories($cid)
    {
        $path = './uploads/categories/';
        $config['upload_path'] = './uploads/categories/';
        $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';  
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('category_image'); //uploading file to server
        $fileData=$this->upload->data('file_name');
        if($fileData != "")
        {
            $cat['image'] = $fileData;
        }
        $cat['category_name'] = $this->input->post('category_name');
        $cat['status'] = '1';

        $this->DefaultModel->updateData("categories",$cat,array('category_id'=>$cid));
        redirect('Categories');
    }

    public function delete_category($cid)
    {
        $check = $this->db->select("*")->from("categories")->where("category_id", $cid)->get()->num_rows();
        if($check > 0)
        {
            $this->DefaultModel->deleteRecord('categories', array('category_id' => $cid));
            $this->session->set_flashdata('msg','Category Deleted Successfully.');
            redirect('Categories');
        }
        else{
            redirect('Categories');
        }
    }
    

}
?>
