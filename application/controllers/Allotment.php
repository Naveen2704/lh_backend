<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Allotment extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

	public function index()
	{
        $data['view'] = "navigation/allotment";
        $this->load->view("layout",$data);
    }
}
?>
