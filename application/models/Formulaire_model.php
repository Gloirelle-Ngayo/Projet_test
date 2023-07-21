<?php
    class Formulaire_model extends CI_Model{

        public function insert_data($info){ // fonction d'insertion des donnes dans la base de données
            $this->db->insert('users', $info);
            // $this->db->insert('nom_table', $données);
        }

        public function get_data(){ // fonction de reccupération des données dans la base de donéées
            //$query = $this->db->get('table_name');
             $query = $this->db->get('users');
             return $query->result();
        }

        public function suppresion($id){ // suppression d'une ligne dans la base des données
            $this->db->delete('users', array('id' => $id));
        }

        public function recu_ligne_modif($id){ // recuperation d'une ligne dans la table users dans la BDD
        $query = $this->db->get_where('users', array('id' => $id));
            return $query->row_array();
        }

        public function update($id,$data){
            $this->db->update('users', $data, array('id' => $id));
        }
    }
    

    
?>