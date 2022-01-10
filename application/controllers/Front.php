<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function index()
	{
        $data['view'] = "frontpages/home";
		$this->load->view('frontLayout', $data);
	}

    public function Session(){
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }

    public function OurServices(){
        $data['servicesInfo'] = $this->DefaultModel->getSingleRecord("services");
        $data['view'] = "frontpages/services";
        $this->load->view("frontLayout", $data);
    }

    public function LearnMore(){
        $data['learnInfo'] = $this->DefaultModel->getSingleRecord("learn_more");
        $data['view'] = "frontpages/learn_more";
        $this->load->view("frontLayout", $data);
    }

    public function Works(){
        $data['workInfo'] = $this->DefaultModel->getSingleRecord("how_it_works");
        $data['view'] = "frontpages/howitworks";
        $this->load->view("frontLayout", $data);
    }

    public function Guidance(){
        $data['guidanceInfo'] = $this->DefaultModel->getSingleRecord("guidance");
        $data['view'] = "frontpages/guidance";
        $this->load->view("frontLayout", $data);
    }

    public function Myself(){
        if(isset($_POST['SubmitForm'])){
            extract($_POST);
            $data['project_type'] = $project_type;
            $data['looking_for'] = $looking_for;
            $data['pro_description'] = $pro_description;
            $data['budget'] = $budget;
            $data['project_style'] = $project;
            $data['message'] = $message;
            $data['anything_more'] = $pro_more;
            $data['referral_code'] = $ref_code;
            $data['executive_code'] = $ex_code;
            $data['status'] = 1;
            $data['created_by'] = $this->session->userdata('customer_id');
            $data['created_date_time'] = date("Y-m-d H:i:s");
            $form_id = $this->DefaultModel->insertData('forms', $data);
            $data2['application_number'] = time().$form_id;
            $this->DefaultModel->updateData('forms', $data2, array("form_id"=>$form_id));
            $this->load->library('upload');
            $config['upload_path'] = './uploads/forms/';
            $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|pdf|PDF';
            $file_count=count($_FILES['file']['name']);
            if($file_count > 0){
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
                  $data1['image'] = $fileName[$i];
                  $data1['form_id'] = $form_id;
                  $data1['created_by'] = $this->session->userdata('user_id');
                  $this->DefaultModel->insertData("forms_images",$data1);
                }
            }
            $this->session->set_flashdata('msg','Form Submitted Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect("OurServices");
        }
        else{
            $data['view'] = "frontpages/myform";
            $this->load->view("frontLayout", $data);
        }        
    }

    public function Login(){
        if(isset($_POST['login'])){
            extract($_POST);
            $password = md5($password);
            $check = $this->db->query("select * from customers where email='".$email."' and password='".$password."'")->row();
            if(count($check) > 0){
                $_SESSION['customer_id'] = $check->customer_id;
                $_SESSION['name'] = $check->name;
                redirect("Myaccount");
            }
            else{
                $this->session->set_flashdata('msg','Invalid Credentials');
                $this->session->set_flashdata('type','alert-danger');
                redirect("Login");
            }
        }
        else{
            $data['view'] = "frontpages/login";
            $this->load->view("frontLayout", $data);
        }
    }

    public function Logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function Myaccount(){
        if(isset($_SESSION['customer_id'])){
            $data['forms'] = $this->DefaultModel->getAllRecords("forms", array("created_by"=>$this->session->userdata('customer_id')));
            $data['view'] = "frontpages/my_works";
            $this->load->view("frontLayout", $data);
        }
        else{
            redirect("Login");
        }        
    }

    public function OGuidance(){
        $data['view'] = "frontpages/myaccount";
        $this->load->view("frontLayout", $data);
    }

    public function CPacks(){
        $data['view'] = "frontpages/custom_packs";
        $this->load->view("frontLayout", $data);
    }

    public function GCodes(){
        $data['view'] = "frontpages/gift_codes";
        $this->load->view("frontLayout", $data);
    }


    public function Register(){
        if(isset($_POST['register'])){
            extract($_POST);
            $check = $this->db->query("select * from customers where mobile='".$mobile."' or email='".$email."'")->row();
            $data['name'] = $name;
            $data['mobile'] = $mobile;
            $data['email'] = $email;
            $data['password'] = md5($password);
            $data['status'] = 1;
            $data['created_date_time'] = date("Y-m-d H:i:s");
            $this->DefaultModel->insertData("customers", $data);
            $this->session->set_flashdata('msg','Registration Completed Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect("Login");
        }
    }

    public function Projects(){
        $data['projects'] = $this->db->query("select * from projects order by project_id DESC")->result();
        $data['view'] = "frontpages/projects";
        $this->load->view("frontLayout", $data);
    }

    public function ProjectView($project_id){
        $data['projectInfo'] = $this->db->query("select * from projects where project_id='".$project_id."'")->row();
        $data['city'] = $this->db->query("select * from cities where city_id='".$data['projectInfo']->city."'")->row();
        $data['projectImages'] = $this->db->query("select * from project_images where project_id='".$project_id."'")->result();
        $data['view'] = "frontpages/single";
        $this->load->view("frontLayout", $data);
    }

}
?>
