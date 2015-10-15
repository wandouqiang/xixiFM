<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Upload extends CI_Upload {

	public function mkdir()
	{
		$year  = date("Y");
	    $month = date("m");

	    $path  = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR . $month;

	   	if( ! is_dir( $path ) )
	    {
	      if( ! mkdir ( $path, 0755, TRUE ) )
	      {
	        return FALSE;
	      }
	    }

	    return $path;
	}
}

/* End of file MY_Upload.php */
/* Location: ./application/libraries/MY_Upload.php */

