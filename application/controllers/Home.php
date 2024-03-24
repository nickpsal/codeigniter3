<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->model('Users');
		}

		public function index()
		{
			if (!isset($_SESSION['u_name'])) {
				$this->load->view('includes/header');
				$this->load->view('home');
				$this->load->view('includes/footer');
			}else {
				redirect('dashboard', 'refresh');
			}
		}

		public function logout() {
			if (isset($_SESSION['u_name'])) {
                session_unset();
				session_destroy();
                redirect('home', 'refresh');
            }else {
                redirect('home', 'refresh');
            }
		}

		public function register()
		{
			$this->load->view('includes/header');
			$this->load->view('register');
			$this->load->view('includes/footer');
		}

		public function validateLogin() {
			if ($this->input->post('submit')) {
				$userData['u_name'] = $this->input->post('u_name');
				$allUsers = $this->db->get_where("Users", $userData)->row();
				$userData['u_password'] = $this->input->post('u_password');
				if ($allUsers && password_verify($userData['u_password'], $allUsers->u_password)) {
					$_SESSION['u_name'] = $userData['u_name'];
					redirect('dashboard', 'refresh');
				}else{
					echo "<script>alert('Wrong Username or Password');</script>";
					redirect("home", "refresh");
				}
			}else {
				redirect("home", "refresh");
			}
		}

		public function validateRegister() {
			if ($this->input->post('submit')) {
				$userData['u_email'] = $this->input->post('u_email');
				$userData['u_name'] = $this->input->post('u_name');
				$allUsers = $this->db->get_where("Users", $userData)->row();
				if (!$allUsers) {
					if ($this->input->post('u_password') == $this->input->post('verify_u_password')) { 
						$userData['u_fullname'] = $this->input->post('u_fullname');
						$userData['u_password'] = password_hash($this->input->post('u_password'), PASSWORD_DEFAULT);
						$this->Users->insertUser($userData);
						redirect("home", "refresh");
					}else {
						echo "<script>alert('Password and Confirm Password dont Match');</script>";
						redirect('home/register', 'refresh');
					}
				}else {
					echo "<script>alert('User Already exists Please Login');</script>";
					redirect("home", "refresh");
				}
			}else {
				redirect("home", "refresh");
			}
		}
	}
