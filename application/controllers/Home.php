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

		public function update($id) {
			$data['Title'] = "Demo News Title";
			$data['Text'] = "Demo News Text";
			$this->News->updateNews($id, $data);
			redirect("home", "refresh");
		}

		public function delete($id) {
			$this->News->deleteNews($id);
			redirect("home", "refresh");
		}
	}
