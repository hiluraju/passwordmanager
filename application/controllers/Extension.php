<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extension extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('home/index');
		}
		$this->load->model('extension_model');
    }

	
	public function addextension()
	{
		$this->form_validation->set_rules('name','Name','trim|required');	
		$this->form_validation->set_rules('number','Number','trim|required');	
		$this->form_validation->set_rules('departments','Departments','trim|required');	
		
		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('home/addextension');
		}
		else
		{
			$name      	  = $this->input->post('name');
			$number       = $this->input->post('number');
			$department   = $this->input->post('departments');

			$insertdata    = array( 'name'   	 => $name,
									'number'     => $number,
									'department' => $department);

			$addextension = $this->extension_model->addextension($insertdata);

			if($addextension)
			{
				$extensionsuccess = "<p>Extension Details Inserted Successfully </p>";
				$this->session->set_flashdata('extensionsuccess',$extensionsuccess);
				redirect('home/addextension');
			}
			else
			{
				$extensionfailed = "<p>Extension Details Insertion Failed! </p>";
				$this->session->set_flashdata('extensionfailed',$extensionfailed);
				redirect('home/addextension');
			}
		}
	}

	public function Editextension($id)
	{
		$where['status']  =  "1";
		$departments      = $this->extension_model->getdepartment($where,1);
		$departmentarray  = [];
		$departments      = array_column($departments, 'name');
		foreach ($departments as $departments) 
		{
			$departmentarray[$departments] = $departments;
		}

		$data['departments'] = $departmentarray;
		$extensiondata  = $this->extension_model->getextensionsdata($id);

		if($extensiondata)
		{
			$data['user'] = $this->session->userdata('user');
			$data['extension'] = $extensiondata;
			$data['currentdepartment'] = $extensiondata->department;
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/editextension',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}
	}

	public function Updateextension($id)
	{
		$this->form_validation->set_rules('name','Name','trim|required');	
		$this->form_validation->set_rules('number','Number','trim|required');	
		$this->form_validation->set_rules('departments','Departments','trim|required');	
		
		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('Extension/Editextension/'.$id);
		}
		else
		{
			$name      	  = $this->input->post('name');
			$number       = $this->input->post('number');
			$department   = $this->input->post('departments');

			$updatedata    = array( 'name'   	 => $name,
									'number'     => $number,
									'department' => $department);

			$Updateextension = $this->extension_model->Updateextensions($updatedata,$id);
			if($Updateextension)
			{
				$extensionsuccess = "<p> Extension Details Updated Successfully </p>";
				$this->session->set_flashdata('extensionsuccess',$extensionsuccess);
				redirect('Extension/Editextension/'.$id);
			}
			else
			{
				$extensionfailed = "<p>Extension Details Updation Failed! </p>";
				$this->session->set_flashdata('extensionfailed',$extensionfailed);
				redirect('Extension/Editextension/'.$id);
			}
		}	
	}

	public function Deleteextension()
	{
		$extensionid     = $this->input->post('deleteextension');
		$deleteextension = $this->extension_model->deleteextension($extensionid);
		if($deleteextension)
		{
			$extensionsuccess = "<p>Extension Details Deleted Successfully </p>";
			$this->session->set_flashdata('extensionsuccess',$extensionsuccess);
			redirect('home/extensions');
		}
		else
		{
			$extensionfailed = "<p>Extension Details Deletion Failed! </p>";
			$this->session->set_flashdata('extensionfailed',$extensionfailed);
			redirect('home/extensions');
		}
	}

}
