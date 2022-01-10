<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Employees extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $zone_id = $this->session->userdata('zone_id');
        if($this->session->userdata('user_type') == "Superadmin")
        {
            $data['employees'] = $this->db->query("select * from users")->result();
        }
        elseif($this->session->userdata('user_type') == "Zone")
        {
            $data['employees'] = $this->db->query("select * from zone_user zu, users u where zu.user_id=u.user_id and zu.zone_id='".$zone_id."'")->result();
        }
        // echo $this->db->last_query();
        // exit;
        
        $data['view'] = "employees/employees";
        $this->load->view("layout", $data);
    }
}
?>
