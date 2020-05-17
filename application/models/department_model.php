<?php

class Department_model extends CI_Model
{
	public function adddepartment($insertdata)
	{
		$insert = $this->db->insert("departments",$insertdata);
		if ($insert) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}