<?php
    class Send_model extends CI_Model{
       
        public function insert_data($info){ //insertion des donnees dans la BDD
            $this->db->insert('mail_users',$info);
       }
       
       public function get_data(){ //recuperation des donnees dans la BDD
        $query = $this->db->get('mail_users');
        return $query->result_array();
        
    }

    }
?>