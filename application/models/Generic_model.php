<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Generic_model extends CI_Model{
	
	public function insertData($table,$data)
	{
		$result=$this->db->insert($table,$data);
		if($result)
 		return true;
		else
		return false;

	}

	public function insertDataReturnId($table,$data)
	{
	
		$this->db->insert($table,$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;

	}

	public function updateData($table,$data,$condition)
	{

		$this->db->where($condition);
		$result=$this->db->update($table,$data);		

		if($result)
			return true;
		else
			return false;
			
	}
	
}

?>
