<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Song extends CI_Controller {

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
		$config['per_page']   = $this->config->item('song_per_page');
		$config['base_url']   = 'admin.php?c=song&m=index';
		$config['total_rows'] = $this->song_model->counts();
		$this->pagination->initialize($config);

		$page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;

		$this->load->view('default/fm_header');

		$bread           = array( '管理中心' => 'admin.php?c=board', '音乐' => '' );
		$bread['bread']  = $bread;
		$this->load->view('default/fm_bread', $bread);

		$data['songs']   = $this->song_model->songs( array( $this->config->item('song_per_page') * ( $page - 1 ), $this->config->item('song_per_page')) );
		$this->load->view('fm_song', $data);

		$this->load->view('default/fm_copy');
		$footer['is_upload']      = TRUE;
		$this->load->view('default/fm_footer', $footer);
	}

	public function delete( $song =  1 )
	{
		$song = $this->input->get('song', TRUE);

		if ( $info = $this->song_model->have_song( $song ) ) 
		{
			if ( $info['song_source'] == 1 ) 
			{
				$this->delete_file( $info['song_path'] );
			}

			if( $this->song_model->delete( $song ) )
			{
				$this->option_model->update('success', '删除音乐成功。');
			}
			else
			{
				$this->option_model->update('warning', '删除音乐失败。');
			}
		}
		else
		{
			$this->option_model->update('warning', '音乐文件不存在。');
		}

		redirect(base_url('admin.php?c=song'), 'refresh');
	}

	public function delete_file( $path = '' )
	{
		$path = substr_replace( $path, '', 0, strlen( base_url() ) );

		if ( file_exists( $path ) ) 
		{
			@unlink( $path );
		}
	}

	public function seacher($str = '')
	{
		$str = $this->input->get('str', TRUE);

		if ( $str == '') 
		{
			echo json_encode( array('status' => 'FALSE' ) );
			return;
		}

		$songs = $this->song_model->seacher( $str );

		if ( ! $songs ) 
		{
			echo json_encode( array('status' => 'FALSE' ) );
			return;
		}
		
		$json  = array();
		foreach ($songs as $value) 
		{
			array_push( $json, array( "song_id" => $value['song_id'], "song_name" => $value['song_name'], "song_author" => $value['song_authors'] ) );
		}
		echo json_encode( $json );
	}

	public function updateSong($song = '')
	{
		$song   = $this->input->get('song', TRUE);

		$this->load->view('default/fm_header');

		$bread           = array( '管理中心' => 'admin.php?c=board', '音乐' => 'admin.php?c=song','编辑音乐' => '' );
		$data['bread']   = $bread;
		$this->load->view('default/fm_bread', $data);

		$query = $this->song_model->song( $song );
		foreach ($query as $value) 
		{
			$info['id']       = $value['song_id'];
			$info['name']     = $value['song_name'];
			$info['authors']  = $value['song_authors'];
			$info['path']     = base_url($value['song_path']);
			$info['language'] = $value['song_language'];
			$info['style']    = $value['song_style'];
			$info['moods']    = $value['song_moods'];

		}

		$this->load->view('fm_song_from', $info);


		$this->load->view('default/fm_copy');
		$footer['is_update_song'] = TRUE; 
		$this->load->view('default/fm_footer', $footer);
	}

	public function update_song()
	{
		if ( $this->song_model->update_song() )
		{
			$this->option_model->update('success', '更新歌曲信息成功。');
		}
		else
		{
			$this->option_model->update('warning', '更新歌曲信息失败。');
		}

		redirect(base_url('admin.php?c=song'), 'refresh');
	}
}

/* End of file song.php */
/* Location: ./application/controllers/song.php */
