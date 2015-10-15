<?php

class Song_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	function songs($where, $start, $counts)
	{
		$str = '';
		if( ! empty($where) )
		{
			foreach ($where as $k => $v) 
			{
				$str.= $k . ' = ' . $v . ' AND ';
			}

			$string = rtrim($str, ' AND ');
		}
		else
		{
			$string = 1;
		}

		$sql = "SELECT * FROM fm_songs WHERE $string ORDER BY song_id DESC LIMIT $start, $counts";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	function song( $song )
	{
		$sql = "SELECT song_id, song_name, song_path, song_authors, song_image FROM fm_songs WHERE song_id = ?";

		$query = $this->db->query($sql, $song);

		if ( $query->num_rows() ) 
		{
			return $query->row_array();
		}

		return FALSE;
	}

	function random()
	{
		$sql = "SELECT * FROM fm_songs ORDER BY RAND() LIMIT 1";

		$query = $this->db->query($sql);

		if ( $query->num_rows() ) 
		{
			return $query->result_array();
		}

		return FALSE;
	}

	function counts($where)
	{
		$str = '';
		if( ! empty($where) )
		{
			foreach ($where as $k => $v)
			{
				$str.= $k . ' = ' . $v . ' AND ';
			}

			$string = rtrim($str, ' AND ');
		}
		else
		{
			$string = 1;
		}

		$sql   = "SELECT * FROM fm_songs WHERE $string"; 
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

	function have_song($id)
	{
		$sql   = "SELECT * FROM fm_songs WHERE song_id = ?"; 
		$query = $this->db->query($sql, $id);

		if( $query->num_rows() )
		{
			return TRUE;
		}

		return FALSE; 
	}

	function seach_counts($str)
	{
		$sql   = "SELECT * FROM fm_songs WHERE song_name LIKE '%$str%'"; 
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

	function seach_songs($str, $start, $counts)
	{
		$sql   = "SELECT * FROM fm_songs WHERE song_name LIKE '%$str%' ORDER BY song_id DESC LIMIT $start, $counts"; 
		$query = $this->db->query($sql);

		return $query->result_array();
	}
}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */