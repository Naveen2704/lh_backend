<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Zones extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['zones'] = $this->db->query("select * from zones order by zone_id DESC")->result();
        $data['view'] = "zones/zones";
        $this->load->view("layout", $data);
    }

    // add zones
    public function Add()
    {
        extract($_POST);
        if(isset($_POST['ZoneData']))
        {
            // Zone Details
            $data['zone_name'] = $zone_name;
            $data['office_address'] = $address;
            $data['status'] = 1;
            $data['created_at'] = date("Y-m-d H:i:s");
            $zone_id = $this->DefaultModel->insertDataReturnId('zones', $data);
            // User Details
            $para['login_type'] = "Zone";
            $para['username'] = $zone_name;
            $para['status'] = 1;
            $para['email'] = $zone_name."_".$zone_id."@magichomes.com";
            $para['email_verified_at'] = date("Y-m-d H:i:s");
            $para['password'] = md5($zone_name."_".$zone_id);
            $para['profile_id'] = "1"; // For Admin Profile Id is 1
            $user_id = $this->DefaultModel->insertDataReturnId('users', $para);
            // zone and users mapping
            $mapData['user_id'] = $user_id;
            $mapData['zone_id'] = $zone_id;
            $mapData['status'] = 1;
            $mapData['created_at'] = date("Y-m-d H:i:s");
            $this->DefaultModel->insertData('zone_user', $mapData);
            $this->session->set_flashdata('msg','Zone Created Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect('Zones/View/'.$zone_id);
        }
        else
        {
            $data['view'] = "zones/addzone";
            $this->load->view('layout', $data);
        }
    }

    // zone view
    public function View($zone)
    {
        $data['zoneInfo'] = $this->db->query("select * from zones where zone_id='".$zone."'")->row();
        $data['usersInfo'] = $this->db->query("select * from zone_user zu, users u where zu.user_id=u.user_id and zu.zone_id='".$zone."'")->result();
        $data['view'] = "zones/view";
        $this->load->view('layout', $data);
    }

    // Edit Zone
    public function Edit($zone='')
    {
        extract($_POST);
        if(isset($_POST['editZoneData']))
        {
            // Zone Details
            $data['zone_name'] = $zone_name;
            $data['office_address'] = $address;
            $this->DefaultModel->updateData('zones', $data, array('zone_id'=>$zone_id));
            $this->session->set_flashdata('msg','Zone Updated Successfully');
            $this->session->set_flashdata('type','alert-success');
            redirect('Zones/View/'.$zone_id);
        }
        else
        {
            $data['zoneInfo'] = $this->db->query("select * from zones where zone_id='".$zone."'")->row();
            $data['view'] = "zones/editzone";
            $this->load->view('layout', $data);
        }
    }

}
?>
