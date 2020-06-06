<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wifi extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('home/index');
		}
		$this->load->model('wifi_model');
    }

	
	public function addwifi()
	{
		$this->form_validation->set_rules('name','Name','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');	

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('home/addwifi');
		}
		else
		{
			$this->load->library('encrypt');
			$name      	    = $this->input->post('name');
			$password    	= $this->encrypt->encode($this->input->post('password'));

			$insertdata    = array( 'name'        => $name,
									'password'    => $password);

			$addwifi = $this->wifi_model->addwifi($insertdata);

			if($addwifi)
			{
				$passwordsuccess = "<p> Wifi Inserted Successfully </p>";
				$this->session->set_flashdata('wifisuccess',$passwordsuccess);
				redirect('home/addwifi');
			}
			else
			{
				$passwordfailed = "<p> Wifi Insertion Failed! </p>";
				$this->session->set_flashdata('wififailed',$passwordfailed);
				redirect('home/addwifi');
			}
		}
	}

	public function Editwifi($id)
	{
		$this->load->library('encrypt');
		$wifidata  = $this->wifi_model->getwifidata($id);
		if($wifidata)
		{
			$data['user'] = $this->session->userdata('user');
			$data['wifi'] = $wifidata;
			$this->load->view('common/header');
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/nav',$data);
			$this->load->view('layouts/topbar');
			$this->load->view('layouts/editwifi',$data);
			$this->load->view('layouts/bottom');
			$this->load->view('common/footer');
		}
	}

	public function Updatewifi($id)
	{
		$this->form_validation->set_rules('name','Name','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');

		if( $this->form_validation->run() == FALSE )
		{
			$data = array("errors" => validation_errors());
			$this->session->set_flashdata($data);
			redirect('Wifi/Editwifi/'.$id);
		}	
		else
		{
			$this->load->library('encrypt');
			$name      	    = $this->input->post('name');
			$password    	= $this->encrypt->encode($this->input->post('password'));

			$updatedata    = array( 'name'        => $name,
									'password'    => $password);
			
			$updatepassword = $this->wifi_model->Updatewifi($updatedata,$id);
			if($updatepassword)
			{
				$passwordsuccess = "<p> Wifi Details Updated Successfully </p>";
				$this->session->set_flashdata('wifisuccess',$passwordsuccess);
				redirect('Wifi/Editwifi/'.$id);
			}
			else
			{
				$passwordfailed = "<p> Wifi Details Updation Failed! </p>";
				$this->session->set_flashdata('wifisuccess',$passwordsuccess);
				redirect('Wifi/Editwifi/'.$id);
			}
		}	
	}

	public function Deletepassword()
	{
		$passwordid     = $this->input->post('deletepassword');
		$deletepassword = $this->wifi_model->deletepassword($passwordid);
		if($deletepassword)
		{
			$passwordsuccess = "<p> Details Deleted Successfully </p>";
			$this->session->set_flashdata('passwordsuccess',$passwordsuccess);
			redirect('home/admin');
		}
		else
		{
			$passwordfailed = "<p> Details Deletion Failed! </p>";
			$this->session->set_flashdata('passwordfailed',$passwordfailed);
			redirect('home/admin');
		}
	}

}
