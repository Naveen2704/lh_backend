<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Artists extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_logged_in')) {
            redirect('Auth');
        }
    }

    public function index(){
        $data['artists'] = $this->DefaultModel->getAllRecords('artists');
        $data['view'] = "artists/list";
        $this->load->view('layout', $data);
    }
    
    public function add_artist() 
    {
        extract($_POST);
        if($type == "New"){
            if($_FILES['artist_image']['name'] != ""){
                $path = './uploads/artists/';
                $config['upload_path'] = './uploads/artists/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';  
                $this->load->library('upload');
                $this->upload->initialize($config);
                $this->upload->do_upload('artist_image'); //uploading file to server
                $fileData=$this->upload->data('file_name');
                $inputFileName =  $fileData;
                $cat['artist_image'] = $inputFileName;
            }
            $cat['artist_name'] = $this->input->post('artist_name');
            $cat['video_link'] = $this->input->post('artist_video_link');
            $cat['description'] = $this->input->post('description');
            $this->DefaultModel->insertData("artists", $cat);
            redirect('Artists');
        }
        else{
            if($_FILES['artist_image']['name'] != ""){
                $path = './uploads/artists/';
                $config['upload_path'] = './uploads/artists/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';  
                $this->load->library('upload');
                $this->upload->initialize($config);
                $this->upload->do_upload('artist_image'); //uploading file to server
                $fileData=$this->upload->data('file_name');
                $inputFileName =  $fileData;
                $cat['artist_image'] = $inputFileName;
            }
            $cat['artist_name'] = $this->input->post('artist_name');
            $cat['video_link'] = $this->input->post('artist_video_link');
            $cat['description'] = $this->input->post('description');
            $this->DefaultModel->updateData("artists", $cat, array('artist_id'=>$artist_id));
            redirect('Artists');
        }
        
    }

    public function delete_artist($aid)
    {
        $check = $this->db->select("*")->from("artists")->where("artist_id", $aid)->get()->num_rows();
        if($check > 0)
        {
            $this->DefaultModel->deleteRecord('artists', array('artist_id' => $aid));
            $this->session->set_flashdata('msg','Artist Deleted Successfully.');
            redirect('Artists');
        }
        else{
            redirect('Artists');
        }
    }
}