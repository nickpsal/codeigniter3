<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {
        public function index()
		{
			if (isset($_SESSION['u_name'])) {
                $this->load->view('includes/header');
                $this->load->view('dashboard/home');
                $this->load->view('includes/footer');
            }else {
                redirect('home', 'refresh');
            }
		}
    }