<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $data['view'] = "frontpages/howitworks";
		$this->load->view('frontLayout', $data);
	}
}
?>
