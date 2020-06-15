<?php

class Login_model extends CI_Model
{
	public function logincheck($username="",$password="")
	{
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		$result = $this->db->get('login');
		if($result->num_rows() == 1) 
		{
			return $result->row(0)->id;
		}
		else
		{
			return false;
		}
	}

	public function getdepartment($where,$departmentname="")
	{
		if($departmentname)
		{
        	$this->db->select("name");
		}
		else
		{
        	$this->db->select("id,name");			
		}
		$this->db->where($where);
		$this->db->order_by("name");		
		$query = $this->db->get('departments');
		if($query->num_rows() > 0) 
		{
			return $result = $query->result_array();
		}
		else
		{
			return false;
		}
	}


	public function getpasswords()
	{
		
		$this->db->select("id,username,email,password,erpusername,erppassword,appusername,apppassword,departments");	
		$this->db->order_by("departments");		
		$query = $this->db->get('passwords');
		if($query->num_rows() > 0) 
		{
			return $result = $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function getwifi()
	{

        $this->db->select("*");
		$query = $this->db->get('wifi');
		if($query->num_rows() > 0) 
		{
			return $result = $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function getextensions()
	{

        $this->db->select("*");
		$query = $this->db->get('extensions');
		if($query->num_rows() > 0) 
		{
			return $result = $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function getanydesk()
	{

        $this->db->select("*");
		$query = $this->db->get('desk');
		if($query->num_rows() > 0) 
		{
			return $result = $query->result_array();
		}
		else
		{
			return false;
		}
	}
}

