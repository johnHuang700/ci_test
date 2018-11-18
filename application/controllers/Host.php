<?php
class Host extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index(){
    }

    public function weather_api(){
        $token = $this->input->post('token');
        if(!isset($token)||is_null($token)||$token==''){
            echo '{"success":"false"}';
        }else if(!$this->login_model->checkToken($token)){
            echo '{"success":"false","status":"token wrong"}';
        }else{
            $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=rdec-key-123-45678-011121314";
            $weather_data = file_get_contents($url);
            echo $weather_data;
        }
    }
}
