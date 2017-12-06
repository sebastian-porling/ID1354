<?php

class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    public function login(){
            // Get username
            $username = htmlentities($this->input->post('username', TRUE));
            // Get and encrypt the password
            $password = htmlentities($this->input->post('password', TRUE));
            $site = $this->input->post('site');
            $password = md5($password);
            // Login user
            $user_id = $this->user_model->login($username, $password);
            if($user_id){
                // Create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
					'logged_in' => true
                );
                $this->session->set_userdata($user_data);
                // Set message  
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                redirect($site, 'refresh');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect($site);
            }		
        
    }
    public function register(){
        
        $site = $this->input->post('site');
        
        if($this->check_username_exists($this->input->post('username')) === FALSE){
            $this->session->set_flashdata('registered_failed', 'That username already exists.');
            redirect($site);
        }else{
            // Encrypt password
            $password = $this->input->post('password', TRUE);
            $enc_password = md5($password);
            $this->user_model->register($enc_password);
            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can    log in');
            redirect($site);
        }
        
    }
    
    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $site = $this->input->post('site');
        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');
        redirect($site);
    }
    
    // Check if username exists
	private function check_username_exists($username){
        if($this->user_model->check_username_exists($username)){
            return true;
        } else {
            return false;
        }
    }
}

?>