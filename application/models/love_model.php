<?php

class Love_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	public function add($info)
	{
		$sql   = "INSERT INTO fm_loves (song_collection_id, love_user, love_source) VALUES (?, ?, ?)"; 
		$query = $this->db->query($sql, $info);

		return $query;
	}

	function remove($info)
	{
		$sql   = "DELETE FROM fm_loves WHERE song_collection_id = ? AND love_user = ? AND love_source = ?";
		$query = $this->db->query($sql, $info);

		return $query;
	}

	function have_love($info)
	{
		$sql   = "SELECT love_id FROM fm_loves WHERE song_collection_id = ? AND love_user = ? AND love_source = ?"; 
		$query = $this->db->query($sql, $info);

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}

	function love_song($user)
	{
		$sql   = "SELECT * FROM fm_loves WHERE love_user = ? AND love_source = 0"; 
		$query = $this->db->query($sql, $user);

		return $query->result_array();
	}

	function loves($info)
	{
		$sql   = "SELECT * FROM fm_loves WHERE love_user = ? AND love_source = ? LIMIT ?, ?"; 
		$query = $this->db->query($sql, $info);

		return $query->result_array();
	}

	/* * 被 user 收藏的数量 */
	function counts($info)
	{
		$sql   = "SELECT * FROM fm_loves WHERE song_collection_id = ? AND love_source = ?"; 
		$query = $this->db->query($sql, $info);

		return $query->num_rows();
	}

	/* user 收藏的 * 的数量 */
	function user_counts($info)
	{
		$sql   = "SELECT * FROM fm_loves WHERE love_user = ? AND love_source = ?"; 
		$query = $this->db->query($sql, $info);

		return $query->num_rows();
	}
}

/* End of file love_model.php */
/* Location: ./application/models/love_model.php */