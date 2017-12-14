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
        $arr = array(
            'username' => $user,
            'comment' => $comment,
            'time' => date("Y-m-d"),
            'recipe' => $site
        );
        $this->db->insert('comments', $arr);
        $last_inserted = $this->db->insert_id();
        $this->db->cache_off();
        return $last_inserted;
                                  
    }
    
    public function deleteComment($id){
        $commentId = $id;
        $user = $this->session->userdata('username');
        $query = $this->db->query("DELETE FROM comments WHERE id='$commentId' AND username='$user'");
        return true;
    }
    
    public function longpolling($rows, $recipe){
        // Start longpolling
        set_time_limit(0);
        while(true){
            // Get comments
            $query = $this->getComments($recipe);
            // if the current number of comments is not the
            // Same as the new query return the new number.
            if(count($query) != $rows){
                $rows = count($query);
                return $rows;
            }
            // close session so the client can do other calls
            session_write_close();
            sleep(1);
        }
    }
    
    
}

?>