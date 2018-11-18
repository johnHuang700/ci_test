<?php
class Weather_api extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $token = $this->input->post('token');
         
        if(!isset($token)||is_null($token)){
            echo '{"success":"false"}';
        }else if(false){
            echo '{"success":"false"}';
        }else{
            $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=rdec-key-123-45678-011121314";
            $weather_data = file_get_contents($url);
            echo $weather_data;
        }
    }
}
