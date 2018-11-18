<?php

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $data['curl'] = $this->input->get('callbackurl');
        $this->load->view('login_view',$data);
    }

    public function verify(){
        $this->load->model('login_model');
        
        if($this->login_model->validate()){
            $url = $this->input->post('callback');
            redirect($url.
                '?username='.$this->login_model->username.
                '&token='.$this->login_model->token
            );
            var_dump($this->login_model->token);
        }else{
            redirect('http://13.230.131.102/client');
        }
    }
}
