<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Controller {

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

		$this->form_validation->set_rules('username', '用户名', 'trim|required|min_length[4]|max_length[16]|callback_have_username|xss_clean');
		$this->form_validation->set_rules('password', '密码', 'trim|required|min_length[6]|max_length[18]|matches[passconf]');
		$this->form_validation->set_rules('passconf', '确认密码', 'trim|required|min_length[6]|max_length[18]');
		$this->form_validation->set_rules('email', '邮箱', 'trim|required|min_length[8]|max_length[64]|valid_email|callback_have_email');
		
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$this->form_validation->set_message('have_username', '用户名已经存在');
		$this->form_validation->set_message('have_email', '邮箱已经存在');

	  	if ($this->form_validation->run() == FALSE)
		{
		   	$this->load->view('fm_reg');
		}
		else
		{
			if ($this->user_model->user_sign_up())
			{
				$data['regright'] = TRUE;
				$this->load->view('fm_message', $data);
				$this->send_mail($this->input->post('username'));
			}
			else
			{
				$data['regerror'] = TRUE;
				$this->load->view('fm_message', $data);
			}
		}

		$this->load->view('default/fm_copy');
		
		$this->load->view('default/fm_footer');
	}

	/* 验证 username 是否存在 */
	public function have_username($username = '')
	{
		// $username = $_GET['username'];
		if ($this->user_model->have_username($username)) 
		{
			return FALSE;
		}

		return TRUE;
	}

	/* 验证 email 是否存在 */
	public function have_email($email = '')
	{
		// $email = $_GET['email'];
		if ($this->user_model->have_email($email)) 
		{
			return FALSE;
		}

		return TRUE;
	}

	/* 发送电子邮件 */
	public function send_mail($username = '') 
	{
		if ( ! $this->have_username( $username ) ) 
		{
			$user = $this->user_model->return_value_by_name( $username );

			$text = "亲爱的" . $username . "用户你好。感谢你注册小溪-FM。点击链接即可激活您的账号。<p></p>" . base_url('index.php?c=reg&m=active_mail&code=') . $user['user_code'] . "&username=" . $username;

			$this->email->from('angel836@126.com', 'dolphin');
			$this->email->to($user['user_email'], $username);
			$this->email->subject('小溪-FM注册激活');
			$this->email->message($text);
			$this->email->send();
		}
		else
		{
			log_message('error', 'send_mail => username => not have.');
		}
	}

	/* 激活邮箱 */
	public function active_mail($code = '', $username = '')
	{
		$this->load->view('default/fm_header', $this->head);
		$this->load->view('default/fm_nav');

		$code     = $_GET['code'];
		$username = $_GET['username'];

		if ( ! $this->have_username( $username ) )
		{
			if( $this->user_model->active_mail( $code, $username ) )
			{
				$data['activeright'] = TRUE;
				$this->load->view('fm_message', $data);
			}
			else
			{
				$data['activerror'] = TRUE;
				$this->load->view('fm_message', $data);
			}
		}

		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');
	}

}

/* End of file reg.php */
/* Location: ./application/controllers/reg.php */
