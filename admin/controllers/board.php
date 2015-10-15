<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if ( ! $this->session->userdata('admin') )
		{
			redirect(base_url('admin.php'), 'refresh');
		}
	}

	public function index()
	{
		$this->load->view('default/fm_header');

		$bread         = array( '管理中心' => '' );
		$data['bread'] = $bread;
		$this->load->view('default/fm_bread', $data);

		$this->option_model->update('success', '感谢您选择西西音乐电台');
		
		$data['post_max_size']       = ini_get('post_max_size');
		$data['upload_max_filesize'] = ini_get('upload_max_filesize');
		$data['upload_music_size']   = $this->config->item('upload_music_size');
		$data['upload_image_size']   = $this->config->item('upload_image_size');
		
		$this->load->view('fm_board', $data);

		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');
	}

	public function empty_message()
	{
		$this->option_model->update('success', '');
		$this->option_model->update('warning', '');

		echo 'OK';
	}
}

/* End of file board.php */
/* Location: ./application/controllers/board.php */
