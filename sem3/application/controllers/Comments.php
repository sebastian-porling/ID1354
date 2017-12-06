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
        redirect('recipe/' . $data['site']);
    }
    
    public function delete($id, $site){
        $this->comment_model->deleteComment($id);
        
        redirect('recipe/' . $site);
    }
}

?>