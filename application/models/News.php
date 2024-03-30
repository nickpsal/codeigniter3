<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class News extends CI_Model{
        public function getAllNews() {
            return $this->db->get("news")->result_array();
        }

        public function getNewbyID($id) { 
            $query['Id'] = $id;
            return $this->db->get_where("news", $query)->row();
        }

        public function insertNews($data) {
            $this->db->insert('news', $data);
        }

        public function updateNews($id, $data) {
            foreach ($data as $column => $replace) {
                $this->db->set($column, $replace);
            }
            $this->db->where('Id', $id);
            $this->db->update('news');
            return $this->db->affected_rows() > 0;
        }

        public function deleteNews($id) {
            $this->db->where('Id', $id);
            $this->db->delete('news');
        }
    }