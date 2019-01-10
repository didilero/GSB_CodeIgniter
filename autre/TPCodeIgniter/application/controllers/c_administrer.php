<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_administrer extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
	}

	function index()
	{
		$data['content'] = 'admin/index';
		$this->generer_affichage($data);
	}
	
	function afficher()
	{
		$data['content'] = 'admin/v_affiche_contacts';
		$data['listeContacts'] = $this->contact_model->get_les_contacts();
		$this->generer_affichage($data);
	}
	
	function voir($id)
	{
		$data['content'] = 'admin/v_detail_contact';
		$data['contact'] = $this->contact_model->get_un_contact($id);
		$this->generer_affichage($data);
	}
	
	function modifier($id)
	{
		$this->contact_model->modifier_contact($id, $this->input->post());
		$data['content'] = 'admin/v_detail_contact';
		$data['message'] = 'Le contact a été mis à jour.';
		$data['contact'] = $this->contact_model->get_un_contact($id);
		$this->generer_affichage($data);
	}
	
	function supprimer($id)
	{
		$data['content'] = 'admin/v_suppression_contact';
		$data['contact'] = $this->contact_model->get_un_contact($id);
		$this->generer_affichage($data);
	}
	
	function validation_supprimer($id)
	{
		$this->contact_model->supprimer_contact($id);
		$data['content'] = 'admin/v_affiche_contacts';
		$data['listeContacts'] = $this->contact_model->get_les_contacts();
		$this->generer_affichage($data);
	}
}
/* End of file administrer_c.php */
/* Location: ./application/controllers/administrer_c.php */
