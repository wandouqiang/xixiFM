<?php

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	/* 验证 username 是否存在 */
	function have_username($username)
	{
		$sql   = "SELECT user_id FROM fm_users WHERE user_login = ?"; 
		$query = $this->db->query($sql, $username);

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}

	/* 用户登录 */
	function user_sign_in()
	{
		$password = md5( 'DFKIEJSKDLIESJCSJDEOAKS' . $this->input->post('password') );
		
		$sql   = "SELECT user_id FROM fm_users WHERE user_login = ? AND user_pass = ? AND user_group = 8";
		
		$query = $this->db->query($sql, array($this->input->post('username'), $password));

		if( $query->num_rows() )
		{
			return $query->row_array();
		}

		return FALSE; 
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */