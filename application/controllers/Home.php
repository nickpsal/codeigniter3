<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			//if i dont want to load the form_validation from config/autoload.php
			//$this->load->library('form_validation');
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
			$this->loadView('home', 'News Table List', $data);
		}

		public function insert() {
			if ($this->input->server('REQUEST_METHOD') === 'POST') {
				$this->form_validation->set_rules('Title', 'Title', 'required|max_length[100]');
				$this->form_validation->set_rules('Text', 'Text', 'required');
				if ($this->form_validation->run() == FALSE) {
					// Validation failed, re-display the form with errors
					$this->loadView('insert', 'Add new News');
				}else {
					$data['Title'] = $this->input->post('Title');
					$data['Text'] = $this->input->post('Text');
					$data['Date'] = date('Y-m-d');
					$this->News->insertNews($data);
					redirect("home", 'refresh');
				}	
			}else {
				$this->loadView('insert', 'Add new News');				
			}
		}

		public function update($id = null) {
			if ($this->input->server('REQUEST_METHOD') === 'POST') {
				$data['Title'] = $this->input->post('Title');
				$data['Text'] = $this->input->post('Text');
				$this->News->updateNews($_GET['Id'], $data);
				redirect("home", 'refresh');
			}else {
				$id = $this->uri->segment(3);
				$data = $this->News->getNewbyID($id);
				if (!empty($data)) {
					$this->loadView('update', 'Update News', $data);	
				}else {
					redirect('home', 'refresh');
				}
			}
		}

		public function delete($id = null) {
			if ($this->uri->segment(3) != null) {
				$this->News->deleteNews($id);
			}
			redirect("home", "refresh");
		}

		private function loadView($view, $pageTitle, $data=[]) {
			$data['pageTitle'] = $pageTitle;
			$this->load->view('includes/header', $data);
			$this->load->view($view, $data);
			$this->load->view('includes/footer');
		}
	}
