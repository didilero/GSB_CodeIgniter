<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->library('session');
		
		// TRUE permet de passer les variables au filtre XSS
		// (cross-site scripting : injection de contenu dans une page web)
		if ($this->input->post('identifiant', TRUE)
			 && $this->input->post('password', TRUE)) 
		{
			$id = $this->input->post('identifiant');
			$pass = $this->input->post('password');
			if ($this->user_model->validate($id, $pass))
			{
				// Tout est ok, on enregistre l'identifiant dans les 
				// variables de session et on poursuit
				$this->session->set_userdata('user', $id);
			}
			else 
			{
				// Mauvais identifiant et pas de session déjà enregistrée, 
				// on redirige vers la page de connexion
				// (par le contrôleur Connexion_c !!)
				if(!$this->session->userdata('user'))
					redirect("c_connexion/connexion");
			}
		}
		else
		{
			// Pas d'identifiant ou de mot de passe et pas de session
			if(!$this->session->userdata('user'))
				redirect("c_connexion/connexion");
		}
	}
	// Permet de définir un affichage identique sur toutes les pages sécurisées
	function generer_affichage($data)
	{
		$this->load->view('v_entete');
		$this->load->view('admin/v_barre_menu');
		$this->load->view($data['content'], $data);
	}
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */