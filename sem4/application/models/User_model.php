<?php

class User_model extends CI_Model{
    
    public function __constructor(){
        $this->load->database();
    }
    
    // Login user
    public function login($username, $password){
        
        // Check login
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        // Get result of the query
        $result = $this->db->get('users');
        
        // If the user exist return the id of the user
        // Else return false
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }else{
            return false;
        }
    }
    
    // Register user
    public function register($enc_password){
        // Create data array with credentials
        $data = array(
            'username' => htmlentities($this->input->post('username', TRUE)),
            'password' => $enc_password
        );
        // Insert array into database
        return $this->db->insert('users', $data);
    }
    
    // Check username exists
    public function check_username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }
    
    
    
}

?>