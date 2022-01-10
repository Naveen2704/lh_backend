<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Sub_Categories extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

    public function index()
	{
        $data['subcategories_list'] = $this->db->query("select * from sub_categories ORDER BY position ASC;")->result();
        	// echo $this->db->last_query()."<br>";
			// 	exit();

        $data['view'] = "subcategories/subcategory";
        $this->load->view("layout", $data);
    }
}
?>
