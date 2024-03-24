<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('home');
		$this->load->view('includes/footer');
	}

	public function register()
	{
		$this->load->view('includes/header');
		$this->load->view('register');
		$this->load->view('includes/footer');
	}

	public function validateLogin() {
		if ($this->input->post('submit')) {
			$data['u_name'] = $this->input->post('u_name');
			$data['u_password'] = $this->input->post('u_password');
			print_r($data);
		}else {
			redirect("home", "refresh");
		}
	}

	public function validateRegister() {
		if ($this->input->post('submit')) {
			if ($this->input->post('u_password') == $this->input->post('verify_u_password')) { 
				$data['u_name'] = $this->input->post('u_name');
				print_r($data);
			}else {
				redirect('home/register', 'refresh');
			}
		}else {
			redirect("home", "refresh");
		}
	}
}
