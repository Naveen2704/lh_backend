<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Settings extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

    public function index(){
        $data['general'] = $this->DefaultModel->getSingleRecord('general_settings');
        $data['payment'] = $this->DefaultModel->getSingleRecord('payment_settings');
        $data['view'] = "settings/settings";
        $this->load->view('layout', $data);
    }

    public function addGeneral(){
        extract($_POST);
        if(isset($_POST['submit'])){
            $this->load->library('upload');
            if(isset($_FILES['general']['name'])){
                $config['upload_path'] = './uploads/logo/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
                $config['file_name'] = "Logo-General-".rand(10,99).$_FILES['general']['name'];
                $this->upload->initialize($config);
                $this->upload->do_upload('general');
                $fname = $this->upload->data();
                $fileName = trim($fname['file_name']);
                $data['logo_general'] = $fileName;
            }
            if(isset($_FILES['dark']['name'])){
                $config1['upload_path'] = './uploads/logo/';
                $config1['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
                $config1['file_name'] = "Logo-Dark-".rand(10,99).$_FILES['dark']['name'];
                $this->upload->initialize($config1);
                $this->upload->do_upload('dark');
                $fname = $this->upload->data();
                $fileName = trim($fname['file_name']);
                $data['logo_dark'] = $fileName;
            }
            $data['title'] = $title;
            $data['description'] = $description;
            $data['keywords'] = $keywords;
            $data['theme_color'] = $color;
            $this->DefaultModel->updateData('general_settings', $data, array('general_setting_id'=>'1'));
            redirect('Settings');
        }
    }
    
    public function addPayment(){
        extract($_POST);
        if(isset($_POST['submit'])){
            $data['secret_id'] = $secret_id;
            $data['key_id'] = $key_id;
            $this->DefaultModel->updateData('payment_settings', $data, array('payment_setting_id'=>'1'));
            redirect('Settings');
        }
    }

}