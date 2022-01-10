<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class DefaultModel extends CI_Model{
	
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

	public function getNumberOfRecords($table,$condition)
	{
		$query=$this->db->select('*')->from($table)->where($condition)->get()->result_array();
		return count($query);
	}

	public function getrandomString($length)
	{
		$string = "abcdefghijklmnopqrstuvqxyzABCDEFGHIJKLMNOPQRSTUVQXYZ0123456789";
		$shuffled = str_shuffle($string);
		return substr($shuffled, 0, $length);
	}
	
	public function getAllRecords($table,$condition='',$order='')
	{
		
	    if($condition=='' && $order=='')
		{
			return $this->db->select('*')->from($table)->get()->result();
		}
		else if($condition=='' && $order!='')
		{
			return $this->db->select('*')->from($table)->order_by($order['field'],$order['type'])->get()->result();
		}
		else if($condition!='' && $order=='')
		{
			return $this->db->select('*')->from($table)->where($condition)->get()->result();
		}
		else
		{
			
			return $this->db->select('*')->from($table)->where($condition)->order_by($order['field'],$order['type'])->get()->result();
		}

	}
	public function getgroupbyRecords($table, $condition)
	{
		return $this->db->select('*')->from($table)->group_by($condition)->get()->result();
	}
	
	
	public function deleteRecord($table, $condition)
	{
		$this->db->where($condition);
		$result=$this->db->delete($table);
		if($result)
			return true;
		else
			return false;
	}
	
	
	public function getJoinRecords($table,$jointable,$oncondition,$condition=array(),$type_join="",$select)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->join($jointable,$oncondition,$type_join);
        if(!empty($condition))
		$this->db->where($condition);
	    return $this->db->get()->result();
    }
		
	
	public function getSingleRecord($table,$condition='',$order='')
	{
		
	    if($condition=='' && $order=='')
		{
			return $this->db->select('*')->from($table)->get()->row();
		}
		else if($condition=='' && $order!='')
		{
			return $this->db->select('*')->from($table)->order_by($order['field'],$order['type'])->get()->row();
		}
		else if($condition!='' && $order=='')
		{
			return $this->db->select('*')->from($table)->where($condition)->get()->row();
		}
		else
		{
			return $this->db->select('*')->from($table)->where($condition)->order_by($order['field'],$order['type'])->get()->row();
		}

	}
	
}

?>
