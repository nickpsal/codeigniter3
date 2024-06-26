<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//if i dont want to load the form_validation from config/autoload.php
		//$this->load->library('form_validation');
		$this->load->model('News');
	}

	private function loadView($view, $data = []): void
	{
		$this->load->view('includes/header', $data);
		$this->load->view($view, $data);
		$this->load->view('includes/footer');
	}

	public function getAll(): void
	{
		$data['pageTitle'] = "News Table List";
		$data['Data'] = $this->News->getAllNews();
		$this->loadView('home', $data);
	}

	public function getOptions()
	{
		$selectedOption = $this->input->post('selectedValue1');
		$options = [];
		switch ($selectedOption) {
			case "option1":
				$options = [
					['id' => 'option1a', 'name' => 'Option 1a'],
					['id' => 'option1b', 'name' => 'Option 1b']
				];
				break;
			case "option2":
				$options = [
					['id' => 'option2a', 'name' => 'Option 2a'],
					['id' => 'option2b', 'name' => 'Option 2b']
				];
				break;
			case "option3":
				$options = [
					['id' => 'option3a', 'name' => 'Option 3a'],
					['id' => 'option3b', 'name' => 'Option 3b']
				];
				break;
		}
		echo json_encode($options);
	}

	public function insert(): void
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('Title', 'Title', 'required|max_length[100]');
			$this->form_validation->set_rules('Text', 'Text', 'required');
			if (!$this->form_validation->run()) {
				// Validation failed, re-display the form with errors
				$data['pageTitle'] = 'Add new News';
				$this->loadView('insert', $data);
			} else {
				$data['Title'] = $this->input->post('Title');
				$data['Text'] = $this->input->post('Text');
				$data['Date'] = date('Y/m/d');
				$this->News->insertNews($data);
				redirect("home/getAll", 'refresh');
			}
		} else {
			$data['pageTitle'] = 'Add new News';
			$this->loadView('insert', $data);
		}
	}

	public function update($id = null): void
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$Id = $this->input->post('Id');
			$data['Title'] = $this->input->post('Title');
			$data['Text'] = $this->input->post('Text');
			$this->News->updateNews($Id, $data);
			redirect("home/getAll", 'refresh');
		} else {
			if (!is_null($id)) {
				$data['data'] = $this->News->getNewbyID($id);
				$data['pageTitle'] = 'Update News';
				$this->loadView('update', $data);
			} else {
				redirect("home/getAll", 'refresh');
			}
		}
	}

	public function delete($id = null): void
	{
		if (!is_null($id)) {
			$this->News->deleteNews($id);
		}
		redirect("home/getAll", "refresh");
	}
}
