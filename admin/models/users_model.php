<?php

class Users_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	function users( $info )
	{
		$sql   = "SELECT * FROM fm_users ORDER BY user_registered DESC LIMIT ?, ?"; 
		$query = $this->db->query($sql, $info);

		return $query->result_array();
	}

	function remove($user)
	{
		$sql   = "DELETE FROM fm_users WHERE user_id = ?";
		$query = $this->db->query($sql, $user);

		return $query;
	}

	function counts()
	{
		$sql   = "SELECT * FROM fm_users"; 
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

	function have_user( $user )
	{
		$sql   = "SELECT * FROM fm_users WHERE user_id = ?"; 
		$query = $this->db->query($sql, $user);

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}
}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */