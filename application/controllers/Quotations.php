<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Quotations extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['forms'] = $this->db->query("select * from forms order by form_id DESC")->result();
        $data['view'] = "quotations/quotations";
        $this->load->view("layout", $data);
    }
}
?>
