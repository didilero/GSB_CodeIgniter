<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Monmodel extends CI_Model{
	function getContacts(){
		$query = $this->db->get('contact');
		return $query->result();
	}
	function insertContact($nom,$prenom,$email,$commentaire){
		$prep = array(
				'nom'=>$nom,
				'prenom'=>$prenom,
				'email'=>$email,
				'commentaire'=>$commentaire
		);
		$query = $this->db->insert('contact',$prep);
	}
	function getNbContact(){
		return $this->db->count_all_results('contact');
	}
}