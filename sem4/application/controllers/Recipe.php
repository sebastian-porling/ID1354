<?php

class Recipe extends CI_Controller{
    public function __construct(){
        parent::__construct();
        // Load the models
        $this->load->model('recipe_model');
        $this->load->model('comment_model');
        
    }
    public function view($recipe = null){
        // Set title of the page
        $data['title'] = ucfirst($recipe);
        
        // Get the comments and recipe XML
        $data['comments'] = $this->comment_model->getComments($recipe);
        $data['recipe'] = $this->recipe_model->getRecipe($recipe);
        
        // If recipe does not exist, show 404
        if($data['recipe'] === null){
            show_404();
        }
        
        // Load the view
        $this->load->view('fragments/header');
        $this->load->view('fragments/nav');
        $this->load->view('pages/recipe' ,$data);
        $this->load->view('fragments/comment_sec' ,$data);
        $this->load->view('fragments/footer');
    }
    
}

?>