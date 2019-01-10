<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
class User_model extends CI_Model
{
	private $table = "user";
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function validate($login, $password)
	{
		$passwd_crypt = $this->_getUser($login);
		
		// Si le résultat est différent de false ou s'il n'est pas de même type
		if ($passwd_crypt !== false)
			return (bool) ($password == $passwd_crypt);
		return false;
	}
	
	private function _getUser($login)
	{
		$user = $this->db->select(array('login', 'mdp'))->get_where($this->table, array('login' => $login))->row();
		if (isset($user->mdp))
			return $user->mdp;
		return false;
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */