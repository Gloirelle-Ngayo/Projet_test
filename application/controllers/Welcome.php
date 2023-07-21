<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('Welcome_model');
	}

	public function index()
	{	
		$this->load->model('Welcome_model');
		$data['prenom'] = $this->Welcome_model->get_identite();
		$this->load->view('welcome_message', $data);
		
	}
}
