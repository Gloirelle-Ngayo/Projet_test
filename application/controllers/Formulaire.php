<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulaire extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Formulaire_model');
    }

    public function index(){ // chargement de la vue du formulaire
        $this->load->view('formulaire');
    }

    public function validation(){ // insertion des données dans la BDD à partir d'une méthode du model
        $this->form_validation->set_rules('nom','nom','trim|required|min_length[3]|alpha');
        $this->form_validation->set_rules('prenom','prenom','trim|required|alpha');
        $this->form_validation->set_rules('age','age','trim|required|integer|is_natural_no_zero');

        if ($this->form_validation->run()) {
            $ori_filename = $_FILES['image']['name'];// obtention du chemin de l'image
            $new_name = time()."".str_replace(' ','-',$ori_filename);
            $config = [ //configuration des informations pour le telechargement de l'image
                'upload_path' => './images/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload', $config); //chargement de la librairie upload qui permet le telechargement
            if (! $this->upload->do_upload('image')) //cas ou le telechargement de l'image n'a pas aboutit
            {
                $imageError  =  array('image'=>$this->upload->display_errors());
            } else {
                # code...
                $prod_filename = $this->upload->data('file_name');
                $data = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'age' => $this->input->post('age'),
                    'image' => $prod_filename,
                );
                $this->Formulaire_model->insert_data($data);
                redirect('index.php/Formulaire/recuperer');
            }
            

        }else{
            $this->index();
        }

        redirect('index.php/Formulaire/recuperer');
    }

    public function recuperer(){ // reccuperation des données de la BDD à partir d'une métohde du model et affiche des données dans une vue
         $data['affiche'] = $this->Formulaire_model->get_data();
         $this->load->view('liste',$data);
    }

    public function delete($id){ // appel de la methode de suppresion d'une ligne dans la BDD et redirection  au niveau de la page d'affichage
        $this->Formulaire_model->suppresion($id);
        redirect('index.php/Formulaire/recuperer');
    }

    public function modif($id){ // reafichage et page intermédiare pour la mise à jour
        $data['aff'] = $this->Formulaire_model->recu_ligne_modif($id);
        $this->load->view('modif',$data);
    }

    public function updateUsers($id){// methode de gestion de la validation et la mise à jour
       
        $this->form_validation->set_rules('nom','nom','trim|required|min_length[3]|alpha');
        $this->form_validation->set_rules('prenom','prenom','trim|required|alpha');
        $this->form_validation->set_rules('age','age','trim|required|integer|is_natural_no_zero');

        if ($this->form_validation->run()) {

            $ori_filename = $_FILES['image']['name'];// obtention du chemin de l'image
            $new_name = time()."".str_replace(' ','-',$ori_filename);
            $config = [ //configuration des informations pour le telechargement de l'image
                'upload_path' => './images/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload', $config); //chargement de la librairie upload qui permet le telechargement
            if (! $this->upload->do_upload('image')) //cas ou le telechargement de l'image n'a pas aboutit
            {
                # code...
                $imageError  =  array('image'=>$this->upload->display_errors());
            } else {
                # code...
                $prod_filename = $this->upload->data('file_name');
                $data = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'age' => $this->input->post('age'),
                    'image' => $prod_filename,
                );
                $this->Formulaire_model->update($id,$data);
                redirect('index.php/Formulaire/recuperer');
            }
            

        }else{
            $this->index();
        }

        redirect('index.php/Formulaire/recuperer');
    }
    public function view($id){ 
        $data['aff'] = $this->Formulaire_model->recu_ligne_modif($id);
        $this->load->view('liste_user',$data);
    }
}