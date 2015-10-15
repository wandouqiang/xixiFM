<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fm extends CI_Controller {

	private $head;

	function __construct()
	{
		parent::__construct();

		$this->head['title']       = $this->config->item('web_title');
		$this->head['slug']        = $this->config->item('web_slug');
		$this->head['keywords']    = $this->config->item('web_keywords');
		$this->head['description'] = $this->config->item('web_description');

		if( $this->config->item('use_debug') )
		{
			$this->output->enable_profiler(TRUE);
		}
	}

	public function index()
	{
		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}
		
		
		$this->head['slug']        = '电台';
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');
		$this->load->view('fm_fm');

		$this->load->view('default/fm_copy');

		$footer['is_player'] = TRUE;
		$footer['is_fm']     = TRUE;
		$this->load->view('default/fm_footer', $footer);
	}

	public function random()
	{
		$song = $this->song_model->random();

		$is_love = FALSE;

		foreach ($song as $value)
		{
			if ( $this->session->userdata('online') )
			{
				$username = $this->session->userdata('username');
				$user     = $this->user_model->return_value_by_name($username);
				if($this->love_model->have_love( array( $value['song_id'], $user['user_id'], 0 ) ))
				{
					$is_love = TRUE;
				}
				else
				{
					$is_love = FALSE;
				}
			}
			
			$image   = 'dist/images/default_song.jpg';
			if ( $value['song_image'] != '')
			{
				$image = $value['song_image'];
			}
			echo json_encode( array( "song" => $value['song_id'], "name" => $value['song_name'], "path" => $value['song_path'], "author" => $value['song_authors'], "is_love" => $is_love, "image" => $image ) );
		}
	}
}

/* End of file music.php */
/* Location: ./application/controllers/music.php */
