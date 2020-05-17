<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
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
				$loginerror = "<p> Department Insertion Failed! </p>";
				$this->session->set_flashdata($loginerror);
				redirect('home/adddepartment');

			}
		}
	}

}
