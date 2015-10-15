<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Song extends CI_Controller {

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

	public function index($page = '')
	{
		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}
		
		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		parse_str($_SERVER['QUERY_STRING'], $var);

		$data['c_language'] = isset($var['language']) ? $var['language'] : 0;
		$data['c_style']    = isset($var['style']) ? $var['style'] : 0;
		$data['c_mood']     = isset($var['moods']) ? $var['moods'] : 0;
		$data['c_seacher']  = '';

		$url   = 'index.php?';
		$where = array();
		foreach ($var as $key => $value) 
		{
			if( $key != 'page' )
			{
				$url .= $key . '=' . $value . '&';
			}

			if( $key != 'c' && $key != 'm' && $key != 'page')
			{
				$where['song_' . $key] =  $value;
			}
		}

		$this->load->library('pagination');
		$config['per_page']   = $this->config->item('song_per_page');
		$config['base_url']   = rtrim($url, '&');
		$config['total_rows'] = $this->song_model->counts($where);
		$this->pagination->initialize($config);

		$data['songs'] = $this->song_model->songs( $where, $this->config->item('song_per_page') * ( $page - 1 ), $this->config->item('song_per_page') );

		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$this->load->view('fm_song', $data);

		$this->load->view('default/fm_copy');

		$footer['is_song'] = TRUE;
		$this->load->view('default/fm_footer', $footer);
	}

	public function path($song = '')
	{
		$song = $this->input->get('song', TRUE);

		$value = $this->song_model->song($song);
		
		echo json_encode( array( "path" => $value['song_path'], "name" => $value['song_name'] ) );
		
	}

	public function download($song = '')
	{
		$song = $this->input->get('song', TRUE) ? $this->input->get('song', TRUE) : 0;

		if ( ! $song || ! $this->song_model->have_song($song) ) 
		{
			show_404();
		}

		$this->load->helper('download');

		$value = $this->song_model->song($song);

		$data  = file_get_contents($value['song_path']);

		$name  = $value['song_name'] . '.mp3';

		force_download($name, $data);
	}

	public function music($song = '')
	{
		$song = $this->input->get('song', TRUE) ? $this->input->get('song', TRUE) : 0;

		if ( ! $song || ! $this->song_model->have_song($song) ) 
		{
			show_404();
		}

		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}

		$info = $this->song_model->song($song);

		$this->head['slug']        = $info['song_name'];
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$data['song']    = $info['song_id'];
		$data['name']    = $info['song_name'];
		$data['authors'] = $info['song_authors'];
		$data['cover']   = 'dist/images/default_song.jpg';
		if ( $info['song_image'] != '')
		{
			$data['cover'] = $info['song_image'];
		}

		if ( $this->session->userdata('online') )
		{
			$username = $this->session->userdata('username');
			$user     = $this->user_model->return_value_by_name($username);
			if($this->love_model->have_love( array( $info['song_id'], $user['user_id'], 0 ) ))
			{
				$data['is_love'] = TRUE;
			}
			else
			{
				$data['is_love'] = FALSE;
			}
		}
		else
		{
			$data['is_love'] = FALSE;
		}

		$this->load->view('fm_single', $data);

		$this->load->view('default/fm_copy');

		$footer['is_player'] = TRUE;
		$footer['is_single'] = TRUE;
		$this->load->view('default/fm_footer', $footer);
	}

	public function seacher($str = '', $page = '')
	{
		$str  = $this->input->get('str', TRUE) ? $this->input->get('str', TRUE) : '';
		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		if( $str == '')
		{
			redirect(base_url('index.php?c=song'), 'refresh');
		}

		$data['c_language'] = 0;
		$data['c_style']    = 0;
		$data['c_mood']     = 0;
		$data['c_seacher']  = $str;

		$this->load->library('pagination');
		$config['per_page']   = $this->config->item('song_per_page');
		$config['base_url']   = base_url('index.php?c=song&m=seacher&str=' . $str);
		$config['total_rows'] = $this->song_model->seach_counts($str);
		$this->pagination->initialize($config);

		$data['songs'] = $this->song_model->seach_songs( $str, $this->config->item('song_per_page') * ( $page - 1 ), $this->config->item('song_per_page') );

		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$this->load->view('fm_song', $data);

		$this->load->view('default/fm_copy');

		$footer['is_song'] = TRUE;
		$this->load->view('default/fm_footer', $footer);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
