<?php
class Login_model extends CI_Model{

    public $token; 
    public $username;

    public function __construct(){
        parent::__construct();
        $this->token = '0';
        $this->load->database();
    }
    
    public function validate(){
        $username = $this->input->post('name');
        $password = $this->input->post('password');
        
        $sql= "SELECT * FROM users WHERE name = ?";
        $query = $this->db->query($sql, array($username));
        
        $row = $query->row();
        if(isset($row)){
            if(password_verify($password, $row->password)){
                $this->username = $username;
                $this->setToken($row->id);
                return true;
            }
            return false;
        }
    }

    function setToken($userId){
       $this->token = bin2hex(random_bytes(8));
       $data = array(
           'access_token' => $this->token,
           'user_id' => $userId,
        );

        $this->db->insert('oauth_access_tokens', $data); 
    }

    public function checkToken($token){
        $sql = "SELECT * FROM oauth_access_tokens WHERE access_token = ?";
        $query = $this->db->query($sql, array($token));
        $row = $query->row();
            return true;
        return false;
    }
}
