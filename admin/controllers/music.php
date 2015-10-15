<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if ( ! $this->session->userdata('admin') )
		{
			redirect(base_url('admin.php'), 'refresh');
		}
	}

	public function index($page = '')
	{
		$this->load->library('pagination');
		$config['per_page']   = $this->config->item('music_per_page');
		$config['base_url']   = 'admin.php?c=music&m=index';
		$config['total_rows'] = $this->music_model->counts();
		$this->pagination->initialize($config);

		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		$this->load->view('default/fm_header');

		$bread           = array( '管理中心' => 'admin.php?c=board', '期 刊' => '' );
		$bread['bread']   = $bread;
		$this->load->view('default/fm_bread', $bread);

		$data['channels'] = $this->music_model->channels( array( $this->config->item('music_per_page') * ( $page - 1 ), $this->config->item('music_per_page')) );
		$this->load->view('fm_channel', $data);
		
		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');
	}

	public function add()
	{
		$this->load->view('default/fm_header');

		$bread         = array( '管理中心' => 'admin.php?c=board', '期 刊' => 'admin.php?c=music', '创 建' => '' );
		$data['bread'] = $bread;
		$this->load->view('default/fm_bread', $data);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger reg-error">', '</div>');

		$this->form_validation->set_rules('title', '标题', 'trim|required|xss_clean');
		$this->form_validation->set_rules('text', '描述', 'trim|xss_clean');
		$this->form_validation->set_rules('picture', '图片', 'trim|required|xss_clean');
		$this->form_validation->set_rules('song', '歌曲', 'trim|required|xss_clean');
		$this->form_validation->set_rules('moods', '标签', 'trim|xss_clean');

	  	if ($this->form_validation->run() == FALSE)
		{
		   	$this->load->view('fm_add_music');
		}
		else
		{
			if ( $this->music_model->add() )
			{
				$this->option_model->update('success', '音乐期刊创建成功。');
			}
			else
			{
				$this->option_model->update('warning', '音乐期刊创建失败。');
			}

			redirect(base_url('admin.php?c=music'), 'refresh');
		}

		$this->load->view('default/fm_copy');

		$footer['is_upload']      = TRUE;
		$footer['is_add_music']    = TRUE; 
		$this->load->view('default/fm_footer', $footer);
	}

	public function remove($id = '')
	{
		$id = $this->input->get('id', TRUE);

		if ( $this->music_model->have_music( $id ) ) 
		{
			if( $this->music_model->remove( $id ) )
			{
				$this->option_model->update('success', '删除音乐期刊成功。');
			}
			else
			{
				$this->music_model->update('warning', '删除音乐期刊失败。');
			}
		}
		else
		{
			$this->option_model->update('warning', '音乐期刊不存在。');
		}

		redirect(base_url('admin.php?c=music'), 'refresh');
	}
}

/* End of file music.php */
/* Location: ./application/controllers/music.php */
