<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class ArtWork extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_logged_in')) {
            redirect('Auth');
        }
    }

    public function index(){
        $data['artworks']  = $this->DefaultModel->getAllRecords('artwork');
        $data['artists']  = $this->DefaultModel->getAllRecords('artists');
        $data['view'] = "artwork/list";
        $this->load->view("layout", $data);
    }

    public function save(){
        extract($_POST);
        print_r($_POST);
        $user_id = $this->session->userdata('user_id');
        if($type == "old"){
            if($_FILES['file']['name'] != ""){
                $path = './uploads/artists/';
                $config['upload_path'] = './uploads/artwork/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';  
                $this->load->library('upload');
                $this->upload->initialize($config);
                $this->upload->do_upload('file'); //uploading file to server
                $fileData=$this->upload->data('file_name');
                $inputFileName =  $fileData;
                $data['image'] = $inputFileName;
            }
            $data['title'] = $title;
            $data['description'] = $description;
            $data['artist'] = $artist;
            $data['created_by'] = $user_id;
            $data['created_date_time'] = date("Y-m-d H:i:s");
            $this->DefaultModel->updateData('artwork', $data, array('artwork_id'=>$artwork_id));
        }
        else{
            if($_FILES['file']['name'] != ""){
                $path = './uploads/artwork/';
                $config['upload_path'] = './uploads/artwork/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';  
                $this->load->library('upload');
                $this->upload->initialize($config);
                $this->upload->do_upload('file'); //uploading file to server
                $fileData=$this->upload->data('file_name');
                $inputFileName =  $fileData;
                $data['image'] = $inputFileName;
            }
            $data['title'] = $title;
            $data['description'] = $description;
            $data['artist'] = $artist;
            $data['created_by'] = $user_id;
            $data['created_date_time'] = date("Y-m-d H:i:s");
            $this->DefaultModel->insertData("artwork", $data);
        }
        redirect('ArtWork');
    }

    public function delWork($artwork_id){
        $this->DefaultModel->deleteRecord('artwork', array('artwork_id'=>$artwork_id));
        redirect('ArtWork');
    }

}