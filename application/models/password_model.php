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