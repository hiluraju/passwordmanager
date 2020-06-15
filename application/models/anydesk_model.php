<?php

class Anydesk_model extends CI_Model
{
	public function addanydesk($insertdata)
	{
		$insert = $this->db->insert("desk",$insertdata);
		if ($insert) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getanydeskdata($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get("desk");
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

	public function Updateanydesk($updatedata,$id)
	{
		$this->db->where('id',$id);
		$this->db->set($updatedata);
		$update = $this->db->update('desk');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function Deleteanydesk($id)
	{
		$this->db->where('id',$id);
		$delete = $this->db->delete('desk');
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