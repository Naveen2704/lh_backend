<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['catCount'] = $this->db->select("category_id")->from("categories")->get()->num_rows();
        $data['proCount'] = $this->db->select("product_id")->from("products")->get()->num_rows();
        $data['ordersCount'] = $this->db->select("order_id")->from("orders")->get()->num_rows();
        $data['custCount'] = $this->db->select("customer_id")->from("customers")->get()->num_rows();
        $data['newProducts'] = $this->db->query("select * from products order by product_id DESC LIMIT 20")->result();
        $data['orders'] = $this->db->query("select * from orders where status!='0' order by order_id DESC LIMIT 20")->result();
        $data['view'] = "dashboard/dashboard";
        $this->load->view("layout", $data);
    }
}
?>
