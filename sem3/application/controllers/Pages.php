<?php

class Pages extends CI_Controller{
    public function view($page = 'index'){
        // If file doesn't exist show 404 page.
        if(!file_exists(APPPATH.'views/pages/' . $page . '.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);
        
        //Generate page
        // Load header, nav
        $this->load->view('fragments/header');
        $this->load->view('fragments/nav');
        
        //If index load calendar.
        if($page == 'index'){
                $data['calendar'] = $this->mycalendar_model->loadCalendar();
        }
        // Load page
        $this->load->view('pages/' . $page, $data);
        
        // If index or recipes load browse data view.
        if($page == 'index' OR $page == 'recipes'){
            
            $data['recipes'] = $this->recipe_model->getRecipes();
            $this->load->view('fragments/browse_recipe', $data);
        }
        
        // Load footer
        $this->load->view('fragments/footer');
    }
}

?>