<?php
class ClassConnexion extends CI_Model {
	function __construct(){
		$this->load->database();
	}
	function getConnexion(){
		if($this->db->db_connect()){
			return true;
		}else{
			return false;
		}
	}
	function getMedicaments(){
		//on interroge la base
		$sql = "SELECT * FROM medicament";
		$query = $this->db->query($sql);
		return $query->result();
	}
}
?>