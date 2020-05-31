<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('login_model');
    }

	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('index');
		$this->load->view('common/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');	

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('home/index');
		}
		else
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$userid   = $this->login_model->logincheck($username,$password);

			if($userid)
			{
				$user_data = array("userid" => $userid, "user"=> $username, "loggedin" => true);
				$this->session->set_userdata('user',$user_data);
				redirect('home/admin');
			}
			else
			{
				$loginerror = array("errors" => "<p> Incorrect Username or Password </p>");
				$this->session->set_flashdata($loginerror);
				redirect('home/index');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/index');
	}

	public function admin()
	{
		// $this->load->view('common/header');
		// $this->load->view('admin');
		// $this->load->view('common/footer');
		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/passwords');
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}
		else
		{
			$loginerror = array("errors" => "<p> Login Failed </p>");
			$this->session->set_flashdata($loginerror);
			redirect('home/index'); 
		}	
	}

	public function department()
	{		
		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$where['status'] 	  =  "1";
			$data['departments']  = $this->login_model->getdepartment($where);
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/department',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}
		else
		{
			$loginerror = array("errors" => "<p> Login Failed </p>");
			$this->session->set_flashdata($loginerror);
			redirect('home/index'); 
		}	
	}

	public function addpassword()
	{
		$where['status']  =  "1";
		$departments      = $this->login_model->getdepartment($where,1);
		$departmentarray  = [];
		$departments      = array_column($departments, 'name');

		foreach ($departments as $departments) 
		{
			$departmentarray[$departments] = $departments;
		}

		$data['departments'] = $departmentarray;
		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/addpassword',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}	
		else
		{
			redirect('home/index'); 
		}
	}

	public function adddepartment()
	{
		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/adddepartment');
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}	
		else
		{
			redirect('home/index'); 
		}
	}
}
