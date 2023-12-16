<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
class Send extends CI_Controller{
    
   /* public function __construct(){
        parent::__construct();
        $this->load->model('Send_model'); //chargement du model Send
    }*/

    public function index(){ 
        $tab['send'] = "";
        $this->load->view('send_mailApp', $tab); // insertion de la vue qui gère l'affichage de l'interface de l'envoi
    }
    public function listUser(){
        $this->load->view('listUser');
    }
    public function login_user(){
        $this->load->view('login_list');
    }
    public function validation(){ // insertion des données dans la BDD à partir d'une méthode du model
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emailexp','emailexp','required');
        $this->form_validation->set_rules('textobjet','textobjet','required');
        $this->form_validation->set_rules('contenu','contenu','required');
        

        if ($this->form_validation->run()) {

            $tab = array(
                'AddExp' => $this->input->post('emailexp'),
                'Objet' => $this->input->post('textobjet'),
                'Contenu' => $this->input->post('contenu'),
            );

            
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
            $mail->Username = 'gloirengayo4@gmail.com';   //email
            $mail->Password = 'xlyfyquaxnrpdntt';   //16 character obtained from app password created
            $mail->Port = 465;                    //SMTP port
            $mail->SMTPSecure = "ssl";
            
            
            //sender information
            $mail->setFrom('gloirengayo4@gmail.com', 'Gloirelle');
            
            //receiver address and name
            $mail->addAddress($tab['AddExp']);
            $mail->isHTML(true);
            
            $mail->Subject = $tab['Objet'];
            $mail->Body = $tab['Contenu'];
            // Send mail   
            try {
                $mail->send();
                $tab['send'] = "Le message a bien été envoyé";
                $this->load->view("send_mailApp", $tab);
            } catch (Exception $e) {
               echo 'Le message n\'a pas été envoyé : '. $e->getMessage();
               redirect('index.php/Send');
            }
            
            $mail->smtpClose();
           
          /*  $this->Send_model->insert_data($tab);
            redirect('index.php/Send/recuperer');
        require 'C:/xampp/htdocs/www/CodeIgniter/application/controllers/send_mail.php';*/
        }
                else{
                redirect('index.php/Send');
            }  
        
    }
}