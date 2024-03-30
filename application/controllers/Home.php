<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->model('News');
		}

		public function index()
		{
			$data['pageTitle'] = "News Table List";
			$data['Data'] = $this->News->getAllNews();
			foreach ($data["Data"] as $row) {
				$date = $row['Date'];
				$date = new DateTime($date);
				$row['Date'] = $date->format("d/m/Y");
			}
			$this->load->view('includes/header', $data);
			$this->load->view('home', $data);
			$this->load->view('includes/footer');
		}

		public function insert() {
			if ($this->input->server('REQUEST_METHOD') === 'GET') {
				$data['pageTitle'] = "Add new News";
				$this->load->view('includes/header', $data);
				$this->load->view('insert', $data);
				$this->load->view('includes/footer');
			}else {

			}
		}

		public function update($id = null) {
			if ($this->uri->segment(3) != null) {
				$data['Title'] = "Demo News Title";
				$data['Text'] = "Demo News Text";
				$this->News->updateNews($id, $data);
			}
			redirect("home", "refresh");
		}

		public function delete($id = null) {
			if ($this->uri->segment(3) != null) {
				$this->News->deleteNews($id);
			}
			redirect("home", "refresh");
		}
	}
