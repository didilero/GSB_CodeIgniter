<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class MonControleur extends CI_Controller{
	private $rep = false;
	
	public function index()
	{
		$this->load->model('monmodel');
		$this->load->view('v_entete');
		$this->load->view('v_index');
	}
	public function voirContact(){
		$this->load->model('monmodel');
		$data['nb'] = $this->monmodel->getNbContact();
		$data['contact'] = $this->monmodel->getContacts();
		$this->load->view('v_entete');
		$this->load->view('v_affContact',$data);
	}
	
	public function vueAjouter(){
		$this->load->model('monmodel');
		$this->load->view('v_entete');
		$data['rep']=$this->rep;
		$this->load->view('v_saiContact',$data);
	}
	public function ajouterContact(){
		$this->rep = false;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Nom','Nom','required');
		$this->form_validation->set_rules('Prenom','Prenom','required');
		$this->form_validation->set_rules('Email','Email','required|valid_email');
		$this->form_validation->set_rules('Commentaire','Commentaire','max_lenght[100]');
		
		if($this->form_validation->run() == True){
			$this->load->model('monmodel');
			$this->monmodel->insertContact($this->input->post('Nom'),$this->input->post('Prenom'),$this->input->post('Email'),
					$this->input->post('Commentaire'));
			$this->rep= true;
		}
		$this->vueAjouter();
	}
}
/* End of file moncontroleur.php */
/* Location ./application/controllers/moncontroleur.php */