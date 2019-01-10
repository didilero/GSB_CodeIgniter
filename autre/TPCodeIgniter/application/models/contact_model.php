<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
    
class Contact_model extends CI_Model
{
	private $table = "contact";
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_les_contacts()
	{
		$this->db->order_by('Numero', 'asc');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	function get_un_contact($id)
	{
		$query = $this->db->get_where($this->table, array('Numero' => $id));
		return $query->row();
	}
	
	function insert_contact($nom, $prenom, $email, $commentaire)
	{
		$contact = array('Nom'=>$nom, 'Prenom'=>$prenom, 'Email'=>$email, 'Commentaire'=>$commentaire);
		$this->db->insert($this->table, $contact);
	}
	
	function modifier_contact($id, $contact)
	{
		$c = array('Nom'=>$contact['nom'], 'prenom'=>$contact['prenom'], 'email'=>$contact['email'], 'commentaire'=>$contact['commentaire']);
		$this->db->where('Numero', $id);
		$this->db->update($this->table, $c);
	}
	
	function supprimer_contact($id)
	{
		$this->db->delete($this->table, array('Numero' => $id)); 
	}
}

/* End of file contacts_model.php */
/* Location: ./application/models/contacts_model.php */ 