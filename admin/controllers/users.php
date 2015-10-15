<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index($page = '')
	{
		$this->load->library('pagination');
		$config['per_page']   = $this->config->item('users_per_page');
		$config['base_url']   = 'admin.php?c=users&m=index';
		$config['total_rows'] = $this->users_model->counts();
		$this->pagination->initialize($config);

		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		$this->load->view('default/fm_header');

		$bread           = array( '管理中心' => 'admin.php?c=board', '用 户' => '' );
		$bread['bread']  = $bread;
		$this->load->view('default/fm_bread', $bread);

		$data['users'] = $this->users_model->users( array( $this->config->item('users_per_page') * ( $page - 1 ), $this->config->item('users_per_page')) );
		$this->load->view('fm_users', $data);

		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');
	}

	public function remove($id = '')
	{
		$id = $this->input->get('id', TRUE) ? $this->input->get('id', TRUE) : 0;

		if( ! $id || ! $this->users_model->have_user( $id ) )
		{
			show_404();
		}

		$this->users_model->remove( $id );

		redirect(base_url('admin.php?c=users'), 'refresh');
	}


}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
