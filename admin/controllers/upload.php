<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if ( ! $this->session->userdata('admin') )
		{
			redirect(base_url('admin.php'), 'refresh');
		}
	}

	public function upload_song()
	{
		$config['upload_path']	 = $this->upload->mkdir();
		$config['allowed_types'] = 'mp3';
		$config['max_size']	     = $this->config->item('upload_music_size');
		$config['max_filename']	 = '62';
		$config['encrypt_name']	 = TRUE;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload())
		{
			echo "FALSE";
		} 
		else
		{
			$data  = $this->upload->data();
			$path  = $config['upload_path'] . DIRECTORY_SEPARATOR . $data['file_name'];
			if( ! $song = $this->song_model->upload( substr_replace( $data['orig_name'], '', -4 ) ,$path ) )
			{
				echo "TRUE";
			}
		}
	}

	public function upload_image()
	{
		$config['upload_path']	 = $this->upload->mkdir();
		$config['allowed_types'] = 'jpg|png|bmp|gif|jpeg';
		$config['max_size']	     = $this->config->item('upload_image_size');
		$config['max_filename']	 = '62';
		$config['encrypt_name']	 = TRUE;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload())
		{
			echo "FALSE";
		} 
		else
		{
			$data  = $this->upload->data();
			$path  = $config['upload_path'] . DIRECTORY_SEPARATOR . $data['file_name'];
			echo $path;
		}
	}
}

/* End of file upload.php */
/* Location: ./application/controllers/upload.php */
