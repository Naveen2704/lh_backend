<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class CMS extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_logged_in')) {
            redirect('Auth');
        }
    }

    public function index(){
        $data['our_story'] = $this->DefaultModel->getSingleRecord('cms', array('type'=>'Our Story'));
        $data['feeding_creativity'] = $this->DefaultModel->getSingleRecord('cms', array('type'=>'Feeding Creativity'));
        $data['social_enterprise'] = $this->DefaultModel->getSingleRecord('cms', array('type'=>'Social Enterprise'));
        $data['about'] = $this->DefaultModel->getSingleRecord('about');
        $data['terms'] = $this->DefaultModel->getSingleRecord('policies', array('policy_name' => 'Terms & Conditions'));
        $data['shipping'] = $this->DefaultModel->getSingleRecord('policies', array('policy_name' => 'Shipping & Refund Policy'));
        $data['seller'] = $this->DefaultModel->getSingleRecord('policies', array('policy_name' => 'Seller Policy'));
        $data['buyer'] = $this->DefaultModel->getSingleRecord('policies', array('policy_name' => 'Buyer Policy'));
        $data['cancellation'] = $this->DefaultModel->getSingleRecord('policies', array('policy_name' => 'Cancellation Policy'));
        $data['return'] = $this->DefaultModel->getSingleRecord('policies', array('policy_name' => 'Return Policy'));
        $data['sliders'] = $this->DefaultModel->getAllRecords('sliders');
        $data['view'] = "cms/list";
        $this->load->view('layout', $data);
    }

    public function delSlider($slider_id){
        $this->DefaultModel->deleteRecord('sliders', array('slider_id' => $slider_id));
        redirect('CMS');
    }

    public function slidersSave(){
        extract($_POST);
        if(isset($_POST['sliders_submit'])){
            if(isset($_FILES['file']['name'])){
                $this->load->library('upload');
                $config['upload_path'] = './uploads/sliders/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
                $_FILES['file']['name'] = $_FILES['file']['name'];
                $_FILES['file']['type'] = $_FILES['file']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['file']['error'];
                $_FILES['file']['size'] = $_FILES['file']['size'];
                $config['file_name'] = "LH_S".rand(1000,9999).$_FILES['file']['name'];
                $this->upload->initialize($config);
                $this->upload->do_upload('file');
                $fname = $this->upload->data();
                $fileName = trim($fname['file_name']);
                $data['slider_image'] = $fileName;
                $data['slider_title'] = $slider_title;
                $data['description'] = $description;
                $data['created_date_time'] = date("Y-m-d H:i:s");
                $this->DefaultModel->insertData('sliders', $data);
            }
            redirect('CMS');
        }
    }

    public function homepageSave(){
        extract($_POST);
        $story['description'] = $our_story;
        $this->DefaultModel->updateData('cms', $story, array('type'=>'Our Story'));
        $feeding['description'] = $feeding_creativity;
        $this->DefaultModel->updateData('cms', $feeding, array('type'=>'Feeding Creativity'));
        $social['description'] = $social_enterprise;
        $this->DefaultModel->updateData('cms', $social, array('type'=>'Social Enterprise'));
        redirect('CMS');
    }

    public function policiesSave(){
        extract($_POST);
        // echo "<pre>";print_r($_POST);echo "</pre>";
        $terms_ar['description'] = $this->db->escape($terms);
        $this->DefaultModel->updateData('policies', $terms_ar, array('policy_name'=>'Terms & Conditions'));
        $seller_ar['description'] = $this->db->escape($seller);
        $this->DefaultModel->updateData('policies', $seller_ar, array('policy_name'=>'Seller Policy'));
        $buyer_ar['description'] = $this->db->escape($buyer);
        $this->DefaultModel->updateData('policies', $buyer_ar, array('policy_name'=>'Buyer Policy'));
        $cancellation_ar['description'] = $this->db->escape($cancellation);
        $this->DefaultModel->updateData('policies', $cancellation_ar, array('policy_name'=>'Cancellation Policy'));
        $return_ar['description'] = $this->db->escape($return);
        $this->DefaultModel->updateData('policies', $return_ar, array('policy_name'=>'Return Policy'));
        $shipping_ar['description'] = $this->db->escape($shipping);
        $this->DefaultModel->updateData('policies', $shipping_ar, array('policy_name'=>'Shipping & Refund Policy'));
        redirect('CMS');
    }

    public function aboutSave(){
        extract($_POST);
        $about['title'] = $title;
        $about['description'] = $description;
        $this->DefaultModel->updateData('about', $about, array('id'=>'1'));
        redirect('CMS');
    }

}