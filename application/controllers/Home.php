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
		$this->load->library('encrypt');
		$passwordsarray  = [];
		$passwords  = $this->login_model->getpasswords();
		$data['passwords']  = $this->login_model->getpasswords();


		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/passwords',$data);
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

	public function wifi()
	{		
		$this->load->library('encrypt');
		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$data['wifi']  = $this->login_model->getwifi();

			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/wifi',$data);
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

	public function extensions()
	{		
		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$data['extension']  = $this->login_model->getextensions();
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/extensions',$data);
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
			redirect('home/addpassword'); 
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
			redirect('home/adddepartment'); 
		}
	}

	public function addwifi()
	{
		$data['user'] = $this->session->userdata('user');
		if($data['user'])
		{
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/addwifi',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}	
		else
		{
			redirect('home/addwifi'); 
		}
	}

	public function addextension()
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
			$this->load->view('layouts/addextension',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}	
		else
		{
			redirect('home/addextension'); 
		}
	}

}
