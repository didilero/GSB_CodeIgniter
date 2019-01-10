<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class C_connexion extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function connexion()
	{
		$data['content'] = "admin/v_connexion";
		$this->load->view('template', $data);
	}
	
	function deconnexion()
	{
		$this->session->unset_userdata('user');
		$data['content'] = "admin/v_connexion";
		$this->load->view('template', $data);
	}
	
	function accueil()
	{
		$this->session->unset_userdata('user');
		$data['content'] = "v_index";
		$this->load->view('template', $data);
	}
}
/* End of file connexion_c.php */
/* Location: ./application/controllers/connexion_c.php */
