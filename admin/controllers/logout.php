<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if( $this->session->userdata('admin') ) 
		{
      		$this->session->unset_userdata('admin');
    	}

    	redirect(base_url('admin.php'), 'refresh');
	}
}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */
