<?php

class Password_model extends CI_Model
{
	public function addpasswords($insertdata)
	{
		$insert = $this->db->insert("passwords",$insertdata);
		if ($insert) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getpassworddata($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get("passwords");
        if ($query) 
        {
        	return $query->row();
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

	public function Updatepassword($updatedata,$id)
	{
		$this->db->where('id',$id);
		$this->db->set($updatedata);
		$update = $this->db->update('passwords');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function deletedepartment($id)
	{
		$this->db->where('id',$id);
		$delete = $this->db->delete('departments');
		if($delete)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}