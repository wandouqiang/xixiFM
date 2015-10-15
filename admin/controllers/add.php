<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if ( ! $this->session->userdata('admin') )
		{
			redirect(base_url('admin.php'), 'refresh');
		}
		$this->load->library('music');
	}

	public function index()
	{
		$this->load->view('default/fm_header');

		$bread         = array( '管理中心' => 'admin.php?c=board', '音乐' => 'admin.php?c=song', '添加网易云音乐' => '' );
		$data['bread'] = $bread;
		$this->load->view('default/fm_bread', $data);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger reg-error">', '</div>');

		$this->form_validation->set_rules('song', '网易云音乐编号', 'trim|required|integer|callback_is_have|xss_clean');

		$this->form_validation->set_message('is_have', '歌曲不存在');

	  	if ($this->form_validation->run() == FALSE)
		{
		   	$this->load->view('fm_add');
		}
		else
		{
			$song = $this->music->song($this->input->post('song'));
			if ( $song ) 
			{
				if( ! $this->song_model->have_song_by_path( $song['song_path'] ) )
				{
					if ( $this->song_model->add_song( $song ) )
					{
						$this->option_model->update('success', '添加网易云音乐成功。');
					}
					else
					{
						$this->option_model->update('warning', '添加网易云音乐失败。');
					}
				}
			}

			redirect(base_url('admin.php?c=song'), 'refresh');
		}

		$this->load->view('default/fm_copy');
		$this->load->view('default/fm_footer');
	}

	public function is_have( $id = '')
	{
		$song = $this->music->song($this->input->post('song'));

		if ( $song )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function album($id = '')
	{
		$id    = $this->input->get('id', TRUE);

		$album = $this->music->album($id);
		if ( $album ) 
		{
			$json  = array();
			foreach ($album['songs'] as $value) 
			{
				$song_id = $this->song_model->have_song_by_path( $value['song_path'] );

				if( ! $song_id )
				{
					$song_id = $this->song_model->add_song( $value );
				}

				array_push( $json, array( "song_id" => $song_id, "song_name" => $value['song_name'], "song_author" => $value['song_author'] ) );
			}
			echo json_encode( $json );
		}
		else
		{
			echo json_encode( array('status' => 'FALSE' ) );
			return;
		}
		
	}

	public function playlist($id = '')
	{
		$id    = $this->input->get('id', TRUE);

		$playlist = $this->music->playlist( $id );

		if ( $playlist ) 
		{
			$json  = array();
			foreach ($playlist['songs'] as $value) 
			{
				$song_id = $this->song_model->have_song_by_path( $value['song_path'] );

				if( ! $song_id )
				{
					if( $this->song_model->add_song( $value ) )
					{
						$song_id = $this->song_model->insert_id();
					}
				}

				array_push( $json, array( "song_id" => $song_id, "song_name" => $value['song_name'], "song_author" => $value['song_author'] ) );
			}
			echo json_encode( $json );
		}
		else
		{
			echo json_encode( array('status' => 'FALSE' ) );
			return;
		}
	}
}

/* End of file add.php */
/* Location: ./application/controllers/add.php */
