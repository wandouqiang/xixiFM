<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//delete the remember me cookies if they exist
		if (get_cookie($this->config->item('identity_cookie_name')))
		{
			delete_cookie($this->config->item('identity_cookie_name'));
		}

		if (get_cookie($this->config->item('remember_cookie_name')))
		{
			delete_cookie($this->config->item('remember_cookie_name'));
		}

		//Destroy the session
		$this->session->sess_destroy();

    	redirect(base_url(), 'refresh');
	}
}

/* End of file music.php */
/* Location: ./application/controllers/music.php */
