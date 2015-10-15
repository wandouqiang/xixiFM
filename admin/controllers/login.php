<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ( $this->session->userdata('admin') )
		{
			redirect(base_url('admin.php?c=board'), 'refresh');
		}

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger reg-error">', '</div>');

		$this->form_validation->set_rules('username', '用户名', 'trim|required|min_length[4]|max_length[64]|callback_have_name|xss_clean');
		$this->form_validation->set_rules('password', '密码', 'trim|required|min_length[6]|max_length[18]');
		
		$this->form_validation->set_message('have_name', '用户名不存在');

	  	if ($this->form_validation->run() == FALSE)
		{
		   	$this->load->view('fm_login');
		}
		else
		{
			if ($user = $this->user_model->user_sign_in())
			{
	 			$session = array(
		        	'username'   => $this->input->post('username'),
		        	'usernumber' => $user['user_id'],
		        	'admin'      => true,
		        	'online'     => true
		      	);
		      	$this->session->set_userdata($session);

		      	redirect(base_url('admin.php?c=board'), 'refresh');
			}
			else
			{
				$data['error'] = TRUE;
				$this->load->view('fm_login', $data);
			}
		}
	}

		/* 验证 name 或者 mail 是否存在 */
	public function have_name($name = '')
	{
		if ($this->user_model->have_username($name)) 
		{
			return TRUE;
		}
		return FALSE;
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
