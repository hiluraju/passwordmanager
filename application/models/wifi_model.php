<?php

class Wifi_model extends CI_Model
{
	public function addwifi($insertdata)
	{
		$insert = $this->db->insert("wifi",$insertdata);
		if ($insert) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getwifidata($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get("wifi");
        if ($query) 
        {
        	return $query->row();
        }
        else
        {
        	return false;
        }
	}

	
	public function Updatewifi($updatedata,$id)
	{
		$this->db->where('id',$id);
		$this->db->set($updatedata);
		$update = $this->db->update('wifi');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function Deletewifi($id)
	{
		$this->db->where('id',$id);
		$delete = $this->db->delete('wifi');
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