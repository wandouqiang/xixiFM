<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music extends CI_Controller {

	private $head;

	function __construct()
	{
		parent::__construct();

		$this->head['title']       = $this->config->item('web_title');
		$this->head['slug']        = $this->config->item('web_slug');
		$this->head['keywords']    = $this->config->item('web_keywords');
		$this->head['description'] = $this->config->item('web_description');

		/* 自动登录 */
		if( ! $this->session->userdata('online') )
		{
			if (get_cookie($this->config->item('identity_cookie_name')) && get_cookie($this->config->item('remember_cookie_name')))
			{
				$username = get_cookie($this->config->item('identity_cookie_name'));
				$remember = get_cookie($this->config->item('remember_cookie_name'));

				if($this->user_model->auto_sign_in($username, $remember))
				{
					$session = array(
			        	'username' => $username,
			        	'online'   => true
			      	);
			      	$this->session->set_userdata($session);
			    }
			}
		}

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

		$this->load->library('pagination');
		$config['per_page']   = $this->config->item('music_per_page');
		$config['base_url']   = 'index.php?c=music&m=index';
		$config['total_rows'] = $this->music_model->counts();
		$this->pagination->initialize($config);

		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$data['channels'] = $this->music_model->channels( array( $this->config->item('music_per_page') * ( $page - 1 ), $this->config->item('music_per_page')) );

		if( $data['channels'] )
		{
			$this->load->view('fm_channel', $data);
		}
		else
		{
			$this->load->view('fm_empty');
		}

		$this->load->view('default/fm_copy');
		
		$this->load->view('default/fm_footer');
	}

	public function vols( $id = '' )
	{
		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}
		
		$id = $this->input->get('id', TRUE) ? $this->input->get('id', TRUE) : $this->music_model->max();

		if ( ! $id ) 
		{
			$this->load->view('default/fm_header', $this->head);
			$this->load->view('default/fm_nav');

			$this->load->view('fm_empty');
			$this->load->view('default/fm_copy');
			$this->load->view('default/fm_footer');
			
			return;
		}

		$musics          = $this->music_model->music( $id );
		$data['music']   = $musics;

		$this->head['slug']        = $musics['music_name'];
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$musicuser       = $this->user_model->user_by_id($musics['music_user']);
		$data['username']= $musicuser['user_login'];

		$data['hearts']  = $this->love_model->counts( array( $musics['music_id'], 1 ) );

		if( $this->session->userdata('online') )
		{
			$curruser = $this->session->userdata('username');
			$user     = $this->user_model->return_value_by_name($curruser);

			$data['is_heart'] = $this->love_model->have_love( array( $musics['music_id'], $user['user_id'], 1 ) );
		}
		else
		{
			$data['is_heart'] = FALSE;
		}


		$data['before']  = $this->music_model->before( intval($id) );
		$data['after']   = $this->music_model->after( intval($id) );

		$songs           = $this->music_model->music_song( $id );
		$data['songs']   = array();
		$data['is_love'] = array();

		foreach ($songs as $value)
		{
			if ( $this->session->userdata('online') )
			{
				$username = $this->session->userdata('username');
				$user     = $this->user_model->return_value_by_name($username);
				$hearts   = array($value['song_id'], $user['user_id'], 0);
				if($this->love_model->have_love( $hearts ))
				{
					array_push($data['is_love'], TRUE);
				}
				else
				{
					array_push($data['is_love'], FALSE);
				}
			}
			else
			{
				array_push($data['is_love'], FALSE);
			}
			array_push($data['songs'], $this->song_model->song( $value ));
		}

		$this->load->view('fm_music', $data);

		$this->load->view('default/fm_copy');

		$footer['is_player'] = TRUE;
		$footer['is_music']  = TRUE;
		$this->load->view('default/fm_footer', $footer);
	}
}

/* End of file music.php */
/* Location: ./application/controllers/music.php */
