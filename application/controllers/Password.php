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
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');	
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

	public function Editpassword($id)
	{
		$this->load->library('encrypt');
		$where['status']  =  "1";
		$departments      = $this->password_model->getdepartment($where,1);
		$departmentarray  = [];
		$departments      = array_column($departments, 'name');
		foreach ($departments as $departments) 
		{
			$departmentarray[$departments] = $departments;
		}

		$data['departments'] = $departmentarray;
		$passworddata  = $this->password_model->getpassworddata($id);
		if($passworddata)
		{
			$data['user'] = $this->session->userdata('user');
			$data['password'] = $passworddata;
			$data['currentdepartment'] = $passworddata->departments;
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/editpassword',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}
	}

	public function Updatepassword($id)
	{
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');	
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
			redirect('Password/Editpassword/'.$id);
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

			$updatedata    = array( 'username'    => $username,
									'email'       => $email,
									'password'    => $password,
									'erpusername' => $erpusername,
									'erppassword' => $erppassword,
									'appusername' => $appusername,
									'apppassword' => $apppassword,
									'departments' => $departments,
									'date' 		  => $date);

			$updatepassword = $this->password_model->Updatepassword($updatedata,$id);
			if($updatepassword)
			{
				$passwordsuccess = "<p> Details Updated Successfully </p>";
				$this->session->set_flashdata('passwordsuccess',$passwordsuccess);
				redirect('Password/Editpassword/'.$id);
			}
			else
			{
				$passwordtfailed = "<p> Details Updation Failed! </p>";
				$this->session->set_flashdata('passwordsuccess',$passwordsuccess);
				redirect('Password/Editpassword/'.$id);
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
