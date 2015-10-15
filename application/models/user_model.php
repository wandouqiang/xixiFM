<?php

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	/* 新用户注册 */
	function user_sign_up()
	{
		/* 使用封装查询，则所有的值都会被自动转义。 */
		$code     = random_string('alnum', 32);
		$password = md5( $this->config->item('password_code') . $this->input->post('password') );
		$user  	  = array( $this->input->post('username'),
						   $password,
						   $this->input->post('email'), 
						   0,
						   time(),
						   time(),
						   $code,
						   $this->config->item('user_avatar')[1],
						   $this->config->item('user_image')[1] );
		$sql   = "INSERT INTO fm_users (user_login, user_pass, user_email, user_group, user_registered, user_last_login, user_code, user_avatar, user_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
		$query = $this->db->query($sql, $user);

		return $query;
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

	/* 验证 email 是否存在 */
	function have_email($email)
	{
		$sql   = "SELECT user_id FROM fm_users WHERE user_email = ?"; 
		$query = $this->db->query($sql, $email);

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}

	/* 使用用户名得到用户信息  */
	function return_value_by_name( $username )
	{
		$sql   = "SELECT * FROM fm_users WHERE user_login = ?";
		
		$query = $this->db->query($sql, $username);

		if ($query->num_rows())
		{
		   return $query->row_array(); 
		}

		return FALSE;
	}

	/* 激活邮箱 */
	function active_mail($code, $username)
	{
		$sql   = "SELECT user_id FROM fm_users WHERE user_login = ? AND user_code = ?"; 
		$query = $this->db->query($sql, array($username, $code));

		if( $query->num_rows() )
		{
			$sql   = "UPDATE fm_users SET user_group = 1, user_code = '' WHERE user_login = ?";
			$query = $this->db->query($sql, $username);
			return $query;
		}

		return FALSE;
	}

	/* 用户登录 */
	function user_sign_in($username)
	{
		$password = md5( $this->config->item('password_code') . $this->input->post('password') );
		
		$sql   = "SELECT user_id FROM fm_users WHERE user_login = ? AND user_pass = ?";
		
		$query = $this->db->query($sql, array($username, $password));

		if( $query->num_rows() )
		{
			$sql   = "UPDATE fm_users SET user_last_login = ? WHERE user_id = ?";
			$user  = $query->row();
			$query = $this->db->query($sql, array( time(), $user->user_id ));
			return TRUE;
		}

		return FALSE; 
	}

	/* 更新remember_code */
	function update_remember_code($username, $code)
	{
		$sql   = "UPDATE fm_users SET user_remember = ? WHERE user_login = ?";
		
		$query = $this->db->query($sql, array($code, $username));

		return $query;
	}

	/* 自动登录 */
	function auto_sign_in($username, $code)
	{
		$sql   = "SELECT user_id FROM fm_users WHERE user_login = ? AND user_remember = ?";
		
		$query = $this->db->query($sql, array($username, $code));

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}

	/*   */
	function user_by_id( $user_id )
	{
		$sql   = "SELECT * FROM fm_users WHERE user_id = ?";
		$query = $this->db->query($sql, $user_id);

		if ($query->num_rows())
		{
		   return $query->row_array();
		}

		return FALSE;
	}

	function return_user_info($email)
	{
		$sql   = "SELECT * FROM fm_users WHERE user_email = ?";

		$query = $this->db->query($sql,$email);

		if ($query->num_rows())
		{
		   return $query->row_array(); 
		}

		return FALSE;
	}

	function test_password($username, $password)
	{
		$sql   = "SELECT user_id FROM fm_users WHERE user_login = ? AND user_pass = ?";
		
		$query = $this->db->query($sql, array($username, $password));

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}

	function change_password($username)
	{
		$password = md5( $this->config->item('password_code') . $this->input->post('password') );

		$sql   = "UPDATE fm_users SET user_pass = ? WHERE user_login = ?";
		
		$query = $this->db->query($sql, array($password, $username));

		return $query;
	}

	function change_userinfo($username)
	{
		$sql   = "UPDATE fm_users SET user_iphone = ?, user_nicename = ? WHERE user_login = ?";
		
		$query = $this->db->query($sql, array($this->input->post('phone'), $this->input->post('nicename'), $username));

		return $query;
	}

	function set_image($image, $username)
	{
		$sql   = "UPDATE fm_users SET user_image = ? WHERE user_login = ?";
		
		$query = $this->db->query($sql, array($image, $username));

		return $query;
	}

	function set_avatar($ava, $username)
	{
		$sql   = "UPDATE fm_users SET user_avatar = ? WHERE user_login = ?";
		
		$query = $this->db->query($sql, array($ava, $username));

		return $query;
	}

	function avatar($username)
	{
		$sql   = "SELECT user_avatar FROM fm_users WHERE user_login = ?";

		$query = $this->db->query($sql,$username);

		$user  = $query->row_array();

		return  $user['user_avatar'];
	}

	function counts($username)
	{
		$sql   = "UPDATE fm_users SET user_counts = ( user_counts + 1 ) WHERE user_login = ?";
		
		$query = $this->db->query($sql, $username);

		return $query;
	}
}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */