<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Projects extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['projects'] = $this->db->query("select * from projects order by project_id DESC")->result();
        $data['view'] = "projects/projects";
        $this->load->view("layout", $data);
    }

    // add profile
    public function AddProject()
    {
        extract($_POST);
        if(isset($_POST['add']))
        {
            
            $data['title'] = $title;
            $data['short_description'] = $short_description;
            $data['description'] = $description;
            $data['state'] = $states;
            $data['city'] = $city;
            $data['status'] = $status;
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['modified_by'] = $this->session->userdata('user_id');
            $data['modified_at'] = date("Y-m-d H:i:s");            
            $project_id = $this->DefaultModel->insertData('projects', $data);
            $this->load->library('upload');
            $config['upload_path'] = './uploads/projects/';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
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
                  $data1['project_id'] = $project_id;
                  $data1['created_by'] = $this->session->userdata('user_id');
                  $this->DefaultModel->insertData("project_images",$data1);
                }
            }
            $this->session->set_flashdata('msg','Project Added Created Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect("Projects");
        }
        else
        {
            $data['states'] = $this->db->query("select * from cities group by city_state order by city_state ASC")->result();
            $data['view'] = "projects/add";
            $this->load->view("layout", $data);
        }
    }

    public function Edit($project_id)
    {
        extract($_POST);
        if(isset($_POST['edit']))
        {
            
            $data['title'] = $title;
            $data['short_description'] = $short_description;
            $data['description'] = $description;
            $data['state'] = $states;
            $data['city'] = $city;
            $data['status'] = $status;
            $data['modified_by'] = $this->session->userdata('user_id');
            $data['modified_at'] = date("Y-m-d H:i:s");            
            $this->DefaultModel->updateData('projects', $data, array("project_id"=>$project_id));
            $this->load->library('upload');
            $config['upload_path'] = './uploads/projects/';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
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
                  $data1['project_id'] = $project_id;
                  $data1['created_by'] = $this->session->userdata('user_id');
                  $this->DefaultModel->insertData("project_images",$data1);
                }
            }
            $this->session->set_flashdata('msg','Project Updated Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect("Projects");
        }
        else
        {
            $data['projectInfo'] = $this->db->query("select * from projects where project_id='".$project_id."'")->row();
            $data['cities'] = $this->db->query("select * from cities where city_state='".$data['projectInfo']->state."' order by city_name ASC")->result();
            $data['projectImages'] = $this->db->query("select * from project_images where project_id='".$project_id."'")->result();
            $data['states'] = $this->db->query("select * from cities group by city_state order by city_state ASC")->result();
            $data['view'] = "projects/edit";
            $this->load->view("layout", $data);
        }
    }

    public function delImage($image_id){
        $this->DefaultModel->deleteRecord("project_images", array('image_id'=>$image_id));
        $this->session->set_flashdata('msg','Image Deleted Successfully');
        $this->session->set_flashdata('type','alert-success');
        redirect("Projects");
    }

    public function getCities(){
        extract($_POST);
        $cities = $this->db->query("select * from cities where city_state='".$state."' order by city_name ASC")->result();
        ?>
        <option selected disabled>--Select City--</option>
        <?php
        foreach($cities as $value){
            ?>
            <option value="<?=$value->city_id?>"><?=ucwords($value->city_name)?></option>
            <?php
        }
    }


    // Delete Profile
    public function DelReferral($code_id)
    {
        $this->DefaultModel->deleteRecord('referral_codes', array('code_id'=>$code_id));
        $this->session->set_flashdata('msg','Referral Code Deleted Successfully');
        $this->session->set_flashdata('type','alert-success');
        redirect('Referrals');
    }


}
?>
