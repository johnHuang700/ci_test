<?php
class Client extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index(){
        $data = array();
        if($this->session->userdata('username') == null){
            $data['login'] = '<a href="http://13.230.131.102/host/login?callbackurl=13.230.131.102/client/oauthcallback">login</a>';
        }else{
            $data['login'] = '<a href="/client/logout">logout</a>';
        }
        $this->load->view('client_view',$data);
    }

    public function oauthcallback(){
        $data = array(
            'username' => $this->input->get('username'),
            'token' => $this->input->get('token')
        );
        $this->session->set_userdata($data);
        redirect(prep_url(base_url('client')));
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(prep_url(base_url('client')));
    }

    public function weather(){
        $token = $this->session->userdata('token');
        $url = 'http://13.230.131.102/host/weather_api';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'token='.$token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($output,true);
        if($data['success']!=='true'){
            echo $output;
        }else{
            $this->load->view('weather_view',$data['records']['location'][1]);
        }
    }
}    
