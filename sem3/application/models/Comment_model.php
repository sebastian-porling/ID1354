<?php

class Comment_model extends CI_Model{
    
    
    public function __constructor(){
        $this->load->database();
    }
    
    public function getComments($recipe){
        
        $query = $this->db->get_where('comments', array('recipe' => $recipe));
        
        return $query->result_array();
        
    }
    
    public function addComment($data){
        $this->db->cache_on();
        $user = $this->session->userdata('username');
        $comment = $data['comment'];
        $site = $data['site'];
        $query = $this->db->query("INSERT INTO comments (username, comment, time, recipe) VALUES ('$user', '$comment', CURDATE(), '$site')");
        $this->db->cache_off();
        return $query;
                                  
    }
    
    public function deleteComment($id){
        $commentId = $id;
        $user = $this->session->userdata('username');
        $query = $this->db->query("DELETE FROM comments WHERE id='$commentId' AND username='$user'");
        return true;
    }
    
    
    
}

?>