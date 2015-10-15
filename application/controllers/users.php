<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
	}

	public function musics( $name = '', $page = '')
	{
		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}

		$name = $this->input->get('name', TRUE) ? $this->input->get('name', TRUE) : 0;
		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		if ( ! $name ) 
		{
			show_404();
		}

		$this->head['slug']        = $name . '的主页';
		$this->load->view('default/fm_header', $this->head);

		$userinfo = $this->user_model->return_value_by_name($name);
		$user['username']   = $name;
		$user['registered'] = date("Y-m-d H:i:s", $userinfo['user_registered']);
		$user['last_login'] = date("Y-m-d H:i:s", $userinfo['user_last_login']);
		$user['user_image'] = $userinfo['user_image'];
		$user['user_avatar']= $userinfo['user_avatar'];
		$user['user_counts']= $userinfo['user_counts'];
		$user['active']     = 'music';

		$this->load->view('fm_user', $user);

		$this->load->library('pagination');
		$config['per_page']   = $this->config->item('music_per_page');
		$config['base_url']   = 'index.php?c=users&m=musics&name=' . $name;
		$config['total_rows'] = $this->love_model->user_counts( array( $userinfo['user_id'], 1 ) );
		$this->pagination->initialize($config);

		$musicItems = $this->love_model->loves( array($userinfo['user_id'], 1, $this->config->item('music_per_page') * ($page -1), $this->config->item('music_per_page')) );
		$musics     = array();
		foreach ($musicItems as $item) 
		{
			array_push($musics, $this->music_model->music( $item['song_collection_id'] ));
		}
		$vols['musics'] = $musics;

		$this->load->view('fm_user_music', $vols);

		$this->load->view('default/fm_copy');

		$this->load->view('default/fm_footer');

	}

	public function songs( $name = '', $page = '')
	{
		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}

		$name = $this->input->get('name', TRUE) ? $this->input->get('name', TRUE) : 0;
		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		if ( ! $name ) 
		{
			show_404();
		}

		$this->head['slug']        = $name . '的主页';
		$this->load->view('default/fm_header', $this->head);

		$userinfo = $this->user_model->return_value_by_name($name);
		$user['username']   = $name;
		$user['registered'] = date("Y-m-d H:i:s", $userinfo['user_registered']);
		$user['last_login'] = date("Y-m-d H:i:s", $userinfo['user_last_login']);
		$user['user_image'] = $userinfo['user_image'];
		$user['user_avatar']= $userinfo['user_avatar'];
		$user['user_counts']= $userinfo['user_counts'];
		$user['active']     = 'song';

		$this->load->view('fm_user', $user);

		$this->load->library('pagination');
		$config['per_page']   = $this->config->item('song_per_page');
		$config['base_url']   = 'index.php?c=users&m=songs&name=' . $name;
		$config['total_rows'] = $this->love_model->user_counts( array( $userinfo['user_id'], 0 ) );
		$this->pagination->initialize($config);

		$songItems = $this->love_model->loves( array($userinfo['user_id'], 0, $this->config->item('song_per_page') * ($page -1), $this->config->item('song_per_page')) );
		$songs     = array();
		foreach ($songItems as $item) 
		{
			array_push($songs, $this->song_model->song( $item['song_collection_id'] ));
		}
		$data['songs'] = $songs;

		$this->load->view('fm_user_song', $data);

		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');

	}

	public function heart($id = '', $soucre = '')
	{
		$id     = $this->input->get('id', TRUE);
		$soucre = $this->input->get('soucre', TRUE);

		if ( ! $this->session->userdata('online') )
		{
			echo '0';
			return;
		}

		$username = $this->session->userdata('username');
		$user     = $this->user_model->return_value_by_name($username);

		$info     = array($id, $user['user_id'], $soucre);

		if ($this->love_model->have_love($info))
		{
			$this->love_model->remove($info);
			echo '1';
		}
		else
		{
			$this->love_model->add($info);
			echo '2';
		}
	}

	public function setting()
	{
		if( ! $this->session->userdata('online'))
		{
			show_404();
		}

		$username = $this->session->userdata('username');

		if ( ! $this->user_model->have_username($username) ) 
		{
			show_404();
		}

		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}

		$this->head['slug']        = '编辑基本信息';
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger reg-error">', '</div>');

		$this->form_validation->set_rules('nicename', '昵称', 'trim|required|min_length[2]|max_length[5]|callback_is_nicename');
		$this->form_validation->set_rules('phone', '手机', 'trim|required|min_length[11]|max_length[11]|integer');

		$this->form_validation->set_message('is_nicename', '昵称只能为中文');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['username'] = $username;
			$user  = $this->user_model->return_value_by_name($username);
			$data['email']    = $user['user_email'];
			$data['phone']    = $user['user_iphone'];
			$data['nicename'] = $user['user_nicename'];

			$this->load->view('fm_setting', $data);
		}
		else
		{
			$this->user_model->change_userinfo($username);

			redirect(base_url('index.php?c=users&m=setting'), 'refresh');
		}

		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');
	}

	public function is_nicename($nicename = '')
	{
		/* 中文验证 */
		$pattern = "/^[\x{4e00}-\x{9fa5}]+$/u";

		if( preg_match( $pattern, $nicename ) )
		{ 
		    return TRUE; 
		}
		else
		{ 
		    return FALSE; 
		} 
	}

	public function avatar()
	{
		if( ! $this->session->userdata('online'))
		{
			show_404();
		}

		$username = $this->session->userdata('username');

		if ( ! $this->user_model->have_username($username) ) 
		{
			show_404();
		}

		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}

		$this->head['slug']        = '编辑头像';
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$user  = $this->user_model->return_value_by_name($username);
		$data['avatar']   = $user['user_avatar'];
		$data['image']    = $user['user_image'];

		$this->load->view('fm_avatar', $data);

		$this->load->view('default/fm_copy');

		$footer['is_user_image'] = TRUE;
		$this->load->view('default/fm_footer', $footer);
	}

	public function password()
	{
		if( ! $this->session->userdata('online'))
		{
			show_404();
		}

		$username = $this->session->userdata('username');

		if ( ! $this->user_model->have_username($username) ) 
		{
			show_404();
		}

		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}

		$this->head['slug']        = '修改密码';
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger reg-error">', '</div>');

		$this->form_validation->set_rules('password', '密码', 'trim|required|min_length[6]|max_length[18]|matches[passconf]');
		$this->form_validation->set_rules('passconf', '确认密码', 'trim|required|min_length[6]|max_length[18]');
		$this->form_validation->set_rules('have', '旧密码', 'trim|required|min_length[6]|max_length[18]|callback_test_password');
		
		$this->form_validation->set_message('test_password', '旧密码不正确');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('fm_password');
		}
		else
		{
			$this->user_model->change_password($username);

			redirect(base_url('index.php?c=logout'), 'refresh');
		}

		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');
	}

	public function test_password($password)
	{
		$username = $this->session->userdata('username');

		$password = md5( $this->config->item('password_code') . $password );

		if ($this->user_model->test_password($username, $password)) 
		{
			return TRUE;
		}

		return FALSE;
	}

	public function image($img = '')
	{
		$img   = $this->input->get('img', TRUE) ? $this->input->get('img', TRUE) : 1;

		if( $this->session->userdata('online'))
		{
			$image = $this->config->item('user_image')[$img];

			$username = $this->session->userdata('username');

			$this->user_model->set_image($image, $username);
		}
	}

	public function setavatar($img = '')
	{
		$ava   = $this->input->get('ava', TRUE) ? $this->input->get('ava', TRUE) : 1;

		if( $this->session->userdata('online'))
		{
			$ava = $this->config->item('user_avatar')[$ava];

			$username = $this->session->userdata('username');

			$this->user_model->set_avatar($ava, $username);
		}
	}

	public function counts()
	{
		if( $this->session->userdata('online'))
		{
			$username = $this->session->userdata('username');

			$this->user_model->counts($username);
		}
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
