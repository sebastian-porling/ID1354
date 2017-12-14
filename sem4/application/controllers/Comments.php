<?php

class Comments extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('comment_model');
    }
    
    public function create(){
        $data = array(
            'comment' => htmlspecialchars($this->input->post('comment', TRUE)),
            'site' => $this->input->post('site')
        );
        $result = $this->comment_model->addComment($data);
        $data['comment_id'] = $result;
        $data['username'] = $this->session->userdata['username'];
        $data['today'] = date("Y-m-d");
        echo json_encode($data);
    }
    
    public function delete($id, $site){
        $this->comment_model->deleteComment($id);
    }
    
    public function show(){
        $site = $this->input->post('site');
        $data['comments'] = $this->comment_model->getComments($site);
        echo json_encode($data);
    }
    
    public function longpolling(){
        // Get the data
        $rows = $this->input->post('rows');
        $site = $this->input->post('site');
        // Start the longpolling
        $result = $this->comment_model->longpolling($rows, $site);
        // return the result
        echo $result;
    }
    
    
}

?>