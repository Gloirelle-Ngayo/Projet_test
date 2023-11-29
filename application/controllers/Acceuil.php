<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceuil extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
   
    public function index(){
    /*  $data['titles'] = "Acceuil";
     $data['nom']  = "NGAYO";
     $data['prenom']  = "Prestone"; */

     $data  = array(
         'titles' => 'Acceuil',
         'nom' => 'NGAYO',
         'prenom' => 'Prestone',
     );
     $this->load->view('template/header',$data);
     $this->load->view('acceuil',$data);
     $this->load->view('template/footer');
    }

    public function welcome(){
        $data['titles'] = "Welcome";
        $this->load->view('template/header',$data);
        $this->load->view('welcome_message');
        $this->load->view('template/footer');
    }
    
    
}

?>