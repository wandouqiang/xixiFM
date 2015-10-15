<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music {

	public function __construct()
	{

	}

	public function song($music_id)
	{
		$url = "http://music.163.com/api/song/detail/?id=" . $music_id . "&ids=%5B" . $music_id . "%5D";
    	$response = $this->http($url);

		if( $response["code"]==200 && $response["songs"] )
		{
			$mp3_url       = $response["songs"][0]["mp3Url"];
			$mp3_url       = str_replace("http://m", "http://p", $mp3_url);
			$music_name    = $response["songs"][0]["name"];
			$mp3_cover     = $response["songs"][0]["album"]["picUrl"];
			$song_duration = $response["songs"][0]["duration"];
			$artists       = array();

			foreach ($response["songs"][0]["artists"] as $artist)
			{
			    $artists[] = $artist["name"];
			}

			$artists = implode(",", $artists);

		    $result = array(
			    "song_id" => $music_id,
			    "song_name" => $music_name,
				"song_author" => $artists,
				"song_path" => $mp3_url,
				"song_cover" => $mp3_cover,
				"song_duration" => $song_duration
			);

		    return $result;
		}

		return false;	
	}

	public function album($album_id)
	{
		$key = "/netease/album/$album_id";

		$url = "http://music.163.com/api/album/" . $album_id;
    	$response = $this->http($url);

		if( $response["code"]==200 && $response["album"] ){
			//处理音乐信息
			$result = $response["album"]["songs"];
			$count = count($result);

			if( $count < 1 ) return false;

			$album_author = $response["album"]["artist"]["name"];

			foreach($result as $k => $value){
				$mp3_url = str_replace("http://m", "http://p", $value["mp3Url"]);
				$album["songs"][] = array(
					"song_id" => $value["id"],
					"song_name" => $value["name"],
					"song_path" => $mp3_url,
					"song_author" => $album_author
				);
			}

			return $album;
		}

		return false;
	}

	public function playlist($playlist_id)
	{
		$key = "/netease/playlist/$playlist_id";

		$url = "http://music.163.com/api/playlist/detail?id=" . $playlist_id;
    	$response = $this->http($url);

		if( $response["code"]==200 && $response["result"] ){
			//处理音乐信息
			$result = $response["result"]["tracks"];
			$count = count($result);

			if( $count < 1 ) return false;

			$collect_author = $response["result"]["creator"]["nickname"];

			foreach($result as $k => $value){
				$mp3_url = str_replace("http://m", "http://p", $value["mp3Url"]);
				$artists = array();
				foreach ($value["artists"] as $artist) {
				    $artists[] = $artist["name"];
				}

				$artists = implode(",", $artists);

				$collect["songs"][] = array(
					"song_id" => $value["id"],
					"song_name" => $value["name"],
					"song_path" => $mp3_url,
					"song_author" => $artists
				);
			}

			return $collect;
		}

		return false;
	}

	public function get_song_lrc($songid)
	{
		$key = "/netease/lrc/$songid";

        $url = "http://music.163.com/api/song/media?id=" . $songid;
        $response = $this->http($url);

        if( $response["code"]==200 && $response["lyric"] ){

            $content = $response["lyric"];
			$result = $this->parse_lrc($content);
			return $result;
            
        }

        return false;
	}

	private function parse_lrc($lrc_content)
	{
		$now_lrc = array();
		$lrc_row = explode("\n", $lrc_content);

		foreach ($lrc_row as $value) 
		{
			$tmp  = explode("]", $value);

			$tmp2 = explode(":", $tmp[0]);

			$sec  = intval( $tmp2[0] );

			array_push($now_lrc, $sec);
			array_push($now_lrc, $tmp[1]);

			//foreach ($tmp as $val) 
			//{
				//$tmp2 = substr($val, 1, 8);
				// $tmp2 = explode(":", $tmp2);

				// foreach ($tmp2 as $v) 
				// {
				// 	$lrc_sec = intval( $v[0]*60 + $v[1]*1 );
				// }

				//if( is_numeric($lrc_sec) && $lrc_sec > 0)
				//{
					//$count = count($tmp);
					//$lrc = trim($tmp[$count-1]);

					//if( $lrc != "" )
					//{
						//$now_lrc[$tmp2] = $lrc;  
					//}
				//}
			//}
		}

		return $now_lrc;	
	}

	private function http($url)
	{
	    $refer = "http://music.163.com/";
	    $header[] = "Cookie: " . "appver=2.0.2;";
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	    curl_setopt($ch, CURLOPT_REFERER, $refer);
	    $cexecute = curl_exec($ch);
	    curl_close($ch);

		if ($cexecute) 
		{
			$result = json_decode($cexecute, true);
			return $result;
		}
		else
		{
			return false;
		}
	}

	private function http_get($url)
    {
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if(intval($aStatus["http_code"])==200){
            return $sContent;
        }else{
            return false;
        }
    }
}


/* End of file Music.php */
/* Location: ./application/libraries/Music.php */

