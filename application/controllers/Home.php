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
			$password = $this->input->post('password');
			$userid   = $this->login_model->logincheck($username,$password);

			if($userid)
			{
				$user_data = array("userid" => $userid, "user"=> $username, "loggedin" => true);
				$this->session->set_userdata('user',$user_data);
				redirect('home/admin');
			}
			else
			{
				$loginerror = array("errors" => "<p> Login Failed </p>");
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
		$this->load->view('common/header');
		$this->load->view('admin');
		$this->load->view('common/footer');
	}
}