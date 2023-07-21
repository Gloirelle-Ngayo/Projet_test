<?php

class Welcome_model extends CI_Model{
    private $nom = "prestone";
    
    public function get_identite(){
        return $this->nom;
    }
}

?>