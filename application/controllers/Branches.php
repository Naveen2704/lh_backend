<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Branches extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('is_logged_in'))
        {
            redirect('Auth');
        }
    }

	public function index()
	{
        $data['branches'] = $this->DefaultModel->getAllRecords('branches');
        $data['view'] = "branches/branches";
        $this->load->view("layout", $data);
    }

    // Add Branch 
    public function Add(){
        if(isset($_POST['submit'])){
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        }
        else{
            $data['states'] = $this->db->query("select * from cities group by city_state ASC")->result();
            $data['view'] = 'branches/add_branch';
            $this->load->view('layout', $data);
        }
    }

    // get cities
    public function getCities(){
        extract($_POST);
        $cities = $this->db->query("select * from cities where city_state='".$state."' order by city_name ASC")->result();
        if(count($cities) > 0){
            ?>
            <option selected disabled>Select City</option>
            <?php
            foreach($cities  as $value){
                ?>
                <option value="<?=$value->city_name?>"><?=$value->city_name?></option>
                <?php
            }
        }
    }
}
?>
