<?php

class Extension_model extends CI_Model
{
	public function addextension($insertdata)
	{
		$insert = $this->db->insert("extensions",$insertdata);
		if ($insert) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getextensionsdata($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get("extensions");
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

	
	public function Updateextensions($updatedata,$id)
	{
		$this->db->where('id',$id);
		$this->db->set($updatedata);
		$update = $this->db->update('extensions');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function Deleteextension($id)
	{
		$this->db->where('id',$id);
		$delete = $this->db->delete('extensions');
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