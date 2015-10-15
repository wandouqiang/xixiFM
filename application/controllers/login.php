<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if ( $this->session->userdata('online') )
		{
			redirect(base_url(), 'refresh');
		}

		if( $this->config->item('use_cache') )
		{
			$this->output->cache( $this->config->item('cache_time') );
		}

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger reg-error">', '</div>');

		$this->form_validation->set_rules('username', '用户名', 'trim|required|min_length[4]|max_length[64]|callback_have_name_mail|xss_clean');
		$this->form_validation->set_rules('password', '密码', 'trim|required|min_length[6]|max_length[18]');
		
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$this->form_validation->set_message('have_name_mail', '用户名或邮箱不存在');

	  	if ($this->form_validation->run() == FALSE)
		{
		   	$this->load->view('fm_login');
		}
		else
		{
			if ( strstr( $this->input->post('username'), '@' ) )
			{
				$user = $this->user_model->return_user_info($this->input->post('username'));
				$username = $user['user_login'];
			}
			else
			{
				$username = $this->input->post('username');
			}
			
			if ($this->user_model->user_sign_in($username))
			{
	 			$session = array(
		        	'username' => $username,
		        	'online'   => true
		      	);
		      	$this->session->set_userdata($session);

		      	if($this->config->item('user_expire') === 0)
				{
					$expire = (60*60*24*365*2);
				}
				else
				{
					$expire = $this->config->item('user_expire');
				}

		      	$remember_code = random_string('unique');

		      	if($this->user_model->update_remember_code($username, $remember_code))
		      	{
			      	set_cookie(array(
					    'name'   => $this->config->item('identity_cookie_name'),
					    'value'  => $username,
					    'expire' => $expire
					));

					set_cookie(array(
					    'name'   => $this->config->item('remember_cookie_name'),
					    'value'  => $remember_code,
					    'expire' => $expire
					));
				}

		      	redirect(base_url(), 'refresh');
			}
			else
			{
				$data['error'] = TRUE;
				$this->load->view('fm_login', $data);
			}
		}

		$this->load->view('default/fm_copy');
		
		$this->load->view('default/fm_footer');
	}

		/* 验证 name 或者 mail 是否存在 */
	public function have_name_mail($name_mail = '')
	{
		// $name_mail = $_GET['name_mail'];
		if ( strstr( $name_mail, '@' ) )
		{
			if ($this->user_model->have_email($name_mail)) 
			{
				return TRUE;
			}
		}
		else
		{
			if ($this->user_model->have_username($name_mail)) 
			{
				return TRUE;
			}
		}

		return FALSE;
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
