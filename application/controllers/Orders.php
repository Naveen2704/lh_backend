<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_logged_in')) {
            redirect('Auth');
        }
    }

    public function index(){
        $data['orders'] = $this->db->query("select * from orders where status!='0' order by order_id DESC")->result();
        $data['view'] = "orders/list";
        $this->load->view('layout', $data);
    }

    public function orderView($order_id) {
        $data['orderInfo'] = $this->DefaultModel->getSingleRecord('orders', array('order_id' => $order_id));
        $data['addressInfo'] = $this->DefaultModel->getSingleRecord('user_address', array('user_address_id' => $data['orderInfo']->address_id));
        $data['lineInfo'] = $this->DefaultModel->getAllRecords('order_line_items', array('order_id' => $order_id));
        $data['view'] = "orders/view";
        $this->load->view('layout', $data);
    }

}