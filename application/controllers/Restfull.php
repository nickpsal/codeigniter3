<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restfull extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Users');
		}

        public function index() {
            $this->getAllUsers();
        }

        //http://localhost/codeigniter3/restfull/getAllUsers
        public function getAllUsers() {
            $allUsers = $this->db->get("Users");
            // Send JSON response
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($allUsers->result()));
        }

        //http://localhost/codeigniter3/restfull/getUser/id
        public function getUser($id = null) {
            $userData['id'] = $id;
            $user = $this->db->get_where("Users", $userData)->row();
            // Send JSON response
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($user));
        }
        
        //http://localhost/codeigniter3/restfull/adduser
        public function addUser() {
            $userData['u_email'] = $this->input->post('u_email');
            $userData['u_name'] = $this->input->post('u_name');
            $allUsers = $this->db->get_where("Users", $userData)->row();
            if (!$allUsers) {
                $userData['u_fullname'] = $this->input->post('u_fullname');
                $userData['u_password'] = password_hash($this->input->post('u_password'), PASSWORD_DEFAULT);
                $this->Users->insertUser($userData);
                $response = array(
                    'status' => 'success',
                    'message' => 'Data saved successfully',
                    'name' => $name,
                    'email' => $email
                );
            }else {
                $response = array(
                    'status' => 'success',
                    'message' => 'User already Exists',
                    'name' => $userData['u_name'],
                    'email' => userData['u_email']
                );
            }
            // Send JSON response
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }
    