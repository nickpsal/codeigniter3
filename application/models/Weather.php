<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Weather extends CI_Model{
        public function getAllData() {
            return $this->db->get("restfull")->result_array();
        }

        public function insertData($data) {
            $query['Date'] = $data['Date'];
            $exists = $this->db->get_where('restfull', $query)->result_array();
            if (empty($exists)) {
                $this->db->insert('restfull', $data);
            }
        }
    }