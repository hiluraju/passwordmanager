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

	public function getdepartmentdata($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get("departments");
        if ($query) 
        {
        	return $query->row();
        }
        else
        {
        	return false;
        }
	}

	public function updatedepartment($updatedata,$id)
	{
		$this->db->where('id',$id);
		$this->db->set($updatedata);
		$update = $this->db->update('departments');
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