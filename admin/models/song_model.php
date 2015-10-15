<?php

class Song_model extends CI_Model {

	/**
	 * song_source : 1 ~ 本地上传 2 ~ 网易云音乐
	 */

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	function upload( $name, $path )
	{
		$sql   = "INSERT INTO fm_songs (song_name, song_path, song_source, song_language, song_style, song_moods) VALUES (?, ?, ?, ?, ?, ?)"; 
		$query = $this->db->query($sql, array( $name, $path, 1, 1, 1, 1 ));

		if ( $query )
		{
			return $this->db->insert_id();
		}

		return FALSE;
	}

	function add_song( $song )
	{
		/* 使用封装查询，则所有的值都会被自动转义。 */
		$info    = array( $song['song_name'],
						  $song['song_path'],
						  $song['song_author'],
						  $song['song_cover'], 
						  2,
						  1,
						  1,
						  1 );
		$sql     = "INSERT INTO fm_songs (song_name, song_path, song_authors, song_image, song_source, song_language, song_style, song_moods) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 
		$query   = $this->db->query($sql, $info);

		return $query;
	}

	function add( $data )
	{
		$sql     = "INSERT INTO fm_songs (song_name, song_path, song_authors, song_image, song_source, song_language, song_style, song_moods) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 
		$query   = $this->db->query($sql, $data);

		return $query;
	}

	function insert_id()
	{
		return $this->db->insert_id();
	}

	function songs($curr)
	{
		$sql = "SELECT * FROM fm_songs ORDER BY song_id DESC LIMIT ?, ?";

		$query = $this->db->query($sql, $curr);

		return $query->result_array();
	}

	function song( $song )
	{
		$sql = "SELECT * FROM fm_songs WHERE song_id = ?";

		$query = $this->db->query($sql, $song);

		if ( $query->num_rows() ) 
		{
			return $query->result_array();
		}

		return FALSE;
	}

	function have_song( $song )
	{
		$sql   = "SELECT * FROM fm_songs WHERE song_id = ?"; 
		$query = $this->db->query($sql, $song);

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}

	function delete( $song )
	{
		$sql   = "DELETE FROM fm_songs WHERE song_id = ?";
		$query = $this->db->query($sql, $song);

		return $query;
	}

	function seacher( $str )
	{
		$sql   = "SELECT * FROM fm_songs WHERE song_name LIKE '%" . $str . "%'";
		$query = $this->db->query($sql);

		if( $query->num_rows() )
		{
			return $query->result_array();
		}

		return FALSE; 
	}

	/* 根据song_path判断数据库中是否已经存在，主要用与网易云音乐添加时的判断 */
	function have_song_by_path( $path )
	{
		$sql   = "SELECT * FROM fm_songs WHERE song_path = ?"; 
		$query = $this->db->query($sql, $path);

		if( $query->num_rows() )
		{
			foreach ($query->result_array() as $value) 
			{
				return $value['song_id'];
			}
		}

		return FALSE; 
	}

	function update_song()
	{
		$song = array($this->input->post('song-name'),
					  $this->input->post('song-author'),
					  $this->input->post('song-language'),
					  $this->input->post('song-style'),
					  $this->input->post('song-mood'),
					  $this->input->post('song-id'));

		$sql   = "UPDATE fm_songs SET song_name = ?, song_authors = ?, song_language = ?, song_style = ?, song_moods = ? WHERE song_id = ?";
		$query = $this->db->query($sql, $song);
		return $query;
	}

	function counts()
	{
		$sql   = "SELECT * FROM fm_songs"; 
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

}

/* End of file song_model.php */
/* Location: ./application/models/song_model.php */