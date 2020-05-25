<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('home/index');
		}
		$this->load->model('department_model');
    }

	
	public function adddepartment()
	{
		$this->form_validation->set_rules('department','Department','trim|required');	

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('home/adddepartment');
		}
		else
		{
			$department    = $this->input->post('department');
			$insertdata    = array("name" => $department,"status" => 1);
			$adddepartment = $this->department_model->adddepartment($insertdata);

			if($adddepartment)
			{
				$departmentsuccess = "<p> Department Inserted Successfully </p>";
				$this->session->set_flashdata('departmentsuccess',$departmentsuccess);
				redirect('home/adddepartment');
			}
			else
			{
				$departmentfailed = "<p> Department Insertion Failed! </p>";
				$this->session->set_flashdata('departmentfailed',$departmentfailed);
				redirect('home/adddepartment');
			}
		}
	}

	public function Editdepartment($id)
	{
		$departmentdata = $this->department_model->getdepartmentdata($id);
		if($departmentdata)
		{
			$data['user'] = $this->session->userdata('user');
			$data['department'] = $departmentdata;
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/editdepartment',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}
	}

	public function Updatedepartment($id)
	{
		$this->form_validation->set_rules('department','Department','trim|required');	

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('Department/editdepartment/'.$id);
		}
		else
		{
			$department    = $this->input->post('department');
			$updatedata    = array("name" => $department);
			$updatedepartment = $this->department_model->updatedepartment($updatedata,$id);
			if($updatedepartment)
			{
				$departmentsuccess = "<p> Department Updated Successfully </p>";
				$this->session->set_flashdata('departmentsuccess',$departmentsuccess);
				redirect('home/department');
			}
			else
			{
				$departmentfailed = "<p> Department Updation Failed! </p>";
				$this->session->set_flashdata('departmentfailed',$departmentfailed);
				redirect('Department/editdepartment/'.$id);
			}
		}	
	}

	public function Deletedepartment()
	{
		$departmentid     = $this->input->post('deletedepartment');
		$deletedepartment = $this->department_model->deletedepartment($departmentid);
		if($deletedepartment)
		{
			$departmentsuccess = "<p> Department Deleted Successfully </p>";
			$this->session->set_flashdata('departmentsuccess',$departmentsuccess);
			redirect('home/department');
		}
		else
		{
			$departmentfailed = "<p> Department Deletion Failed! </p>";
			$this->session->set_flashdata('departmentfailed',$departmentfailed);
			redirect('home/department');
		}
	}

}
