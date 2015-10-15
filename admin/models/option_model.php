<?php

class Option_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	function update($name, $value)
	{
		$option = array($value, $name);

		$sql    = "UPDATE fm_options SET option_value = ? WHERE option_name = ?";
		$query  = $this->db->query($sql, $option);
		return $query;
	}

	function success()
	{
		$sql = "SELECT * FROM fm_options WHERE option_name = 'success'";

		$query = $this->db->query($sql);

		if ( $query->num_rows() ) 
		{
			$data = $query->row_array();
			return $data['option_value'];
		}

		return FALSE;
	}

	function warning()
	{
		$sql = "SELECT * FROM fm_options WHERE option_name = 'warning'";

		$query = $this->db->query($sql);

		if ( $query->num_rows() ) 
		{
			$data = $query->row_array();
			return $data['option_value'];
		}

		return FALSE;
	}
}

/* End of file option_model.php */
/* Location: ./application/models/option_model.php */