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
}