<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Referrals extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['referrals'] = $this->db->query("select * from referral_codes order by code_id DESC")->result();
        $data['view'] = "referrals/referrals";
        $this->load->view("layout", $data);
    }

    // add profile
    public function Add()
    {
        extract($_POST);
        if(isset($_POST['referralSubmit']))
        {
            if($code_id == ""){
                $data['code'] = $referral_code;
                $data['limitations'] = $limit;
                $data['description'] = $description;
                $data['percentage'] = $percentage;
                $data['status'] = 1;
                $data['created_at'] = date("Y-m-d H:i:s");
                $this->DefaultModel->insertData('referral_codes', $data);
                $this->session->set_flashdata('msg','Referral Code Created Successfully');
                $this->session->set_flashdata('type','alert-success');
            }
            else{
                $data['code'] = $referral_code;
                $data['limitations'] = $limit;
                $data['description'] = $description;
                $data['percentage'] = $percentage;
                $data['status'] = 1;
                $this->DefaultModel->updateData('referral_codes', $data, array('code_id'=>$code_id));
                $this->session->set_flashdata('msg','Referral Code Updated Successfully');
                $this->session->set_flashdata('type','alert-success');
            }
            redirect('Referrals');
        }
        else
        {
            redirect('Referrals');
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
