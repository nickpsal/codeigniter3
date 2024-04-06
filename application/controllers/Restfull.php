<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restfull extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        //if i dont want to load the form_validation from config/autoload.php
        //$this->load->library('form_validation');
        $this->load->model('Weather');
    }

    public function index() {
        $this->getAPIData();
        $this->showData();
    }

    private function loadView($view, $data=[]) {
        $this->load->view('includes/header', $data);
        $this->load->view($view, $data);
        $this->load->view('includes/footer');
    }

    public function showData() {
        $data['pageTitle'] = "RestFull API Data Table";
        $data['data'] = $this->Weather->getAllData();
        $this->loadView('restfull', $data);
    }

    public function getAPIData()
    {
        $lat = '37.983810';
        $lon = '23.727539';
        $apikey = 'b7953aa5c048acff876e1678457a3773';
        $getURL = "http://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apikey}";
        $curl = curl_init($getURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $response = curl_exec($curl);
        if (curl_error($curl)) {
            echo "Error fetching data: " . curl_error($curl);
        }else {
            $data = json_decode($response, true);
        }
        curl_close($curl);
        $queryData['temp'] = $data['main']['temp'];
        $queryData['feels_like'] = $data['main']['feels_like'];
        $queryData['temp_min'] = $data['main']['temp_min'];
        $queryData['temp_max'] = $data['main']['temp_max'];
        $queryData['humidity'] = $data['main']['humidity'];
        $queryData['Date'] = date('Y/m/d');
        $this->Weather->insertData($queryData);
        return $data;
    }
}
