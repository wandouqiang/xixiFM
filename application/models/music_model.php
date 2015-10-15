<?php

class Music_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

	function music( $id )
	{
		/* 使用封装查询，则所有的值都会被自动转义。 */
		$sql   = "SELECT * FROM fm_musics WHERE music_id = ?"; 
		$query = $this->db->query($sql, $id);

		if( $query->num_rows() )
		{
			return $query->row_array();
		}

		return FALSE; 
	}

	function music_song( $music_id )
	{
		$sql   = "SELECT song_id FROM fm_song_music WHERE music_id = ?"; 
		$query = $this->db->query($sql, $music_id);

		if( $query->num_rows() )
		{
			return $query->result_array();
		}

		return FALSE; 
	}

	function max()
	{
		$sql   = "SELECT * FROM fm_musics ORDER BY music_id DESC LIMIT 1"; 
		$query = $this->db->query($sql);

		if( $query->num_rows() )
		{
			foreach ($query->result_array() as $value) 
			{
				return $value['music_id'];
			}
		}

		return FALSE; 
	}

	function channels($curr)
	{
		$sql   = "SELECT * FROM fm_musics ORDER BY music_create DESC LIMIT ?, ?"; 
		$query = $this->db->query($sql, $curr);

		if( $query->num_rows() )
		{
			return $query->result_array();
		}

		return FALSE; 
	}

	function counts()
	{
		$sql   = "SELECT * FROM fm_musics"; 
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

	function before( $id ) 
	{
		$sql   = "SELECT * FROM fm_musics WHERE music_id < ? ORDER BY music_id DESC LIMIT 1"; 
		$query = $this->db->query($sql, $id);

		if( $query->num_rows() )
		{
			foreach ($query->result_array() as $value) 
			{
				return $value['music_id'];
			}
		}

		return FALSE; 
	}

	function after( $id ) 
	{
		$sql   = "SELECT * FROM fm_musics WHERE music_id > ? LIMIT 1"; 
		$query = $this->db->query($sql, $id);

		if( $query->num_rows() )
		{
			foreach ($query->result_array() as $value) 
			{
				return $value['music_id'];
			}
		}

		return FALSE; 
	}
}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */