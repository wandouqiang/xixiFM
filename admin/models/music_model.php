<?php

class Music_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	function add()
	{
		$music = array( $this->input->post('title'),
						$this->input->post('picture'),
						$this->session->userdata('usernumber'),
						$this->input->post('moods'),
						$this->input->post('text'),
						time() );

		$sql   = "INSERT INTO fm_musics (music_name, music_image, music_user, music_moods, music_text, music_create) VALUES (?, ?, ?, ?, ?, ?)"; 
		$query = $this->db->query($sql, $music);

		$music_id = $this->db->insert_id();

		$songs = explode( '|', $this->input->post('song'));

		foreach ($songs as $value) 
		{
			$this->add_music_song($music_id, $value);
		}

		return $query;
	}

	function add_music_song( $music, $song )
	{
		$sql   = "INSERT INTO fm_song_music (song_id, music_id) VALUES (?, ?)"; 
		$query = $this->db->query($sql, array($song, $music) );

		return $query;
	}

	function channels($curr)
	{
		$sql   = "SELECT * FROM fm_musics ORDER BY music_create DESC LIMIT ?, ?"; 
		$query = $this->db->query($sql, $curr);

		return $query->result_array();
	}

	function have_music( $id )
	{
		$sql   = "SELECT * FROM fm_musics WHERE music_id = ?"; 
		$query = $this->db->query($sql, $id);

		if( $query->num_rows() )
		{
			return $query->row_array();
		}

		return FALSE; 
	}

	function remove( $id )
	{
		$sql   = "DELETE FROM fm_musics WHERE music_id = ?";
		$query = $this->db->query($sql, $id);

		$sql   = "DELETE FROM fm_song_music WHERE music_id = ?";
		$query = $this->db->query($sql, $id);

		return $query;
	}

	function counts()
	{
		$sql   = "SELECT * FROM fm_musics"; 
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */