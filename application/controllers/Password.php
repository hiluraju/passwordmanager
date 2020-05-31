<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('home/index');
		}
		$this->load->model('password_model');
    }

	
	public function addpassword()
	{
		// echo "<pre>"; print_r($_POST); die;
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('email','Email Address','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');	
		$this->form_validation->set_rules('erpusername','Erp Username','trim|required');	
		$this->form_validation->set_rules('erppassword','Erp password','trim|required');	
		$this->form_validation->set_rules('appusername','App username','trim|required');	
		$this->form_validation->set_rules('apppassword','App password','trim|required');	
		$this->form_validation->set_rules('departments','Department','trim|required');	

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('home/addpassword');
		}
		else
		{
			$this->load->library('encrypt');
			$username      	= $this->encrypt->encode($this->input->post('username'));
			$email    		= $this->encrypt->encode($this->input->post('email'));
			$password    	= $this->encrypt->encode($this->input->post('password'));
			$erpusername    = $this->encrypt->encode($this->input->post('erpusername'));
			$erppassword    = $this->encrypt->encode($this->input->post('erppassword'));
			$appusername    = $this->encrypt->encode($this->input->post('appusername'));
			$apppassword    = $this->encrypt->encode($this->input->post('apppassword'));
			$departments    = $this->input->post('departments');
			$date           = date('Y-m-d');

			$insertdata    = array( 'username'    => $username,
									'email'       => $email,
									'password'    => $password,
									'erpusername' => $erpusername,
									'erppassword' => $erppassword,
									'appusername' => $appusername,
									'apppassword' => $apppassword,
									'departments' => $departments,
									'date' 		  => $date);

			$addpasswords = $this->password_model->addpasswords($insertdata);

			if($addpasswords)
			{
				$passwordsuccess = "<p> Details Inserted Successfully </p>";
				$this->session->set_flashdata('passwordsuccess',$passwordsuccess);
				redirect('home/addpassword');
			}
			else
			{
				$passwordfailed = "<p> Details Insertion Failed! </p>";
				$this->session->set_flashdata('passwordfailed',$passwordfailed);
				redirect('home/addpassword');
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
