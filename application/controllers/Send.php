<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Send_model'); //chargement du model Send
    }

    public function index(){ 
        $this->load->view('send_mailApp'); // insertion de la vue qui gère l'affichage de l'interface de l'envoi
    }
    public function validation(){ // insertion des données dans la BDD à partir d'une méthode du model
        $this->form_validation->set_rules('emailExp','emailExp','trim|required|valid-email|is-unique[users.email]');
        $this->form_validation->set_rules('emailDest','emailDest','trim|required|valid-email|is-unique[users.email]');
        $this->form_validation->set_rules('textObjet','textObjet','trim|required');
        $this->form_validation->set_rules('Contenu','Contenu','trim|required');

        if ($this->form_validation->run()) {

            $tab = array(
                'AddExp' => $this->input->post('emailExp'),
                'AddDest' => $this->input->post('emailDest'),
                'Objet' => $this->input->post('textObjet'),
                'Contenu' => $this->input->post('Contenu'),
            );
           $this->Send_model->insert_data($tab);
            redirect('index.php/Send/recuperer');

            echo (sendEmail());
            
            require 'C:/xampp/htdocs/www/CodeIgniter/application/controllers/index.php/send_mail.php';

            }
                else{
                redirect('index.php/Send');
            }
    }
    public function recuperer(){ // reccuperation des données de la BDD à partir d'une métohde du model et affiche des données dans une vu
        $tab['affiche1'] = $this->Send_model->get_data('AddExp');
        $tab['affiche2'] = $this->Send_model->get_data('AddDest');
        $tab['affiche3'] = $this->Send_model->get_data('Objet');
        $tab['affiche4'] = $this->Send_model->get_data('Contenu');
         
    }
}