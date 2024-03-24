<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Users extends CI_Model{
        public function insertUser($userData) {
            $this->db->insert('Users', $userData);
        }
    }