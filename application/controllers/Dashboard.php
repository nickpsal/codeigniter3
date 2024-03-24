<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {
        public function index()
		{
			if (isset($_SESSION['u_name'])) {
                $this->load->view('dashboard/includes/header');
                $this->load->view('dashboard/includes/nav');
                $this->load->view('dashboard/home');
                $this->load->view('dashboard/includes/footer');
            }else {
                redirect('home', 'refresh');
            }
		}
    }