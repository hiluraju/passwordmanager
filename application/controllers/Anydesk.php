<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anydesk extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('home/index');
		}
		$this->load->model('anydesk_model');
    }

	
	public function addanydesk()
	{
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('desk','AnyDesk ID','trim|required');		
		$this->form_validation->set_rules('departments','Department','trim|required');	

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('home/addanydesk');
		}
		else
		{
			$this->load->library('encrypt');
			$username      	= $this->input->post('username');
			$desk    		= $this->encrypt->encode($this->input->post('desk'));
			$departments    = $this->input->post('departments');

			$insertdata     = array( 'username'   => $username,
									 'desk'       => $desk,
									 'department' => $departments);

			$addanydesk = $this->anydesk_model->addanydesk($insertdata);

			if($addanydesk)
			{
				$anydesksuccess = "<p>Anydesk Details Inserted Successfully </p>";
				$this->session->set_flashdata('anydesksuccess',$anydesksuccess);
				redirect('home/addanydesk');
			}
			else
			{
				$anydeskfailed = "<p>Anydesk Details Insertion Failed! </p>";
				$this->session->set_flashdata('anydeskfailed',$anydeskfailed);
				redirect('home/addanydesk');
			}
		}
	}

	public function Editanydesk($id)
	{
		$this->load->library('encrypt');
		$where['status']  =  "1";
		$departments      = $this->anydesk_model->getdepartment($where,1);
		$departmentarray  = [];
		$departments      = array_column($departments, 'name');
		foreach ($departments as $departments) 
		{
			$departmentarray[$departments] = $departments;
		}

		$data['departments'] = $departmentarray;
		$anydeskdata  = $this->anydesk_model->getanydeskdata($id);
		if($anydeskdata)
		{
			$data['user'] = $this->session->userdata('user');
			$data['anydesk'] = $anydeskdata;
			$data['currentdepartment'] = $anydeskdata->department;
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/editanydesk',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}
	}

	public function Updateanydesk($id)
	{
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('desk','AnyDesk ID','trim|required');		
		$this->form_validation->set_rules('departments','Department','trim|required');	

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('Anydesk/Editanydesk/'.$id);
		}	
		else
		{
			$this->load->library('encrypt');
			$username      	= $this->input->post('username');
			$desk    		= $this->encrypt->encode($this->input->post('desk'));
			$departments    = $this->input->post('departments');

			$updatedata     = array( 'username'   => $username,
									 'desk'       => $desk,
									 'department' => $departments);

			$updateanydesk = $this->anydesk_model->Updateanydesk($updatedata,$id);
			if($updateanydesk)
			{
				$anydesksuccess = "<p>Anydesk Details Updated Successfully </p>";
				$this->session->set_flashdata('anydesksuccess',$anydesksuccess);
				redirect('Anydesk/Editanydesk/'.$id);
			}
			else
			{
				$anydeskfailed = "<p>Anydesk Details Updation Failed! </p>";
				$this->session->set_flashdata('anydesksuccess',$anydesksuccess);
				redirect('Anydesk/Editanydesk/'.$id);
			}
		}	
	}

	public function Deleteanydesk()
	{
		$anydeskid     = $this->input->post('deleteanydesk');
		$deleteanydesk = $this->anydesk_model->deleteanydesk($anydeskid);
		if($deleteanydesk)
		{
			$anydesksuccess = "<p>Anydesk Details Deleted Successfully </p>";
			$this->session->set_flashdata('anydesksuccess',$anydesksuccess);
			redirect('home/anydesk');
		}
		else
		{
			$anydeskfailed = "<p>Anydesk Details Deletion Failed! </p>";
			$this->session->set_flashdata('anydeskfailed',$anydeskfailed);
			redirect('home/anydesk');
		}
	}

}
