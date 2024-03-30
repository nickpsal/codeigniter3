<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class News extends CI_Model{
        public function insertUser($data) {
            $this->db->insert('news', $data);
        }

        public function getAll() {
            return $this->db->get("news")->result_array();
        }
    }